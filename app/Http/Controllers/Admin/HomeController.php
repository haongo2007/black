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
        /*$query = http_build_query([
            'client_id' => 7,
            'redirect_uri' => 'http://localhost/auth/callback',
            'response_type' => 'code',
            'scope' => '',
        ]);
        return redirect()->route('passport.authorizations.authorize',$query);*/

        //fetch the most visited pages for today and the past week
        
        $analyticsDataWeek = Analytics::performQuery(
            Period::days(7),
            'ga:visitors',
            [
                'metrics' => 'ga:visitors, ga:pageviews',
                'dimensions' => 'ga:dayOfWeekName'
            ]
        );
        $weeks['week'] = array();
        $weeks['visitors'] = array();
        $weeks['pageviews'] = array();
        foreach ($analyticsDataWeek->rows as $key => $value) {
            array_push($weeks['week'], $value[0]);
            array_push($weeks['visitors'], $value[1]);
            array_push($weeks['pageviews'], $value[2]);
        }
        $weeks = json_encode($weeks);

        //fetch the most visited pages for today and the past month
        
        $analyticsDataMonth = Analytics::performQuery(
            Period::Months(1),
            'ga:visitors',
            [
                'metrics' => 'ga:visitors, ga:pageviews',
                'dimensions' => 'ga:week'
            ]
        );
        $months['month'] = array();
        $months['visitors'] = array();
        $months['pageviews'] = array();
        foreach ($analyticsDataMonth->rows as $key => $value) {
            array_push($months['month'], $value[0]);
            array_push($months['visitors'], $value[1]);
            array_push($months['pageviews'], $value[2]);
        }
        $months = json_encode($months);
        //fetch the most visited pages for today and the past year
        
        $analyticsDataYear = Analytics::performQuery(
            Period::years(1),
            'ga:visitors',
            [
                'metrics' => 'ga:visitors, ga:pageviews',
                'dimensions' => 'ga:month'
            ]
        );
        $years['year'] = array();
        $years['visitors'] = array();
        $years['pageviews'] = array();
        foreach ($analyticsDataYear->rows as $key => $value) {
            array_push($years['year'], $value[0]);
            array_push($years['visitors'], $value[1]);
            array_push($years['pageviews'], $value[2]);
        }
        $years = json_encode($years);

        $country['is'] = array();
        $country['visitors'] = array();
        $analyticsDataCountry = Analytics::performQuery(
            Period::years(1),
            'ga:visitors',
            [
                'metrics' => 'ga:visitors',
                'dimensions' => 'ga:countryIsoCode'
            ]
        );
        foreach ($analyticsDataCountry->rows as $key => $value) {
            array_push($country['is'], $value[0]);
            array_push($country['visitors'], $value[1]);
        }
        $country = json_encode($country);
        return view('admin.dashboard.index',compact('weeks','months','years','country'));
    }
}
