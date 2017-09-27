<?php
 
    session_start();
 
    require_once ('./includes/config.php');
    require_once ('./includes/AuthorizeNet.php');
 
    if (isset($_POST['cc_payment_submit']))
    {
        $transaction = new AuthorizeNetAIM;
         
        // Check is sandbox mode is active.
        $transaction -> setSandbox(AUTHORIZENET_SANDBOX);
         
        $transaction -> setFields(
            array (
                'amount'     => $_POST['amount_paid'],
                'first_name' => $_POST['cc_fname'],
                'last_name'  => $_POST['cc_lname'],
                'card_num'   => $_POST['cc_number'],
                'exp_date'   => $_POST['cc_exp'],
                'card_code'  => $_POST['cc_ccv'],
                'country'    => 'US'
            )
        );
 
        // Use this if you want to record a custom field to use on the Authorize receipt.
        // $transaction -> setCustomField('YOUR CUSTOM STRING');
         
        // Get the response from Authorize.
        $response = $transaction -> authorizeAndCapture();
         
        // If the response is approved...
        if ($response -> approved) 
        {
            // Check if the transaction is set to auto-renew.
            if ($_POST['auto_renew'] == 'Y')
            {
                // Start a new subscription.
                $subscription = new AuthorizeNet_Subscription;
                                 
                // Name the subscription.
                $subscription -> name = 'SUBSCRIPTION NAME';
                 
                // Set a subscription interval length.
                $subscription -> intervalLength = '1';
                $subscription -> intervalUnit = 'months';
                 
                // Set a start date for the subscription.
                $subscription -> startDate = date('Y-m-d h:i:sa'); 
                 
                // Set how many times the subscription will repeat.
                $subscription -> totalOccurrences = '999';
                 
                // Get the posted information from the form.
                $subscription -> amount = $_POST['amount_paid'];
                $subscription -> billToFirstName = $_POST['cc_fname'];
                $subscription -> billToLastName = $_POST['cc_lname'];
                $subscription -> creditCardCardNumber = $_POST['cc_number'];
                $subscription -> creditCardExpirationDate = $_POST['cc_exp'];
                $subscription -> creditCardCardCode = $_POST['cc_ccv'];
                 
                // Set the subscription identifier (required).
                $subscription -> customerId = 'YOUR CUSTOM STRING';
                 
                // Used to search Authorize's recurring payments section (optional).
                $refId = '';
 
                $request = new AuthorizeNetARB;
                $request -> setRefId($refId);
                 
                // Get the response from Authorize.
                $response = $request -> createSubscription($subscription);
                if ($response -> isOk())
                {
                    // This is the subscription's ID, if you need it.
                    // $subscription_id = $response -> getSubscriptionId();
                     
                    // Do success stuff for subscriptions only here.
                }
                else
                {
                    // Do failure stuff for subscriptions only here.
                }
            }
             
            // Do success stuff here - show an alert, write to database, send an email, etc.
            $_SESSION['msg'] = '<div class="alert alert-success">Payment successful!</div>';    
            header('Location: ./');
            die();
        } 
         
        // If the response is declined...
        else
        {
            // Do failure stuff here - show an alert, etc.
            global $response;
            $_SESSION['msg'] = '<div class="alert alert-danger">'. $response -> response_reason_text .'</div>';  
            header('Location: ./');
            die();
        }
    }
