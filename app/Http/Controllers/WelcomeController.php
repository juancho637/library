<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Service;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        $services = Service::all();

        return view('welcome', compact('comments', 'services'));
    }
}
