<?php
    include("admin_header.php");
    
    $con=new connec();
    $tbl="flights";
    $result=$con->select_bookings($tbl);

?>

<h4 style="text-align: center;" class="mt-3">View Bookings</h4>

<section>
    <div class="container">
        <class class="row">
            <div class="col-md-10">

                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Customer First Name</th>
                        <th scope="col">Customer Last Name</th>
                        <th scope="col">Flight ID</th>
                        <!-- <th scope="col">Airline Name</th> -->
                        <!-- <th scope="col">Seat ID</th> -->
                        <th scope="col">Booking Datetime</th>
                        <th scope="col">Seat Number</th>
                        <th scope="col">Total Price</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result->num_rows>0)
                            {
                                while($row=$result->fetch_assoc())
                                {
                                    ?>
                                    <tr>
                                    <td><?php echo $row["booking_id"]; ?></td>
                                    <td><?php echo $row["customer_id"]; ?></td>
                                    <td><?php echo $row["first_name"]; ?></td>
                                    <td><?php echo $row["last_name"]; ?></td>
                                    <td><?php echo $row["flight_id"]; ?></td>
                                    <!-- <td><?php echo $row["airline_name"]; ?></td> -->
                                    <td><?php echo $row["booking_datetime"]; ?></td>
                                    <td><?php echo $row["seat_number"]; ?></td>   
                                    <td><?php echo $row["total_price"]; ?></td>   
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>

            </div>
        </class>
    </div>
</section>


<?php
include("admin_footer.php");
?>