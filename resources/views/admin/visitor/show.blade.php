@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.visitor.title_singular') }}:
                    {{ trans('cruds.visitor.fields.id') }}
                    {{ $visitor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.visitor.fields.id') }}
                            </th>
                            <td>
                                {{ $visitor->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.visitor.fields.name') }}
                            </th>
                            <td>
                                {{ $visitor->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.visitor.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $visitor->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $visitor->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.visitor.fields.mobile') }}
                            </th>
                            <td>
                                {{ $visitor->mobile }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.visitor.fields.country') }}
                            </th>
                            <td>
                                @if($visitor->country)
                                    <span class="badge badge-relationship">{{ $visitor->country->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.visitor.fields.exhibition') }}
                            </th>
                            <td>
                                @if($visitor->exhibition)
                                    <span class="badge badge-relationship">{{ $visitor->exhibition->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('visitor_edit')
                    <a href="{{ route('admin.visitors.edit', $visitor) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.visitors.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection