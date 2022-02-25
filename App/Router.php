<?php
    use System\Core\Route;
    /*
        $ana = Route::get("{baslik}/{controller}/{method}",function($var,$controller,$method){
            $controller = "App\\Controllers\\".$controller;
            $controller = new $controller();
            call_user_func_array([$controller,$method],[]);
        })->name("ana");
        $ana->where("baslik","[a-zA-Z0-9-]+");
    */

    //Route::any("iletisim{/}","Home@index");

    //Route::get("deneme/{method}/{baslik}","{1}@{2}");

    //Route::any("","Home@index");
    //Route::any("","Dashboard@index");
    if ($menu){
        //Route::any("","Dashboard@".$menu);
        Route::any("",$menu."@Index");
    }else{
      
        //Route::any("","Dashboard@Index","{".$menu."}");
        Route::any("","Dashboard@Index");
    }
   