<?php
function hp($string) {
    // kadang ada penulisan no hp 0811 239 345
    $string = str_replace(" ","",$string);
    // kadang ada penulisan no hp (0274) 778787
    $string = str_replace("(","",$string);
    // kadang ada penulisan no hp (0274) 778787
    $string = str_replace(")","",$string);
    // kadang ada penulisan no hp 0811.239.345
    $string = str_replace(".","",$string);

    // cek apakah no hp mengandung karakter + dan 0-9
    if(!preg_match('/[^+0-9]/',trim($string))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($string), 0, 3)=='+62'){
           $string = trim($string);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($string), 0, 1)=='0')
        {
           $string = '+62'.substr(trim($string), 1);
        }
    } 
    else {
        $string = 'Format no HP tidak lengkap atau salah';
    }
    
    return $string;
}

?>