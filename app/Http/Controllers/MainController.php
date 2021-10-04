<?php

namespace App\Http\Controllers;

use App\Service\AlanMediumService;
use App\Service\JohnMediumService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{

    public static $array = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AlanMediumService $alanMedium)
    {

        return view('index');

    }



    public function store(Request $request, AlanMediumService $alanMedium, JohnMediumService $johnMedium, UserService $userService)
    {

        $userNum = $request->number;

        $alanMedium->guessNumber();
        $johnMedium->guessNumber();
        $userService->getNumber($userNum);

        $alanMedium->checkNumber($userNum);
        $johnMedium->checkNumber($userNum);


        return redirect()->back();

    }




}
