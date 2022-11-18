<?php

// read englishdata.txt text file and strip any HTML/XML tags, and lower case this string
// Then split the string into an array of words
// Then count the number of times each word appears in the array
// Then sort the array by the number of times each word appears
// Then add 20 sentences of the most common words to the quiz
// Then write the array to a text file named english.txt

// loop through each subfolder in the folder named "data"
// read englishdata.txt text file and strip any HTML/XML tags, and lower case this string
$englishdata = file_get_contents('data/english/englishdata.txt');

// Then split the string into an array of sentences
$sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $englishdata);

// Then count the number of times each word appears in the array
$wordcount = array_count_values(str_word_count($englishdata, 1));

// Then sort the array by the number of times each word appears
arsort($wordcount);

// Then add 20 sentences of the most common words to the quiz
$quiz = array_slice($sentences, 0, 20);

// Then write the array to a text file named english.txt
file_put_contents('english.txt', implode('', $quiz));










?>





