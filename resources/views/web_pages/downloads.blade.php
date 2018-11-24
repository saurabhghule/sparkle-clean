@extends('index')

@section('title') 
    Downloads | Sparkle Clean Tech Pvt.Ltd. 
@stop

@section('seo_tags')
    <meta name="keywords" content="">
    
    <meta name="description" content="">
@stop

@section('content')
    
    <div class="downloads__page section__1">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <h1 class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Downloads
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="downloads__page section__2 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">Downloads</h1>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-xs-12">
                <div class="row sectors__row">
                    <div class="col-xs-12 col-sm-6 col-md-3 sectors__column">
                        <a href="{{ asset('/downloads/brochure/corporate-brochure.pdf')}}" target="_blank" class="card">
                            <div class="card__image">
                                <img class="activator" src="{{asset('/img/home_page/handle/brochure-1.jpg')}}" alt="Commercial Sector">
                                <div class="imageOverlay">
                                  <span class="icon"><i class="fa fa-cloud-download" aria-hidden="true"></i></span>
                                  <span class="text">Download</span>
                                </div>
                            </div>
                            
                            <div class="card__content">
                                <p class="card__content__desc">
                                  Corporate Brochure
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 sectors__column">
                        <a href="{{ asset('/downloads/brochure/company-profile.pdf')}}" target="_blank" class="card">
                            <div class="card__image">
                                <img class="activator" src="{{asset('/img/home_page/handle/brochure-2.jpg')}}" alt="Industrial Sector">
                                <div class="imageOverlay">
                                  <span class="icon"><i class="fa fa-cloud-download" aria-hidden="true"></i></span>
                                  <span class="text">Download</span>
                                </div>
                            </div>
                            
                            <div class="card__content">
                                <p class="card__content__desc">
                                  Company Profile
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 sectors__column">
                        <a href="{{ asset('/downloads/brochure/corporate-presentation.pdf')}}" target="_blank" class="card">
                            <div class="card__image">
                                <img class="activator" src="{{asset('/img/home_page/handle/brochure-3.jpg')}}" alt="Government Sector">
                                <div class="imageOverlay">
                                  <span class="icon"><i class="fa fa-cloud-download" aria-hidden="true"></i></span>
                                  <span class="text">Download</span>
                                </div>
                            </div>
                            
                            <div class="card__content">
                                <p class="card__content__desc">
                                  Corporate Presentation
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 sectors__column">
                        <a href="{{ asset('/downloads/brochure/commercial-realestate-sector.pdf')}}" target="_blank" class="card">
                            <div class="card__image">
                                <img class="activator" src="{{asset('/img/home_page/handle/brochure-4.jpg')}}" alt="Commercial/Real Estate">
                                <div class="imageOverlay">
                                  <span class="icon"><i class="fa fa-cloud-download" aria-hidden="true"></i></span>
                                  <span class="text">Download</span>
                                </div>
                            </div>
                            
                            <div class="card__content">
                                <p class="card__content__desc">
                                  Commercial / Infrastructure Maharashtra
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

@stop