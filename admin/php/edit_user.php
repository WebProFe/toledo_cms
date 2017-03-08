<?php

    if(isset($_GET['edit_user'])){
        
        $the_user_id = $_GET['edit_user'];
        
        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_users = mysqli_query($connector->getConnection(),$query);

        while($row = mysqli_fetch_assoc($select_users)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];    
        $user_role = $row['user_role']; 
            
      }
        
?>
<?php
    

    
    if(isset($_POST['edit_user'])){
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
      
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $post_date = date('d-m-y');
//        $post_comment_count = 4;
                    
//                           move_uploaded_file($post_image_temp, "../images/$post_image");
    


        
        if(!empty($user_password) ){
            
            $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
            $get_user_query = mysqli_query($connector->getConnection(), $query_password);
            
            $row = mysqli_fetch_array($get_user_query);
            
            $db_user_password = $row['user_password'];
            
               if($db_user_password != $user_password){
                   
            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10) );
            
               }
            
            
        $query ="UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="user_role = '{$user_role}', ";
        $query .="username = '{$username}', ";
        $query .="user_email = '{$user_email}', ";
        $query .="user_password = '{$hashed_password}' ";
    
        $query .="WHERE user_id = '{$the_user_id}' ";
        
        $edit_user_query = mysqli_query($connector->getConnection(),$query);
            
        echo "User Was Successfully Updated" . "<a href='users.php'>View Users?</a>";

        }

        
    }
        
} else{

header( "Location: index.php" );
        
    }

?>




<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value=" <?php echo $user_firstname; ?>">
    </div>
    
    <div class="form-group">
        <div class="lastname">
            <label for="post_status">Last Name</label>
            <input type="text" class="form-control" name="user_lastname" value=" <?php echo $user_lastname; ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label for="user_role">User Role</label>
        <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>r"><?php echo $user_role; ?></option>
              
                <?php 
                    if($user_role == 'admin'){

                        echo "<option value='subscriber'>subscriber</option>";
                    }else{

                        echo "<option value='admin'>Admin</option>";
                    }

                ?>
        </select>
    </div>
    
  

<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
-->
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value=" <?php echo $username; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email" value=" <?php echo $user_email; ?>">
    </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password" value=" <?php echo $user_password; ?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit"  name="edit_user" value="Update User">
    </div>

</form>