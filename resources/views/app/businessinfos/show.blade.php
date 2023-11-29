@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('businessinfos.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.businessinfos.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.business_name')</h5>
                    <span>{{ $businessinfo->business_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.user_id')</h5>
                    <span
                        >{{ optional($businessinfo->user)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.audience_need')</h5>
                    <span>{{ $businessinfo->audience_need ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.business_model')</h5>
                    <span>{{ $businessinfo->business_model ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.target_market')</h5>
                    <span>{{ $businessinfo->target_market ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.competition_ad')</h5>
                    <span>{{ $businessinfo->competition_ad ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.management_team')</h5>
                    <span>{{ $businessinfo->management_team ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.loan_amount')</h5>
                    <span>{{ $businessinfo->loan_amount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.businessinfos.inputs.loan_reason')</h5>
                    <span>{{ $businessinfo->loan_reason ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('businessinfos.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Businessinfo::class)
                <a
                    href="{{ route('businessinfos.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
