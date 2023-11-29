<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessinfoResource;
use App\Http\Resources\BusinessinfoCollection;

class UserBusinessinfosController extends Controller
{
    public function index(Request $request, User $user): BusinessinfoCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $businessinfos = $user
            ->businessinfos()
            ->search($search)
            ->latest()
            ->paginate();

        return new BusinessinfoCollection($businessinfos);
    }

    public function store(Request $request, User $user): BusinessinfoResource
    {
        $this->authorize('create', Businessinfo::class);

        $validated = $request->validate([
            'business_name' => ['required', 'max:255', 'string'],
            'audience_need' => ['required', 'max:255', 'string'],
            'business_model' => ['required', 'max:255', 'string'],
            'target_market' => ['required', 'max:255', 'string'],
            'competition_ad' => ['required', 'max:255', 'string'],
            'management_team' => ['required', 'max:255', 'string'],
            'loan_amount' => ['required', 'max:255'],
            'loan_reason' => ['required', 'max:255', 'string'],
        ]);

        $businessinfo = $user->businessinfos()->create($validated);

        return new BusinessinfoResource($businessinfo);
    }
}
