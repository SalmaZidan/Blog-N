<?php 
include_once "../layouts/head.php";
?>

<body>
    <div class="container mt-3">
        <h1>Hello, </h1>
        <hr>
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <h5>Add New Post </h5>
                </div>
                <div class="col">
                    <a href="../index.php">All Posts </a>
                </div>

            </div>
            <form method="post">
                <?php 

                    if(isset($_POST["add_button"]))
                    {
                        include_once "../database/post.php";
                        $object = new Post();
                        
                        $object->setContent($_POST["content"]);                    
                        $msg = $object->add();

                        if($msg == "ok")
                        {
                            echo("<div class='alert alert-success'> Post created succsuflly! </div>");
                        }
                        else
                        {
                            echo("<div class='alert alert-danger'> Error is : ".$msg."</div>");
                        }
                    }

                ?>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post Content</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"
                        require></textarea>
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