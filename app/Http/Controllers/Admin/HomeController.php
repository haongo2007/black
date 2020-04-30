<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Analytics;
use Spatie\Analytics\Period;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //fetch the most visited pages for today and the past week
        $data = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
        return view('admin.dashboard.index');
    }
}
