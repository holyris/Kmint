<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use DB; //Pour inclure la database

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $petition_par_page = 5;

    // Function to get data from database
    public function getPetition()
    {
		$politique = "null";
		$animaux = "null";
		$nature = "null";
		$social = "null";
		$justice = "null";
		$sante = "null";
		$droits_homme = "null";
		$espace_euro = "null";
		$enfants = "null";
		$arts = "null";
		$medias = "null";
		$sports = "null";
		$autres = "null";
        if(\Auth::check()){
            if( !DB::table('abonnement_petition')->where('id', '=',  \Auth::user()->id) ->exists() ){
                $data = DB::table('petition')->orderBy('date', 'desc')->paginate($this->petition_par_page);

                if(count($data) > 0)
                {
                    return view('home')->with(compact('data'));
                }
                else
                {
                    return view('home');
                }
            } else {
                $abo = DB::table('abonnement_petition')->where('id', '=',  \Auth::user()->id)->get();
				
				foreach ($abo as $val){
					if ($val->politique == 1){
						$politique = "politique";
					}
					if ($val->animaux == 1){
						$animaux = "animaux";
					}
					if ($val->nature == 1){
						$nature = "nature";
					}
					if ($val->social == 1){
						$social = "social";
					}
					if ($val->justice == 1){
						$justice = "justice";
					}
					if ($val->sante == 1){
						$sante = "sante";
					}
					if ($val->droits_homme == 1){
						$droits_homme = "droits_homme";
					}
					if ($val->espace_euro == 1){
						$espace_euro = "espace_euro";
					}
					if ($val->enfants == 1){
						$enfants = "enfants";
					}
					if ($val->arts == 1){
						$arts = "arts";
					}
					if ($val->medias == 1){
						$medias = "medias";
					}
					if ($val->sports == 1){
						$sports = "sports";
					}
					if ($val->autres == 1){
						$autres = "autres";
					}
				}
				
				$data = DB::table('petition')->where('categorie', '=', $politique)
											 ->orWhere('categorie', '=', $animaux)
											 ->orWhere('categorie', '=', $nature)
											 ->orWhere('categorie', '=', $social)
											 ->orWhere('categorie', '=', $justice)
											 ->orWhere('categorie', '=', $sante)
											 ->orWhere('categorie', '=', $droits_homme)
											 ->orWhere('categorie', '=', $espace_euro)
											 ->orWhere('categorie', '=', $enfants)
											 ->orWhere('categorie', '=', $arts)
											 ->orWhere('categorie', '=', $medias)
											 ->orWhere('categorie', '=', $sports)
											 ->orWhere('categorie', '=', $autres)
											 ->paginate(5);

                if(count($data) > 0)
                {
                    return view('home')->with(compact('data'));
                }
                else
                {
                    return view('home');
                }
            }
        } else {
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
    }

	public static function getParticularPetition()
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
												  ->paginate(20);

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

	public function getCF()
	{
		$data = DB::table('crowdfunding')->orderBy('date', 'desc')->paginate($this->petition_par_page);

		if(count($data) > 0)
		{
			return view('crowdfunding')->with(compact('data'));
		}
		else
		{
			return view('crowdfunding');
		}
	}

	public static function getParticularCF()
	{
		$validator = \Validator::make(request()->all(), [
            '' => 'required|string|min:1|max:750'
        ]);

        if ($validator->fails()) {  //if the validation fails return with the errors

            return view('welcome');
		}else{
			
			//dd(request()->input());
			$requestedData = request()->input("requestedData");
			$data['data']  = DB::table('crowdfunding')->where('titre', 'like', '%' . $requestedData . '%')
												  ->orWhere('description', 'like', '%' . $requestedData . '%')
												  ->paginate(20);

			//dd($data);
			if(count($data) > 0)
			{
				return view('crowdfunding', $data);
			}
			else
			{
				return view('crowdfunding');
			}
		}
	}

	public static function createAbonnements()
	{
		
		if(	!DB::table('abonnement_petition')->where('id', '=',  \Auth::user()->id) ->exists() ){

			DB::table('abonnement_petition')->insert(
				['id' => \Auth::user()->id]
			);
		}
		return redirect('/abonnements');

	}

	public static function deleteAbonnements()
	{

			if( DB::table('abonnement_petition')->where('id', '=',  \Auth::user()->id) ->exists() ){

				DB::table('abonnement_petition')->where('id', 'like',  \Auth::user()->id)->delete();

			}

		return redirect('/abonnements');
	}

	public static function updateAbonnements(){
		$checkbox = Input::get('subscribe');

		//	mets toutes les colonnes correspondantes aux categories à 0
		//	C'est necessaire car on ne peut pas verifier quelles cases sont decochees
		DB::table('abonnement_petition')->where('id', '=',  \Auth::user()->id)
		->update(['politique'=>0, 'animaux'=>0, 'nature'=>0, 'social'=>0, 'justice'=>0, 'sante'=>0, 'droits_homme'=>0, 'espace_euro'=>0, 'enfants'=>0, 'arts'=>0, 'medias'=>0, 'sports'=>0, 'autres'=>0]);

			// $choix prend la valeur value de la checkbox qui a ete cochee
		if($checkbox != NULL){
			foreach($checkbox as $choix){
				DB::table('abonnement_petition')->where('id', '=',  \Auth::user()->id)
				->update([$choix => 1]
				);
				
			}
		}
		return redirect('/abonnements');
	}

	public static function addFavoris()
	{
		var_dump(request()->input());
		return view('welcome');
	}


	public static function getAbonnements()
	{
		$data['data'] = DB::table('abonnement_petition')->where('id', '=', \Auth::user()->id)->first();
		return view('abonnements', $data);
	}
}
