

@extends('index')

@section('title') Contact Us | Sparkle Clean Tech Pvt.Ltd. @stop

@section('seo_tags')
	<meta name="keywords" content="Waste Water Treatment Plant Manufacturers, Waste Water Treatment Plant Manufacturers in mumbai, industrial waste water treatment plants, industrial waste water treatment plants in india, Domestic water treatment, industrial waste water treatment systems, water treatment plant manufacturers in pune">
    
    <meta name="description" content="contact Sparkle Clean Tech to know more about water, waste water and oily waste water treatments or solutions.">
@stop

@section('link_tag')
	<link rel="stylesheet" href="{{asset('css/sumoselect.css')}}">
	<style>
		#sct_map { height: 450px; }
    	@media only screen and (max-width: 768px){  
			#sct_map { height: 380px; }
    	}
	</style>
@stop

@section('content')
    <div class="contact__page section__1">
        <div id="sct_map"></div>
    </div>
	<div class="contact__page section__2 section">
		<div class="container">
			<div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">DON'T HESITATE TO CONTACT US</h1>
                    </div>
                    <div class="section__sub__head">
                        We will contact after you send us a message, don't worry we save your contact details. 
                    </div>
                </div>
            </div>

			<form id="contactpage__form" class="contact__form" method="POST" action="{{route('contact.post')}}">
				<input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                <input type="hidden" value="contactpage__form" name="contactpage__form__id"/>	

            	<div class="row">
            		<div class="col-xs-12 col-sm-6 col-md-5">
            			<div class="form-group contact__form__group">
            				<input type="text" name="name" class="form-control contact__form__field" placeholder="Name *" required>
            				<span class="icons">
            					<i class="fa fa-pencil" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group contact__form__group">
            				<input type="text" name="company_name" class="form-control contact__form__field" placeholder="Company Name">
            				<span class="icons">
            					<i class="fa fa-building-o" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group contact__form__group">
            				<input type="email" name="email" class="form-control contact__form__field" placeholder="Email *" required>
            				<span class="icons">
            					<i class="fa fa-envelope" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group contact__form__group">
            				<input type="tel" name="phone" class="form-control contact__form__field" placeholder="Contact No.">
            				<span class="icons">
            					<i class="fa fa-phone" aria-hidden="true"></i>
            				</span>
            			</div>
	            	</div>
        			<div class="col-xs-12 col-sm-6 col-md-offset-2 col-md-5">
            			<div class="form-group contact__form__group">
            				<span class="icons">
            					<i class="fa fa-tint" aria-hidden="true"></i>
            				</span>
            				<select name="solution_options[]" multiple="multiple" class="form-control select__options contact__form__field" placeholder="How can we help you?">
            					<option>I need Water Management Solution</option>
            					<option>I need Waster Water Treatment Solution</option>
            					<option>I need Drinking Water Solution</option>
            					<option>I need Zero Liquid Discharge solution</option>
            					<option>I would like to Receive more Information about Sparkle Products and Services</option>
            					<option>I have Sparkle Water Equipment and I need Technical Support</option>
            					<option>I am inquiring about a job</option>
            					<option>I am equipment Supplier or Vendor</option>
            					<option>Others</option>
            				</select>
            			</div>
            			<div class="form-group contact__form__group">
            				<span class="icons">
            					<i class="fa fa-envelope" aria-hidden="true"></i>
            				</span>
            				<textarea name="message" class="form-control contact__form__field" placeholder="Comments" rows="3"></textarea>
            			</div>
            			
            			<div class="form-group contact__form__group">
            				<button type="submit" name="action" class="z-depth-1 submit__btn">
            					Submit
            				</button>
            			</div>
	            	</div>	
        		</div>
    		</form>
		</div>
	</div>

	<div class="contact__page section__3 section">
		<div class="sctLightBlue__section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="sctLightBlue__section__head">
                            <a href="mailto:info@sparklecleantech.com" class="sctLightBlue__section__head__desc">
                            	<i class="fa fa-envelope" aria-hidden="true"></i>
                            	info@sparklecleantech.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        
		<div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <div class="section__head">
	                    <h2 class="section__head__desc">OUR OFFICES</h2>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	        	<div class="col-xs-12 col-sm-6 col-md-3">
	        		<div class="card">
	        			<div class="card__image">
	        				<img src="{{asset('img/contact_us/flags/wastewater-treatment-solutions-in-india.jpg')}}" alt="wastewater treatment solutions India Office" title="wastewater treatment solutions India Office">
	        				<div class="card__image__content">	
		        				<div class="title">India</div>
		        				<div class="desc">Sparkle Clean Tech Pvt. Ltd</div>
	        				</div>
	        			</div>
	        			<div class="card__content">
		        			<div class="card__content__address">
		        				#89 Gautam Complex, Sector - 11, C.B.D Belapur, Navi Mumbai - 400614
		        			</div>
		        			<div class="card__content__link">
		        				<a href="">
		        					<i class="fa fa-phone" aria-hidden="true"></i>
									Tel: +91-22-4061-9000
		        				</a>
		        				<a href="">
		        					<i class="fa fa-fax" aria-hidden="true"></i>
		        					Fax: +91-22-27563061
		        				</a>
		        			</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-xs-12 col-sm-6 col-md-3">
	        		<div class="card">
	        			<div class="card__image">
	        				<img src="{{asset('img/contact_us/flags/wastewater-treatment-solutions-in-singapore.jpg')}}" alt="wastewater treatment solutions Singapore Office" title="wastewater treatment solutions Singapore Office">
	        				<div class="card__image__content">	
		        				<div class="title">Singapore</div>
		        				<div class="desc">Sparkle Clean Tech Pte Ltd</div>
	        				</div>
	        			</div>
	        			<div class="card__content">
		        			<div class="card__content__address">
		        				#13-01, City House, 36 Robinson Road, Singapore - 068877
		        			</div>
		        			<div class="card__content__link">
		        				<a href="">
		        					<i class="fa fa-phone" aria-hidden="true"></i>
									Tel: +65-65801800
		        				</a>
		        			</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-xs-12 col-sm-6 col-md-3">
	        		<div class="card">
	        			<div class="card__image">
	        				<img src="{{asset('img/contact_us/flags/wastewater-treatment-solutions-in-philippines.jpg')}}" alt="wastewater treatment solutions Philippineswastewater treatment manufacturers in India Office" title="wastewater treatment solutions Philippineswastewater treatment manufacturers in India Office">
	        				<div class="card__image__content">	
		        				<div class="title">Philippines</div>
		        				<div class="desc">Sparkle Clean Tech Pvt. Ltd</div>
	        				</div>
	        			</div>
	        			<div class="card__content">
		        			<div class="card__content__address">
								Under Registration
		        				{{--Unit 406, Corporate 101 Building, Mother Ignacia Street,--}}
								{{--Barangay South Triangle, Quezon City, Philippines--}}
		        			</div>
		        			<div class="card__content__link">
		        				<a href="">
		        					<i class="fa fa-phone" aria-hidden="true"></i>
									Tel: +91-22-4061-9000
		        				</a>
		        			</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-xs-12 col-sm-6 col-md-3">
	        		<div class="card">
	        			<div class="card__image">
	        				<img src="{{asset('img/contact_us/flags/wastewater-treatment-solutions-in-india.jpg')}}" alt="wastewater treatment manufacturers in India" title="wastewater treatment manufacturers in India">
	        				<div class="card__image__content">	
		        				<div class="title">India - Manufacturing</div>
		        				<div class="desc">Sparkle Clean Tech Pvt. Ltd</div>
	        				</div>
	        			</div>
	        			<div class="card__content">
		        			<div class="card__content__address">
		        				#Co Subhash Silk Mills Ltd, Khopoli Pen Highway, Sajgaon - 410203
		        			</div>
		        			<div class="card__content__link">
		        				<a href="">
		        					<i class="fa fa-phone" aria-hidden="true"></i>
									Tel: +91-91587 70808
		        				</a>
		        			</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
		</div>
	</div>
