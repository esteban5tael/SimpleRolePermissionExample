<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class _SiteController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function a()
    {
        return 'Admin Role';
    }

    public function s()
    {
        return 'Seller Role';
    }
    public function c()
    {
        return 'Client Role';
    }
}
