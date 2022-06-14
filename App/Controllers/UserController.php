<?php
namespace App\Controllers;
use App\Core\Framework;
use System\Helpers\Session;
use App\Models\UserModel;


class UserController extends Framework {

    public function __construct(){
        //$this->view("Dashboard");
    }

    public function index(){
        $model = new UserModel();
        $return = $model->getData();
        $data = $return;
        $this->view("User",$data);
    }

    public function SetData($dataid,$data){
        //print_r($data);
        $model = new UserModel();
        $return = $model->setData($dataid,$data);
       /* foreach($d as $data){
            echo $d->name;
            echo $d->eposta;
        }*/
        
       
        return $return;
    }

   

    public function GetUsers(){
        $data = ['ad'=> "haktan",'soyad'=> "akdag"];
        $this->view("User",$data);
    }
 

   

}


?>