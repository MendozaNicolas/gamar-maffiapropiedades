<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Traits\TokkoBroker;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use TokkoBroker;
    
    function index(): View
    {
        $locations = $this->getTokkoPropertiesByLocation()['objects'];

        return view('homepage', compact('locations'));
    }
}
