@extends('layouts.app')
@section('content')

<div class="container position-relative">
<div class="arrow_container position-absolute">
    <img src="{{ asset('img/right-drawn-arrow.png') }}" alt="hand drawn arrow">
</div>
</div>

<div class="jumbotron p-5 vh_100_without_header bg_pitch d-flex justify-content-center align-items-center">
    
        
        <div class="container py-5 ">
            <div class="logo_laravel text-center mb-5">
                <h1 class="text-danger">Logo</h1>
            </div>
            <div class="display-6 text-center text_cloudy">
            Accedi all'<strong class="fw-bold">area amministrativa</strong>  tramite login oppure registrati nel caso non sia già registrato
        </div>
    </div>
    
</div>
@endsection