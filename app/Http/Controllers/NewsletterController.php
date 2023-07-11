<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function newsletterPost(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:newsletters|max:255'
        ],
        [
            'email.required' => 'Email is required',
            'email.unique' => 'This email has already subscribed to our newsletter'
            
        ]);

        $newsletter = new Newsletter;
        $newsletter->email = $request->input('email');
        $newsletter->ip_address = $request->ip();

        $newsletter->save();

        if($newsletter->id)
        {
            $request->session()->flash('success', 'Thank you for subscribing to our newsletter.');
        } else {
            $request->session()->flash('error', 'Oups! Something went wrong! Try again');
        }

        return back();
    }
}
