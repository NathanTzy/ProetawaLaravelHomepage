<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Role;
use App\Models\Shop;
use App\Models\Testimony;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $shops = Shop::all();
        $testimonies = Testimony::latest()->take(6)->get();
        $certificate = Certificate::latest()->take(6)->get();
        $role = Role::all();

        return view('welcome', compact('contacts', 'shops', 'testimonies','certificate', 'role'));
    }
}
