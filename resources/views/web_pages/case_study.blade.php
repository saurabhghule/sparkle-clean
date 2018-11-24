@extends('index')

@section('title') 
    {{ $case_studies['seo_titleTag'] }}
@stop

@section('seo_tags')
    <meta name="keywords" content="{{ $case_studies['seo_keywords'] }}">

    <meta name="description" content="{{ $case_studies['seo_metaDesc'] }}">
@stop

@section('content')
    
    <div class="case__study section__1" 
    style="background-image: url('/img/case_studies/banners/{{$case_studies['banner_image']}}');" title="Case Studies">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <h1 class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            {{ $case_studies['title']}}
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="case__study section__2 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">Introduction</h1>
                    </div>

                    <div class="section__content">
                    	{!! $case_studies['introduction'] !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head padding-t-40">
                        <h1 class="section__head__desc">Challenge</h1>
                    </div>

                    <div class="section__content">
                    	{!! $case_studies['challenge'] !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head padding-t-40">
                        <h1 class="section__head__desc">Solution Offered</h1>
                    </div>

                    <div class="section__content">
                    	{!! $case_studies['solution'] !!}
                    </div>
                </div>
            </div>

            <div class="row flex__box">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                    <div class="section__head padding-t-40">
                        <h1 class="section__head__desc">Result Achieved</h1>
                    </div>
					
					<div class="section__image">
						<img src="{{asset('/img/case_studies/waste-water-solutions.jpg')}}" alt="Waste Water Solutions">
					</div>

                    <div class="section__content">
                    	{!! $case_studies['result'] !!}
                    </div>
                </div>
                <div class="hidden-xs hidden-sm hidden-md col-lg-2 padding-top-100">
                	<div class="vertical__border"></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                    <div class="section__head padding-t-40">
                        <h1 class="section__head__desc">Benefits to client</h1>
                    </div>
					
					<div class="section__image">
						<img src="{{asset('/img/case_studies/waste-water-treatment.jpg')}}" alt="Waste Water Treatment">
					</div>

                    <div class="section__content">
                    	{!! $case_studies['benefits_to_client'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop