<?php
    namespace App\Controllers;

    use App\Core\Framework;
    use System\Helpers\Session;

    Class HomeController extends Framework
    {
        function index(){
            $this->Template("test",["deneme"=>"<b>Emre</b>"]);


            $this->View("index");
        }
    }
