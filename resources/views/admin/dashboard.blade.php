@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column vh_100_without_header">
    <h2 class="fs-2 text-secondary py-4 ">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col ">
            <div class="border border-0 text_cloudy fw-bold">
                <div class="card-header fs-4">Bentornato {{ Auth::user()->name }}</div>

                
            </div>
        </div>
    </div>
</div>
@endsection
