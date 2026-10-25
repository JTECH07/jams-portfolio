<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        if ($request->filled('website')) {
            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Je vous répondrai rapidement !');
        }

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
            'subject' => $validated['subject'] ?? null,
            'collab_items' => $validated['collab_item'] ?? [],
            'message' => $validated['message'],
        ]);

        // Send email (currently logged to storage/logs/laravel.log based on .env)
        Mail::to(config('mail.contact_address'))->queue(new ContactMessage($contact));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Je vous répondrai rapidement !');
    }

    public function index()
    {
        $contacts = Contact::latest()->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }
}
