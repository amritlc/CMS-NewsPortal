<?php 

function confirmQuery($result){
    global $connection;
     if(!$result){
        die("QUERY FAILED".mysqli_error($connection));
    }
}

function insert_categories(){

                        global $connection;
                        if(isset($_POST['submit'])){

                        $cat_title = $_POST['cat_title'];

                        if($cat_title == "" || empty($cat_title)){
                            echo "This field cannot be empty";

                        }else{

                            $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";

                            $create_categories_title = mysqli_query($connection,$query);

                            if(!$create_categories_title){
                                die("QUERY FAILED".mysqli_error($create_categories_title));
                            }
                        }
                    }
}

function findAllCategories(){
                global $connection;
                $query = "SELECT * FROM categories";

                $select_categories = mysqli_query($connection,$query);

                if(!$select_categories){
                    die('QUERY FAILED'.mysqli_error());
                }


                        while($row = mysqli_fetch_assoc($select_categories)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            
                            echo "<tr>";
                            echo "<td>{$cat_id}</td>";
                            echo "<td>{$cat_title}</td>";
                            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                            echo "</tr>";
                        }

}

function deleteCategories(){
    global $connection;     
                            if(isset($_GET['delete'])){

                                $get_cat_id = $_GET['delete'];

                                $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
                                $delete_cat = mysqli_query($connection,$query);
                                header("Location: categories.php");

                            }
}






?>