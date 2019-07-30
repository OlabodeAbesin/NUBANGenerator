<?php

namespace Olabodeabesin\Nuban\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NubanController extends Controller
{
    //This package was inspired by Samuel(https://github.com/samuel52)

    public function generate($bankcode, $serial){
        return $this->decode($bankcode, $serial);
    }

    public function decode($bankcode, $serial){
        //check to make sure serial is 9 digits here
        $bankCodeSplit = str_split($bankcode);

        $serialNumberSplit = str_split($serial);

        $calculateNuban = $bankCodeSplit[0]*3 + $bankCodeSplit[1]*7 + $bankCodeSplit[2]*3 + $serialNumberSplit[0]*3 + $serialNumberSplit[1]*7 + $serialNumberSplit[2]*3 + $serialNumberSplit[3]*3 + $serialNumberSplit[4]*7 + $serialNumberSplit[5]*3 + $serialNumberSplit[6]*3 + $serialNumberSplit[7]*7 + $serialNumberSplit[8]*3;

        $standardNumber = 10;

        $makeModulos = $calculateNuban % $standardNumber;

        $digits = $makeModulos - $standardNumber;

        $checkDigit = end(str_split($digits));//To handle when the check digit is 10

        return $NUBAN = $serial.$checkDigit;
    }
}