<?php

function insertWord($originalText, $wordToInsert, $position)
{
    $words = explode(" ", $originalText);
    $filteredWords = array_filter($words, function ($word) {
        return trim($word) !== "";
    });

    if ($position >= 1 && $position <= count($filteredWords) + 1) {
        array_splice($filteredWords, $position - 1, 0, $wordToInsert);
        $newText = implode(" ", $filteredWords);
        return $newText;
    } else {
        return "Posisi tidak valid.";
    }
}

// Sample percobaan
$originalText = "Ini adalah contoh kalimat untuk dihitung jumlah katanya";
$wordToInsert = "<b>tambahan</b>";
$insertPosition = 2;

$newText = insertWord($originalText, $wordToInsert, $insertPosition);
echo "Teks <i>TAMBAHAN</i> diisipan pada kata: " . $newText;
