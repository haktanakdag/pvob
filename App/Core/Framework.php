<?php

    namespace App\Core;

    use System\Core\Controller;

    class Framework extends Controller{
        function __construct(){
           // echo 'Core Controller Construct<hr/>';
        }

        function __destruct(){
            //echo '<hr/>Core Controller Destruct';
        }
    }