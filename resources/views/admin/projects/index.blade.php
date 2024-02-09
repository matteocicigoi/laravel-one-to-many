@extends('layouts.admin')

@section('content')
    <a class="btn btn-outline-success mt-3" href="{{ !isset($type) ? route('admin.projects.create') : route('admin.types.create') }}" role="button">Add {{ !isset($type) ? 'Project' : 'Type'}}</a>
    <div class="mt-5">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="w-50">Name</th>
                    @if(!isset($type))<th scope="col">Type</th>@endif
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        @if(!isset($type))<td>{{ isset($project->type) ? $project->type->name : '' }}</td>@endif
                        <td>
                            <a href="{{ !isset($type) ? route('admin.projects.show', $project) : route('admin.types.show', $project) }}" role="button"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ !isset($type) ? route('admin.projects.edit', $project) : route('admin.types.edit', $project) }}" role="button"
                                class="btn btn-outline-success btn-sm"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ !isset($type) ? route('admin.projects.destroy', $project) : route('admin.types.destroy', $project) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" role="button" class="btn btn-outline-danger btn-sm"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
