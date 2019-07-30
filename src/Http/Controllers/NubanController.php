<?php

namespace Olabodeabesin\Nuban\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class NubanController extends Controller
{
    //This package was inspired by Samuel(https://github.com/samuel52)

    public function generate($bankcode, $serial){
        return $this->decode($bankcode, $serial);
    }

    public function decode($bankcode, $serial){
        if (strlen($bankcode) != 5 or strlen($serial) != 9) {
            return "Bankcode must be 5 digits for OFI, Serial must be 9 digits";
            Log::critical('Alert!::invalid bankcode or serial is being passed to the generate function');
        }
        //check to make sure serial is 9 digits here
        //check to make sure bank code is 5 for OFI
        $bankCodeSplit = str_split($bankcode);

        $serialNumberSplit = str_split($serial);

        $calculateNuban = 9*3 + $bankCodeSplit[0] * 7 + $bankCodeSplit[1] * 3 + $bankCodeSplit[2] * 3 + $bankCodeSplit[3] * 7 + $bankCodeSplit[4] * 3 + $serialNumberSplit[0] * 3 + $serialNumberSplit[1] * 7 + $serialNumberSplit[2] * 3 + $serialNumberSplit[3] * 3 + $serialNumberSplit[4] * 7 + $serialNumberSplit[5] * 3 + $serialNumberSplit[6] * 3 + $serialNumberSplit[7] * 7 + $serialNumberSplit[8] * 3;

        $standardNumber = 10;

        $makeModulos = $calculateNuban % $standardNumber;

        $checkDigit = $standardNumber - $makeModulos;

        return $NUBAN = $serial . $checkDigit;
    }
}