<?php 

require('../php/DatabaseConnection.php');
     
//Create database connection
    $connector = new DatabaseConnection;
    $connector->createConnection();

?>

<?php include "php/admin_header.php"; ?>

    <div id="wrapper">

<?php include "php/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Fernando</small>
                        </h1>
                        <?php 
                        
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                            
                        } else{
                            
                            $source = '';
                        }
                        
                        switch($source){
                                case 'add_posts';
                                 include "php/add_post.php";
                                break ;
                                
                                case 'edit_post';
                                    include "php/edit_post.php";
                                
                                break;
                                
                            default:
                                include "php/view_all_comments.php";
                                
                                break;
                        }
                        
                        ?>
                        
                        
                    </div>
                    
                </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "php/admin_footer.php"; ?>
