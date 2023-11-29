<?php

namespace App\Http\Controllers\Api;

use App\Models\Businessinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class BusinessinfoProductsController extends Controller
{
    public function index(
        Request $request,
        Businessinfo $businessinfo
    ): ProductCollection {
        $this->authorize('view', $businessinfo);

        $search = $request->get('search', '');

        $products = $businessinfo
            ->products()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProductCollection($products);
    }

    public function store(
        Request $request,
        Businessinfo $businessinfo
    ): ProductResource {
        $this->authorize('create', Product::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ]);

        $product = $businessinfo->products()->create($validated);

        return new ProductResource($product);
    }
}
