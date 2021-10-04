<?php


namespace App\Service;


interface IMedium
{

    public function guessNumber();

    public function checkNumber($userNum);

}
