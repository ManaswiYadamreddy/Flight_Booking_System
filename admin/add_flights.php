<?php
    include("admin_header.php");
    
    if(isset($_POST["btn_add"]))
    {

        $dep_city=$_POST["dep_city"];
        $arr_city=$_POST["arr_city"];
        $dep_datetime=$_POST["dep_datetime"];
        $arr_datetime=$_POST["arr_datetime"];
        $base_price=$_POST["base_price"];
        $airline_id=$_POST["airline_id"];

        $con=new connec();
        $sql="insert into flights values(0,'$dep_city','$arr_city','$dep_datetime','$arr_datetime',$base_price,$airline_id)";
        $con->insert($sql, "Flight Successfully Added!");
        header("Location:view_flights.php");
    }


?>

<h4 style="text-align: center;" class="mt-3">Add Flights</h4>

<section>
    <div class="container">
        <class class="row">
            <div class="col-md-10">
                
                <form method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                            
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                            <label class="form-label" >Departure City</label>
                            <input type="text" name="dep_city" required class="form-control" >
                            </div>
                            <div class="mb-3">
                            <label class="form-label" >Arrival City</label>
                            <input type="text" name="arr_city" required class="form-control" >
                            </div>
                            <div class="mb-3">
                            <label class="form-label" >Departure Datetime</label>
                            <input type="datetime-local" name="dep_datetime" required class="form-control" >
                            </div>
                            <div class="mb-3">
                            <label class="form-label" >Arrival Datetime</label>
                            <input type="datetime-local" name="arr_datetime" required class="form-control" >
                            </div>
                            <div class="mb-3">
                            <label class="form-label" >Base Price</label>
                            <input type="number" name="base_price" required class="form-control" >
                            </div>
                            <div class="mb-3">
                            <label class="form-label" >Airline ID</label>
                            <input type="number" name="airline_id" required class="form-control" >
                            </div>
                            <button type="submit" name="btn_add" class="btn btn-dark shadow-none mr-0">Add Flight</button>

                            </div>
                            
                        </div>

                    </form>

            </div>
        </class>
    </div>
</section>


<?php
include("admin_footer.php");
?>