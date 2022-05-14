<?php

    //Cria um array com 20 numeros aleatorios entre 1 e 10 
    //Na sequancia, cria outro array como os numeros que não se repetem
    
    $random_num_array = array();
    $unique_num_array = array();

    for ($i = 0; $i < 20; $i++) {
        array_push($random_num_array, random_int(1, 10));
    }


    for ($j = 0; $j < count($random_num_array); $j++) {
        $count_rep = 0;

        for ($x = 0; $x < count($random_num_array); $x++) {
            if ($random_num_array[$j] == $random_num_array[$x]) {
                $count_rep++;
            }
        }

        if ($count_rep <= 1) {
            array_push($unique_num_array, $random_num_array[$j]);
        }
    }


    echo "<p>Array sorteado = " . json_encode($random_num_array) . "<p>";
    echo "<p>Os números que não se repetem = " . json_encode($unique_num_array) . "<p>";

?>
