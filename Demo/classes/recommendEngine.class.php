<?php


class recommendEngine{
     var $article;
     var $compare;


    function setup($param, $params){
        $this->article = $param;
        $this->compare = $params;
    } 


    function calcEuclid($arrayA, $arrayB){
      return sqrt(
        array_sum(
          array_map(function($x, $y){
                $result = pow(($x - $y), 2); 
                return $result;
            }, $arrayA, $arrayB)
        ));
    }

    function calcManhattan($arrayA, $arrayB){
            return array_sum(
                array_map( function($x, $y){
                    $result = $x - $y;
                    return $result;
                }, $arrayA, $arrayB)
            );
    }

    function calcCosine($arrayA, $arrayB){
        $dot = array_sum(
            array_map( function($x, $y){
                $result = $x * $y;
                return $result;
            }, $arrayA, $arrayB)
        );

        $magA = sqrt(array_sum(
            array_map( function($x){
                $result = pow($x, 2);
                return $result;
            }, $arrayA)
        ));

        $magB = sqrt(array_sum(
            array_map( function($x){
                $result = pow($x, 2);
                return $result;
            }, $arrayB)
        ));

        $result = $dot / ($magA * $magB);

        return $result;
    }

    function calcJaccard($arrayA, $arrayB){
       $union = count($arrayA) + count($arrayB);
       $intersect = 0;
       for ($i=0; $i < count($arrayA); $i++) { 
           $tempA = $arrayA[$i];
            for ($j=0; $j < count($arrayB); $j++) { 
                $tempB = $arrayB[$j];
                if($tempA == $tempB){
                    $intersect++;
                }
            }
       }

       $result = $intersect / $union;

       return  $result;
    }


    function jaccardCompare(){
       $results = array(); 
       foreach ($this->compare as $art ) {
             $id = $art[0];
             array_shift($art);
             //print_r($art);
             $score = $this->calcJaccard($this->article, $art);
             if($score > 0){
             $results[$id] = $score;
             }
       }
       return $results;
    }

}