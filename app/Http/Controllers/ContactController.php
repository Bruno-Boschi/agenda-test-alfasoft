<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show(?Contact $contact = null)
    {
        return view('contact.create-edit', [
            'contact' => $contact,
        ]);
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:9',
        ]);

        $contact->update($data);

        return redirect()->route('dashboard')->with('success', 'Contact updated successfully.');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:9',
        ]);

        $data['created_by_user_id'] = $request->user()->id;

        Contact::create($data);

        return redirect()->route('dashboard')->with('success', 'Contact created successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['success' => true]);
    }
}
