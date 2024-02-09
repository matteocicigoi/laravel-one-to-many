@extends('layouts.create_update')
@section('title')
Update Project
@endsection
@section('route')
    {{ route('admin.projects.update', $project) }}
@endsection
@section('method')
@method('PUT')
@endsection
