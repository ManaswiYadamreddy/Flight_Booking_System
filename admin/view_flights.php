<?php
    include("admin_header.php");
    
    $con=new connec();
    $tbl="flights";
    $result=$con->select_flights($tbl);

?>

<h4 style="text-align: center;" class="mt-3">View Flights</h4>

<section>
    <div class="container">
        <class class="row">
            <div class="col-md-10">
                <a href="add_flights.php">Add Flights</a>

                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col">Flight ID</th>
                        <th scope="col">Departure Airport</th>
                        <th scope="col">Arrival Airport</th>
                        <th scope="col">Departure Datetime</th>
                        <th scope="col">Arrival Datetime</th>
                        <th scope="col">Base Price</th>
                        <th scope="col">Airline</th>
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
                                    <td><?php echo $row["flight_id"]; ?></td>
                                    <td><?php echo $row["departure_airport"]; ?></td>
                                    <td><?php echo $row["arrival_airport"]; ?></td>
                                    <td><?php echo $row["departure_datetime"]; ?></td>
                                    <td><?php echo $row["arrival_datetime"]; ?></td>
                                    <td><?php echo $row["base_price"]; ?></td>
                                    <td><?php echo $row["airline_name"]; ?></td> 
                                    <td>
                                        <a href="delete_flights.php?id=<?php echo $row["flight_id"]; ?>">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </a>
                                    </td>   
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