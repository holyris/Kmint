<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB; //Pour inclure la database

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $petition_par_page = 5;

    // Function to get data from database
    public function getData(\Request $request)
	{
		$data = DB::table('petition')->orderBy('date', 'desc')->paginate($this->petition_par_page);

		if(count($data) > 0)
		{
			return view('home')->with(compact('data'));
		}
		else
		{
			return view('home');
		}
	}

	public static function getParticularData(\Request $request)
	{
		$validator = \Validator::make(request()->all(), [
            'requestedData' => 'required|string|min:1|max:750'
        ]);

        if ($validator->fails()) {  //if the validation fails return with the errors

            return view('welcome');
		}else{
			
			//dd(request()->input());
			$requestedData = request()->input("requestedData");
			$data['data']  = DB::table('petition')->where('titre', 'like', '%' . $requestedData . '%')
												  ->orWhere('description', 'like', '%' . $requestedData . '%')
												  ->paginate(5);

			//dd($data);
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
}
