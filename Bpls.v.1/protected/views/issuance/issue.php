<html>
	
	<head>
	
	</head>

	<body>
	<div class="bodyDiv">
			<h2 style='text-align:center;font-family:times'>REPUBLIC OF THE PHILIPPINES</h2>
			<h3 style='text-align:center;font-family:courier'>City of Alaminos, Laguna</h3>
			
			<h3 style='text-align:center;font-family:arial'>Office of the Mayor</h3>
			<h3 style='text-align:center;font-family:arial'>Business Permits and Licensing Office</h3>
			<h4 style='text-align:center;font-family:arial'>PERMIT TO OPERATE</h4>
			
			
				<table class='center'>
					<tr>
						<td><h4 style='text-align:center;font-family:times'><?php echo 'Business Registration #: '.$model->approval->business_reg_num; ?></h4></td>
						<td><h4 style='text-align:center;font-family:times'><?php echo 'Issuance Date: '.$model->sys_entry_date; ?></h4></td>
						<td><h4 style='text-align:center;font-family:times'><?php echo 'Expiration Date: '.$model->approval->next_renewal_date; ?></h4></td>
					</tr>
					<tr>
						<td ><h4 style='text-align:center;font-family:times'><?php echo 'OR Number: '.$model->or_reference; ?></h4></td>
						<td ><h4 style='text-align:center;font-family:times'><?php echo 'OR Date: '.$model->or_reference_date; ?></h4></td>
						<td ><h4 style='text-align:center;font-family:times'><?php echo 'Capital Amount: '.$model->approval->busAcctHolder->business->capital_amount; ?></h4></td>
					</tr>
				</table>
			
				<br/><br/>
			
			
				<table class='center'>
					<tr>
						<td class='vital'><h4 style='text-align:center;font-family:times'><?php echo 'Business Name: '.$model->approval->busAcctHolder->business->name; ?></h4></td>
					</tr>
					<tr>
						<td class='vital'><h4 style='text-align:center;font-family:times'><?php echo 'Trade Name: '.$model->approval->busAcctHolder->business->trade_name; ?></h4></td>
					</tr>
					<tr>
						<td class="vital"><h4 style='text-align:center;font-family:times'><?php echo 'Taxpayer: '.$model->approval->busAcctHolder->business->user->full_name; ?></h4></td>
					</tr>
				</table>
			
		<br/>
			<h4 class='mayor'>
				By Authority of the City Mayor:
			</h4>

			<div class="signatureDiv">
				<img src='var:myvariable' class="signature"/>
			</div>
	</div>	
	</body>
	
</html>
