<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('component')
    <users-index v-state="{{$state}}"></users-index>
@endsection