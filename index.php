<?php include "php/header.php";
     
require('php/DatabaseConnection.php');
     
//Create database connection
    $connector = new DatabaseConnection;
    $connector->createConnection();

?>

    <!-- Navigation -->
    
<?php 
include "php/navigation.php";
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
               <?php
                
            
                
                $query = "SELECT * FROM posts ";
                $select_all_posts_query = mysqli_query($connector->getConnection(),$query);
                    
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,150);
                        $post_status = $row['post_status'];
                        
                        if($post_status == 'published'){
                            
                      
                            
                            
                        
                ?>
                
                  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href=""post.php?p_id=<?php echo $post_id; ?>"">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                </a>
                <hr>
                    
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <?php } } ?> 

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 
            include "php/sidebar.php";
            ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php 
        include "php/footer.php";
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
