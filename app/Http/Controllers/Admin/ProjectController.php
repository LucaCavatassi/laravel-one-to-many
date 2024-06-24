<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index" , compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view("admin.projects.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->slug = Str::slug($newProject->title);
        // dd($newProject);

        $newProject->save();

        return redirect()->route("admin.projects.index")->with("messageUpload", "Il progetto ". $newProject->title . " è stato aggiunto con successo!");;   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where("slug", $slug)->first();
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $project = Project::where("slug", $slug)->first();
        $types = Type::all();
        return view("admin.projects.edit", compact("project", "types"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project = Project::where("slug", $project->slug)->first();
        
        $data = $request->validated();
        
        $project->slug = Str::slug($request->title);
        $project->update($data);
        // dd($project);
        
        // dd($project);
        return redirect()->route("admin.projects.index")->with("messageEdit", "Il progetto ". $project->title . " è stato aggiornato con successo!");;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        
        return redirect()->route("admin.projects.index")->with("messageDelete", "Il progetto ". $project->title . " è stato eliminato con successo!");
    }

    public function editselector (){
        $projects = Project::all();

        return view("admin.projects.editselector", compact("projects"));
    }
}