<?php

namespace App\Http\Controllers\SistemTrialKids;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SistemTrialController extends Controller
{
    public function index () {
        return view('admin.build.pages.dataTrials');
    }
}
