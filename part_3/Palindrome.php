<?php

$pln_ = $_REQUEST['word_'];

function Palindrome($string){ 
    
    if (strrev($string) == $string){ 
      echo "is palindrome";
    }
    else{
        echo "not palindrome";
    }
} 
 

Palindrome($pln_);



?> 