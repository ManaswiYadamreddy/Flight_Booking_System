<?php

class connec{
    public $username="root";
    public $password="";
    public $server_name="localhost";
    public $db_name="flight_booking";

    public $conn;

    function __construct()
    {
        $this -> conn=new mysqli($this->server_name, $this->username, $this->password, $this->db_name);
        if($this->conn->connect_error)
        {
            die("Connection Failed");
        }
    }

    function select_all($table_name)
    {   
        $sql = "SELECT * FROM $table_name";
        $result = $this->conn->query($sql);

        return $result;
    }

    function select($table_name, $id)
    {   
        $sql = "SELECT * FROM $table_name WHERE id=$id";
        $result = $this->conn->query($sql);

        return $result;
    }

    function insert($query, $msg)
    {
        if ($this->conn->query($query) === TRUE) {
            echo '<script> alert("' . $msg . '")</script>';
        } else {
            echo '<script> alert("' . $this->conn->error . '")</script>';
        }
    }

    function select_login($table_name, $email)
    {   
        $sql = "SELECT * FROM $table_name WHERE email='$email'";
        $result = $this->conn->query($sql);

        return $result;
    }

    function insert_lastid($query)
    {
        $last_id;
        if($this->conn->query($query)===TRUE)
        {
            $last_id=$this->conn->insert_id;
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;  
        }
        return $last_id;
    }

    function select_flights()
    {   
        $sql = "SELECT flights.flight_id, flights.departure_airport, flights.arrival_airport,flights.departure_datetime, flights.arrival_datetime, flights.base_price, airline.airline_name FROM flights, airline WHERE flights.airline_id=airline.id";
        $result = $this->conn->query($sql);

        return $result;
    }

    function select_airlines()
    {   
        $sql = "SELECT * FROM `airline`";
        $result = $this->conn->query($sql);

        return $result;
    }
    
    function select_customers()
    {   
        $sql = "SELECT * FROM `customer`";
        $result = $this->conn->query($sql);

        return $result;
    }

    function select_bookings()
    {   
        $sql="SELECT booking.booking_id, booking.customer_id, customer.first_name, customer.last_name, booking.flight_id, booking.booking_datetime, booking.seat_number, booking.total_price FROM `booking`, `customer` WHERE booking.customer_id=customer.customer_id";
        $result = $this->conn->query($sql);

        return $result;
    }

    /* function delete($table_name, $id)
    {
        $query="DELETE FROM $table_name WHERE id=$id";
        if($this->conn->query($query)===TRUE)
        {
            echo '<script> alert("Flight Successfully Deleted!");</script>' ;   
        }
        else
        {
            echo '<script> alert("'.$this->conn->error.'");</script>' ; 
        }
    } */

    function delete_flight($table_name, $column_name, $value) {
        
        $query = "SELECT * FROM booking WHERE $column_name = $value";
        $result = $this->conn->query($query);
    
        if ($result->num_rows > 0) {
            echo '<script> alert("Cannot delete flight because there are existing bookings.");</script>';
            return;
        }
    
        
        $query = "DELETE FROM $table_name WHERE $column_name = $value";
        if ($this->conn->query($query) === TRUE) {
            echo '<script> alert("Flight successfully deleted.");</script>';
        } else {
            echo '<script> alert("' . $this->conn->error . '");</script>';
        }
    }
    


}



?>