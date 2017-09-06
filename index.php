<div class="container main-content">
	<div class="row">
		<div class="col-lg-12">
			<form name="submit_payment" id="submit_payment" method="post" action="payment.php" enctype="multipart/form-data">
			<p id="response" align="center"></p>
			<div class="vc_col-sm-7">
				<h2>credit card details</h2>
				<div class="row">
					<div class="vc_col-sm-12">
						<div class="section-part">
							<div class="vc_col-sm-4">
								Amount
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="finalPrice" value="" />
								</span>
							</div>
						</div>
						<!-- <div class="section-part">
							<div class="vc_col-sm-4">
								Auto Renew
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="checkbox" name="arb" id="arb" value="Y">
								</span>
							</div>
						</div> -->
						<div class="section-part">
							<div class="vc_col-sm-4">
								Card Number
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="ccnumber" id="ccnumber" style="width:200px" value="" size="40">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4">
								Exp Date (MM/YY)
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="expdate" id="expdate" value="" style="width:80px" size="40">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4">
								CCV
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="ccv" id="ccv" value="" size="40" style="width:80px">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4">
								First Name
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="fname" id="fname" value="" size="40">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4">
								Last Name
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="lname" id="lname" value="" size="40">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4">
								Address
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="address" id="address" value="" size="40">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4">
								City
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="city" id="city" value="" size="40">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4">
								State
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="state" id="state" value="" size="40">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4">
								Zip
							</div>
							<div class="vc_col-sm-8">
								<span>
									<input type="text" name="zip" id="zip" value="" size="40">
								</span>
							</div>
						</div>
						<div class="section-part">
							<div class="vc_col-sm-4"></div>
							<div class="vc_col-sm-8">
								<span>
									<input class="btn btn-primary" type="submit" name="submit_payment" value="Submit Payment">
								</span>
							</div>
						</div>
						<input type="hidden" name="mode" value="process" />
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>