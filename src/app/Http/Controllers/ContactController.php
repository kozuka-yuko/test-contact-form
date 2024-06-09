<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['name','gender','email','tel','address','building','detail']);
        return view('confirm',compact('contact'));
    }
    public function store(ContactRequest $request)
    {
        $contact =
        $request->only(['name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function admin(Request $request)
    {
        $contact = Contact::Paginate(7);
        return view('admin',compact('contact'));
    }
}
