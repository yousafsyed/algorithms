<?php
include ('algorithms.php');

$x = 4;
$list = array(5,2,3,4,1);
//Sort Algorithms examples
$list = Algorithms\Sort::insertion_sort($list);
$list = Algorithms\Sort::comb_sort($list);
$list = Algorithms\Sort::selection_sort($list);
$list = Algorithms\Sort::heap_sort($list);
$list = Algorithms\Sort::bubble_sort($list);
// Search Algorithms examples

echo Algorithms\Search::binary_search($list, $x);
echo Algorithms\Search::jump_search($x, $list);
echo Algorithms\Search::kmp_search("ABC ABCDAB ABCDABCDABDE", "ABCDABD"); // 15
