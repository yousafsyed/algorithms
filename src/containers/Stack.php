<?php
namespace Containers;
class Stack {

    protected $stack;
    protected $limit;

    public function __construct($limit = 10, $initial = array()) {
        // initialize the stack
        $this->stack = $initial;
        // stack can only contain this many items
        $this->limit = $limit;
    }
    /**
     *Stable: Yes
     *
     *@param string $item to be added to the stack
     */
    public function push($item) {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }
     /**
     *This function delets the last most elment from the Stack
     */
    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
            throw new RunTimeException('Stack is empty!');
        } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
    }
    /**
     *This resturns the last most element of the stack
     * @return string
     */
    public function top() {
        return current($this->stack);
    }
    /**
     *This resturns the last most element of the stack
     * @return bool
     */
    public function isEmpty() {
        return empty($this->stack);
    }

}
