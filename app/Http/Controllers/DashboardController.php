<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $contacts = Contact::where('created_by_user_id', auth()->id())
            ->latest()
            ->get();

        return view('dashboard', compact('contacts'));
    }
}
