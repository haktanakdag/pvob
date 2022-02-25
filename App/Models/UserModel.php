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

    public function getDataId($userId){
        if($this->Query("SELECT * FROM users WHERE userId = ? ", [$userId])){
        $data = $this->fetchAll();
        return $data;
        }
    }

	}
?>