@extends('layouts.create_update')
@section('title')
    @if (!isset($type))
        Add Project
    @else
        Add Type
    @endif
@endsection
@section('route')
    @if (!isset($type))
        {{ route('admin.projects.store') }}
    @else
        {{ route('admin.types.store') }}
    @endif
@endsection
