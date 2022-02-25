<?php
namespace App\Controllers;
use App\Core\Framework;
use System\Helpers\Session;

class DashboardController extends Framework {

public function __construct(){
  
}

public function index(){
  $data = [
    'include'=> "User"
   ];
  $this->view("dashboard");
}

}



?>