@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.linkCategory.title_singular') }}:
                    {{ trans('cruds.linkCategory.fields.id') }}
                    {{ $linkCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.linkCategory.fields.id') }}
                            </th>
                            <td>
                                {{ $linkCategory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.linkCategory.fields.name') }}
                            </th>
                            <td>
                                {{ $linkCategory->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.linkCategory.fields.image') }}
                            </th>
                            <td>
                                @foreach($linkCategory->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('link_category_edit')
                    <a href="{{ route('admin.link-categories.edit', $linkCategory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.link-categories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection