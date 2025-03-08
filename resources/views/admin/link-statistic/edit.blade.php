@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.linkStatistic.title_singular') }}:
                    {{ trans('cruds.linkStatistic.fields.id') }}
                    {{ $linkStatistic->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('link-statistic.edit', [$linkStatistic])
        </div>
    </div>
</div>
@endsection