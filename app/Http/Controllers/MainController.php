<?php

namespace App\Http\Controllers;

use App\Service\AlanMedium;
use App\Service\JohnMedium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{

    public static $array;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AlanMedium $alanMedium)
    {


        $numbersAlan = AlanMedium::$numbers;

        return view('index', compact('numbersAlan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AlanMedium $alanMedium, JohnMedium $johnMedium)
    {
        $cart = Session::get('cart.program');

        session(['cart', rand(1,80)]);

        $array = session('cart');
        if (empty($array)){
            $array = [];
        }

        $array[] = rand(1,52);
        session()->push('cart', $array);

        dd(session()->all());
        $alanNum = $alanMedium->guessNumber();
        $johnNum = $johnMedium->guessNumber();

        echo json_encode(['alanNum' => $alanNum, 'johnNum' => $johnNum, 'user' => 2]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
