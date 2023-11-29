@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Salesforcast::class)
                <a
                    href="{{ route('salesforcasts.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.salesforcasts.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.product_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.jan_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.feb_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.mar_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.aprile_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.may_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.jun_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.jul_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.aug_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.sep_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.oct_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.nov_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.dec_price')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.jan_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.feb_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.mar_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.apr_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.may_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.jun_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.jul_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.aug_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.sep_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.oct_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.nov_qty')
                            </th>
                            <th class="text-left">
                                @lang('crud.salesforcasts.inputs.dec_qty')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.jan_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.feb_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.mar_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.apr_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.may_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.jun_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.jul_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.aug_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.sep_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.oct_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.nov_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.salesforcasts.inputs.dec_cost')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salesforcasts as $salesforcast)
                        <tr>
                            <td>
                                {{ optional($salesforcast->product)->name ?? '-'
                                }}
                            </td>
                            <td>{{ $salesforcast->jan_price ?? '-' }}</td>
                            <td>{{ $salesforcast->feb_price ?? '-' }}</td>
                            <td>{{ $salesforcast->mar_price ?? '-' }}</td>
                            <td>{{ $salesforcast->aprile_price ?? '-' }}</td>
                            <td>{{ $salesforcast->may_price ?? '-' }}</td>
                            <td>{{ $salesforcast->jun_price ?? '-' }}</td>
                            <td>{{ $salesforcast->jul_price ?? '-' }}</td>
                            <td>{{ $salesforcast->aug_price ?? '-' }}</td>
                            <td>{{ $salesforcast->sep_price ?? '-' }}</td>
                            <td>{{ $salesforcast->oct_price ?? '-' }}</td>
                            <td>{{ $salesforcast->nov_price ?? '-' }}</td>
                            <td>{{ $salesforcast->dec_price ?? '-' }}</td>
                            <td>{{ $salesforcast->jan_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->feb_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->mar_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->apr_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->may_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->jun_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->jul_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->aug_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->sep_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->oct_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->nov_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->dec_qty ?? '-' }}</td>
                            <td>{{ $salesforcast->jan_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->feb_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->mar_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->apr_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->may_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->jun_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->jul_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->aug_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->sep_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->oct_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->nov_cost ?? '-' }}</td>
                            <td>{{ $salesforcast->dec_cost ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $salesforcast)
                                    <a
                                        href="{{ route('salesforcasts.edit', $salesforcast) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $salesforcast)
                                    <a
                                        href="{{ route('salesforcasts.show', $salesforcast) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $salesforcast)
                                    <form
                                        action="{{ route('salesforcasts.destroy', $salesforcast) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="38">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="38">
                                {!! $salesforcasts->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
