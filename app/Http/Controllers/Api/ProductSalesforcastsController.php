<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalesforcastResource;
use App\Http\Resources\SalesforcastCollection;

class ProductSalesforcastsController extends Controller
{
    public function index(
        Request $request,
        Product $product
    ): SalesforcastCollection {
        $this->authorize('view', $product);

        $search = $request->get('search', '');

        $salesforcasts = $product
            ->salesforcasts()
            ->search($search)
            ->latest()
            ->paginate();

        return new SalesforcastCollection($salesforcasts);
    }

    public function store(
        Request $request,
        Product $product
    ): SalesforcastResource {
        $this->authorize('create', Salesforcast::class);

        $validated = $request->validate([
            'jan_price' => ['required', 'numeric'],
            'feb_price' => ['required', 'numeric'],
            'mar_price' => ['required', 'numeric'],
            'aprile_price' => ['required', 'numeric'],
            'may_price' => ['required', 'numeric'],
            'jun_price' => ['required', 'numeric'],
            'jul_price' => ['nullable', 'numeric'],
            'aug_price' => ['nullable', 'numeric'],
            'sep_price' => ['nullable', 'numeric'],
            'oct_price' => ['nullable', 'numeric'],
            'nov_price' => ['nullable', 'numeric'],
            'dec_price' => ['nullable', 'numeric'],
            'jan_qty' => ['required', 'max:255'],
            'feb_qty' => ['required', 'max:255'],
            'mar_qty' => ['required', 'max:255'],
            'apr_qty' => ['required', 'max:255'],
            'may_qty' => ['required', 'max:255'],
            'jun_qty' => ['required', 'max:255'],
            'jul_qty' => ['nullable', 'max:255'],
            'aug_qty' => ['nullable', 'max:255'],
            'sep_qty' => ['nullable', 'max:255'],
            'oct_qty' => ['nullable', 'max:255'],
            'nov_qty' => ['nullable', 'max:255'],
            'dec_qty' => ['nullable', 'max:255'],
            'jan_cost' => ['required', 'numeric'],
            'feb_cost' => ['required', 'numeric'],
            'mar_cost' => ['required', 'numeric'],
            'apr_cost' => ['required', 'numeric'],
            'may_cost' => ['required', 'numeric'],
            'jun_cost' => ['required', 'numeric'],
            'jul_cost' => ['nullable', 'numeric'],
            'aug_cost' => ['nullable', 'numeric'],
            'sep_cost' => ['nullable', 'numeric'],
            'oct_cost' => ['nullable', 'numeric'],
            'nov_cost' => ['nullable', 'numeric'],
            'dec_cost' => ['nullable', 'numeric'],
        ]);

        $salesforcast = $product->salesforcasts()->create($validated);

        return new SalesforcastResource($salesforcast);
    }
}
