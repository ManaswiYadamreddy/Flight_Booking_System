<?php
session_start();  
$_SESSION["admin_username"]="";

if (isset($_POST["btn_login"])) {
    $username = $_POST["log_name"];
    $password = $_POST["log_password"];

    if ("admin" == $username && "adminpass" == $password) {
        $_SESSION["admin_username"] = $username;
        header("Location: dashboard.php");
        exit();  // Don't forget to call exit after headers
    } else {
        echo '<script>alert("Access Denied");</script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h4 class="modal-title mt-5" style="text-align: center;" id="exampleModalLabel">Admin Login</h4>
    <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" id="email" name="log_name" class="form-control">  <!-- Changed type to text -->
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="log_password" class="form-control">
                        </div>
                        <div>
                            <button type="submit" name="btn_login" class="btn btn-dark shadow-none">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
