<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct() {
        $this->middleware('check-roles:member');
    }

    public function index() {
		return view('member');
    }
}
