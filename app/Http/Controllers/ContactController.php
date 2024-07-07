<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $data['tittle'] = 'Contact';
        return view('front.contact', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        $save_data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        $save_contact = Contact::create($save_data);

        return redirect()->route('contact')->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }

    public function show(){

        $data['data_contact'] = Contact::all();

        $data['tittle'] = 'Pesan dan Saran';
        return view('admin.contact.contact-index', $data);
    }

    public function detail($id){

        $data['data_contact'] = Contact::where('id',$id)->first();

        // dd($data['data_contact'] = Contact::where('id',$id)->first());

        $data['tittle'] = 'Pesan dan Saran';
        return view('admin.contact.contact-detail', $data);
    }
}
