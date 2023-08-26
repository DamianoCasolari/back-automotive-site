@extends('layouts.app')

@section('content')

    <h1>Hai un nuovo messaggio </h1>

    <div style="background-color: rgb(197, 197, 197); padding:15px;">
        <br>
        <div style="font-size: 20px"> Nome: <span style="font-weight: bold">{{ $lead->name }} </span></div>
        <div style="font-size: 20px"> Email: <span style="font-weight: bold">{{ $lead->email }} </span></div>
        <div style="font-size: 20px"> Numero: <span style="font-weight: bold">{{ $lead->phone_number }} </span></div>
        <div style="font-size: 20px">Message: </div>
        {{ $lead->message }}
        <br>
    </div>
@endsection