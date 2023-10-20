<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::with('user')->get();
        // dd($messages[0]->user->phone);
        return view('Admin.message', compact('messages'));
    }

    public function users()
    {
            $users = User::withCount('orders')->withSum('orders','total')->get();
            return view('Admin.users', compact('users'));
    }

}
