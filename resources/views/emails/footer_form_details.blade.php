<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table style="width:100%;max-width:500px;">
		<tbody>
			<tr>
				<td style="color:#000000;font-weight:600;width:50%;">First Name :</td>
				<td style="color:#000000;width:50%;">{{$data['first_name']}}</td>
			</tr>
			<tr>
				<td style="color:#000000;font-weight:600;width:50%;">Last Name :</td>
				<td style="color:#000000;width:50%;">{{$data['last_name']}}</td>
			</tr>
			@if(isset($data['company_name']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Company Name :</td>
					<td style="color:#000000;width:50%;">{{$data['company_name']}}</td>
				</tr>
			@endif
			
			<tr>
				<td style="color:#000000;font-weight:600;width:50%;">Email :</td>
				<td style="color:#000000;width:50%;">{{$data['email']}}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>