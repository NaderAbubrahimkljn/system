<?php include('config/constants.php'); ?>
<?php include('auth_session.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website  responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/pizza.jpg" type="image/x-icon">
    <title>Restaurant Website</title>

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                    <a href="<?php echo SITEURL; ?>contactus.php">Contact Us</a>
                    
                    </li>
                    <li>
                    <a href="<?php echo SITEURL; ?>bill.php">My Cart</a> 
                    
                    </li>
                    <li>
                    <a href="<?php echo SITEURL; ?>logout.php">Logout</a>
                    
                    </li>
                   
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->