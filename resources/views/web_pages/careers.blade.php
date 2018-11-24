@extends('index')

@section('title') 
    Carrers | Current Openings | Sparkle Clean Tech Pvt.Ltd. 
@stop

@section('seo_tags')
    <meta name="description" content="Our home base is in Mumbai, India & we're growing all the time. So, if you're sharp,have an upbeat attitude & communication skills,we want to talk to you.">
@stop

@section('content')
    <div class="careers__page section__1" title="Careers">
    	<div class="banner__overlay"></div>
        <div class="container">
            <div class="row">            
            	<div class="col-xs-12">
            		<div class="banner__content text-center">
            			<h1 class="inline-block tagline">
            				<span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
            				Careers
            				<span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
            			</h1>
            		</div>
            	</div>
            </div>
        </div>
    </div>

    <div class="careers__page section__2 section">
    	<div class="container">
    		<div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h2 class="section__head__desc">CAREERS</h2>
                    </div>
                    <div class="section__sub__head">
                        Our home base is in Mumbai, India and we&#39;re growing all the time. So, if you&#39;re sharp, have an upbeat attitude and good communication skills, we want to talk to you. Whether you prefer to be in the front lines serving our client needs or behind the scenes helping to orchestrate our business approach, chances are there is an opportunity just right for you.
                    </div>
                </div>
            </div>

            <div class="row height-equalizer-wrapper">
            	<div class="col-xs-12 col-sm-6">
            		<div class="careers__card">
            			<div class="careers__card__icon careers__card__icon--partner">
            				<span class="pivot top-h"></span>
            				<span class="pivot top-v"></span>
            				<span class="pivot bottom-h"></span>
            				<span class="pivot bottom-v"></span>
            			</div>
            			<div class="careers__card__desc height-equalizer">
            				We believe in the importance of building successful working relationships to meet our corporate goals, with our colleagues and stakeholders. 
            			</div>
            		</div>
            	</div>
            	<div class="col-xs-12 col-sm-6">
            		<div class="careers__card">
            			<div class="careers__card__icon careers__card__icon--strength">
            				<span class="pivot top-h"></span>
            				<span class="pivot top-v"></span>
            				<span class="pivot bottom-h"></span>
            				<span class="pivot bottom-v"></span>
            			</div>
            			<div class="careers__card__desc height-equalizer">
            				Sparkle Clean Tech strength derives from the commitment, capability and cultural diversity of its people. 
            			</div>
            		</div>
            	</div>
            	<div class="col-xs-12 col-sm-6">
            		<div class="careers__card">
            			<div class="careers__card__icon careers__card__icon--user">
            				<span class="pivot top-h"></span>
            				<span class="pivot top-v"></span>
            				<span class="pivot bottom-h"></span>
            				<span class="pivot bottom-v"></span>
            			</div>
            			<div class="careers__card__desc height-equalizer">
            				We are always looking for good people because in a very real sense, Sparkle Clean Tech is everywhere our clients want us to be. 
            			</div>
            		</div>
            	</div>
            	<div class="col-xs-12 col-sm-6">
            		<div class="careers__card">
            			<div class="careers__card__icon careers__card__icon--benefit">
            				<span class="pivot top-h"></span>
            				<span class="pivot top-v"></span>
            				<span class="pivot bottom-h"></span>
            				<span class="pivot bottom-v"></span>
            			</div>
            			<div class="careers__card__desc height-equalizer">
            				We offer excellent opportunities to our people, both to their own personal benefit and that of our company. 
            			</div>
            		</div>
            	</div>
            </div>
    	</div>
    </div>

    <div class="container">
    	<div class="section__divider"></div>
    </div>

    <div class="careers__page section__3 section">
    	<div class="container">
    		<div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h2 class="section__head__desc">CURRENT OPENINGS</h2>
                    </div>
                </div>
            </div>

            <div class="openings">
                <div class="openings__slide">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                            <div class="openings__slide__img">
                                <img src="{{asset('/img/careers_page/sr-executive-designer.jpg')}}" alt="Sr. Executive Design"> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-8">
                            <div class="openings__slide__content">
                                <div class="content__title">Sr. Executive Design</div>
                                <ul class="content__list">
                                    <li class="content__list__items">
                                        Candidate must have 3 – 5 years of experience in similar position
                                    </li>
                                    <li class="content__list__items">
                                        Education Qualification - Certified Course in AutoCAD, 2D / 3D in Piping/ Mechanical Design
                                    </li>
                                    <li class="content__list__items">
                                        Preparing design for Water and Waste Water Treatment Plants according to the needs of the customers
                                    </li>
                                    <li class="content__list__items">
                                        Proficiency in written and spoken English
                                    </li>
                                    <li class="content__list__items">
                                        Salary as per candidate qualification and experience.
                                    </li>
                                </ul>
                                <div class="content__cta">
                                    <a href="#form__section" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="openings__slide">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                            <div class="openings__slide__img">
                                <img src="{{asset('/img/careers_page/sr-proposal-engg.jpg')}}" alt="Sr. Proposal Engineer"> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-8">
                            <div class="openings__slide__content">
                                <div class="content__title">Sr. Proposal Engineer</div>
                                <ul class="content__list">
                                    <li class="content__list__items">
                                        Candidate must have 8 – 10 years of experience in similar position
                                    </li>
                                    <li class="content__list__items">
                                        Education Qualification –BE / Diploma – Chemical / MS Environment / PGD in Environment & Pollution Control Technology    
                                    </li>
                                    <li class="content__list__items">
                                        Preparing Techno commercial offer for Waste Water and Water Treatment plants according to the needs of the customers
                                    </li>
                                    <li class="content__list__items">
                                        Cost estimation of projects on EPC basis
                                    </li>
                                    <li class="content__list__items">
                                        Reviewing tender documents and preparing bids for tender participation
                                    </li>
                                    <li class="content__list__items">
                                        Proficiency in written and spoken English
                                    </li>
                                    <li class="content__list__items">
                                        Salary as per candidate qualification and experience
                                    </li>
                                </ul>
                                <div class="content__cta">
                                    <a href="#form__section" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="openings__slide">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                            <div class="openings__slide__img">
                                <img src="{{asset('/img/careers_page/proposal-engg.jpg')}}" alt="Proposal Engineer"> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-8">
                            <div class="openings__slide__content">
                                <div class="content__title">Proposal Engineer</div>
                                <ul class="content__list">
                                    <li class="content__list__items">
                                        Candidate must have 2 – 4 years of experience in similar position
                                    </li>
                                    <li class="content__list__items">
                                        Education Qualification – Diploma – Chemical /  PGD in Environment & Pollution Control Technology  
                                    </li>
                                    <li class="content__list__items">
                                        Preparing Techno commercial offer for Waste Water and Water Treatment plants according to the needs of the customers
                                    </li>
                                    <li class="content__list__items">
                                        Cost estimation of projects on EPC basis
                                    </li>
                                    <li class="content__list__items">
                                        Reviewing tender documents and preparing bids for tender participation
                                    </li>

                                    <li class="content__list__items">
                                        Proficiency in written and spoken English
                                    </li>
                                    <li class="content__list__items">
                                        Salary as per candidate qualification and experience
                                    </li>
                                </ul>

                                <div class="content__cta">
                                    <a href="#form__section" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            	<div class="openings__slide">
            		<div class="row">
            			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
            				<div class="openings__slide__img">
            					<img src="{{asset('/img/careers_page/marketing_manager.jpg')}}" alt="Marketing Manager"> 
            				</div>
            			</div>
            			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-8">
            				<div class="openings__slide__content">
            					<div class="content__title">Marketing Manager</div>
        						<ul class="content__list">
        							<li class="content__list__items">
        								Candidate must have 8 – 10 years of experience in similar position
        							</li>
        							<li class="content__list__items">
        								Education qualification - Master's degree or equivalent	
        							</li>
        							<li class="content__list__items">
        								Develop and execute strategic business plan to drive growth in revenue and profitability.
        							</li>
        							<li class="content__list__items">
        								Proficiency in written and spoken English
        							</li>
        							<li class="content__list__items">
        								Salary as per candidate qualification and experience
        							</li>
        						</ul>

        						<div class="content__cta">
        							<a href="#form__section" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Apply</a>
        						</div>
            				</div>
            			</div>
            		</div>
            	</div>

            	<div class="openings__slide">
            		<div class="row">
            			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
            				<div class="openings__slide__img">
            					<img src="{{asset('/img/careers_page/project_manager.jpg')}}" alt="Project Manager"> 
            				</div>
            			</div>
            			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-8">
            				<div class="openings__slide__content">
            					<div class="content__title">Project Manager</div>
        						<ul class="content__list">
        							<li class="content__list__items">
        								Candidate must have 10 – 12 years of experience in similar position
        							</li>
        							<li class="content__list__items">
        								Education qualification – Bachelor in Engineering or Master's degree or equivalent	
        							</li>
        							<li class="content__list__items">
        								Execute the large turnkey projects, coordinate with the company and clients including vendors and third party inspection agencies.
        							</li>
        							<li class="content__list__items">
        								Proficiency in written and spoken English
        							</li>
        							<li class="content__list__items">
        								Salary as per candidate qualification and experience
        							</li>
        						</ul>

        						<div class="content__cta">
        							<a href="#form__section" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Apply</a>
        						</div>
            				</div>
            			</div>
            		</div>
            	</div>

                <div class="openings__slide">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                            <div class="openings__slide__img">
                                <img src="{{asset('/img/careers_page/service_engineer.jpg')}}" alt="Service Engineer"> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-8">
                            <div class="openings__slide__content">
                                <div class="content__title">Service Engineer</div>
                                <ul class="content__list">
                                    <li class="content__list__items">
                                        Candidate must have 4 – 6 years of experience in similar position
                                    </li>
                                    <li class="content__list__items">
                                        Education qualification - Diploma, B.Sc., ITI (Preferable Chemical/Mechanical/Environmental)  
                                    </li>
                                    <li class="content__list__items">
                                        Plant Installation ( UF, RO and STP ) and integration of various types of process control instrumentation equipment.
                                    </li>
                                    <li class="content__list__items">
                                        Operation and maintenance of Water and Waste water treatment plant.
                                    </li>
                                    <li class="content__list__items">
                                        Proficiency in written and spoken English
                                    </li>
                                    <li class="content__list__items">
                                        Salary as per candidate qualification and experience
                                    </li>
                                </ul>

                                <div class="content__cta">
                                    <a href="#form__section" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="openings__slide">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                            <div class="openings__slide__img">
                                <img src="{{asset('/img/careers_page/crm.jpg')}}" alt="Customer Relationship Manager"> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-8">
                            <div class="openings__slide__content">
                                <div class="content__title">Customer Relationship Manager</div>
                                <ul class="content__list">
                                    <li class="content__list__items">
                                        Candidate must have 5-7 years of experience in similar position
                                    </li>
                                    <li class="content__list__items">
                                        Educational qualification - Graduate    
                                    </li>
                                    <li class="content__list__items">
                                        Good interpersonal and communication skills
                                    </li>
                                    <li class="content__list__items">
                                        Proficiency in written and spoken english
                                    </li>
                                    <li class="content__list__items">
                                        Salary as per candidate qualification and experience
                                    </li>
                                </ul>
                                <div class="content__cta">
                                    <a href="#form__section" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="openings__slide">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                            <div class="openings__slide__img">
                                <img src="{{asset('/img/careers_page/sme.jpg')}}" alt="Sales Marketing Expert"> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-8">
                            <div class="openings__slide__content">
                                <div class="content__title">Sales Marketing Expert</div>
                                <ul class="content__list">
                                    <li class="content__list__items">
                                        Candidate must have 5-7 years of experience in similar position
                                    </li>
                                    <li class="content__list__items">
                                        Educational qualification - Graduate    
                                    </li>
                                    <li class="content__list__items">
                                        Good interpersonal and communication skills
                                    </li>
                                    <li class="content__list__items">
                                        Proficiency in written and spoken english
                                    </li>
                                    <li class="content__list__items">
                                        Salary as per candidate qualification and experience
                                    </li>
                                </ul>
                                <div class="content__cta">
                                    <a href="#form__section" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>

    <div id="form__section" class="careers__page section__4 section">
    	<div class="container">
    		<div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h2 class="section__head__desc">APPLY ONLINE</h2>
                    </div>
                    <div class="section__sub__head">
                        Please fill in the form below. Fields marked with * are mandatory
                    </div>
                </div>
            </div>

    		<form id="job__apply__form" class="app__form" method="POST" action="{{ route('careers') }}" enctype="multipart/form-data" accept-charset="UTF-8">
    			<input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                <input type="hidden" value="job__apply__form" name="job__apply__form__id"/>
	            <div class="row">
	            	<div class="col-xs-12 col-sm-5">
            			<div class="form-group app__form__group">
            				<input type="text" name="name" class="form-control app__form__field" placeholder="Name *" required>
            				<span class="icons">
            					<img src="{{asset('/img/careers_page/form_icons/edit.png')}}" alt="Name Edit">
            				</span>
            			</div>
            			<div class="form-group app__form__group">
            				<input type="email" name="email" class="form-control app__form__field" placeholder="Email *" required>
            				<span class="icons">
            					<img src="{{asset('/img/careers_page/form_icons/envelope.png')}}" alt="Envelope">
            				</span>
            			</div>
	            		<div class="form-group app__form__group">
            				<input type="text" name="position_applied_for" class="form-control app__form__field" placeholder="Position Applied For *" required>
            				<span class="icons">
            					<img src="{{asset('/img/careers_page/form_icons/checklist.png')}}" alt="Checklist">
            				</span>
            			</div>
            			<div class="form-group app__form__group">
            				<input type="text" name="current_designation" class="form-control app__form__field" placeholder="Current Designation">
            				<span class="icons">
            					<img src="{{asset('/img/careers_page/form_icons/user.png')}}" alt="User">
            				</span>
            			</div>
	            	</div>
	            	<div class="col-xs-12 col-sm-2 hidden-xs">
	            		<div class="vertical__border"></div>
	            	</div>
	            	<div class="col-xs-12 col-sm-5">
            			<div class="form-group app__form__group">
            				<input type="text" name="current_working" class="form-control app__form__field" placeholder="Currently Working With">
            				<span class="icons">
            					<img src="{{asset('/img/careers_page/form_icons/bag.png')}}" alt="Business Bag">
            				</span>
            			</div>
            			<div class="form-group app__form__group">
            				<input type="tel" name="phone" class="form-control app__form__field" placeholder="Phone *" required>
            				<span class="icons">
            					<img src="{{asset('/img/careers_page/form_icons/phone.png')}}" alt="Phone">
            				</span>
            			</div>
            			
            			<div class="form-group app__form__group">
            				<input type="file" name="upload_resume" id="file" class="form-control app__form__field inputfile"  data-multiple-caption="{count} files selected">
            				<label for="file">
            					<span id="file-name">Upload Resume</span>
            				</label>
            				<span class="icons">
            					<img src="{{asset('/img/careers_page/form_icons/upload.png')}}" alt="Upload Resume">
            				</span>
            			</div>
            			<div class="form-group app__form__group">
            				<button type="submit" name="action" class="z-depth-1 submit__btn">Submit</button>
            			</div>
	            	</div>
	            </div>
    		</form>
    	</div>
    </div>
@stop