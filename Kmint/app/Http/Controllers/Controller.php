<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB; //Pour inclure la database

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // Function to get data from database
    function getData()
	{
		$data['data']  = DB::table('petition')->limit(10)->get();

		if(count($data) > 0)
		{
			return view('home', $data);
		}
		else
		{
			return view('home');
		}
	}
}
