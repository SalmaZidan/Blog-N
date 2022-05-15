<?php

include_once "connection.php";
include_once "operation.php";

class Comment extends Connection implements Operation {
    var $comment;
    var $post_id;

    public function getComment()
    {
        return $this->comment;

    }
    public function getPostId()
    {
        return $this->post_id;

    }
    public function setComment($comment)
    {
        $this->comment=$comment;
    }

    public function setPostId($id)
    {
        $this->post_id=$id;

    }

   public function add(){
        $query = parent::RunDML("insert into `comment` values (Default,'".$this->getPostId()."','".$this->getComment()."')");
        return $query;
   }
   public function delete(){

   }
   public function update(){

   }
   public function GetAll(){
   }

   public function GetByPostId($id){
        $data=parent::GetData("select * from comment where `post_id` = ".$id." ");
        return $data;
    }

}

?>