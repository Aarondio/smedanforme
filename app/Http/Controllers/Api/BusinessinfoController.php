<?php

namespace App\Http\Controllers\Api;

use App\Models\Businessinfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessinfoResource;
use App\Http\Resources\BusinessinfoCollection;
use App\Http\Requests\BusinessinfoStoreRequest;
use App\Http\Requests\BusinessinfoUpdateRequest;

class BusinessinfoController extends Controller
{
    public function index(Request $request): BusinessinfoCollection
    {
        $this->authorize('view-any', Businessinfo::class);

        $search = $request->get('search', '');

        $businessinfos = Businessinfo::search($search)
            ->latest()
            ->paginate();

        return new BusinessinfoCollection($businessinfos);
    }

    public function store(
        BusinessinfoStoreRequest $request
    ): BusinessinfoResource {
        $this->authorize('create', Businessinfo::class);

        $validated = $request->validated();

        $businessinfo = Businessinfo::create($validated);

        return new BusinessinfoResource($businessinfo);
    }

    public function show(
        Request $request,
        Businessinfo $businessinfo
    ): BusinessinfoResource {
        $this->authorize('view', $businessinfo);

        return new BusinessinfoResource($businessinfo);
    }
    // public function audience_need(Request $request, Businessinfo $businessinfo)
    // {
    //     $validated = $request->validate([
    //         'audience_need' => 'required|string', // Define appropriate validation rules

    //     ]);
    //     $id =  2;
    //     $businessinfo = Businessinfo::find($id);
    //     // Update the audience_need field in the injected $businessinfo model
    //     $businessinfo->update(['audience_need' => $request->audience_need]);
    
    //     // You might want to associate the plan_type as well, if needed
    //     $businessinfo->update(['plan_type' => $request->plan_type]);
    
    //     if ($businessinfo->wasChanged()) {
    //         return response()->json(['statusCode' => 200]);
    //     } else {
    //         return response()->json(['statusCode' => 401]);
    //     }
    // }
    
    // public function audience_need(Request $request, Businessinfo $businessinfo)
    // {
    //     $validated = $request->validate([
    //         'audience_need',
    //         'plan_type'
    //     ]);
    //     $businessinfo = Businessinfo::find(2);
    //     $businessinfo->update(['audience_need' => $request->audience_need]);
    //     if($businessinfo){
    //         return json_encode(array('statusCode'=>200));
    //     }else{
    //         return json_encode(array('statusCode'=>401));
    //     }
    // }

    public function update(
        BusinessinfoUpdateRequest $request,
        Businessinfo $businessinfo
    ): BusinessinfoResource {
        $this->authorize('update', $businessinfo);

        $validated = $request->validated();

        $businessinfo->update($validated);

        return new BusinessinfoResource($businessinfo);
    }

    public function destroy(
        Request $request,
        Businessinfo $businessinfo
    ): Response {
        $this->authorize('delete', $businessinfo);

        $businessinfo->delete();

        return response()->noContent();
    }
}
