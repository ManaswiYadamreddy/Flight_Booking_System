<?php
    include("admin_header.php");
    
    $con=new connec();
    $tbl="customer";
    $result=$con->select_customers($tbl);

?>

<h4 style="text-align: center;" class="mt-3">View Customers</h4>

<section>
    <div class="container">
        <class class="row">
            <div class="col-md-10">

                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col">Customer ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email ID</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Password</th>
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
                                    <td><?php echo $row["customer_id"]; ?></td>
                                    <td><?php echo $row["first_name"]; ?></td>
                                    <td><?php echo $row["last_name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["ph_no"]; ?></td>
                                    <td><?php echo $row["password"]; ?></td>   
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