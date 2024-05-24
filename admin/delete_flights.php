<?php
    include("admin_header.php");
    
    $dcity="";
    $acity="";
    $dtime="";
    $atime="";
    $basep="";
    $airid="";

    /* if(isset($_GET["flight_id"]))
    {
        $id=$_GET["flight_id"];
        $con=new connec();
        $tbl="flights";
        $result=$con->select($tbl,$id);

        if(result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            
            $dcity=$row["departure_city"];
            $acity=$row["arrival_city"];
            $dtime=$row["departure_datetime"];
            $atime=$row["arrival_datetime"];
            $basep=$row["base_price"];
            $airid=$row["airline_id"];

        }
    }
 */
    
    /* if(isset($_POST["btn_delete"]))
    {
        $id=$_GET["id"];
        $table="flights";

        $con=new connec();

        $con->delete($table,$id);
        header("Location:view_flights.php");
    } */

    if (isset($_POST["btn_delete"])) {
        $id = $_GET["id"];
        $table = "flights";
    
        $con = new connec();
        $con->delete_flight($table, "flight_id", $id);
        header("Location:view_flights.php");
    }


?>

<h4 style="text-align: center;" class="mt-3">Delete Flight</h4>

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
                           
                            <button type="submit" name="btn_delete" class="btn btn-dark shadow-none mr-0">Delete Flight</button>
                            <a href="view_flights.php" type="submit" name="btn_delete" class="btn btn-dark shadow-none mr-0">Cancel</a>

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