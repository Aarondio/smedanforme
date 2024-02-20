<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Businessinfo;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CashflowStoreRequest;
use App\Http\Requests\CashflowUpdateRequest;
use App\Models\Salesforcast;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Cashflow::class);

        $search = $request->get('search', '');

        $cashlows = Cashflow::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.cashlows.index', compact('cashflows', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Cashflow::class);

        $businessinfos = Businessinfo::pluck('business_name', 'id');

        return view('app.cashlows.create', compact('businessinfos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CashflowStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Cashflow::class);

        $validated = $request->validated();

        $cashlow = Cashflow::create($validated);

        return redirect()
            ->route('cashlows.edit', $cashlow)
            ->withSuccess(__('crud.common.created'));
    }

    public function extrainfo(Request $request, Salesforcast $salesforcast)
    {
        $product = Product::find(base64_decode($request->input('id')));
        $bizid = base64_decode($request->input('bizid'));
        if (!$product) {
            return redirect()->back();
        }

        $businessInfo = Businessinfo::find($bizid);
        if (!$businessInfo) {
            return redirect()->back();
        }

        if ($businessInfo->id !== $product->businessinfo_id) {
            return redirect()->back()->with('error', 'You do not have permission to access this product.');
        }

        $existingSalesForecast = Salesforcast::where('product_id', $product->id)->first();

        if (!$existingSalesForecast) {
            // Create new sales forecast and return view
            $salesforcast->product_id = $product->id;
            $salesforcast->businessinfo_id = $businessInfo->id;
            $salesforcast->save();
            $salesforcast = Salesforcast::where('product_id', $product->id)->first();

            return view('app.dashboard.extrainfo', compact('product', 'salesforcast','bizid'));
        } else {
            // Return view with existing sales forecast
            return view('app.dashboard.extrainfo', compact('product', 'existingSalesForecast','bizid'));
        }
    }

    // public function extrainfo(Request $request, Salesforcast $salesforcast)
    // {
    //     $product = Product::find($request->input('id'));
    //     if (!$product) {
    //         return redirect()->back();
    //     }

    //     $existingSalesForecast = Salesforcast::where('product_id', $product->id)->first();

    //     if (!$existingSalesForecast) {
    //         $salesforcast->product_id = $product->id;
    //         $salesforcast->save();
    //         $salesforcast = Salesforcast::where('product_id', $product->id)->first();

    //         return view('app.dashboard.extrainfo', compact('product', 'salesforcast'));
    //     } else {
    //         return view('app.dashboard.extrainfo', compact('product', 'existingSalesForecast'));
    //     }
    // }


    // public function extrainfo(Request $request, Salesforcast $salesforcast){
    //     $salesforcast = Salesforcast::where('product_id', $request->id)->first();


    //     if (!$salesforcast->exists()) {
    //         $salesforcast->product_id = $request->id;
    //         $salesforcast->save();
    //         $product = Product::where('id',$request->id);
    //         return view('app.dashboard.extrainfo',compact('product'));
    //     } else {
    //         return redirect()->back()->with('error', 'Business info not found.');
    //     }

    // }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, Cashflow $cashflow): View
    {
        $this->authorize('view', $cashflow);

        return view('app.cashlows.show', compact('cashflow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Cashflow $cashflow): View
    {
        $this->authorize('update', $cashflow);

        $businessinfos = Businessinfo::pluck('business_name', 'id');

        return view('app.cashlows.edit', compact('cashflow', 'businessinfos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CashflowUpdateRequest $request,
        Cashflow $cashflow
    ): RedirectResponse {
        $this->authorize('update', $cashflow);

        $validated = $request->validated();

        $cashflow->update($validated);

        return redirect()
            ->route('cashlows.edit', $cashflow)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Cashflow $cashflow
    ): RedirectResponse {
        $this->authorize('delete', $cashflow);

        $cashflow->delete();

        return redirect()
            ->route('cashlows.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
