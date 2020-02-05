<?php
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Customer.php');

    //instatiate customer
    $customer =  new Customer();

    //Get Customer
    $customers = $customer->getCustomers();

    //print_r($customers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view customers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
    <div class="btn-group" role="group">
        <a href="customers.php" class="btn btn-primary">Customers</a>
        <a href="transactions.php" class="btn btn-success">Transactions</a>
    </div>
    <hr>
        <h2>Customers</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead> 
            <tbody>
                <?php foreach($customers as $cust):?>
                <tr>
                    <td><?=$cust->id;?></td>
                    <td><?=$cust->first_name;?> <?=$cust->first_name;?></td>
                    <td><?=$cust->email;?></td>
                    <td><?=$cust->created_at;?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table><br>
        <a href="index.php">Pay Page</a>
    </div>
</body>
</html>