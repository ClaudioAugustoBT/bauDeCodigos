<?php
    //Retorna o seculo referente ao ano solicitado
    function SeculoAno($ano){
        return ceil($ano / 100);
    }

    //echo SeculoAno(101);
?>