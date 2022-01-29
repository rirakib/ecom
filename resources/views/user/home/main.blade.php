@extends('user.master')
@section('title','Home')
@section('user_content')

    @include('user.component.banner')
    @include('user.home.latest')
    @include('user.home.features')
    @include('user.home.calltoaction')


@endsection