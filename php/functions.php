
<?php include "connect_database.php";

function showAllData(){
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
        if( !$result){
            die('Query Failed' . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($result)){
                $id = $row['User_Id'];

                echo "<option value='$id'>$id</option>";
         }
    
    
}


function updateUsers(){
    global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];
    
    //Sanitizing inputs
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    //password encryption using Blowfish function
    $hashFormat = "$2y$10$";
    $salt = "fernandoeselmaschingon";
    $hash_salt = $hashFormat . $salt;
    $password = crypt($password,$hash_salt);
        
        $query = "UPDATE users SET ";
        $query .= "username = '$username', ";
        $query .= "password = '$password' ";
        $query .= "WHERE User_Id = $id ";
        
        $result = mysqli_query($connection, $query);
        
        if(!$result){
            die("your Query failed");
        }
}


  
function deleteUsers(){
    global $connection;
        $id = $_POST['id'];
        
        $query = "DELETE FROM users ";
        $query .= "WHERE User_Id = $id ";
        
        $result = mysqli_query($connection, $query);
        
        if(!$result){
            die("your Query failed");
        }
}






?>