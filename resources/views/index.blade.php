@extends('layouts.base')

@section('title')
    {{ config('app.name') }}
@endsection

@section('styles')
    {{-- <style></style> --}}
@endsection

@section('h3')
    {{ config('app.name') }}
@endsection

@section('content')
<div class="card m-5">
    <div class="card-header">
        <div class="card-title text-center">
            <h3>{{ config('app.name') }}</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="card-text text-center row">
            <a href="{{route('a')}}">A</a>
            <a href="{{route('s')}}">S</a>
            <a href="{{route('c')}}">C</a>
        </div>
        <hr>
        <div class="card-text text-center col">
            @role('admin')
            <a href="{{route('a')}}">A</a>
            @endrole
            
            @role('seller')
            <a href="{{route('s')}}">S</a>
            @endrole

            @role('client')
            <a href="{{route('c')}}">C</a>
            @endrole
        </div>
    </div>
    <div class="card-footer">
        <div class="card-text text-center">
            {{ config('app.name') }}
        </div>
    </div>
</div>


@endsection

@section('content')
    {{-- <script></script> --}}
@endsection
