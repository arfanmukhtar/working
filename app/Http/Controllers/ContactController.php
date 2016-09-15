<?php

namespace App\Http\Controllers;

use App\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->AccessLevel == 1) {
            $contacts = Category::orderBy('id', 'desc')->paginate(25);
        } else {
            $contacts = Category::where('agent_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(25);
        }

        return view('contact/home', ['contacts' => $contacts, 'title' => 'Categories']);
    }
}
