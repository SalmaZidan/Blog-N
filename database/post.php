<?php

include_once "connection.php";
include_once "operation.php";

class Post extends Connection implements Operation {
    var $content;

    public function getContent()
    {
        return $this->content;
    }
    public function setContent($text)
    {
        $this->content=$text;
    }

   public function add(){
        $query = parent::RunDML("insert into `post` values (DEFAULT, '".$this->getContent()."')");
        return $query;
   }
   public function delete(){

   }
   public function update(){

   }
   public function GetAll(){
       $data=parent::GetData("select * from post");
       return $data;
   }

   public function GetById($id){
        $data=parent::GetData("select * from post where `id` = ".$id." ");
        return $data;
   }

}

?>