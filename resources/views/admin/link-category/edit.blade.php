@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.linkCategory.title_singular') }}:
                    {{ trans('cruds.linkCategory.fields.id') }}
                    {{ $linkCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('link-category.edit', [$linkCategory])
        </div>
    </div>
</div>
@endsection