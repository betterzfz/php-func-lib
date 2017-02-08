<?php
    $lowerCaseLetters = 'abcdefghijklmnopqrstuvwxyz'; // lower-case letters
    $capitalLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // capital letters
    $numbers = '0123456789'; // numbers
    $specificSymbol = '`!@#$%^&*()_+`-=";:<>,./\\{}[]?\''; // specific symbol
    $totalSymbol = $lowerCaseLetters.$capitalLetters.$numbers.$specificSymbol;
    $symbolLength = strlen($totalSymbol);
    for ($i = 1; $i < 3; $i++) {
        $possible_number = pow($symbolLength, $i);
        for ($j = 0; $j < $possible_number; $j++) {
            $resultPassword = '';
            for ($k = 0; $k < $i; $k++) {
                
            }
            
        }
    }

    for ($i = 1; $i < 3; $i++) {
        for ($l = 0; $l < $symbolLength; $l++) {
            $resultPassword = $totalSymbol[$l];
            echo $resultPassword.'<br/>';
        }
    }
    for ($l = 0; $l < $symbolLength; $l++) {
        $resultPassword .= $totalSymbol[$l];
    }