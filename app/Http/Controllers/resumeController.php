<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use PDOException;

use Illuminate\Http\Request;

class resumeController extends Controller
{

    public function resume()
    {

        try {
            $isServerUp = @fsockopen('localhost', 80);
            $isDatabaseUp = DB::connection()->getPdo();

            if (!$isServerUp || !$isDatabaseUp) {
                return view('UserInterface.serverisoffline');
            }
        } catch (PDOException $e) {
            return view('UserInterface.serverisoffline');
        }


        $profiles = DB::table('profiles')->where('id', 1)->first();
        $projects = DB::table('projects')->get();
        return view('UserInterface.resume', compact('profiles' , 'projects'))->with('successMessage' ,'Welcome to my Resume');


       
    }


    public function serverIsOffline(){

        return view('UserInterface.serverisoffline');
    }


}
