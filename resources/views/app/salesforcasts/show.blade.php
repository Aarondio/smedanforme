@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('salesforcasts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.salesforcasts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.product_id')</h5>
                    <span
                        >{{ optional($salesforcast->product)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jan_price')</h5>
                    <span>{{ $salesforcast->jan_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.feb_price')</h5>
                    <span>{{ $salesforcast->feb_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.mar_price')</h5>
                    <span>{{ $salesforcast->mar_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.aprile_price')</h5>
                    <span>{{ $salesforcast->aprile_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.may_price')</h5>
                    <span>{{ $salesforcast->may_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jun_price')</h5>
                    <span>{{ $salesforcast->jun_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jul_price')</h5>
                    <span>{{ $salesforcast->jul_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.aug_price')</h5>
                    <span>{{ $salesforcast->aug_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.sep_price')</h5>
                    <span>{{ $salesforcast->sep_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.oct_price')</h5>
                    <span>{{ $salesforcast->oct_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.nov_price')</h5>
                    <span>{{ $salesforcast->nov_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.dec_price')</h5>
                    <span>{{ $salesforcast->dec_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jan_qty')</h5>
                    <span>{{ $salesforcast->jan_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.feb_qty')</h5>
                    <span>{{ $salesforcast->feb_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.mar_qty')</h5>
                    <span>{{ $salesforcast->mar_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.apr_qty')</h5>
                    <span>{{ $salesforcast->apr_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.may_qty')</h5>
                    <span>{{ $salesforcast->may_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jun_qty')</h5>
                    <span>{{ $salesforcast->jun_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jul_qty')</h5>
                    <span>{{ $salesforcast->jul_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.aug_qty')</h5>
                    <span>{{ $salesforcast->aug_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.sep_qty')</h5>
                    <span>{{ $salesforcast->sep_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.oct_qty')</h5>
                    <span>{{ $salesforcast->oct_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.nov_qty')</h5>
                    <span>{{ $salesforcast->nov_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.dec_qty')</h5>
                    <span>{{ $salesforcast->dec_qty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jan_cost')</h5>
                    <span>{{ $salesforcast->jan_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.feb_cost')</h5>
                    <span>{{ $salesforcast->feb_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.mar_cost')</h5>
                    <span>{{ $salesforcast->mar_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.apr_cost')</h5>
                    <span>{{ $salesforcast->apr_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.may_cost')</h5>
                    <span>{{ $salesforcast->may_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jun_cost')</h5>
                    <span>{{ $salesforcast->jun_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.jul_cost')</h5>
                    <span>{{ $salesforcast->jul_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.aug_cost')</h5>
                    <span>{{ $salesforcast->aug_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.sep_cost')</h5>
                    <span>{{ $salesforcast->sep_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.oct_cost')</h5>
                    <span>{{ $salesforcast->oct_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.nov_cost')</h5>
                    <span>{{ $salesforcast->nov_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.salesforcasts.inputs.dec_cost')</h5>
                    <span>{{ $salesforcast->dec_cost ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('salesforcasts.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Salesforcast::class)
                <a
                    href="{{ route('salesforcasts.create') }}"
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
