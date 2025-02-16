@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.exhibition.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('exhibition_create')
                    <a class="btn btn-indigo" href="{{ route('admin.exhibitions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.exhibition.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('exhibition.index')

    </div>
</div>
@endsection