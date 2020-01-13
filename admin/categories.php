<?php 
include "includes/admin_header.php";
include "functions.php";
?>
<body>

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

                        <div class="col-xs-6">

                        <?php insert_categories();
                        ?>

                        <form action=""  method="POST">
                        <div class="form-group">
                        <label for="cat_title">Add Category</label>
                        <input type="text" class="form-control" name="cat_title">
                        </div>
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Categories">
                        </div>
                        </form>

                    <?php //update and includes
                    if(isset($_GET['edit'])){
                        $cat_id = $_GET['edit'];

                        include "includes/update_categories.php";

                    } ?>

                        </div><!-- Add Category Form -->

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </th>
                                <tbody>

                            <?php //select all categoris
                            findAllCategories();
                            ?> 

                            <?php //delete categories query
                            deleteCategories();                            
                            ?>

                                </tbody>
                            </table>
                        </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->  
        <?php include "includes/admin_footer.php"; ?>