<?php
// choose different algorithms to run at runtime
interface SortStrategy {
    public function sort();
}

class QuickSort implements SortStrategy {
    private $data;

    public function __construct(Array $data) {
        $this->data = $data;
    }
    public function sort() {

    }
}

class MergeSort implements SortStrategy {
    private $data;

    public function __construct(Array $data) {
        $this->data = $data;
    }
    public function sort() {

    }
}

// Strategy/policy pattern
function sortStuff(Array &$data) {
    if (count($data) > 20) {
        $tempData = new QuickSort($data);
    } else {
        $tempData = new MergeSort($data);
    }
    $tempData->sort();
}

$data = array(3, 5, 2, 3, 5, 2, 3, 5, 2, 3, 5, 25);
sortStuff($data);