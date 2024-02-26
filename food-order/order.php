
<?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether food id is set or no
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?><?php
    //CHeck whether food id is set or no
     $username=$_SESSION['username'];
        //Get the Food id and details of the selected food
        

        //Get the DEtails of the SElected Food
        $sql3 = "SELECT * FROM users WHERE username='$username'";
        //Execute the Query
        $res3 = mysqli_query($conn, $sql3);
        //Count the rows
        $count3 = mysqli_num_rows($res3);
        //CHeck whether the data is available or not
        if($count3==1)
        {
            //WE Have DAta
            //GEt the Data from Database
            $row = mysqli_fetch_assoc($res3);

            $email = $row['email'];
            $phone=$row['phone'];
            $addres=$row['addres'];
            
        }
       
   
    ?> 

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            <link rel="stylesheet" href="order.css">
            
            <h2 class="text-center text-white">Please set the quatntity of selected food to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input  type="number" min="1" name="qty" class="input-responsive" value="1" required>
                        
                
                    </div> 

                    
                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <p>All your order details is geting wen you registred in the system enjoy!!!!!!!</p>
                    <legend> Enter your address :</legend>
                    <input name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" value="<?php echo $addres; ?>" required>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    
                </fieldset>

            </form>
  
            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_SESSION['username'];//get the username phone email for coresponding customer from table users
                    $customer_contact = $phone;
                    $customer_email = $email;
                    $customer_address = mysqli_real_escape_string($conn, $_POST['address']);//if customer want to change address of hes order and i add function to avoid database injection by customer


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL.'bill.php');
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>
<div class="container">
					<div class="alert alert-success my-5 py-5"> 
						

						<h3 class="text-center">Return To <a href="index.php" class="text-decoration-none fw-bolder"><b>Menu</b></a></h3>
					</div>
				</div>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>