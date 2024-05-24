<?php
    include("admin_header.php");
    
    if(isset($_POST["btn_add"]))
    {

        $airname=$_POST["airname"];

        $con=new connec();
        $sql="insert into airline values(0,'$airname')";
        $con->insert($sql, "Airline Added Successfully!");
        header("Location:view_airlines.php");
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
                            <label class="form-label" >Airline Name</label>
                            <input type="text" name="airname" required class="form-control" >
                            </div>
                            <button type="submit" name="btn_add" class="btn btn-dark shadow-none mr-0">Add Airline</button>

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