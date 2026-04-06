@extends('layouts.app')

@section('content')
    @include('dashboard.partials.header')
    @include('dashboard.partials.summary-cards')
    @include('dashboard.partials.charts')
    @include('dashboard.partials.active-trades')
@endsection