<?php 
include "includes/admin_header.php";
include "functions.php";
?>
<body>

<?php 

if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE user_name = '{$username}' ";
    $select_user_profile_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_array($select_user_profile_query)){
        $user_id = $row['user_id'];
                            $user_name = $row['user_name'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $user_image = $row['user_image'];
                            $user_role = $row['user_role'];
    }
}





?>

<?php 

if(isset($_POST['edit_user'])){

   // $the_user_id = $_POST['edit_user'];
    $user_firstname = $_POST['user_firstname'];

    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
/*
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
*/
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //$post_date = date('d-m-y');

   // move_uploaded_file($post_image_temp, "../images/$post_image ");

    $query = "UPDATE users SET ";
            $query .="user_firstname  = '{$user_firstname}', ";
            $query .="user_lastname = '{$user_lastname}', ";
            $query .="user_role = '{$user_role}', ";
            $query .="user_name = '{$user_name}', ";
            $query .="user_email   = '{$user_email}', ";
            $query .="user_password= '{$user_password}' ";
            $query .= "WHERE user_name = '{$username}' ";

            $edit_user_query = mysqli_query($connection,$query);

            confirmQuery($edit_user_query);
    
}








?>


    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                            <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                
            
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="author">Firstname</label>
    <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">    
</div>
<div class="form-group">
    <label for="author">Lastname</label>
    <input type="text"  value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">    
</div>

<div class="form-group">
    <!--<label for="post_category">Post Category Id</label>-->
    <select name="user_role" id="">

    <option value="subscriber"><?php echo $user_role; ?></option>

    <?php 
    
    if($user_role == 'admin'){
        echo "<option value='subscriber'>subscriber</option>";

    }else{
        echo "<option value='admin'>admin</option>";
    }
    
    
    
    ?>

    
    </select>
</div>



<!--<div class="form-group">
    <label for="post_user">Post User</label>
    <input type="text" class="form-control" name="post_user">    
</div>-->


<!--<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">    
</div>-->

<div class="form-group">
    <label for="post_tags">Username</label>
    <input type="text"  value="<?php echo $user_name; ?>" class="form-control" name="user_name">    
</div>

<div class="form-group">
    <label for="post_content">Email</label>
    <input type="email"  value="<?php echo $user_email; ?>" class="form-control" name="user_email">    

</div>
<div class="form-group">
    <label for="post_content">Password</label>
    <input type="password"  value="<?php echo $user_password; ?>" class="form-control" name="user_password">    

</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">    
</div>

</form>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->  
        <?php include "includes/admin_footer.php"; ?>