<?php
namespace Algorithms;
class Search {
    /**
     *Iterative binary search
     *Binary Search: This search finds an item in log(n) time provided that the container is already sorted.
     *The method returns the item if it is found, or nil if it is not. If there are duplicates, the first one
     *found is returned, and this is not guaranteed to be the smallest or largest item.
     *
     * Complexity: O(log N)
     *
     * @param array $container The sorted array
     * @param int $item The  item to be searched
     * @return value
     */
    public static function binary_search($container, $item) {
        $low = 0;
        $high = count($container)-1;
        while ($low <= $high) {
            $mid = ($low + $high) / 2;
            $val = $container[$mid];
            if ($val > $item) {
                $high = $mid - 1;
            } else if ($val < $item) {
                $low = $mid + 1;
            } else {
                return $val;
            }
        }
        return -1;
    }
    /**
     *Knuth-Morris-Pratt Algorithm substring search algorithm: Efficiently finds the starting position of a
     *substring in a string. The algorithm calculates the best position to resume searching from if a failure
     *occurs.
     *
     *The method returns the index of the starting position in the string where the substring is found. If there
     *is no match, nil is returned.
     *
     *Complexity: O(n + k), where n is the length of the string and k is the length of the substring.
     *
     * @param string $string The main string where to find
     * @param string $substring The substring to find
     */
    public static function kmp_search($string, $substring) {
        // create failure function table
        $pos = 2;
        $cnd = 0;
        $failure_table = array(-1, 0);
        while ($pos < strlen($substring)) {
            if ($substring[$pos - 1] == $substring[$cnd]) {
                $failure_table[$pos] = $cnd + 1;
                $pos+= 1;
                $cnd+= 1;
            } else if ($cnd > 0) {
                $cnd = $failure_table[$cnd];
            } else {
                $failure_table[$pos] = 0;
                $pos+= 1;
            }
        }
        
        $m = $i = 0;
        while ($m + $i < strlen($string)) {
            if ($substring[$i] == $string[$m + $i]) {
                $i+= 1;
                if ($i == strlen($substring)) {
                    return $m;
                }
            } else {
                $m = $m + $i - $failure_table[$i];
               
                if($i > 0){
                	 $i =  $failure_table[$i];
                }
               
            }
        }
        return -1;
    }

    /**
     *A jump search or block search refers to a search algorithm for ordered lists.
     *It works by first checking all items Lkm, where k \in \mathbb{N} and m is the block size,
     *until an item is found that is larger than the search key. To find the exact position of
     *the search key in the list a linear search is performed on the sublist L[(k-1)m, km].
     *
     * @param int $key the key to be searched in array
     * @param array $a The array of sorted elements
     * @return $key
     */
    public static function jump_search($x, $list) {
        // calculate the step
        $len = count($list);
        $step = floor(sqrt($len));
        $prev = 0;
        
        while ($list[($step < $len ? $step : $len) ] < $x) {
            $prev = $step;
            $step+= floor(sqrt($len));
            
            if ($step >= $len) {
                return -1;
            }
        }
        
        while ($list[$prev] < $x) {
            $prev++;
            if ($prev == ($step < $len ? $step : $len)) {
                return -1;
            }
        }
        
        if ($list[$prev] == $x) {
            return $prev;
        }
        
        return -1;
    }
}
