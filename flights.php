<?php
    include("header.php");
    $con = new connec(); 

    
    $departure_city = isset($_GET["departure_city"]) ? $_GET["departure_city"] : "";
    $arrival_city = isset($_GET["arrival_city"]) ? $_GET["arrival_city"] : "";
    $departure_date = isset($_GET["departure_date"]) ? $_GET["departure_date"] : "";

    $query = "SELECT * FROM flights 
              WHERE departure_airport = '$departure_city' 
              AND arrival_airport = '$arrival_city'
              AND DATE(departure_datetime) = '$departure_date'";

    $result = $con->conn->query($query); 
?>

<section class="mt-5">
    <h3 class="text-center">Available Flights</h3>
    
    <div class="container mt-1 mb-3">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $air = $con->select("airline", $row["airline_id"]);
                    $airrow = $air->fetch_assoc();

                    ?>
                    <div class="col-md-3 mt-5 align-items-center">
                        <div class="d-flex">
                            <h5><?php echo $row["departure_airport"]; ?></h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" align-items-bottom fill="currentColor" class="bi bi-arrow-right mt-1 ml-2 mr-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l-4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                            </svg>
                            <h5><?php echo $row["arrival_airport"]; ?></h5>
                        </div>

                        <h6><?php echo $airrow["airline_name"]; ?></h6>

                        <div class="d-flex">
                            <p><?php echo $row["departure_datetime"]; ?></p>
                            <p><?php echo $row["arrival_datetime"]; ?></p>
                        </div>
                        <p>Base Price: Rs. <?php echo $row["base_price"]; ?></p>
                        <!-- Pass the flight ID in the URL -->
                        <a href="booking.php?flight_id=<?php echo $row['flight_id']; ?>" class="btn btn-dark" style="width:100%">Book</a>
                    </div>

                    <?php
                }
            } else {
                echo "<div class='col-md-12 text-center'><p>No flights found matching your criteria.</p></div>";
            }
            ?>
        </div>
    </div>

</section>

<?php
    include("footer.php");
?>
