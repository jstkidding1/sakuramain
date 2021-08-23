<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json(Contact::all(), 200);
    }

    public function store(Request $request)
    {
        $contact = Contact::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'address' => $request->address,
            'contact_num' => $request->contact_num,
            'message' => $request->message,
            'image' => $request->image
        ]);

        return response()->json([
            'status' => (bool) $contact,
            'data' => $contact,
            'message' => $contact ? 'Contact Created' : 'Error Creating Contact'
        ]);
    }

    public function uploadFile(Request $request)
    {
        if($request->hasFile('image')){
            $name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $name);
        }
        return response()->json(asset("images/$name"),201);
    }

    public function show(Contact $contact)
    {
        return response()->json($contact, 200);
    }

    public function update(Request $request, Contact $contact)
    {
        $status = $contact->update([
            $request->only(['address', 'image'])
        ]);

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Contact Update' : 'Error Updating Contact'
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
