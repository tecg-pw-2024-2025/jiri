<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Auth::user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request): RedirectResponse
    {
        $project = Auth::user()?->projects()
            ->create($request->validated());

        return to_route('projects.show', $project);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectStoreRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        return to_route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return to_route('projects.index');
    }
}
