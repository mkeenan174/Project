<?php

function extractKeywords($text){
    //We keep of list of comon words in english to ignore that will affcet our analysis
    $commonWords =  array('i','a','about','also','an','and','another','are','as','at','be','by','come','could','can','de','en','for','from','have','only','how','in','is','it','like','much','many','more','said','of','on','or','so','that','the','this','these', 'them', 'then','than','there','they','their','to','was','what','when','where','who','will','with','und','the','which', 'could', 'would','may');

    //We tidy up our string by getting rid of whietspace and triming the string.
    $string = preg_replace('/\s\s+/i', '', $text);
    $string = trim($text); 
    $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $text); 
    $string = strtolower($text); 

    preg_match_all('/\b.*?\b/i', $text, $matchWords);
    $matchWords = $matchWords[0];


    foreach ( $matchWords as $key=>$item ) {
        if ( $item == '' || in_array(strtolower($item), $commonWords) || strlen($item) <= 3 ) {
            unset($matchWords[$key]);
        }
    }   
    $wordCountArr = array();
    if ( is_array($matchWords) ) {
        foreach ( $matchWords as $key => $val ) {
            $val = strtolower($val);
            if ( isset($wordCountArr[$val]) ) {
                $wordCountArr[$val]++;
            } else {
                $wordCountArr[$val] = 1;
            }
        }
    }
    arsort($wordCountArr);
    $wordCountArr = array_slice($wordCountArr, 0, 10);
    $str = implode(",",array_keys($wordCountArr));
    return $str;
}

