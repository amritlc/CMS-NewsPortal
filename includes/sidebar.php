 <div class="col-md-4">

                <?php 
               

                
                ?>

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div></form>
                    <!-- /.input-group -->
                </div>


                <!-- Login -->
                <div class="well">

                <?php if(isset($_SESSION['user_role'])): ?>
                <h4>Logged in as <?php echo $_SESSION['user_name'] ?></h4>

                <a href="includes/logout.php" class="btn btn-primary">Logout</a>

                <?php else: ?>
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                        
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" name="login" type="submit">Login</button>
                        
                        
                        </span>
                        
                    </div>
                    <div>
                    <h5>Don't have an account ? Register here:</h5>
                    </div>
                    </form>
                    <form action="registration.php" method = 'post'>
                    <div>
                    <span class="input-group-btn">

                    <button style="border-radius: 25px;background-color: #5d5b6a;color: white;border: 2px solid white;" class="btn btn-primary" name="registration" type="submit">Register Now</button>
                    </span>
                    </div>
                    </form>
                <?php endif; ?>

                    
                    <!-- /.input-group -->
                </div>




                <!-- Blog Categories Well -->
                <div class="well">

                
                <?php
                

                $query = "SELECT * FROM categories";

                $select_categories_sidebar = mysqli_query($connection,$query);

                if(!$select_categories_sidebar){
                    die('QUERY Failed'.mysqli_error());
                }

                   ?>

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php 
                            

                        while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }
                    
                            ?>

                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>




                <!-- Side Widget Well -->
  
            <?php include "widget.php"; ?>

            </div>

        </div>