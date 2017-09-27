<?php session_start(); ?>
 
<html>
    <head>
        <title>Authorize.net Credit Card Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </head>
    <body>
         
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <!-- -->
                </div>
                <div class="col-sm-6">
                    <h2>Credit Card Details</h2>
                    <form name="cc_payment" id="cc_payment" method="post" action="payment.php" enctype="multipart/form-data">
                        <input type="hidden" name="mode" value="process" />
                        <div class="form-group">
                            <label>Payment Amount</label>
                            <input class="form-control" type="text" name="amount_paid" />
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6" style="padding-right: 2px;">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="cc_fname" />
                                </div>
                                <div class="col-sm-6" style="padding-left: 2px;">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="cc_lname" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6" style="padding-right: 2px;">
                                    <label>Card Number</label>
                                    <input class="form-control" type="text" name="cc_number" />
                                </div>
                                <div class="col-sm-3" style="padding-right: 2px; padding-left: 2px;">
                                    <label>Exp (MM/YY)</label>
                                    <input class="form-control" type="text" name="cc_exp" />
                                </div>
                                <div class="col-sm-3" style="padding-left: 2px;">
                                    <label>CCV</label>
                                    <input class="form-control" type="text" name="cc_ccv" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="auto_renew" id="auto_renew" value="Y" />
                            <label for="auto_renew">Yes, make payment automatically each month.</label>
                        </div>
                        <div class="form-group">
                            <?php
                                echo  $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            ?>
                            <input class="btn btn-primary" type="submit" name="cc_payment_submit" value="Submit Payment">
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <!-- -->
                </div>
            </div>
        </div>
    </body>
</html>
