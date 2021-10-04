<?php


namespace App\Service;


class JohnMediumService implements IMedium
{


    public function guessNumber()
    {
        $johnNumbers = session()->get('john_numbers');
        $johnNum = rand(1, 10);
        session(['john' => $johnNum]);

        if (!empty($johnNumbers)) {
            foreach ($johnNumbers as $key => $item) {
                if (!in_array($johnNum, $johnNumbers)) {
                    array_push($johnNumbers, $johnNum);
                }
            }
        } else {
            $johnNumbers[] = $johnNum;
        }
        session()->put('john_numbers', $johnNumbers);


        return $johnNum;
    }


    public function checkNumber($userNum)
    {
        $johnGuessNumbers = session()->get('john_guess_numbers',[]);
        $meduimSession = session()->get('john_numbers',[]);
        if (in_array($userNum, $meduimSession)) {
            if (!empty($johnGuessNumbers)) {
                foreach ($johnGuessNumbers as $key => $item) {
                    if (!in_array($userNum, $johnGuessNumbers)) {
                        array_push($johnGuessNumbers, $userNum);
                    }
                }
            } else {
                $johnGuessNumbers[] = $userNum;
            }
            session()->put('john_guess_numbers', $johnGuessNumbers);
        }

    }


}
