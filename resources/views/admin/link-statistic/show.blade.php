@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.linkStatistic.title_singular') }}:
                    {{ trans('cruds.linkStatistic.fields.id') }}
                    {{ $linkStatistic->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.linkStatistic.fields.id') }}
                            </th>
                            <td>
                                {{ $linkStatistic->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.linkStatistic.fields.link') }}
                            </th>
                            <td>
                                @if($linkStatistic->link)
                                    <span class="badge badge-relationship">{{ $linkStatistic->link->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.linkStatistic.fields.ip_address') }}
                            </th>
                            <td>
                                {{ $linkStatistic->ip_address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.linkStatistic.fields.visitor') }}
                            </th>
                            <td>
                                @if($linkStatistic->visitor)
                                    <span class="badge badge-relationship">{{ $linkStatistic->visitor->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.linkStatistic.fields.action') }}
                            </th>
                            <td>
                                {{ $linkStatistic->action }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('link_statistic_edit')
                    <a href="{{ route('admin.link-statistics.edit', $linkStatistic) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.link-statistics.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection