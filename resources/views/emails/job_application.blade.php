<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table style="width:100%;max-width:500px;">
		<tbody>
			<tr>
				<td style="color:#000000;font-weight:600;width:50%;">Name :</td>
				<td style="color:#000000;width:50%;">{{$data['name']}}</td>
			</tr>
			<tr>
				<td style="color:#000000;font-weight:600;width:50%;">Position Applied For :</td>
				<td style="color:#000000;width:50%;">{{$data['position_applied_for']}}</td>
			</tr>
			@if(isset($data['current_designation']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Current Designation:</td>
					<td style="color:#000000;width:50%;">{{$data['current_designation']}}</td>
				</tr>
			@endif
			
			@if(isset($data['current_working']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Current Working with:</td>
					<td style="color:#000000;width:50%;">{{$data['current_working']}}</td>
				</tr>				
			@endif
			<tr>
				<td style="color:#000000;font-weight:600;width:50%;">Email Address :</td>
				<td style="color:#000000;width:50%;">{{$data['email']}}</td>
			</tr>
			<tr>
				<td style="color:#000000;font-weight:600;width:50%;">Contact Details:</td>
				<td style="color:#000000;width:50%;">{{$data['phone']}}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>