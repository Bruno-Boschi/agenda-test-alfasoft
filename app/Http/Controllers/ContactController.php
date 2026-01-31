<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function destroy(Contact $contact)
    {

        // abort_if($contact->created_by_user_id !== auth()->id(), 403);

        $contact->delete();
        return response()->json(['success' => true]);
    }
}
