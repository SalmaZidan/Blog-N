<?php 
include_once "layouts/head.php";
?>

<body>
    <div class="container mt-3">
        <h1>Hello, </h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>All Posts </h5>
                </div>
                <div class="col">

                </div>
                <div class="col">
                    <a href="pages/add_post.php">Add New Post</a>
                </div>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Content</th>
                    <th scope="col">Show</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include_once "database/post.php";
                $object = new Post();
                $data = $object->GetAll();
                while($row = mysqli_fetch_assoc($data))
                {  
                ?>

                <tr>
                    <th scope="row"><?php  echo $row['id']?></th>
                    <td><?php  echo $row['content']?></td>
                    <td><a href='pages/post_details.php?id="<?php echo($row["id"]); ?>" '>show<a></td>
                </tr>

                <?php }?>
            </tbody>
        </table>
    </div>


    <?php 
        include_once "layouts/scripts.php";
    ?>

</body>

</html>