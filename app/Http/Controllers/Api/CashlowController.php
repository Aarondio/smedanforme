<?php

namespace App\Http\Controllers\Api;

use App\Models\Cashlow;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CashlowResource;
use App\Http\Resources\CashlowCollection;
use App\Http\Requests\CashlowStoreRequest;
use App\Http\Requests\CashlowUpdateRequest;

class CashlowController extends Controller
{
    public function index(Request $request): CashlowCollection
    {
        $this->authorize('view-any', Cashlow::class);

        $search = $request->get('search', '');

        $cashlows = Cashlow::search($search)
            ->latest()
            ->paginate();

        return new CashlowCollection($cashlows);
    }

    public function store(CashlowStoreRequest $request): CashlowResource
    {
        $this->authorize('create', Cashlow::class);

        $validated = $request->validated();

        $cashlow = Cashlow::create($validated);

        return new CashlowResource($cashlow);
    }

    public function show(Request $request, Cashlow $cashlow): CashlowResource
    {
        $this->authorize('view', $cashlow);

        return new CashlowResource($cashlow);
    }

    public function update(
        CashlowUpdateRequest $request,
        Cashlow $cashlow
    ): CashlowResource {
        $this->authorize('update', $cashlow);

        $validated = $request->validated();

        $cashlow->update($validated);

        return new CashlowResource($cashlow);
    }

    public function destroy(Request $request, Cashlow $cashlow): Response
    {
        $this->authorize('delete', $cashlow);

        $cashlow->delete();

        return response()->noContent();
    }
}
