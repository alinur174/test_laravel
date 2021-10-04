<?php


namespace App\Service;


class Medium implements IMedium
{

    public $numbers;

    public function guessNumber()
    {
        $number = rand(1, 10);
        $this->numbers[] = $number;

        return $number;
    }


}
