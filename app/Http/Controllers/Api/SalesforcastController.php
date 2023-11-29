<?php

namespace App\Http\Controllers\Api;

use App\Models\Salesforcast;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalesforcastResource;
use App\Http\Resources\SalesforcastCollection;
use App\Http\Requests\SalesforcastStoreRequest;
use App\Http\Requests\SalesforcastUpdateRequest;

class SalesforcastController extends Controller
{
    public function index(Request $request): SalesforcastCollection
    {
        $this->authorize('view-any', Salesforcast::class);

        $search = $request->get('search', '');

        $salesforcasts = Salesforcast::search($search)
            ->latest()
            ->paginate();

        return new SalesforcastCollection($salesforcasts);
    }

    public function store(
        SalesforcastStoreRequest $request
    ): SalesforcastResource {
        $this->authorize('create', Salesforcast::class);

        $validated = $request->validated();

        $salesforcast = Salesforcast::create($validated);

        return new SalesforcastResource($salesforcast);
    }

    public function show(
        Request $request,
        Salesforcast $salesforcast
    ): SalesforcastResource {
        $this->authorize('view', $salesforcast);

        return new SalesforcastResource($salesforcast);
    }

    public function update(
        SalesforcastUpdateRequest $request,
        Salesforcast $salesforcast
    ): SalesforcastResource {
        $this->authorize('update', $salesforcast);

        $validated = $request->validated();

        $salesforcast->update($validated);

        return new SalesforcastResource($salesforcast);
    }

    public function destroy(
        Request $request,
        Salesforcast $salesforcast
    ): Response {
        $this->authorize('delete', $salesforcast);

        $salesforcast->delete();

        return response()->noContent();
    }
}
