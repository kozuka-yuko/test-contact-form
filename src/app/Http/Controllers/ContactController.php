<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $request->only(['name','gender','email','tel','address','building','contact-type','contact']);
        return view('confirm',compact('contact'));
    }
    public function store(Request $request)
    {
        $contact =
        $request->only(['name', 'gender', 'email', 'tel', 'address', 'building', 'contact-type', 'contact']);
    }
}
