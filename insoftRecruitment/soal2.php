<?php


function countWords($text)
{
    $words = explode(" ", $text);
    $filteredWords = array_filter($words, function ($word) {
        return trim($word) !== "";
    });

    return count($filteredWords);
}

// Sample percobaan
echo "<b>Ini kata dalam varibel :</b>". 
$Text = " Latihan Test Programming dari Insoft Asia Recruitment" ."<br>";

$wordCount = countWords($Text);
echo "Jumlah Kata/words dalam Text diatas : " . $wordCount;
