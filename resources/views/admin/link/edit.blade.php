@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.link.title_singular') }}:
                    {{ trans('cruds.link.fields.id') }}
                    {{ $link->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('link.edit', [$link])
        </div>
    </div>
</div>
@endsection