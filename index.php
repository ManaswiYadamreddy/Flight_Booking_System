<?php
    include("header.php");
    /* include("conn.php"); */

    if (empty($_SESSION["username"])) {
        ?>
            <script>
                $(document).ready(function() {
                    console.log("Script is running");
                    $('#registerModal').modal('show');
                });
            </script>
        <?php
    }
?>

<div class="container check-form mt-5" style="align-center">
  <div class="row">
    <div class="col-lg-12 bg-white shadow p-4 rounded">
      <h5 class="mb-4">Check Flights</h5>
      <form method="GET" action="flights.php">
        <div class="row justify-center">

          <div class="col-lg-3">
            <label class="form-label" style="font-weight: 500">From</label>
            <input type="text" class="form-control shadow-none" placeholder="Departure City" name="departure_city">
          </div>

          <div class="col-lg-3">
            <label class="form-label" style="font-weight: 500">To</label>
            <input type="text" class="form-control shadow-none" placeholder="Arrival City" name="arrival_city">
          </div>

          <div class="col-lg-3">
            <label class="form-label" style="font-weight: 500">Departure Date</label>
            <input type="date" class="form-control shadow-none" name="departure_date">
          </div>

        <!--   <div class="col-lg-3">
            <label class="form-label" style="font-weight: 500">Return Date</label>
            <input type="date" class="form-control shadow-none" name="return_date">
          </div>
 -->
          <div class="col-lg-1 mb-1 mt-4">
            <button type="submit" class="btn btn-dark">Book</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

<?php
    include("footer.php");
?>
