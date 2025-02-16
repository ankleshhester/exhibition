@extends('visitor.dashboard')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h3 class="">
                    Thank you {{ $visitor_name }}, for visiting us at VIV Asia, 2025
                </h3>
            </div>
        </div>
        @livewire('link.index')

    </div>
</div>


@endsection
