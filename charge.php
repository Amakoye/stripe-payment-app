<?php
    require_once('vendor/autoload.php');
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Customer.php');
    require_once('models/Transaction.php');

    \Stripe\Stripe::setApiKey('sk_test_Alr3cBT40OLp57BPgPAZFcaP00NF24nt7N');

    //sanitize post array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $firstname = $POST['first_name'];
    $lastname = $POST['last_name'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    //echo $token;
    //Create a customer in stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token
    ));

    //charge customer
    $charge = \Stripe\Charge::create(array(
        "amount" => 5000,
        "currency" => "usd",
        "description" => "Intro to React course",
        "customer" => $customer->id
    ));
    
    //Customer Data
    $customerData = [
        'id'=>$charge->customer,
        'first_name'=>$firstname,
        'last_name'=>$lastname,
        'email'=>$email
    ];
    //Instantiate Customer
    $customer = new Customer();

    //Add Customer to db
    $customer->addCustomer($customerData);

    //Transaction Data
    $transactionData = [
        'id'=>$charge->id,
        'customer_id'=>$charge->customer,
        'product'=>$charge->description,
        'amount'=>$charge->amount,
        'currency'=>$charge->currency,
        'status'=>$charge->status
    ];
    //Instantiate Transaction
    $transaction = new Transaction();

    //Add Transaction to db
    $transaction->addTransaction($transactionData);

    //print_r($charge);
    //redirect to success
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);