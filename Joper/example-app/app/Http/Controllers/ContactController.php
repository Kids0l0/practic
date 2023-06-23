<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ContactController extends Controller
{
    protected $table = "posts";
    public function index(){
        return view('contacts');
    }
}
