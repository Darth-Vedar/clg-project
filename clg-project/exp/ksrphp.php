<?php
        $str = "This is a book";
        echo $str;
        $lenn = strlen($str);
        echo "<br>";
        echo "<h3>The lenght of the string is</h3>"."<br>". $lenn ;
        echo "<h3>The Number of the words in this string is</h3>".str_word_count($str) ;
        echo "<h3>The Reverse of the words in this string is</h3>".strrev($str) ;
        echo "<h3>The Search of the word 'book' in this string is</h3>".strpos($str ,"book") ;
        echo "<h3>The Replace of the word in this string is</h3>".str_replace("is","was",$str) ;
?>