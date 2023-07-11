<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactFormController extends Controller
{
    public function postContactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255',
            'institution' => 'nullable',
            'role' => 'required',
            'message' => 'required|min:9|max:1999'
        ]);

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->institution = $request->input('institution');
        $contact->role = $request->input('role');
        $contact->message = $request->input('message');

        $contact->save();

        if($contact->id)
        {
            $request->session()->flash('success', 'Thank you for Contacting Quizzy. We shall respond to your message as soon as possible');
        } else {
            $request->session()->flash('error', 'Oups! Something went wrong! Try again');
        }

        return back();
    }
}
