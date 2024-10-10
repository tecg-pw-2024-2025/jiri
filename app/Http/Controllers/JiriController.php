<?php

namespace App\Http\Controllers;

use App\Http\Requests\JiriStoreRequest;
use App\Models\Jiri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class JiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pastJiris = Auth::user()?->pastJiris;
        $upcomingJiris = Auth::user()?->upcomingJiris;

        return view('jiris.index', compact('pastJiris', 'upcomingJiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Auth::user()?->contacts()->orderBy('last_name')->get();
        $projects = Auth::user()?->projects()->orderBy('name')->get();
        return view('jiris.create', compact('contacts', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JiriStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $jiri = Auth::user()?->jiris()->create($validated);

        if ($request->has('students')) {
            $jiri->students()->attach($validated['students']);
        }
        if ($request->has('evaluators')) {
            $jiri->evaluators()->attach($validated['evaluators']);
        }
        if ($request->has('projects')) {
            $jiri->projects()->attach($validated['projects']);
        }

        return to_route('jiris.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri)
    {
        $jiri
            ->load([
                'students' => fn($query) => $query->orderBy('last_name'),
                'evaluators' => fn($query) => $query->orderBy('last_name'),
            ])
            ->loadCount('students', 'evaluators', 'contacts');

        return view('jiris.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jiri $jiri)
    {
        return view('jiris.edit', compact('jiri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JiriStoreRequest $request, Jiri $jiri): RedirectResponse
    {
        $jiri->update($request->validated());

        return to_route('jiris.show', $jiri);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jiri $jiri): RedirectResponse
    {
        $jiri->delete();

        return to_route('jiris.index');
    }
}
