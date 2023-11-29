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
                @can('create', App\Models\Businessinfo::class)
                <a
                    href="{{ route('businessinfos.create') }}"
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
                    @lang('crud.businessinfos.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.business_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.audience_need')
                            </th>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.business_model')
                            </th>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.target_market')
                            </th>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.competition_ad')
                            </th>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.management_team')
                            </th>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.loan_amount')
                            </th>
                            <th class="text-left">
                                @lang('crud.businessinfos.inputs.loan_reason')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($businessinfos as $businessinfo)
                        <tr>
                            <td>{{ $businessinfo->business_name ?? '-' }}</td>
                            <td>
                                {{ optional($businessinfo->user)->name ?? '-' }}
                            </td>
                            <td>{{ $businessinfo->audience_need ?? '-' }}</td>
                            <td>{{ $businessinfo->business_model ?? '-' }}</td>
                            <td>{{ $businessinfo->target_market ?? '-' }}</td>
                            <td>{{ $businessinfo->competition_ad ?? '-' }}</td>
                            <td>{{ $businessinfo->management_team ?? '-' }}</td>
                            <td>{{ $businessinfo->loan_amount ?? '-' }}</td>
                            <td>{{ $businessinfo->loan_reason ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $businessinfo)
                                    <a
                                        href="{{ route('businessinfos.edit', $businessinfo) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $businessinfo)
                                    <a
                                        href="{{ route('businessinfos.show', $businessinfo) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $businessinfo)
                                    <form
                                        action="{{ route('businessinfos.destroy', $businessinfo) }}"
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
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">
                                {!! $businessinfos->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
