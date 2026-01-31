<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['success' => true]);
    }
}
