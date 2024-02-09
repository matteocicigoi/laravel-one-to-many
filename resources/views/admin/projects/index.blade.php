@extends('layouts.admin')

@section('content')
    <a class="btn btn-outline-success mt-3" href="{{ route('admin.projects.create') }}" role="button">Add Project</a>
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
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ isset($project->type) ? $project->type->title : '' }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" role="button"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project) }}" role="button"
                                class="btn btn-outline-success btn-sm"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
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
