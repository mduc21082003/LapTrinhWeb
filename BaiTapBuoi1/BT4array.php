<?php
    function timMax($arr){
        return max($arr);
    }

    function timMin($arr){
        return min($arr);
    }

    function tongMang($arr){
        return array_sum($arr);
    }

    function kiemTraMang($n, $arr){
        return in_array($n, $arr);
    }

    function sapXepMang($arr){
        sort($arr);
        return $arr;
    }
?>