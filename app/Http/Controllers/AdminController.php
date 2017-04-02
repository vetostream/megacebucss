<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\CheckAdmin;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware(CheckAdmin::class);
	}

    public function index()
    {
    	return view('admin.index');
    }
}
