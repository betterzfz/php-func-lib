<?php
    /**
     * a frequently used php functions library.
     * @stone
     */

    /**
     * a function to generate a random string.
     * @param $length the length of the random string.
     * @param $flag
     * 1-get only lower-case letters string,
     * 2-get only capital letters string,
     * 3-get only letter string, 
     * 4-get numeric string,
     * 5-get a string is made up of lower-case letters and numbers,
     * 6-get a string is made up of capital letters and numbers,
     * otherwise you will get a string is made up of case letters and numbers.
     * @return a string respresent the random string.
     * @author stone
     */
    function get_random_string ($length, $flag = 0) {
        $candidateCharacters = '';
        $lowerCaseLetters = 'abcdefghijklmnopqrstuvwxyz'; // lower-case letters
        $capitalLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // capital letters
        $numbers = '0123456789'; // numbers
        switch ($flag) {
            case 1:
                $candidateCharacters = $lowerCaseLetters;
                break;
            case 2:
                $candidateCharacters = $capitalLetters;
                break;
            case 3:
                $candidateCharacters = $lowerCaseLetters.$capitalLetters;
                break;
            case 4:
                $candidateCharacters = $numbers;
                break;
            case 5:
                $candidateCharacters = $lowerCaseLetters.$numbers;
                break;
            case 6:
                $candidateCharacters = $capitalLetters.$numbers;
                break;
            default:
                $candidateCharacters = $lowerCaseLetters.$capitalLetters.$numbers;
                break;
        }

        $resultString = '';
        $randomLength = strlen($candidateCharacters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $resultString .= $candidateCharacters[rand(0, $randomLength)];
        }
        return $resultString;
    }

    /**
     * a function to ergodic a directory.
     * @param $directory the directory to ergodic.
     * @return an array represent the directory structure.
     * @author stone
     */
    function ergodic_directory($directory){
        $dirObj = dir($directory);
        $result = [];
        while ($file = $dirObj->read()) {
            if (is_dir($directory.DIRECTORY_SEPARATOR.$file) && $file != '.' && $file != '..') {
                $result[] = [
                    'name' => $file,
                    'is_dir' => TRUE,
                    'children' => ergodic_directory($directory.DIRECTORY_SEPARATOR.$file)
                ];
            } elseif ($file != '.' && $file != '..') {
                $result[] = [
                    'name' => $file,
                    'is_dir' => FALSE
                ];
            }
        }
        return $result;
    }

    /**
     * filter data for mysql query
     * @param $data the data to filter array
     * @return the result array
     * @author stone
     */
    function filter_data_before_query($data){
        if (!empty($data) && is_array($data)) {
			foreach ($data as $key => $value) {
				if (!is_array($value) && !is_object($value)) {
					$data[$key] = trim($value);
					if (!get_magic_quotes_gpc()) {
						$data[$key] = addslashes($value);
					}
					if (is_int($value)) {
						$data[$key] = intval($value);
					}
				}
			}
			return $data;
		} else {
			return ['code' => -1, 'message' => 'the data to be filtered must be array'];
		}
    }