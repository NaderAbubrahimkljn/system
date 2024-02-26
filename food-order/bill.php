<?php include('partials-front/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>. <?php echo $_SESSION['username']; ?>  this is your Cart</h1>
        <link rel="stylesheet" href="bill.css"/> 

                <br /><br /><br />
                <?php 
                     if(isset($_SESSION['order']))
                       {
                        echo $_SESSION['order'];
                        unset($_SESSION['order']);
                       }
                 ?>
                   
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Total of all order</th>
                    </tr> 

                    <?php 
                    $customer_name=$_SESSION['username'];
                        //Get all the orders that correspond customer make it from  database
                       $sql = "SELECT * FROM tbl_order WHERE customer_name='$customer_name' ORDER BY id DESC LIMIT 30 "; // DIsplay the Latest Order at First
                       //$sql=" SELECT t1.* FROM tbl_order AS t1, users AS t2 WHERE t1.customer_name = t2.username ORDER BY order_date DESC Limit 1";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                               
                                
                                ?>

                                    <tr>
                                        <td>.<?php echo $sn++; ?>. </td>
                                        <td>.<?php echo $food; ?></td>
                                        <td>.<?php echo $price; ?>$</td>
                                        <td>.<?php echo $qty; ?></td>
                                        <td>.<?php echo $total; ?>$</td>
                                        <td>.<?php echo $order_date; ?></td>


                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td><?php } ?>
                                        <?php 
                                        
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $customer_name=$_SESSION['username'];

                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE customer_name='$customer_name' AND status='Ordered'";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total']; 

                    ?>

                    <td><?php echo $total_revenue; ?>$</td>
                                    </tr>

                                <?php

                            
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials-front/footer.php'); ?>