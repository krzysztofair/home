<?php

namespace App\Http\Controllers;

use App\Repositories\SensorsRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index(SensorsRepository $sensors)
    {
        return view('pages.home')
            ->with('sensors', $sensors->all());
    }
}
