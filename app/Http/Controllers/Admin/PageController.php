<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        /*'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '7',
            'client_secret' => '68eoIrY6PaV0ip0JOWOR6w9Udx3xskRFaVNZgxdU',
            'redirect_uri' => 'http://localhost/auth/callback',
            'code' => 'def502007ba7231ce6462fe0cd12cc6ec0fda2bd0c8ac9493da12071ce2281fa13f671faf6b1f66cebb55cc1cc6d357a1aa726aa45c6e6a67deb000464db989a35d2c2852154ba780c915e9d3cfe6401580c7ed8c40b52e0a437ac08e6f36a54f9b34f1cce5c1372f37a97d6db613c8c98f38db33dd76fe4c095ebb0891b382eca6eaf06bae182ccd84c4ed0596091bc29130a0dd7cc10fb34d3efcb3b407193cd772d2faea4dfaaa240630f8d3e854a986e984fc93674e040f5a1901c5d8d6af67cedbac5d233a4a50ec4f863413bd0fd50f7a194a7cbababce25df8e228cc91851c656d42e0a38b6f1c832c826d155c9ec7a2d245c49a7206bd35c4d60e967be311958dca011c1684caf2054885105561d3fcbf46fb328362b6d2ec99e3b7a92eca334b3418df481f21bde0df6b1b1c12426a710440402f2565f286a67557a2f75f6345a89df59cc0def5c27285ee8a029cf72f7ece236fe650c2e26b242',
        ],*/
        return view('admin.pages.icons');
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('admin.pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('admin.pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('admin.pages.notifications');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('admin.pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('admin.pages.upgrade');
    }
}
