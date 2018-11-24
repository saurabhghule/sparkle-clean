@extends('index')

@section('title') Product Support | Sparkle Clean Tech Pvt.Ltd. @stop

@section('seo_tags')
    <meta name="description" content="At Sparkle, we have the expertise to diagnose the problem, and our factory trained engineers can get your plant operating as per original design.">
@stop

@section('content')
    <link rel="stylesheet" href="{{asset('css/sumoselect.css')}}">
    <div class="product__support__page section__1" title="Product Support">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="col-xs-12">
                <div class="banner__content text-center">
                    <h1 class="inline-block tagline">
                        <span class="pivot top-h"></span>
                        <span class="pivot top-v"></span>
                        Product Support
                        <span class="pivot bottom-h"></span>
                        <span class="pivot bottom-v"></span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

	<div class="product__support__page section__2 section">
		<div class="container">
			<div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h2 class="section__head__desc">SERVICE & REPAIR</h2>
                    </div>
                    <div class="section__sub__head">
							You can count on Sparkles service and repair department to keep your plant in operating condition. At Sparkle, we have the expertise to diagnose the problem, and our factory trained engineers can get your plant operating as per original design.
                    </div>
                </div>
            </div>

			<form id="productsupportpage__form" class="productsupport__form" method="POST" action="{{route('product_support.post')}}">
				<input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                <input type="hidden" value="productsupportpage__form" name="productsupportpage__form__id"/>	

            	<div class="row">
            		<div class="col-xs-12">
            			<div class="form-group productsupport__form__group">
            				<input type="text" name="company_name" class="form-control productsupport__form__field" placeholder="Company Name">
            				<span class="icons">
            					<i class="fa fa-building-o" aria-hidden="true"></i>
            				</span>
            			</div>
            		</div>
            		<div class="col-xs-12 col-sm-6 col-md-5">
            			<div class="form-group productsupport__form__group">
            				<input type="text" name="name" class="form-control productsupport__form__field" placeholder="Contact Name *" required>
            				<span class="icons">
            					<i class="fa fa-pencil" aria-hidden="true"></i>
            				</span>
            			</div>
        				<div class="form-group productsupport__form__group">
            				<input type="text" name="department" class="form-control productsupport__form__field" placeholder="Department">
            				<span class="icons">
            					<i class="fa fa-building-o" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group productsupport__form__group">
            				<input type="email" name="email" class="form-control productsupport__form__field" placeholder="Email *" required>
            				<span class="icons">
            					<i class="fa fa-envelope" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group productsupport__form__group">
            				<input type="tel" name="phone" class="form-control productsupport__form__field" placeholder="Contact No.">
            				<span class="icons">
            					<i class="fa fa-phone" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group productsupport__form__group">
            				<span class="icons">
            					<i class="fa fa-envelope" aria-hidden="true"></i>
            				</span>
            				<textarea name="address" class="form-control productsupport__form__field" placeholder="Address" rows="1"></textarea>
            			</div>
	            	</div>
        			<div class="col-xs-12 col-sm-6 col-md-offset-2 col-md-5">
            			<div class="form-group productsupport__form__group">
            				<input type="text" name="state" class="form-control productsupport__form__field" placeholder="State">
            				<span class="icons">
            					<i class="fa fa-globe" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group productsupport__form__group">
            				<input type="text" name="city" class="form-control productsupport__form__field" placeholder="City">
            				<span class="icons">
            					<i class="fa fa-building-o" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group productsupport__form__group">
            				<input type="text" name="zip" class="form-control productsupport__form__field" placeholder="Zip">
            				<span class="icons">
            					<i class="fa fa-building-o" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group productsupport__form__group">
            				<input type="text" name="machine_no" class="form-control productsupport__form__field" placeholder="Sparkle Machine Number">
            				<span class="icons">
            					<i class="fa fa-barcode" aria-hidden="true"></i>
            				</span>
            			</div>
            			<div class="form-group productsupport__form__group">
            				<input type="text" name="machine_location" class="form-control productsupport__form__field" placeholder="Location of the machine">
            				<span class="icons">
            					<i class="fa fa-map-marker" aria-hidden="true"></i>
            				</span>
            			</div>
	            	</div>
	            	<div class="col-xs-12 col-sm-6 col-md-5">
            			<div class="form-group productsupport__form__group">
            				<span class="icons">
            					<i class="fa fa-tint" aria-hidden="true"></i>
            				</span>
            				<select name="machine_type[]" multiple="multiple" class="form-control product__select__options productsupport__form__field" placeholder="Choose the type of machine that needs maintenance">
            					<option>Pressure Sand Filter</option>
            					<option>Iron Removal Filter</option>
            					<option>Micron Cartridge Filter</option>
            					<option>Softner</option>
            					<option>D. M. Plant – 3 Bed</option>
            					<option>Reverse Osmosis</option>
            					<option>Inducted Gas Flotation</option>
            					<option>High Rate Solid Contact Clarifier</option>
            					<option>Clari – Flocculation</option>
            					<option>Oil Skimmer</option>
            					<option>Sequential Batch Reactor</option>
            					<option>Submerged Aerated Fixed Film Bio Reactor</option>
            					<option>Degasser</option>
            					<option>Ultra Violet System</option>
            					<option>Electro Di Ionization</option>
            					<option>Activated Carbon Filter</option>
            					<option>Multigrade Filtration</option>
            					<option>Ultra – Filtration</option>
            					<option>D. M. Plant – 2 Bed</option>
            					<option>Standalone Mixed Bed</option>
            					<option>Corrugulated Plate Intersected</option>
            					<option>Nut Shell Filter</option>
            					<option>Dissolved Air Flotation</option>
            					<option>Tube / Plate Separation</option>
            					<option>Extended Aeration</option>
            					<option>Membrane Bio Reactor</option>
            					<option>Moving Bed Bioreactor</option>
            					<option>Nano Filtration</option>
            					<option>Ozonator</option>
            				</select>
            			</div>
	            	</div>
	            	<div class="col-xs-12 col-sm-6 col-md-offset-2 col-md-5">
	            		<div class="form-group productsupport__form__group">
            				<span class="icons">
            					<i class="fa fa-tint" aria-hidden="true"></i>
            				</span>
            				<select name="issue[]" multiple="multiple" class="form-control product__select__options productsupport__form__field" placeholder="Issue That Needs Repair">
            					<option>Electrical</option>
            					<option>Mechanical</option>
            					<option>Leakage</option>
            					<option>Water Quality</option>
            					<option>Other</option>
            				</select>
            			</div>
	            	</div>
	            	<div class="col-xs-12 col-sm-6 col-md-5">
	            		<div class="form-group productsupport__form__group">
            				<span class="icons">
            					<i class="fa fa-envelope" aria-hidden="true"></i>
            				</span>
            				<textarea name="other_issue" class="form-control productsupport__form__field" placeholder="Other Issues" rows="3"></textarea>
            			</div>
	            	</div>
	            	<div class="col-xs-12 col-sm-6 col-md-offset-2 col-md-5">
	            		<div class="form-group productsupport__form__group">
            				<span class="icons">
            					<i class="fa fa-envelope" aria-hidden="true"></i>
            				</span>
            				<textarea name="message" class="form-control productsupport__form__field" placeholder="Comments" rows="3"></textarea>
            			</div>
	            	</div>
	            	<div class="col-xs-12 text-right">
	            		<div class="form-group productsupport__form__group">
            				<button type="submit" name="action" class="z-depth-1 submit__btn">
            					Submit
            				</button>
            			</div>
	            	</div>
        		</div>
    		</form>
		</div>
	</div>
@stop