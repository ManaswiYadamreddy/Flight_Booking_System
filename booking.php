<?php

    session_start();

    if (empty($_SESSION["username"])) {
        header("Location: index.php");
    } else {
        include("header.php");
    }

    $con = new connec();

$flight_id = isset($_GET['flight_id']) ? intval($_GET['flight_id']) : 0;

if ($flight_id > 0) {
    $query = "SELECT * FROM flights WHERE flight_id = $flight_id"; 
    $flight_data = $con->conn->query($query); 

    if ($flight_data->num_rows > 0) {
        $flight_details = $flight_data->fetch_assoc();
        $base_price = intval($flight_details["base_price"]); 
        $departure_datetime = new DateTime($flight_details["departure_datetime"]); 
    } else {
        echo "<p>Flight not found.</p>";
        exit;
    }
} else {
    echo "<p>Invalid flight ID.</p>";
    exit;
}


    if(isset($_POST["btn_booking"]))
    {
        $con=new connec();

        $customer_id=$_POST["customer_id"];
        $flight_id=$_POST["flight_id"];
        $no_seats=$_POST["no_seats"];
        $seat_details=$_POST["seat_dt"];    
        $booking_date=$_POST["booking_date"];
        //$total_amount=3000;

        $booking_datetime = new DateTime($booking_date);
        $interval = $booking_datetime->diff($departure_datetime);
        $days_until_departure = intval($interval->days);

        $extra_charge_per_day = 100; 
        $surcharge = max(0, (30 - $days_until_departure) * $extra_charge_per_day); 
        $final_price = $base_price + $surcharge;

        $total_amount = intval($final_price) * $no_seats;
        
        $sql="insert into seat_detail values(0, $customer_id, $flight_id, '$seat_details')";
        $seat_id=$con->insert_lastid($sql);

        $sql="insert into booking values(0, $customer_id, $flight_id,$seat_id, '$booking_date', '$seat_details', $total_amount)";
        $con->insert($sql,"Your ticket is booked!");

    }
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    
    var rows = 6;
    var cols = 9;
    var seatLetters = ["A", "B", "C", "D", "E", "F", "G", "H", "I"];
    var selectedSeats = new Set(); // To track selected seats

    for (var i = 1; i <= rows; i++) {
        var rowDiv = $('<div class="row seat-row"></div>');
        for (var j = 1; j <= cols; j++) {
            var seatId = seatLetters[j - 1] + i;
            var seatDiv = $('<div class="col-md-1 seat" id="seat' + seatId + '" data-seat="' + seatId + '">' + seatId + '</div>');
            rowDiv.append(seatDiv);

            var checkbox = $('<input type="checkbox" id="checkbox_' + seatId + '" name="seat_chart[]" value="' + seatId + '" hidden>');
            $('#seat-chart').append(checkbox);
        }
        $('#seat-chart').append(rowDiv);

        if (i == 3) {
            var aisleGap = $('<div class="col-md-12 gap"></div>'); 
            $('#seat-chart').append(aisleGap);
        }
    }

    
    $('.seat').click(function() {
        var seatId = $(this).data('seat');
        if (selectedSeats.has(seatId)) {
            selectedSeats.delete(seatId); // Deselect seat
            $('#checkbox_' + seatId).prop('checked', false);
            $(this).removeClass('selected');
        } else {
            selectedSeats.add(seatId); // Select seat
            $('#checkbox_' + seatId).prop('checked', true);
            $(this).addClass('selected');
        }

        checkboxtotal(); 
    });

    function checkboxtotal() {
        var seatCount = selectedSeats.size; 
        document.getElementById("no_seats").value = seatCount; 
        var total = "Rs. " + (seatCount * 3000); 
        $('#price_details').text("Rs. " + total); 
        document.getElementById("total_amt").value = total;

        $('#seat_dt').val(Array.from(selectedSeats).join(", "));
    }

    var today = new Date();
    var year = today.getFullYear();
    var month = String(today.getMonth() + 1).padStart(2, '0'); 
    var day = String(today.getDate()).padStart(2, '0');
    var formattedDate = `${year}-${month}-${day}`;

    $('input[name="booking_date"]').val(formattedDate);

});
</script>

<style>
.seat {
    padding: 10px;
    border: 1px solid #ccc;
    margin: 5px;
    cursor: pointer;
    background-color: #f0f0f0;
    text-align: center;
}

.selected {
    background-color: #6c757d; 
    color: white;
}

.seat-row {
    display: flex;
    justify-content: space-between; 
}

.gap {
    height: 50px; 
}
</style>




<div class="row mt-3">

    <div class="col-md-6">
        <div id="seat-map">
            <h5>Select Seat</h5>
            <div id="seat-chart"> 
                
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Fill in the details to book your ticket.</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label>Customer ID</label>
                                <input type="text" name="customer_id" class="form-control" readonly required value="<?php echo $_SESSION["customer_id"]; ?>" >
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Flight ID</label>
                                <input type="text" name="flight_id" class="form-control" required value="<?php echo $flight_id; ?>" readonly>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Number of Tickets</label>
                                <input type="number" name="no_seats" class="form-control" required id="no_seats" readonly>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Seat Details</label>
                                <input type="text" name="seat_dt" class="form-control" id="seat_dt" required readonly>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Total Amount to be Paid</label>
                                <input type="text" name="total_amt" id="total_amt" class="form-control" required readonly>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Booking Date</label>
                                <input type="date" name="booking_date" readonly required class="form-control">
                            </div>
                        </div>

                        <div class="text-center my-3">
                            <button type="submit" name="btn_booking" class="btn btn-dark">Confirm Booking</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
include("footer.php");
?>