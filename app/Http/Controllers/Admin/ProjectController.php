<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectsRequest $request)
    {
                $data = $request->validated();
                $new_project = new Project();
                $new_project->name = $data['name'];
                $new_project->link = $data['link'];
                $new_project->type_id = $data['type_id'];
                // se l'utente non inserisce uno slug
                if(!empty($data['slug'])){
                    $new_project->slug = Str::of($data['slug'])->slug('-');
                }else{
                    $new_project->slug = Str::of($data['name'])->slug('-');
                }
                $new_project->save(); 
        
                return redirect()->route('admin.projects.show', $new_project)->with('message', 'Post created correctly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.update', compact('project'), compact('types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectsRequest $request, Project $project)
    {
        $data = $request->validated();
        // se l'utente non inserisce uno slug
        if(!empty($data['slug'])){
            $data['slug'] = Str::of($data['slug'])->slug('-');
        }else{
            $data['slug'] = Str::of($data['name'])->slug('-');
        }
        $project->update($data);
        return redirect()->route('admin.projects.show', $data['slug'])->with('message', 'Post edited correctly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Post deleted correctly');
    }
}
