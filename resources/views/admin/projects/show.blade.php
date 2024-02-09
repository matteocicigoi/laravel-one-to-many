@extends('layouts.admin')

@section('content')
    <div class="mt-5">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <ul>
            <li>Nome: {{ $project->name }}</li>
            <li>Slug: {{ $project->slug }}</li>
        </ul>
    </div>
@endsection