@stop

@section('script_tag')


	<script>
	
		var locations = [
			{lat: 19.016863, lng: 73.043259},
			{lat: 1.281453, lng: 103.850179}, 
			{lat: 14.637370, lng: 121.030434},
			/*{lat: 18.789785, lng: 73.307873},*/
		];
	
	
		function initMap() {
			var map = new google.maps.Map(document.getElementById('sct_map'), {
				zoom: 4,
				center: {lat: 19.016863, lng: 73.043259},
				scrollwheel: false, 
			});
			
			var contentString = [
				[
					'<div class="info_content">' +
					'<h5>Sparkle Clean Tech Pvt. Ltd.(India)</h5>' +
					'<p>#89 Gautam Complex, Sector - 11, C.B.D Belapur, Navi Mumbai - 400614</p>' + '</div>'
				],
				[
					'<div class="info_content">' +
					'<h5>Sparkle Clean Tech Pte. Ltd.(Singapore)</h5>' +
					'<p>#13-01, City House, 36 Robinson Road, Singapore - 068877</p>' + '</div>'
				],
				[
					'<div class="info_content">' +
					'<h5>Sparkle Clean Tech Pvt. Ltd.(Philippines)</h5>' +
					'<p> Under Registration </p>' + '</div>'
				]
			];
	
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
	
			var geocoder;
			geocoder = new google.maps.Geocoder();
	
			for(var i = 0; i < locations.length; i++) {
	
				var marker = new google.maps.Marker({
					position: locations[i],
					map: map,
				});
	
				var city_name = '';
	
				geocoder.geocode(
					{'latLng': locations[i]},
					function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							if (results[0]) {
								var add= results[0].formatted_address ;
								var  value=add.split(",");
	
								count=value.length;
								country=value[count-1];
								state=value[count-2];
								city=value[count-3];
								city_name = city;
							}
						}
					}
				);
	
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(contentString[i][0]);
						infowindow.open(map, marker);
					}
				})(marker, i));
			}
		}			
	</script>
  
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhaGhT_63v37_YHs-g7XrZVdqNqImqXjA&callback=initMap">
    </script>

@stop