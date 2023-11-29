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
                @can('create', App\Models\Cashlow::class)
                <a
                    href="{{ route('cashlows.create') }}"
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
                <h4 class="card-title">@lang('crud.cashlows.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.directin_one')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.directin_two')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.directin_three')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.directin_four')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.indirectin_one')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.indirectin_two')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.indirectin_three')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.indirectin_four')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.wages_one')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.wages_two')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.wages_three')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.wages_four')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.capitalcost_one')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.capitalcost_two')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.capitalcost_three')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.capitalcost_four')
                            </th>
                            <th class="text-left">
                                @lang('crud.cashlows.inputs.businessinfo_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cashlows as $cashlow)
                        <tr>
                            <td>{{ $cashlow->directin_one ?? '-' }}</td>
                            <td>{{ $cashlow->directin_two ?? '-' }}</td>
                            <td>{{ $cashlow->directin_three ?? '-' }}</td>
                            <td>{{ $cashlow->directin_four ?? '-' }}</td>
                            <td>{{ $cashlow->indirectin_one ?? '-' }}</td>
                            <td>{{ $cashlow->indirectin_two ?? '-' }}</td>
                            <td>{{ $cashlow->indirectin_three ?? '-' }}</td>
                            <td>{{ $cashlow->indirectin_four ?? '-' }}</td>
                            <td>{{ $cashlow->wages_one ?? '-' }}</td>
                            <td>{{ $cashlow->wages_two ?? '-' }}</td>
                            <td>{{ $cashlow->wages_three ?? '-' }}</td>
                            <td>{{ $cashlow->wages_four ?? '-' }}</td>
                            <td>{{ $cashlow->capitalcost_one ?? '-' }}</td>
                            <td>{{ $cashlow->capitalcost_two ?? '-' }}</td>
                            <td>{{ $cashlow->capitalcost_three ?? '-' }}</td>
                            <td>{{ $cashlow->capitalcost_four ?? '-' }}</td>
                            <td>
                                {{
                                optional($cashlow->businessinfo)->business_name
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $cashlow)
                                    <a
                                        href="{{ route('cashlows.edit', $cashlow) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $cashlow)
                                    <a
                                        href="{{ route('cashlows.show', $cashlow) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $cashlow)
                                    <form
                                        action="{{ route('cashlows.destroy', $cashlow) }}"
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
                            <td colspan="18">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="18">{!! $cashlows->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
