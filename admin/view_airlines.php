<?php
    include("admin_header.php");
    
    $con=new connec();
    $tbl="flights";
    $result=$con->select_airlines($tbl);

?>

<h4 style="text-align: center;" class="mt-3">View Airlines</h4>

<section>
    <div class="container">
        <class class="row">
            <div class="col-md-10">
                <a href="add_airlines.php">Add Airline</a>

                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col">Airline ID</th>
                        <th scope="col">Airline Name</th>
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
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["airline_name"]; ?></td>  
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