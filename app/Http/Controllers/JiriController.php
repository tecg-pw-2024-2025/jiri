<?php

namespace App\Http\Controllers;

use App\Http\Requests\JiriCreateRequest;
use App\Models\Jiri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pastJiris = Jiri::where('starting_at', '<', now())->orderBy('starting_at', 'desc')->get();
        $upcomingJiris = Jiri::where('starting_at', '>=', now())->orderBy('starting_at')->get();

        return view('jiris.index', compact('pastJiris', 'upcomingJiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jiris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JiriCreateRequest $request): RedirectResponse
    {
        $jiri = Jiri::create($request->except('_token'));

        return to_route('jiris.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri)
    {
        return view('jiris.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
