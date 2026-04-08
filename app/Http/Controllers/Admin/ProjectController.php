<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use function PHPUnit\Framework\returnArgument;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //prendo i tipi
        $types = Type::all();
        //prendo le tecnologie
        $technologies = Technology::all();
        return view("projects.create", compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();
        $newProject->name = $data["name"];
        $newProject->type_id = $data["type_id"];
        $newProject->client = $data["client"];
        $newProject->start_date = $data["start_date"];
        $newProject->end_date = $data["end_date"];
        $newProject->summary = $data["summary"];

        $newProject->save();

        if ($request->has("technologies")) {
            $newProject->technologies()->attach($data['technologies']);
        }



        return redirect()->route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //prendo i tipi
        $types = Type::all();
        //prendo le tecnologie
        $technologies = Technology::all();
        return view("projects.edit", compact("project", "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->name = $data["name"];
        $project->type_id = $data["type_id"];
        $project->client = $data["client"];
        $project->start_date = $data["start_date"];
        $project->end_date = $data["end_date"];
        $project->summary = $data["summary"];

        $project->update();


        if ($request->has("technologies")) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }


        return redirect()->route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //elimina tutti i record nella tabella pivot che hanno quel id 
        $project->technologies()->detach();

        $project->delete();

        return redirect()->route("projects.index");
    }
}
