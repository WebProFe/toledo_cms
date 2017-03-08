<?php

function insertCategories(){
    
    global $connector;
    
     if(isset($_POST['submit'])){

       $cat_title = $_POST['cat_title'];

        if($cat_title =="" || empty($cat_title) ){
            echo "This field should not be empty!";
        } else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connector->getConnection(),$query);

            if(!$create_category_query){
                die('Query Failed' . mysqli_error($connector->getConnection()));
            }
        }
    }
}
    

function findAllCategories(){
    
    global $connector;
    
    $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connector->getConnection(),$query);

        while($row = mysqli_fetch_assoc($select_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "<tr>";
        }
}


function deleteCategories(){
    
    global $connector;
    
     if(isset($_GET['delete'])){
                                        
        $get_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
        $delete_query = mysqli_query($connector->getConnection(),$query);
        header("Location: categories.php");


    }
                                    
}

?>