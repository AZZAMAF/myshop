<?php

$serverName ="localhost:3307";
$username ="root";
$password ="";
$database ="myshop";

// Create Connection
$connection = new mysqli($serverName,$username,$password,$database);


$name ="";
$email ="";
$phone ="";
$address ="";

$erorMessage ="";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD']=='post'){
    $name =$_POST["Name"];
    $email =$_POST["Email"];
    $phone =$_POST["Phone"];
    $address =$_POST["Address"];

    do{
        if(empty($name) || empty($email) || empty($phone) ||  empty($address) ) {
            $erorMessage = "All the fields are required";
            break;
        }
        // add new client to database
        $sql = "INSERT INTO clients (name,email,phone, address)";
                "VALUES('$name', '$email', $phone, '$address')";
        $result = $connection->query($sql);

        if ($result) {
            $erorMessage = "Invalid query: " . $connection->error;
        
            break;
             }
    

        $name ="";
        $email ="";
        $phone ="";
        $address ="";

        $successmessage = "Client added correctly";


    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
       <h2>New Client</h2>

<?php
if(  !empty($erorMessage)){
    echo "
<div class='arlet arlet-warning arlet-dismissable fade show' role='arlet'>
<strong>$erorMessage</strong>
<button type='button' class='btn-close' data-bs-dismiss='arlet' aria-label='close'></button>
</div>
";

}




?>


        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col0-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="name " value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col0-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="email " value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col0-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="phone " value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col0-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="address " value="<?php echo $address; ?>">
                </div>
            </div>



<?php
if ( !empty($successMessage)) {
    echo "
        <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
                <div class='arlet arlet-success arlet-dismissable fade show' role='arlet'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='arlet' aria-label></button>
                </div>
         </div>
    </div>
";

}

?>

         
<div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit"class="btn btn-primary">submit</button>
    </div>
    <div class="col-sm-3 d-grid">
        <a href="btn btn-outline-primary" href="/myshop/index.php/" role="button">cancel</a>
    </div>
</div>

        </form>
 </div>
</body>
</html>