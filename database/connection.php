<?php 

class Connection
{
    var $conn;

    function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","root","Blog_native");
    }

    function RunDML($statment)
    {
        if(!mysqli_query($this->conn,$statment))
        {
            return mysqli_error($this->conn);
        }
        else
        {
            return "ok";
        }
    }

    function GetData($select)
    {
        $result = mysqli_query($this->conn,$select);
        return $result;
    }

}

?>