<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:30|unique:projects",
            "description" => "max:300"
        ], [
            "title.required" => "Il titolo è necessario per aggiungere un nuovo progetto!",
            "title.max" => "La lunghezza massima della titolo è di 30 caratteri!",
            "title.unique" => "Il titolo è già utilizzato cambia titolo!",
            "description.max" => "La lunghezza massima della descrizione è di 300 caratteri!"
        ]);
        $data = $request->all();
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
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            "title" => "required|max:30|unique:projects",
            "description" => "max:300"
        ], [
            "title.required" => "Il titolo è necessario per aggiungere un nuovo progetto!",
            "title.max" => "La lunghezza massima della titolo è di 30 caratteri!",
            "title.unique" => "Il titolo è già utilizzato cambia titolo!",
            "description.max" => "La lunghezza massima della descrizione è di 300 caratteri!"
        ]);
        $project = Project::where("slug", $slug)->first();
        
        $data = $request->all();
        
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