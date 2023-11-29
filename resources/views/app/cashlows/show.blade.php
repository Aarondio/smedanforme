@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('cashlows.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.cashlows.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.directin_one')</h5>
                    <span>{{ $cashlow->directin_one ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.directin_two')</h5>
                    <span>{{ $cashlow->directin_two ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.directin_three')</h5>
                    <span>{{ $cashlow->directin_three ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.directin_four')</h5>
                    <span>{{ $cashlow->directin_four ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.indirectin_one')</h5>
                    <span>{{ $cashlow->indirectin_one ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.indirectin_two')</h5>
                    <span>{{ $cashlow->indirectin_two ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.indirectin_three')</h5>
                    <span>{{ $cashlow->indirectin_three ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.indirectin_four')</h5>
                    <span>{{ $cashlow->indirectin_four ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.wages_one')</h5>
                    <span>{{ $cashlow->wages_one ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.wages_two')</h5>
                    <span>{{ $cashlow->wages_two ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.wages_three')</h5>
                    <span>{{ $cashlow->wages_three ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.wages_four')</h5>
                    <span>{{ $cashlow->wages_four ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.capitalcost_one')</h5>
                    <span>{{ $cashlow->capitalcost_one ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.capitalcost_two')</h5>
                    <span>{{ $cashlow->capitalcost_two ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.capitalcost_three')</h5>
                    <span>{{ $cashlow->capitalcost_three ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.capitalcost_four')</h5>
                    <span>{{ $cashlow->capitalcost_four ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cashlows.inputs.businessinfo_id')</h5>
                    <span
                        >{{ optional($cashlow->businessinfo)->business_name ??
                        '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('cashlows.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Cashlow::class)
                <a href="{{ route('cashlows.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
