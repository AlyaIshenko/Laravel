<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account/index');
    }
    public function edit()
    {
        return view('account/edit');
    }
    public function delete()
    {
        return view('account/update');
    }
}
