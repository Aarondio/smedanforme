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
            // Handle case where the record with the given ID is not found
            // Redirect, return an error response, or perform any other appropriate action
        }

        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'jan_cost' => ['required', 'numeric'],
            'feb_cost' => ['nullable', 'numeric'],
            'mar_cost' => ['nullable', 'numeric'],
            'apr_cost' => ['nullable', 'numeric'],
            'may_cost' => ['nullable', 'numeric'],
            'jun_cost' => ['nullable', 'numeric'],
            'jul_cost' => ['nullable', 'numeric'],
            'aug_cost' => ['nullable', 'numeric'],
            'sep_cost' => ['nullable', 'numeric'],
            'oct_cost' => ['nullable', 'numeric'],
            'nov_cost' => ['nullable', 'numeric'],
            'dec_cost' => ['nullable', 'numeric'],

            'jan_price' => ['required', 'numeric'],
            'feb_price' => ['nullable', 'numeric'],
            'mar_price' => ['nullable', 'numeric'],
            'apr_price' => ['nullable', 'numeric'],
            'may_price' => ['nullable', 'numeric'],
            'jun_price' => ['nullable', 'numeric'],
            'jul_price' => ['nullable', 'numeric'],
            'aug_price' => ['nullable', 'numeric'],
            'sep_price' => ['nullable', 'numeric'],
            'oct_price' => ['nullable', 'numeric'],
            'nov_price' => ['nullable', 'numeric'],
            'dec_price' => ['nullable', 'numeric'],

            'jan_qty' => ['required', 'numeric'],
            'feb_qty' => ['nullable', 'numeric'],
            'mar_qty' => ['nullable', 'numeric'],
            'apr_qty' => ['nullable', 'numeric'],
            'may_qty' => ['nullable', 'numeric'],
            'jun_qty' => ['nullable', 'numeric'],
            'jul_qty' => ['nullable', 'numeric'],
            'aug_qty' => ['nullable', 'numeric'],
            'sep_qty' => ['nullable', 'numeric'],
            'oct_qty' => ['nullable', 'numeric'],
            'nov_qty' => ['nullable', 'numeric'],
            'dec_qty' => ['nullable', 'numeric'],
        ]);

        if ($request->has('procost')) {
            $janCost = $validated['jan_cost'];
            $request->merge(array_fill_keys([
                'feb_cost', 'mar_cost', 'apr_cost', 'may_cost', 'jun_cost', 'jul_cost',
                'aug_cost', 'sep_cost', 'oct_cost', 'nov_cost', 'dec_cost'
            ], $janCost));
        }

        if ($request->has('proprice')) {
            $janPrice = $validated['jan_price'];
            $request->merge(array_fill_keys([
                'feb_price', 'mar_price', 'apr_price', 'may_price', 'jun_price', 'jul_price',
                'aug_price', 'sep_price', 'oct_price', 'nov_price', 'dec_price'
            ], $janPrice));
        }

        $salesforcast->update($validated);

        if($salesforcast){
            return redirect()->route('home');
        }else{
            return redirect()->back()->withErrors('Wahala');
        }

       
    }

    // public function saveproductioncost(Request $request)
    // {
    //     $id = $request->input('id');
    //     $salesforcast = Salesforcast::where('id', $id);

    //     $validated = $request->validate([
    //         'product_id' => ['required', 'exists:products,id'],
    //         'jan_cost' => ['required', 'numeric'],
    //         'feb_cost' => ['nullable', 'numeric'],
    //         'mar_cost' => ['nullable', 'numeric'],
    //         'apr_cost' => ['nullable', 'numeric'],
    //         'may_cost' => ['nullable', 'numeric'],
    //         'jun_cost' => ['nullable', 'numeric'],
    //         'jul_cost' => ['nullable', 'numeric'],
    //         'aug_cost' => ['nullable', 'numeric'],
    //         'sep_cost' => ['nullable', 'numeric'],
    //         'oct_cost' => ['nullable', 'numeric'],
    //         'nov_cost' => ['nullable', 'numeric'],
    //         'dec_cost' => ['nullable', 'numeric'],

    //         'jan_price' => ['required', 'numeric'],
    //         'feb_price' => ['nullable', 'numeric'],
    //         'mar_price' => ['nullable', 'numeric'],
    //         'apr_price' => ['nullable', 'numeric'],
    //         'may_price' => ['nullable', 'numeric'],
    //         'jun_price' => ['nullable', 'numeric'],
    //         'jul_price' => ['nullable', 'numeric'],
    //         'aug_price' => ['nullable', 'numeric'],
    //         'sep_price' => ['nullable', 'numeric'],
    //         'oct_price' => ['nullable', 'numeric'],
    //         'nov_price' => ['nullable', 'numeric'],
    //         'dec_price' => ['nullable', 'numeric'],

    //         'jan_qty' => ['required', 'numeric'],
    //         'feb_qty' => ['nullable', 'numeric'],
    //         'mar_qty' => ['nullable', 'numeric'],
    //         'apr_qty' => ['nullable', 'numeric'],
    //         'may_qty' => ['nullable', 'numeric'],
    //         'jun_qty' => ['nullable', 'numeric'],
    //         'jul_qty' => ['nullable', 'numeric'],
    //         'aug_qty' => ['nullable', 'numeric'],
    //         'sep_qty' => ['nullable', 'numeric'],
    //         'oct_qty' => ['nullable', 'numeric'],
    //         'nov_qty' => ['nullable', 'numeric'],
    //         'dec_qty' => ['nullable', 'numeric'],
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
    public function updatesales(Request $request,
        Salesforcast $salesforcast
    ): RedirectResponse {
        // $this->authorize('update', $salesforcast);

        // $validated = $request->validated();

        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'jan_cost' => ['required', 'numeric'],
            'feb_cost' => ['nullable', 'numeric'],
            'mar_cost' => ['nullable', 'numeric'],
            'apr_cost' => ['nullable', 'numeric'],
            'may_cost' => ['nullable', 'numeric'],
            'jun_cost' => ['nullable', 'numeric'],
            'jul_cost' => ['nullable', 'numeric'],
            'aug_cost' => ['nullable', 'numeric'],
            'sep_cost' => ['nullable', 'numeric'],
            'oct_cost' => ['nullable', 'numeric'],
            'nov_cost' => ['nullable', 'numeric'],
            'dec_cost' => ['nullable', 'numeric'],

            'jan_price' => ['required', 'numeric'],
            'feb_price' => ['nullable', 'numeric'],
            'mar_price' => ['nullable', 'numeric'],
            'apr_price' => ['nullable', 'numeric'],
            'may_price' => ['nullable', 'numeric'],
            'jun_price' => ['nullable', 'numeric'],
            'jul_price' => ['nullable', 'numeric'],
            'aug_price' => ['nullable', 'numeric'],
            'sep_price' => ['nullable', 'numeric'],
            'oct_price' => ['nullable', 'numeric'],
            'nov_price' => ['nullable', 'numeric'],
            'dec_price' => ['nullable', 'numeric'],

            'jan_qty' => ['required', 'numeric'],
            'feb_qty' => ['nullable', 'numeric'],
            'mar_qty' => ['nullable', 'numeric'],
            'apr_qty' => ['nullable', 'numeric'],
            'may_qty' => ['nullable', 'numeric'],
            'jun_qty' => ['nullable', 'numeric'],
            'jul_qty' => ['nullable', 'numeric'],
            'aug_qty' => ['nullable', 'numeric'],
            'sep_qty' => ['nullable', 'numeric'],
            'oct_qty' => ['nullable', 'numeric'],
            'nov_qty' => ['nullable', 'numeric'],
            'dec_qty' => ['nullable', 'numeric'],
        ]);
        $salesforcast->update($validated);

        return redirect()
            ->route('salesforcasts.edit', $salesforcast)
            ->withSuccess(__('crud.common.saved'));
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
