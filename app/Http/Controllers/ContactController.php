<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'proposal' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'collab_item' => 'nullable|array',
            'message' => 'required|string',
        ]);

        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'proposal' => $validated['proposal'],
            'subject' => $validated['subject'],
            'collab_items' => $validated['collab_item'] ?? [],
            'message' => $validated['message'],
        ]);

        // Send email (currently logged to storage/logs/laravel.log based on .env)
        Mail::to('alayejoseph1@gmail.com')->send(new \App\Mail\ContactMessage($contact));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Je vous répondrai rapidement !');
    }

    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }
}
