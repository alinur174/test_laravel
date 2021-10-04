<?php


namespace App\Service;


class JohnMedium implements IMedium
{
    public $numbers;

    public function guessNumber()
    {
        $number = rand(1, 10);
        session(['john' => $number]);
        $this->numbers[] = $number;

        return $number;
    }


}
