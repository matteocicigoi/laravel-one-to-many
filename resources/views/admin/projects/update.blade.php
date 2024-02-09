@extends('layouts.create_update')
@section('title')
    @if (!isset($type))
        Update Project
    @else
        Update Type
    @endif
@endsection
@section('route')
    @if (!isset($type))
        {{ route('admin.projects.update', $project) }}
    @else
        {{ route('admin.types.update', $project) }}
    @endif
@endsection
@section('method')
    @method('PUT')
@endsection
