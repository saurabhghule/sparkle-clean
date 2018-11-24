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
			
			@if(isset($data['phone']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Contact Number :</td>
					<td style="color:#000000;width:50%;">{{$data['phone']}}</td>
				</tr>				
			@endif

			@if(isset($data['solution_options']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;vertical-align:top;">Solutions :</td>
					<td style="color:#000000;width:50%;">
					@foreach($data['solution_options'] as $index => $solution_option)
						<?php $index++ ?>
						{{$solution_option}}
						{{$index < count($data['solution_options']) ? ',' : ''}}<br/>
					@endforeach
					</td>
				</tr>				
			@endif
			@if(isset($data['message']))
				<tr>
					<td style="color:#000000;font-weight:600;width:50%;">Comments :</td>
					<td style="color:#000000;width:50%;">{{$data['message']}}</td>
				</tr>				
			@endif
		</tbody>
	</table>
</body>
</html>