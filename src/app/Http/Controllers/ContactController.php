<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['name','gender','email','tel','address','building', 'category_id', 'detail']);
        return view('confirm',compact('contact'));
    }
    
    public function store(Request $request)
    {
        $contact =
        $request->only(['name', 'gender', 'email', 'tel', 'address', 'building', 'category_id','detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
