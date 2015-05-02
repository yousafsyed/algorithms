<?php
namespace Algorithms;
class Sort {
    
    private static $SHRINK_FACTOR = 1.3;
    public static function array_swap(&$arr, $index1, $index2) {
        list($arr[$index1], $arr[$index2]) = array($arr[$index2], $arr[$index1]);
    }
    /**
     *Bubble sort: A very naive sort that keeps swapping elements until the container is sorted.
     *Requirements: Needs to be able to compare elements with <=>, and the [] []= methods should
     *be implemented for the container.
     *Time Complexity: О(n^2)
     *Space Complexity: О(n) total, O(1) auxiliary
     *Stable: Yes
     *
     *@param array $items Array to be sorted
     *@return array
     */
    public static function bubble_sort($items) {
        $size = count($items);
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - 1 - $i; $j++) {
                if ($items[$j + 1] < $items[$j]) {
                    Sort::array_swap($items, $j, $j + 1);
                }
            }
        }
        return $items;
    }
    /**
     * Comb sort: A variation on bubble sort that dramatically improves performance.
     *Source: http://yagni.com/combsort/
     *Requirements: Needs to be able to compare elements with <=>, and the [] []= methods should
     *be implemented for the container.
     *Time Complexity: О(n^2)
     *Space Complexity: О(n) total, O(1) auxiliary
     *Stable: Yes
     *
     *@param array $arr Array to be sorted
     *@return array
     */
    
    public static function comb_sort($arr) {
        
        $gap = floor(count($arr) / Sort::$SHRINK_FACTOR);
        while ($gap > 0) {
            for ($i = 0; $i < count($arr) - $gap; ++$i) {
                $arrWithGapsKeys = array();
                $arrWithGaps = array();
                $loop = true;
                $j = $i;
                while ($loop) {
                    if (isset($arr[$j])) {
                        $arrWithGapsKeys[] = (int)$j;
                        $arrWithGaps[] = $arr[$j];
                        $j+= $gap;
                    } else {
                        $loop = false;
                    }
                }
                $arrWithGapsOrdered = Sort::bubble_sort($arrWithGaps);
                foreach ($arrWithGapsKeys as $key) {
                    $arr[$key] = current($arrWithGapsOrdered);
                    next($arrWithGapsOrdered);
                }
            }
            $gap = floor($gap / Sort::$SHRINK_FACTOR);
        }
        return $arr;
    }
    /**
     *Selection sort: A naive sort that goes through the container and selects the smallest element,
     *putting it at the beginning. Repeat until the end is reached.
     *Requirements: Needs to be able to compare elements with <=>, and the [] []= methods should
     *be implemented for the container.
     *Time Complexity: О(n^2)
     *Space Complexity: О(n) total, O(1) auxiliary
     *	Stable: Yes
     *@param array $arr Array to be sorted
     *@return array
     */
    
    public static function selection_sort($arr) {
        for ($i = 0; $i < count($arr); ++$i) {
            $min = null;
            $minKey = null;
            for ($j = $i; $j < count($arr); ++$j) {
                if (null === $min || $arr[$j] < $min) {
                    $minKey = $j;
                    $min = $arr[$j];
                }
            }
            $arr[$minKey] = $arr[$i];
            $arr[$i] = $min;
        }
        return $arr;
    }
    
    public static function build_heap(&$array, $i, $t) {
        $tmp_var = $array[$i];
        $j = $i * 2 + 1;
        
        while ($j <= $t) {
            if ($j < $t) if ($array[$j] < $array[$j + 1]) {
                $j = $j + 1;
            }
            if ($tmp_var < $array[$j]) {
                $array[$i] = $array[$j];
                $i = $j;
                $j = 2 * $i + 1;
            } else {
                $j = $t + 1;
            }
        }
        $array[$i] = $tmp_var;
    }
    /** 
     *	Heap sort: Uses a heap (implemented by the Containers module) to sort the collection.
     *  Requirements: Needs to be able to compare elements with <=>
     *  Time Complexity: О(n^2)
     *  Space Complexity: О(n) total, O(1) auxiliary
     *  Stable: Yes
     *	@param array $array Array to be sorted
     *	@return array
     */
    
    public static function heap_sort(&$array) {
        //This will heapify the array
        $init = (int)floor((count($array) - 1) / 2);
        
        for ($i = $init; $i >= 0; $i--) {
            $count = count($array) - 1;
            Sort::build_heap($array, $i, $count);
        }
        //swaping of nodes
        for ($i = (count($array) - 1); $i >= 1; $i--) {
            $tmp_var = $array[0];
            $array[0] = $array[$i];
            $array[$i] = $tmp_var;
            Sort::build_heap($array, 0, $i - 1);
        }
        
        return $array;
    }
    /**
     *Function for sorting an array with insertion sort algorithm.
     *Insertion sort: Elements are inserted sequentially into the right position.
     * Requirements: Needs to be able to compare elements with <=>, and the [] []= methods should
     *be implemented for the container.
     *Time Complexity: О(n^2)
     *Space Complexity: О(n) total, O(1) auxiliary
     *Stable: Yes
     * @param array $array
     * @return array
     */
    public static function insertion_sort($array) {
        $length = count($array);
        for ($i = 1; $i < $length; $i++) {
            $element = $array[$i];
            $j = $i;
            while ($j > 0 && $array[$j - 1] > $element) {
                //move value to right and key to previous smaller index
                $array[$j] = $array[$j - 1];
                $j = $j - 1;
            }
            //put the element at index $j
            $array[$j] = $element;
        }
        return $array;
    }
}
