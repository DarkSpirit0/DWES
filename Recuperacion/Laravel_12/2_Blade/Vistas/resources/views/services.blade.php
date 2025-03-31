@extends('layouts.landing')
@section('title','Contact')
@section('content')
<h1>Services</h1>
<div>
    @component('_components.card')
        @slot('title','Service 1') 
        @slot('content','This is the content of the service 1')
    @endcomponent
    @component('_components.card')
        @slot('title','Service 2') 
        @slot('content','This is the content of the service 2')
    @endcomponent
    @component('_components.card')
        @slot('title','Service 3') 
        @slot('content','This is the content of the service 3')
    @endcomponent
@endsection