<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::when(request('search'), function($query) {
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'contact' => $contact
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => (bool) $contact,
            'data' => $contact,
            'message' => $contact ? 'Contact Created' : 'Error Creating Contact'
        ]);
    }

    public function show(Contact $contact)
    {
        return response()->json($contact, 200);
    }

    public function update(Request $request, Contact $contact)
    {
        $status = $contact->update(
            $request->only([
                'status',
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Contact Updated' : 'Error Updating Contact'
        ]);
    }

    public function destroy(Contact $contact)
    {
        $status = $contact->delete();

        return response()->json([
            'status' => (bool) $status,
            'message' => $status ? 'Contact Deleted' : 'Error Deleting Contact'
        ]);
    }
}
