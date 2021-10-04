<?php


namespace App\Service;


class UserService
{

    public function getNumber( $userNum)
    {
        $userNumbers = session()->get('user_numbers');
        if (!empty($userNumbers)) {
            foreach ($userNumbers as $key => $item) {
                if (!in_array($userNum, $userNumbers)) {
                    array_push($userNumbers, $userNum);
                }
            }
        } else {
            $userNumbers[] = $userNum;
        }

        session()->put('user_numbers', $userNumbers);
    }


}
