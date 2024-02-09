@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center m-5">@yield('title')</h1>
        @if ($errors->any())
            <div class="alert  alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="@yield('route')" method="POST">
            @csrf
            @yield('method')
            <div class="row g-3 w-50 m-auto">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="@if (isset($project)) {{ old('name', $project->name) }}@else{{ old('name') }} @endif"
                        required>
                </div>
                <div class="col-12">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug"
                        value="@if (isset($project)) {{ old('slug', $project->slug) }}@else{{ old('slug') }} @endif">
                </div>
                <div class="col-12">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control" id="link" name="link"
                        value="@if (isset($project)) {{ old('link', $project->link) }}@else{{ old('link') }} @endif">
                </div>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option>Open this select menu</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if(old('type_id') == $type->id || (isset($project) && $project->type_id == $type->id)) selected @endif>{{ $type->title }}</option>
                    @endforeach
                  </select>

                <button type="submit" class="btn btn-primary mt-4 col-12 py-3 text-uppercase">Submit</button>
            </div>
        </form>
    </div>
@endsection
