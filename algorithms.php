<?php

include(dirname(__file__).DIRECTORY_SEPARATOR."algorithms".DIRECTORY_SEPARATOR."Search.php");
use Algorithms\Search;
$x = 4;
$list = array(1,2,3,4,5);
// echo Search::binary_search($list,$x);

// echo Search::kmp_search("ABC ABCDAB ABCDABCDABDE", "ABCDABD"); // 15

//echo Search::fibonacci_Search($x ,$list);

//echo Search::jump_search($x ,$list);