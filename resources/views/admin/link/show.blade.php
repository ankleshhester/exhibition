@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.link.title_singular') }}:
                    {{ trans('cruds.link.fields.id') }}
                    {{ $link->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.link.fields.id') }}
                            </th>
                            <td>
                                {{ $link->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.link.fields.name') }}
                            </th>
                            <td>
                                {{ $link->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.link.fields.url') }}
                            </th>
                            <td>
                                {{ $link->url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.link.fields.file') }}
                            </th>
                            <td>
                                @foreach($link->file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.link.fields.link_category') }}
                            </th>
                            <td>
                                @if($link->linkCategory)
                                    <span class="badge badge-relationship">{{ $link->linkCategory->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('link_edit')
                    <a href="{{ route('admin.links.edit', $link) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.links.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection