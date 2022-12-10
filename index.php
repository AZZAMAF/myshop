<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5"></div>
    <h2>List Of Clients</h2>
    <a href="btn btn-primary" href="/OPRATIONS/index.php" role="button">New Clients</a>
<br>
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone </th>
<th>Address</th>
<th>Created At</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php


    $serverName ="localhost";
    $username ="root";
    $password ="";
    $database ="myshop";

    // Create Connection
    $connection = new mysqli($serverName,$username,$password,$database);

    // Chek Connection
    if($connection->connect_error){
        die ("connection failed:" .$connection->connect_error);
    }
    
// Read All row Database table 
$sql = "SELECT * FROM clients ";
$result = $connection->query($sql);

if (!$result){
    die("invalid query: " . $connection);

}

// READ data of each Row
while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td>$row[id]</td>
    <td>$row[name]</td>k
    <td>$row[email]</td>
    <td>$row[phone]</td>
    <td>$row[address]</td>
    <td>$row[created_at]</td>
    <td>
    <a class='btn btn-primary btn-sm'  href='/OPRATIONS/edit.php?id=$row[id]'>Edit</a>
    <a class='btn btn-danger btn-sm' href='/OPRATIONS/Delate.php?id=$row[id]'>Delate</a>
    </td>

</tr>
    ";
}

    ?>

  
</tbody>
</table>

</body>
</html>
<!-- ('Bill Gates', 'bill.gates@microsoft.com', '+123456789', 'New York, USA'),
 -->