<?php
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Transaction.php');

    //instatiate transaction
    $transaction =  new Transaction();

    //Get Transaction
    $transactions = $transaction->getTransactions();

    //print_r($customers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view Transactions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
    <div class="btn-group" role="group">
        <a href="customers.php" class="btn btn-success">Customers</a>
        <a href="transactions.php" class="btn btn-primary">Transactions</a>
    </div>
    <hr>
        <h2>Transactions</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead> 
            <tbody>
                <?php foreach($transactions as $trans):?>
                <tr>
                    <td><?=$trans->id;?></td>
                    <td><?=$trans->customer_id;?>
                    <td><?=$trans->product;?></td>
                    <td><?=sprintf('%.2f',$trans->amount/100);?> <?=strtoupper($trans->currency);?></td>
                    <td><?=$trans->created_at;?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table><br>
        <a href="index.php">Pay Page</a>
    </div>
</body>
</html>