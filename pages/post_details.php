<?php 
include_once "../layouts/head.php";
?>
<body>
    <div class="container mt-3">
        <h1>Hello, </h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>Post Info  </h5>
                </div>
                <div class="col">
                    <a href="../index.php">All Posts </a>
                </div>
                <hr><h4>Content</h4>
                <?php 
                include_once "../database/post.php";
                    $object = new Post();
                    $data = $object->GetById($_GET["id"]);
                    if($row = mysqli_fetch_assoc($data))
					{ 
                    ?>
                    <h5><?php echo $row['content']; ?></h5>

                <?php }?>

                <h4>Comments</h4>

                <?php 
                include_once "../database/comment.php";
                $object = new Comment();
                $id = trim($_GET["id"], "'\"");
                $comments = $object->GetByPostId($id);
                while($row = mysqli_fetch_assoc($comments))
                {  
                ?>

                <ul class="list-group p-3">
                    <li class="list-group-item"><?php echo $row['comment']; ?></li>
                </ul>

                <?php }?>


                <hr><h5>add Comment</h5>
                <form method="post">
                <?php 
                    if(isset($_POST["add_button"]))
                    {
                        include_once "../database/comment.php";
                        $object = new Comment();
                        
                        $object->setComment($_POST["comment"]);                    
                        $object->setPostId($id);                    
                        $msg = $object->add();

                        if($msg == "ok")
                        {
                            echo("<div class='alert alert-success'> Comment Added succsuflly! </div>");
                        }
                        else
                        {
                            echo("<div class='alert alert-danger'> Error is : ".$msg."</div>");
                        }
                    }
                    
                ?>
                <div class="mb-3">
                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <button name="add_button">Add</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <?php 
        include_once "../layouts/scripts.php";
    ?>

</body>

</html>