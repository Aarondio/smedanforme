<?php

namespace App\Http\Controllers\Api;

use App\Models\Businessinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CashflowResource;
use App\Http\Resources\CashlowCollection;

class BusinessinfoCashlowsController extends Controller
{
    public function index(
        Request $request,
        Businessinfo $businessinfo
    ): CashlowCollection {
        $this->authorize('view', $businessinfo);

        $search = $request->get('search', '');

        $cashlows = $businessinfo
            ->cashlows()
            ->search($search)
            ->latest()
            ->paginate();

        return new CashlowCollection($cashlows);
    }

    public function store(
        Request $request,
        Businessinfo $businessinfo
    ): CashlowResource {
        $this->authorize('create', Cashflow::class);

        $validated = $request->validate([
            'directin_one' => ['required', 'max:255'],
            'directin_two' => ['required', 'max:255'],
            'directin_three' => ['required', 'max:255'],
            'directin_four' => ['required', 'max:255'],
            'indirectin_one' => ['required', 'max:255'],
            'indirectin_two' => ['required', 'max:255'],
            'indirectin_three' => ['required', 'max:255'],
            'indirectin_four' => ['required', 'max:255'],
            'wages_one' => ['required', 'max:255'],
            'wages_two' => ['required', 'max:255'],
            'wages_three' => ['required', 'max:255'],
            'wages_four' => ['required', 'max:255'],
            'capitalcost_one' => ['required', 'max:255'],
            'capitalcost_two' => ['required', 'max:255'],
            'capitalcost_three' => ['required', 'max:255'],
            'capitalcost_four' => ['required', 'max:255'],
        ]);

        $cashflow = $businessinfo->cashflows()->create($validated);

        return new CashflowResource($cashflow);
    }
}
