<?php


namespace App\Service;


class AlanMediumService implements IMedium
{


    public function guessNumber()
    {
        $alanaNumbers = session()->get('alan_numbers');
        $alanNum = rand(1, 10);
        if (!empty($alanaNumbers)) {
            foreach ($alanaNumbers as $key => $item) {
                if (!in_array($alanNum, $alanaNumbers)) {
                    array_push($alanaNumbers, $alanNum);
                }
            }
        } else {
            $alanaNumbers[] = $alanNum;
        }
        session()->put('alan_numbers', $alanaNumbers);
        session(['alan' => $alanNum]);

        return $alanNum;
    }


    public function checkNumber($userNum)
    {
        $alanaGuessNumbers = session()->get('alan_guess_numbers',[]);
        $meduimSession = session()->get('alan_numbers',[]);
        if (in_array($userNum, $meduimSession)) {
            if (!empty($alanaGuessNumbers)) {
                foreach ($alanaGuessNumbers as $key => $item) {
                    if (!in_array($userNum, $alanaGuessNumbers)) {
                        array_push($alanaGuessNumbers, $userNum);
                    }
                }
            } else {
                $alanaGuessNumbers[] = $userNum;
            }
            session()->put('alan_guess_numbers', $alanaGuessNumbers);
        }

    }


}
