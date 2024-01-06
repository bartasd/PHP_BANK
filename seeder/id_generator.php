<?php
    require dirname(__dir__, 1).'/logic/validateId.php';

    function getId($first7){
        $first7 .= rand(0,9);
        $first7 .= rand(0,9);
        $first7 .= rand(1,9);
        $i = 0;
        while($i < 10){
            if(validateId($first7.$i)){
                break;
            }
            $i++;
        }
        return $first7.$i;
    }
    
    echo getId(3890303);

    ?>

      