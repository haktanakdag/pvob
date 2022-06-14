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
        
        //echo $dataid;
        if($dataid==0 or $dataid=""){
            $q ="INSERT INTO kullanicilar(adsoyad,email) VALUES('".$data[name]."','".$data[eposta]."')";
            $this->Query($q);
        }else{
            $q ="UPDATE kullanicilar SET adsoyad='".$data[name]."', email='".$data[eposta]."' where id =".$dataid;
            $this->Query($q);
            //echo $q;

        }
       
    }

    public function getDataId($userId){
        if($this->Query("SELECT * FROM users WHERE userId = ? ", [$userId])){
        $data = $this->fetchAll();
        return $data;
        }
    }

	}
?>