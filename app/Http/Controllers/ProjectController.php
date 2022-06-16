<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('categories', 'images')->get();
        return view('backend.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.project.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        DB::transaction(function () use ($request) {
            $project = Project::create($request->safe()->except(['category_id', 'gallery']));
            $project->categories()->attach($request->category_id);

            if ($request->hasFile('gallery')) {
                foreach ($request->gallery as $image) {
                    $image = $image->store('project');
                    $project->image()->create([
                        'imageFile' => $image
                    ]);
                }
            }
        });
        toastr()->success('Project Created Successfully!');
        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if (request()->ajax()) {
            return json_encode($project->load('image'));
        }
        return redirect(route('projects.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $project->load('images');
        return view('backend.project.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        DB::transaction(function () use ($request, $project) {
            $project->update($request->safe()->except(['category_id', 'gallery']));
            $project->categories()->sync($request->category_id);

            if ($request->hasFile('gallery')) {
                foreach ($request->gallery as $image) {
                    $image = $image->store('project');
                    $project->image()->create([
                        'imageFile' => $image
                    ]);
                }
            }
        });
        toastr()->success('Project Updated Successfully!');
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
