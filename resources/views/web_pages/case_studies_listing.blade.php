@extends('index')

@section('title') 
    Case Studies | Sparkle Clean Tech Pvt.Ltd. 
@stop

@section('seo_tags')
    <meta name="keywords" content="Sewage Treatment Plant Manufacturers, Sewage Treatment Plant Manufacturers in mumbai, Industrial Waste Water Treatment Plant, Waste Water Treatment Plant for Oil & Gas, Oily waste water Treatment Plant, Oily waste water Treatment Plant">
    
    <meta name="description" content="Industries Sparkle has worked in Malt Processing, Textile Processing, Sewage Treatment Plant, Oil Filling Station, oil & Gas, Automobile, Soap & Detergent, Power Plant">
@stop

@section('content')
    
    <div class="case__study__listing section__1">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <h1 class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Case Studies
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="case__study__listing section__2 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">CASE STUDIES</h1>
                    </div>
                </div>
            </div>

            <div class="row case_study_row">
                @foreach($case_studies as $index => $case_study_card)
                    <div class="col-xs-6 col-sm-6 col-md-4 case_study_column">
                        <div class="card">
                            <div class="card__image">
                                <img class="activator" src="{{asset('/img/case_studies/cards/'.$case_study_card['card_image'])}}" alt="{{$case_study_card['title']}}">
                            </div>
                            <div class="card__content">
                                <h2 class="card__content__title activator">
                                    {{ $case_study_card['title'] }}
                                </h2>
                            </div>
                            <div class="card__link">
                                <a href="{{asset($case_study_card['url'])}}">View details
                                <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop