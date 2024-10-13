<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Laravel\Facades\Image;


class ContactController extends Controller
{
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

        if($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')?->store('contacts/'.$request->user()->id.'/originals');
            $sizes = Config::get('photos.sizes');
            foreach ($sizes as $name => $size) {
                if(!is_int($size)) {
                    continue;
                }
                $i = Image::read($request->file('photo'));
                $i->cover($size, $size);
                $i->save(
                    storage_path('app/public/contacts/'.$request->user()->id.'/'.pathinfo(
                            $validated['photo'],
                            PATHINFO_FILENAME
                        ).'_'.$name.'.'.pathinfo(
                            $validated['photo'],
                            PATHINFO_EXTENSION
                        ))
                );
            }
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
