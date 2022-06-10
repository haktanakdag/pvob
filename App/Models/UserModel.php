<?php
    namespace App\Models;
    use System\Core\Database;

    class UserModel extends Database{

    public function __construct(){
        parent::__construct();
    }

    public function getData(){
        if($this->Query("SELECT * FROM kullanicilar ")){
        $data = $this->fetchAll();
        return $data;
        }
    }

    public function setData($dataid,$data){
        print_r($data);
        /*if ($dataid =0){
            //insert yazacam
        }else{
            //update yapacam
        }
        foreach ($data as $d){
            echo $d;
        }
        return $d;*/
    }

    public function getDataId($userId){
        if($this->Query("SELECT * FROM users WHERE userId = ? ", [$userId])){
        $data = $this->fetchAll();
        return $data;
        }
    }

	}
?>