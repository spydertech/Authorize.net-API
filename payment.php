<?php

require_once ('./includes/config.php');
require_once ('./AuthorizeNet.php');

if(isset($_POST['submit_payment'])){
		$transaction = new AuthorizeNetAIM;
		$transaction->setSandbox(AUTHORIZENET_SANDBOX); //For testing
		$transaction->setFields(
				array(
						'amount' => $_POST['finalPrice'],
						'card_num' => $_POST['ccnumber'],
						'exp_date' => $_POST['expdate'],
						'first_name' => $_POST['fname'],
						'last_name' => $_POST['lname'],
						'address' => $_POST['address'],
						'city' => $_POST['city'],
						'state' => $_POST['state'],
						'country' => 'UK',
						'zip' => $_POST['zip'],
						//'email' => $_SESSION['user_email'],
						'card_code' => $_POST['ccv'],
				)
		);

		//$transaction->setCustomField("user_id", $_SESSION['user_id']); //If you want to record user id
		$response = $transaction->authorizeAndCapture();
		if ($response->approved) {

			//Do your successful payment stuff here like write transaction to DB...

			// If auto renew box is checked
			if($_POST['arb']=='Y')
			{
			
				$subscription = new AuthorizeNet_Subscription;
				$subscription->name = "Rent ".$unit->getName(); // whatever you want to name the subscription
				$subscription->intervalLength = "1"; // how many units is each subscription good for
				$subscription->intervalUnit = "months"; // can be days, months, years
				$subscription->startDate = date("Y-m-d h:i:sa"); //can be current date and time or a field they select in the form
				$subscription->totalOccurrences = "99"; // this is how many times the subscription will repeat
				$subscription->amount = $_POST['finalPrice']; // amount customer will be charged when the subscription goes off
				$subscription->creditCardCardNumber = $_POST['ccnumber'];
				$subscription->creditCardExpirationDate = $_POST['expdate'];
				$subscription->creditCardCardCode = $_POST['ccv'];
				$subscription->billToFirstName = $_POST['fname'];
				$subscription->billToLastName = $_POST['lname'];
				$subscription->customerId = $_SESSION['user_id']."_".$transaction->getTransactionId(); // an identifier for the subscription
				$refId = $bookingId;
				
				$request = new AuthorizeNetARB;
				$request->setRefId($refId);
				$response = $request->createSubscription($subscription);
				if($response->isOk())
				{
					$subscription_id = $response->getSubscriptionId();
					//$query->execute("UPDATE booking SET arb_id='".$subscription_id."'");
					// run an UPDATE query here for subscription id
				}
				else
					$errMsg="Subsription has not been created. Please try later";
			}

			die('success!');

		} else {

			//Do your failed payment stuff here like display error messages.
				global $response;
				echo '<h2>Payment Status</h2><br>';
				echo '<p>'. $response->response_reason_text .'</p>';	

			die('failure');
		}
}