<?php

namespace App\Http\Controllers;

use App\Concerns\HasImageVariants;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    use HasImageVariants;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Auth::user()->contacts;

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')?->store('contacts/'.$request->user()->id.'/original');
            $this->makeImageVariants(requestImage: $request->file('photo'), originalPath: $validated['photo']);
        }

        $contact = Auth::user()?->contacts()
            ->create($validated);

        return to_route('contacts.show', $contact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUpdateRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->validated());

        return to_route('contacts.show', $contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return to_route('contacts.index');
    }
}
