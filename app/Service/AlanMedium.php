<?php


namespace App\Service;


class AlanMedium implements IMedium
{
    public  static $numbers;

    public function guessNumber()
    {
        $number = rand(1, 10);
        session(['alan' => $number]);
        self::$numbers[] = $number;
        return $number;
    }


}
