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
				<td style="color:#000000;font-weight:600;width:50%;">Email :</td>
				<td style="color:#000000;width:50%;">{{$data['email']}}</td>
			</tr>
			@if(isset($data['company_name']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Company Name :</td>
					<td style="color:#000000;width:50%;">{{$data['company_name']}}</td>
				</tr>
			@endif

			@if(isset($data['department']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Department :</td>
					<td style="color:#000000;width:50%;">{{$data['department']}}</td>
				</tr>
			@endif

			@if(isset($data['phone']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Phone no :</td>
					<td style="color:#000000;width:50%;">{{$data['phone']}}</td>
				</tr>
			@endif
			
			@if(isset($data['address']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Address :</td>
					<td style="color:#000000;width:50%;">{{$data['address']}}</td>
				</tr>				
			@endif

			@if(isset($data['state']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">State :</td>
					<td style="color:#000000;width:50%;">{{$data['state']}}</td>
				</tr>				
			@endif

			@if(isset($data['city']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">City :</td>
					<td style="color:#000000;width:50%;">{{$data['city']}}</td>
				</tr>				
			@endif

			@if(isset($data['zip']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Zip :</td>
					<td style="color:#000000;width:50%;">{{$data['zip']}}</td>
				</tr>				
			@endif

			@if(isset($data['machine_no']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Machine Number :</td>
					<td style="color:#000000;width:50%;">{{$data['machine_no']}}</td>
				</tr>				
			@endif

			@if(isset($data['machine_location']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Machine Location :</td>
					<td style="color:#000000;width:50%;">{{$data['machine_location']}}</td>
				</tr>				
			@endif

			@if(isset($data['machine_type']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Machine Type :</td>
					<td style="color:#000000;width:50%;">
					@foreach($data['machine_type'] as $type)
					{{$type}},
					@endforeach
					</td>
				</tr>				
			@endif

			@if(isset($data['issue']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Issue :</td>
					<td style="color:#000000;width:50%;">
					@foreach($data['issue'] as $issue)
						{{$issue}},
					@endforeach
					</td>
				</tr>				
			@endif

			@if(isset($data['other_issue']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Other Issue :</td>
					<td style="color:#000000;width:50%;">{{$data['other_issue']}}</td>
				</tr>				
			@endif

			@if(isset($data['message']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Message :</td>
					<td style="color:#000000;width:50%;">{{$data['message']}}</td>
				</tr>				
			@endif

		</tbody>
	</table>
</body>
</html>