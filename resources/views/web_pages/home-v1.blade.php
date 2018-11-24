@extends('index')

@section('title')
  At Sparkle we offer waste water treatment plants and solutions
@stop

@section('seo_tags')
    <meta name="keywords" content="Water Treatment Plant india, Waste Water Treatment Plant, Industrial Waste Water Treatment Plant, Waste Water Treatment Plant for Oil & Gas, Oily waste water Treatment Plant, Waste Water Treatment Plant in Mumbai, Waste Water Treatment Plant for Oil & Gas in India">
    
    <meta name="description" content="Sparkle believes in the conservation and optimal utilization of water resources for its clients, & pledges to build a better world of pure water.">
@stop

@section('content')
    
    <div class="homepage section__1">
        <div class="sct__slider dont-break">
            <div class="sct__slider__slide sct__slider__slide--1" title="Solution for Ultra Filtration">
               <div class="banner-tagline">
                   <div class="container">
                       <div class="row valign">
                           <div class="col-sm-12 col-md-9">
                               <h3 class="tagline">
                                   <span class="pivot top-h"></span>
                                   <span class="pivot top-v"></span>
                                   Water is the elixir of life
                                   <span class="pivot bottom-h"></span>
                                   <span class="pivot bottom-v"></span>
                               </h3>       
                           </div>
                           <div class="col-sm-12 col-md-3">
                               <div class="banner-cta">
                                   <a href="{{route('products','ultra-filtration')}}" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">
                                       Read More
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="sct__slider__slide sct__slider__slide--2" title="Solution for Nutshell Filter">
               <div class="banner-tagline">
                   <div class="container">
                       <div class="row valign">
                           <div class="col-sm-12 col-md-9">
                               <h3 class="tagline">
                                   <span class="pivot top-h"></span>
                                   <span class="pivot top-v"></span>
                                   Water covers 75 per cent of the world’s surface
                                   <span class="pivot bottom-h"></span>
                                   <span class="pivot bottom-v"></span>
                               </h3>       
                           </div>
                           <div class="col-sm-12 col-md-3">
                               <div class="banner-cta">
                                   <a href="{{route('products','nut-shell-filter')}}" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">
                                       Read More
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="sct__slider__slide sct__slider__slide--3" title="Solution for Activated Carbon Filter">
               <div class="banner-tagline">
                   <div class="container">
                       <div class="row valign">
                           <div class="col-sm-12 col-md-9">
                               <h3 class="tagline">
                                   <span class="pivot top-h"></span>
                                   <span class="pivot top-v"></span>
                                   No other natural resource  on the  Earth is more vital for survival than clean water
                                   <span class="pivot bottom-h"></span>
                                   <span class="pivot bottom-v"></span>
                               </h3>       
                           </div>
                           <div class="col-sm-12 col-md-3">
                               <div class="banner-cta">
                                   <a href="{{route('products','activated-carbon-filter')}}" class="btn btn-primary btn-lg z-depth-1">
                                       Read More
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="sct__slider__slide sct__slider__slide--4" title="Solution for RO Plant">
               <div class="banner-tagline">
                   <div class="container">
                       <div class="row valign">
                           <div class="col-sm-12 col-md-9">
                               <h3 class="tagline">
                                   <span class="pivot top-h"></span>
                                   <span class="pivot top-v"></span>
                                   Every single  drop of water  matters
                                   <span class="pivot bottom-h"></span>
                                   <span class="pivot bottom-v"></span>
                               </h3>       
                           </div>
                           <div class="col-sm-12 col-md-3">
                               <div class="banner-cta">
                                   <a href="{{route('products','ro-plant')}}" class="btn btn-primary btn-lg z-depth-1">
                                       Read More
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="sct__slider__slide sct__slider__slide--5" title="Solution for Three Bed Demineralization">
               <div class="banner-tagline">
                   <div class="container">
                       <div class="row valign">
                           <div class="col-sm-12 col-md-9">
                               <h3 class="tagline">
                                   <span class="pivot top-h"></span>
                                   <span class="pivot top-v"></span>
                                   If there is any magic on this planet, it is contained in water
                                   <span class="pivot bottom-h"></span>
                                   <span class="pivot bottom-v"></span>
                               </h3>       
                           </div>
                           <div class="col-sm-12 col-md-3">
                               <div class="banner-cta">
                                   <a href="{{route('products','dm-plant-2-bed')}}" class="btn btn-primary btn-lg z-depth-1">
                                       Read More
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <div class="homepage section__2 section">
        <div class="slideshow">
            <canvas width="1" height="1" id="container" style="position:absolute;top:0;left:0;"></canvas>
            <!-- Heavy Rain -->
            <div class="slide" id="slide-1" data-weather="rain"></div>
            <nav class="slideshow__nav">
                <a class="nav-item" href="#slide-1"><i class="icon icon--rainy"></i></a>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">Our Solutions</h1>
                    </div>
                    <div class="section__sub__head">
                      Sparkle believes in the conservation and optimal utilization of water resources for its clients, and solemnly pledges to build a better world of pure water. A cause driven organization, Sparkle encourages an open flow of communication and offers a platform to scientists around the world to come together and address the serious problem the world has been facing – WATER !
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 height-equalizer-wrapper">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <div class="card__header">
                                    <div class="card__header__icon water_management" title="Water Management"></div>
                                </div>
                                <div class="card__content">
                                    <h2 class="card__content__title">
                                        Water Management
                                    </h2>
                                    <div class="card__content__desc height-equalizer">
                                        We, at Sparkle, provide complete and comprehensive water purification solutions for treating raw / fresh water bodies so as to make them ready for Industrial, Domestic and other essential uses.
                                    </div>
                                </div>
                                <div class="card__footer">
                                    <a href="{{route('water-management-solution')}}">
                                        Read More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <div class="card__header">
                                    <div class="card__header__icon waste_water_management" title="Waste Water Management"></div>
                                </div>
                                <div class="card__content">
                                    <h2 class="card__content__title">
                                        Waste Water Management
                                    </h2>
                                    <div class="card__content__desc height-equalizer">
                                        Water, as a resource is, a fast depleting body. Pollution, being, one of the major concerns of the world today, makes Waste Water Treatment inevitable and extremely essential.
                                    </div>
                                </div>
                                <div class="card__footer">
                                    <a href="{{route('waste-water-management-solution')}}">
                                        Read More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <div class="card__header">
                                    <div class="card__header__icon drinking_water" title="Drinking Water"></div>
                                </div>
                                <div class="card__content">
                                    <h2 class="card__content__title">
                                        Drinking Water
                                    </h2>
                                    <div class="card__content__desc height-equalizer">
                                       Water, in India, is considered to be the elixir of life. However, drinking or potable water is available as a limited resource in India and needs to be carefully treated and conserved in order to avoid endemics and health hazards caused by water-borne diseases.
                                    </div>
                                </div>
                                <div class="card__footer">
                                    <a href="{{route('drinking-water-solution')}}">
                                        Read More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 height-equalizer-wrapper">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <div class="card__header">
                                    <div class="card__header__icon zld" title="Zero Liquid Discharge"></div>
                                </div>
                                <div class="card__content">
                                    <h2 class="card__content__title">
                                        Zero Liquid Discharge
                                    </h2>
                                    <div class="card__content__desc height-equalizer">
                                        At Sparkle, we have been an integral part of this movement, providing purification- solutions, by treating the toughest and the most contaminated waste water bodies.
                                    </div>
                                </div>
                                <div class="card__footer">
                                    <a href="{{route('zero-liquid-discharge-solution')}}">
                                        Read More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <div class="card__header">
                                    <div class="card__header__icon oil-gas" title="Water Management for Oil & Gas"></div>
                                </div>
                                <div class="card__content">
                                    <h2 class="card__content__title">
                                        Water Management for Oil & Gas
                                    </h2>
                                    <div class="card__content__desc height-equalizer">
                                        Sparkle has been instrumental in tackling the challenge of converting oil-rich effluent to reinject able water.
                                    </div>
                                </div>
                                <div class="card__footer">
                                    <a href="{{route('oil-and-gas-solution')}}">
                                        Read More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <div class="card__header">
                                    <div class="card__header__icon others" title="Other Solutions"></div>
                                </div>
                                <div class="card__content">
                                    <h2 class="card__content__title">
                                        Others
                                    </h2>
                                    <div class="card__content__desc height-equalizer">
                                        The other systems Sparkle has designed and installed are: Desalination plants, Dialysis RO Plants, Fluoride removal Plants, Arsenic Removal Plants and others.
                                    </div>
                                </div>
                                <div class="card__footer">
                                    <a href="{{route('other-solution')}}">
                                        Read More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="homepage section__3 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">
                            Technologies
                        </h1>
                    </div>
                    <div class="section__sub__head">
                        Sparkle utilizes its latest state-of-the-art technology in its entire water treatment process.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="thumbnail__img">
                        <img src="{{asset('img/home_page/water-treatment-process.jpg')}}" alt="Water Treatment Process" title="Water Treatment Process">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="row height-equalizer-wrapper">
                        <div class="col-xs-12 col-sm-6">
                            <div class="mini__card">
                                <h2 class="mini__card__title height-equalizer">
                                    Depth Filtration
                                </h2>
                                <div class="mini__card__desc">
                                    Depth filters are a variety of filters that use a porous filtration medium to retain particles, throughout the medium, rather than just on the surface of it.
                                </div>
                                <div class="mini__card__link">
                                    <a href="{{ route('depth-filtration-technology')}}">
                                        Know More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="mini__card">
                                <h2 class="mini__card__title height-equalizer">
                                    Ion Exchange
                                </h2>
                                <div class="mini__card__desc">
                                    Ion exchange is a resin based process, the inner bids of resin carry either positive or negative ion which can be exchanged with the ion of incoming water.
                                </div>
                                <div class="mini__card__link">
                                    <a href="{{ route('ion-exchange-technology')}}">
                                        Know More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="mini__card">
                                <h2 class="mini__card__title height-equalizer">
                                    Membrane Bio Reactor (MBR)
                                </h2>
                                <div class="mini__card__desc">
                                    Membrane Bio Reactor (MBR) is a combination of two basic processes i.e. biological degradation and membrane separation, merged into a single process where solids and microorganisms are suspended.
                                </div>
                                <div class="mini__card__link">
                                    <a href="{{ route('membrane-bio-reactor-technology')}}">
                                        Know More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="mini__card">
                                <h2 class="mini__card__title height-equalizer">
                                    RO Plant
                                </h2>
                                <div class="mini__card__desc">
                                    Reverse osmosis membranes force water through a semi- permeable membrane using an application of a high external pressure. They are typically used in purifying water-bodies containing salts.
                                </div>
                                <div class="mini__card__link">
                                    <a href="{{ route('ro-technology')}}">
                                        Know More
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="homepage section__4 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h2 class="section__head__desc">
                            Sectors
                        </h2>
                    </div>
                    <div class="section__sub__head">
                        Sparkle is committed to the water treatment industry and provides a wide range of services, across multiple sectors.
                    </div>
                </div>
            </div>

            <div class="row sectors__row">
                <div class="col-xs-12 col-sm-6 col-md-3 sectors__column">
                    <div class="card">
                        <div class="card__image">
                            <img class="activator" src="{{asset('/img/home_page/sectors/commercial.jpg')}}" alt="Commercial Sector">
                        </div>
                        <div class="card__reveal">
                            <span class="card__reveal__name">
                                <i class="fa fa-times card__close"></i>
                            </span>
                            <div class="card__reveal__desc">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <ul class="">
                                            <li>Community Parks</li>
                                            <li>Multiplexes</li>
                                            <li>Recreation Centers & Clubs</li>
                                            <li>Swimming Pools</li>
                                            <li>Townships</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <ul class="">
                                            <li>Health & Education</li>
                                            <li>Hospitality</li>
                                            <li>Construction</li>
                                            <li>Urban Development</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card__content">
                            <p class="card__content__desc">
                              <a href="{{route('commercial-sector')}}">
                                <i class="fa fa-building-o"></i>
                                Commercial
                              </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 sectors__column">
                    <div class="card">
                        <div class="card__image">
                            <img class="activator" src="{{asset('/img/home_page/sectors/industrial.jpg')}}" alt="Industrial Sector">
                        </div>
                        <div class="card__reveal">
                            <span class="card__reveal__name">
                                <i class="fa fa-times card__close"></i>
                            </span>
                            <div class="card__reveal__desc">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <ul class="">
                                            <li>Oil & Energy</li>
                                            <li>Paper Mill</li>
                                            <li>Automobile</li>
                                            <li>Chemicals</li>
                                            <li>Pharmaceutical</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <ul class="">
                                            <li>Foods & Beverages</li>
                                            <li>Iron & Steel</li>
                                            <li>Power</li>
                                            <li>Shipping</li>
                                            <li>Textile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card__content">
                            <p class="card__content__desc">
                                <a href="{{route('industrial-sector')}}">
                                  <i class="fa fa-industry" aria-hidden="true"></i>
                                  Industrial
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 sectors__column">
                    <div class="card">
                        <div class="card__image">
                            <img class="activator" src="{{asset('/img/home_page/sectors/government.jpg')}}" alt="Government Sector">
                        </div>
                        <div class="card__reveal">
                            <span class="card__reveal__name">
                                <i class="fa fa-times card__close"></i>
                            </span>
                            <div class="card__reveal__desc">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <ul class="">
                                            <li>Educational Institutions</li>
                                            <li>Municipal</li>
                                            <li>Towns</li>
                                            <li>Villages</li>
                                            <li>Military</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <ul class="">
                                            <li>Civil Aviation</li>
                                            <li>Railways</li>
                                            <li>Road Ways</li>
                                            <li>Oil & Energy</li>
                                            <li>Shipping</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card__content">
                            <p class="card__content__desc">
                                <a href="{{route('government-sector')}}">
                                  <i class="fa fa-university" aria-hidden="true"></i>
                                  Government
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 sectors__column">
                    <div class="card">
                        <div class="card__image">
                            <img class="activator" src="{{asset('/img/home_page/sectors/oil-gas.jpg')}}" alt="Oil & Gas Sector">
                        </div>
                        <div class="card__reveal">
                            <span class="card__reveal__name">
                                <i class="fa fa-times card__close"></i>
                            </span>
                            <div class="card__reveal__desc">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <ul class="">
                                          <li>Oil & Energy</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card__content">
                            <p class="card__content__desc">
                                <a href="{{route('oil-and-gas-sector')}}">
                                  <i class="fa fa-fire" aria-hidden="true"></i>
                                  Oil & Gas
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="homepage section__handle section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h2 class="section__head__desc">
                            Downloads
                        </h2>
                    </div>
                    {{--<div class="section__sub__head">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam nisi voluptatum praesentium est quisquam commodi
                    </div>--}}
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
            
            {{--<div class="row">
              <div class="col-xs-12">
                <div class="section-cta">
                   <a href="" class="btn btn-primary btn-lg z-depth-1">
                       View More
                   </a>
                </div>
              </div>
            </div>--}}
        </div>
    </div>

    <div class="homepage section__5 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">
                            Global Partners
                        </h1>
                    </div>
                </div>
            </div>
            
            <div class="row partners dont-break">
              @foreach($global_partners as $global_partner)
                <div class="col-xs-12 col-md-3 partners__slide">
                  <div class="partners__slide__img">
                    <span class="pivot top-h"></span>
                    <span class="pivot top-v"></span> 
                      <img src="{{asset('img/home_page/partners/'.$global_partner['logo'].'.jpg')}}" alt="{{$global_partner['alt']}}" title="{{$global_partner['alt']}}">
                    <span class="pivot bottom-h"></span>
                    <span class="pivot bottom-v"></span>
                  </div>
                </div>
              @endforeach
              <div class="col-xs-12 col-md-3 partners__slide">
                  <div class="partners__slide__img">
                    <span class="pivot top-h"></span>
                    <span class="pivot top-v"></span>
                    <a href="{{route('clients')}}">& Many More</a>
                    <span class="pivot bottom-h"></span>
                    <span class="pivot bottom-v"></span>
                  </div>
              </div>
            </div>
        </div>
    </div>
@stop

@section('script_tag')
    <script src="{{asset('js/modernizr.js')}}"></script>
    <script src="{{asset('js/rain.js')}}?v=1002017-1530"></script>
@endsection


