<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use App\Models\Salesforcast;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SalesforcastStoreRequest;
use App\Http\Requests\SalesforcastUpdateRequest;

class SalesforcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Salesforcast::class);

        $search = $request->get('search', '');

        $salesforcasts = Salesforcast::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.salesforcasts.index',
            compact('salesforcasts', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Salesforcast::class);

        $products = Product::pluck('name', 'id');

        return view('app.salesforcasts.create', compact('products'));
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesforcastStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Salesforcast::class);

        $validated = $request->validated();

        $salesforcast = Salesforcast::create($validated);

        return redirect()
            ->route('salesforcasts.edit', $salesforcast)
            ->withSuccess(__('crud.common.created'));
    }

    public function saveProductionCost(Request $request)
    {
        $id = $request->input('id');
        $salesforcast = Salesforcast::find($id); // Fetch the specific Salesforcast record by ID

        if (!$salesforcast) {
            return redirect()->back()->withErrors('Wahala');
        }

        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'jan_cost' => ['required'],
            'feb_cost' => ['nullable'],
            'mar_cost' => ['nullable'],
            'apr_cost' => ['nullable'],
            'may_cost' => ['nullable'],
            'jun_cost' => ['nullable'],
            'jul_cost' => ['nullable'],
            'aug_cost' => ['nullable'],
            'sep_cost' => ['nullable'],
            'oct_cost' => ['nullable'],
            'nov_cost' => ['nullable'],
            'dec_cost' => ['nullable'],

            'jan_price' => ['required'],
            'feb_price' => ['nullable'],
            'mar_price' => ['nullable'],
            'apr_price' => ['nullable'],
            'may_price' => ['nullable'],
            'jun_price' => ['nullable'],
            'jul_price' => ['nullable'],
            'aug_price' => ['nullable'],
            'sep_price' => ['nullable'],
            'oct_price' => ['nullable'],
            'nov_price' => ['nullable'],
            'dec_price' => ['nullable'],

            'jan_qty' => ['required'],
            'feb_qty' => ['nullable'],
            'mar_qty' => ['nullable'],
            'apr_qty' => ['nullable'],
            'may_qty' => ['nullable'],
            'jun_qty' => ['nullable'],
            'jul_qty' => ['nullable'],
            'aug_qty' => ['nullable'],
            'sep_qty' => ['nullable'],
            'oct_qty' => ['nullable'],
            'nov_qty' => ['nullable'],
            'dec_qty' => ['nullable'],
        ]);

        // if ($request->has('procost')) {
        //     $janCost = $validated['jan_cost'];
        //     $request->merge(array_fill_keys([
        //         'feb_cost', 'mar_cost', 'apr_cost', 'may_cost', 'jun_cost', 'jul_cost',
        //         'aug_cost', 'sep_cost', 'oct_cost', 'nov_cost', 'dec_cost'
        //     ], $janCost));
        // }

        // if ($request->has('proprice')) {
        //     $janPrice = $validated['jan_price'];
        //     $request->merge(array_fill_keys([
        //         'feb_price', 'mar_price', 'apr_price', 'may_price', 'jun_price', 'jul_price',
        //         'aug_price', 'sep_price', 'oct_price', 'nov_price', 'dec_price'
        //     ], $janPrice));
        // }

        $salesforcast->update($validated);

        if ($salesforcast) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors('Wahala');
        }
    }

    // public function saveproductioncost(Request $request)
    // {
    //     $id = $request->input('id');
    //     $salesforcast = Salesforcast::where('id', $id);

    //     $validated = $request->validate([
    //         'product_id' => ['required', 'exists:products,id'],
    //         'jan_cost' => ['required'],
    //         'feb_cost' => ['nullable'],
    //         'mar_cost' => ['nullable'],
    //         'apr_cost' => ['nullable'],
    //         'may_cost' => ['nullable'],
    //         'jun_cost' => ['nullable'],
    //         'jul_cost' => ['nullable'],
    //         'aug_cost' => ['nullable'],
    //         'sep_cost' => ['nullable'],
    //         'oct_cost' => ['nullable'],
    //         'nov_cost' => ['nullable'],
    //         'dec_cost' => ['nullable'],

    //         'jan_price' => ['required'],
    //         'feb_price' => ['nullable'],
    //         'mar_price' => ['nullable'],
    //         'apr_price' => ['nullable'],
    //         'may_price' => ['nullable'],
    //         'jun_price' => ['nullable'],
    //         'jul_price' => ['nullable'],
    //         'aug_price' => ['nullable'],
    //         'sep_price' => ['nullable'],
    //         'oct_price' => ['nullable'],
    //         'nov_price' => ['nullable'],
    //         'dec_price' => ['nullable'],

    //         'jan_qty' => ['required'],
    //         'feb_qty' => ['nullable'],
    //         'mar_qty' => ['nullable'],
    //         'apr_qty' => ['nullable'],
    //         'may_qty' => ['nullable'],
    //         'jun_qty' => ['nullable'],
    //         'jul_qty' => ['nullable'],
    //         'aug_qty' => ['nullable'],
    //         'sep_qty' => ['nullable'],
    //         'oct_qty' => ['nullable'],
    //         'nov_qty' => ['nullable'],
    //         'dec_qty' => ['nullable'],
    //     ]);

    //     if ($request->has('procost')) {
    //         $janCost = $validated['jan_cost'];
    //         $request->merge(array_fill_keys([
    //             'feb_cost', 'mar_cost', 'apr_cost', 'may_cost', 'jun_cost', 'jul_cost',
    //             'aug_cost', 'sep_cost', 'oct_cost', 'nov_cost', 'dec_cost'
    //         ], $janCost));
    //     }

    //     if ($request->has('proprice')) {
    //         $janPrice = $validated['jan_price'];
    //         $request->merge(array_fill_keys([
    //             'feb_price', 'mar_price', 'apr_price', 'may_price', 'jun_price', 'jul_price',
    //             'aug_price', 'sep_price', 'oct_price', 'nov_price', 'dec_price'
    //         ], $janPrice));
    //     }

    //     $salesforcast->update($validated);
    //     if ($salesforcast) {
    //         return redirect()->route('home');
    //     }
    // }

    public function show(Request $request, Salesforcast $salesforcast): View
    {
        $this->authorize('view', $salesforcast);

        return view('app.salesforcasts.show', compact('salesforcast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Salesforcast $salesforcast): View
    {
        $this->authorize('update', $salesforcast);

        $products = Product::pluck('name', 'id');

        return view(
            'app.salesforcasts.edit',
            compact('salesforcast', 'products')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    // public function updatesales(
    //     Request $request,
    //     Salesforcast $salesforcast
    // ){
    // $this->authorize('update', $salesforcast);

    // $validated = $request->validated();

    // $validated = $request->validate([
    //     'product_id' => ['required', 'exists:products,id'],
    //     'jan_cost' => ['required'],
    // 'feb_cost' => ['nullable'],
    // 'mar_cost' => ['nullable'],
    // 'apr_cost' => ['nullable'],
    // 'may_cost' => ['nullable'],
    // 'jun_cost' => ['nullable'],
    // 'jul_cost' => ['nullable'],
    // 'aug_cost' => ['nullable'],
    // 'sep_cost' => ['nullable'],
    // 'oct_cost' => ['nullable'],
    // 'nov_cost' => ['nullable'],
    // 'dec_cost' => ['nullable'],

    // 'jan_price' => ['required'],
    // 'feb_price' => ['nullable'],
    // 'mar_price' => ['nullable'],
    // 'apr_price' => ['nullable'],
    // 'may_price' => ['nullable'],
    // 'jun_price' => ['nullable'],
    // 'jul_price' => ['nullable'],
    // 'aug_price' => ['nullable'],
    // 'sep_price' => ['nullable'],
    // 'oct_price' => ['nullable'],
    // 'nov_price' => ['nullable'],
    // 'dec_price' => ['nullable'],

    // 'jan_qty' => ['required'],
    // 'feb_qty' => ['nullable'],
    // 'mar_qty' => ['nullable'],
    // 'apr_qty' => ['nullable'],
    // 'may_qty' => ['nullable'],
    // 'jun_qty' => ['nullable'],
    // 'jul_qty' => ['nullable'],
    // 'aug_qty' => ['nullable'],
    // 'sep_qty' => ['nullable'],
    // 'oct_qty' => ['nullable'],
    // 'nov_qty' => ['nullable'],
    // 'dec_qty' => ['nullable'],
    // ]);

    //     $validated = $request->validate([
    //         'product_id' => ['required', 'exists:products,id'],
    //         'jan_cost' => ['required'],
    //         'jan_qty' => ['required'],
    //         'jan_price' => ['required'],
    //     ]);

    //     $id = $request->id;
    //     $salesforcast = Salesforcast::where('product_id', $id)->first();
    //     $salesforcast->update(['jan_price'=>200]);

    //     return redirect()
    //     ->back()
    //         // ->route('salesforcasts.edit', $salesforcast)
    //         ->withErrors('Saved ');
    // }

    public function updatesales(Request $request, Salesforcast $salesforcast)
    {

        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'jan_cost' => ['required'],
            'jan_qty' => ['required'],
            'jan_price' => ['required'],
        ]);
        // $id = $request->id;
        $salesforcast = Salesforcast::find(56);
        if ($salesforcast) {
            $salesforcast->update($validated);
            return redirect()->route('myproducts')->withSuccess("Saved");
        } else {
            return redirect()->back()->withError("Error Message");
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Salesforcast $salesforcast
    ): RedirectResponse {
        $this->authorize('delete', $salesforcast);

        $salesforcast->delete();

        return redirect()
            ->route('salesforcasts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
