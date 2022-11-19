<?php

// read englishdata.txt text file and strip any HTML/XML tags, and lower case this string
// Then split the string into an array of words
// Then count the number of times each word appears in the array
// Then sort the array by the number of times each word appears
// Then add 20 sentences of the most common words to the quiz
// Then write the array to a text file named english.txt

// loop through each subfolder in the folder named "data"
// read englishdata.txt text file and strip any HTML/XML tags, and lower case this string
$englishdata = file_get_contents('../data/english/englishdata.txt');

// Then split the string into an array of sentences
$sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $englishdata);

// Then count the number of times each word appears in the array
$wordcount = array_count_values(str_word_count($englishdata, 1));

// Then sort the array by the number of times each word appears
arsort($wordcount);

// Then loop through the array and add 20 sentences of the most common words to the quiz array
$quiz = [];
foreach ($wordcount as $word => $count) {
    foreach ($sentences as $sentence) {
        if (strpos($sentence, $word) !== false) {
            $quiz[] = $sentence;
            break 1;
        }
    }
    if (count($quiz) >= 20) {
        break;
    }
}

// add words in the wordcount array to the quiz array
foreach ($wordcount as $word => $count) {
    $quiz[] = $word;
}



//$quiz = array_slice($sentences, 0, 20);
file_put_contents('../quizes/english.txt', implode("\n", $quiz));

// output words to a text file named english-ansers.txt
//file_put_contents('../quizes/english-answers.txt', implode("\n", array_keys($wordcount)));


?>





