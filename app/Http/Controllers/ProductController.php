<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Businessinfo;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Rules\UniqueProductName;
use App\Models\Paystack;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Product::class);

        $search = $request->get('search', '');

        $products = Product::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.products.index', compact('products', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Product::class);

        $businessinfos = Businessinfo::pluck('business_name', 'id');

        return view('app.products.create', compact('businessinfos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Product::class);

        $validated = $request->validated();

        $product = Product::create($validated);

        return redirect()
            ->route('products.edit', $product)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product): View
    {
        $this->authorize('view', $product);

        return view('app.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Product $product): View
    {
        $this->authorize('update', $product);

        $businessinfos = Businessinfo::pluck('business_name', 'id');

        return view('app.products.edit', compact('product', 'businessinfos'));
    }
    public function myproducts(Request $request, Product $product)
    {
        $user = Auth::user();

        if ($user) {

            $paystack = Paystack::where('user_id', $user->id)->first();

            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                $businessinfo = Businessinfo::where('user_id', $user->id)->first();
                $products = Product::where('businessinfo_id', $businessinfo->id)->get();
                if ($businessinfo && $businessinfo->exists()) {
                    return view('app.dashboard.myproducts', compact('user', 'businessinfo', 'products'));
                } else {
                    return redirect()->back()->with('error', 'Business info not found.');
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Please log in to access.');
        }
    }

    public function add_product(Request $request, Product $product)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                throw new \Exception('User authentication failed');
            }

            $businessinfo = Businessinfo::where('user_id', $user->id)->where('plan_type', 1)->first();

            if (!$businessinfo) {
                throw new \Exception('Business information not found');
            }

            $validated = $request->validate([
                'name' => 'required|unique:products,name,NULL,id,businessinfo_id,' . $businessinfo->id,
                'price' => 'required',
                'cost' => 'required',
                'quantity'=>'required'
            ]);

            $validated['businessinfo_id'] = $businessinfo->id;

            $createdProduct = $product->create($validated);

            if (!$createdProduct) {
                throw new \Exception('Failed to add product');
            }

            // return response()->json(['success' => 'Product added']);
            redirect()->route('myproducts')->withSuccess("Product Added successfully");
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
            // redirect()->route('product')->withErrors($e->getMessage());
        }
    }


    // public function add_product(Request $request, Product $product,Businessinfo $businessinfo){
    //     $user =  Auth::user();
    //     $validated = $request->validate([
    //         'name'=>'required',
    //         'price'=>'required',
    //         'cost'=>'required',
    //     ]);
    //     if ($user) {
    //         $businessinfo = Businessinfo::where('user_id', $user->id)->where('plan_type',1)->first();
    //         $validated['businessinfo_id'] =  $businessinfo->id;
    //         $product->update($validated);
    //         if ($product) {
    //             // return json_encode(array('statusCode' => 200));
    //               return redirect()->route('product')->withSuccess('Product added');
    //         } else {
    //             return redirect()->route('add_product')->withErrors('Failed to add product');
    //             // return json_encode(array('statusCode' => 401));
    //         }
    //     }
    // }
    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProductUpdateRequest $request,
        Product $product
    ): RedirectResponse {
        $this->authorize('update', $product);

        $validated = $request->validated();

        $product->update($validated);

        return redirect()
            ->route('products.edit', $product)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Product $product
    ): RedirectResponse {
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
