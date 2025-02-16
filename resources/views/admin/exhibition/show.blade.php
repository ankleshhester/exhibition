@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.exhibition.title_singular') }}:
                    {{ trans('cruds.exhibition.fields.id') }}
                    {{ $exhibition->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.exhibition.fields.id') }}
                            </th>
                            <td>
                                {{ $exhibition->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.exhibition.fields.name') }}
                            </th>
                            <td>
                                {{ $exhibition->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.exhibition.fields.description') }}
                            </th>
                            <td>
                                {{ $exhibition->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.exhibition.fields.active') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $exhibition->active ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('exhibition_edit')
                    <a href="{{ route('admin.exhibitions.edit', $exhibition) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.exhibitions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection