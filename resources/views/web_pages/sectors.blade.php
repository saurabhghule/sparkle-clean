@extends('index')

@section('title') 
    {{ $seo_titleTag }}
@stop

@section('seo_tags')
    <meta name="description" content="{{ $seo_metaDesc }}">
@stop

@section('content')
    
    <div class="sectors__page section__1" title="Sectors">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <div class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Sectors
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sectors__page section__2">
        <div class="row width-100 margin-l-0 margin-r-0">
            <div class="col-xs-12 col-sm-3 padding-r-0 hidden-xs calculate-width">
                <div class="sector__nav__menu">
                    <div class="sector__nav__menu__title">Sectors</div>

                    <div class="sector__nav__menu__items {{ Request::is('commercial-sector') ? 'active' : ''}}">
                        <a href="{{ route('commercial-sector')}}">Commercial</a>
                    </div>
                    <div class="sector__nav__menu__items {{ Request::is('industrial-sector') ? 'active' : ''}}">
                        <a href="{{ route('industrial-sector')}}">Industrial</a>
                    </div>
                    <div class="sector__nav__menu__items {{ Request::is('government-sector') ? 'active' : ''}}">
                        <a href="{{ route('government-sector')}}">Government</a>
                    </div>
                    <div class="sector__nav__menu__items {{ Request::is('oil-and-gas-sector') ? 'active' : ''}}">
                        <a href="{{ route('oil-and-gas-sector')}}">Oil & Gas</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="sector__nav__content">
                    <div class="width-90">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="section__head">
                                    <h1 class="section__head__desc">{{$sector_title}}</h1>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="sector__block text-justify">
                                    @foreach($sector_desc_block as $index => $block)
                                        <p>
                                            {!! $block !!}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="sector__list">
                                    <p class="sector__list__title">
                                        <!-- <strong>Owing to these plants are used various sectors stated below :</strong> -->
                                        @if(isset($sector_desc_list_title) and !empty($sector_desc_list_title))
                                            <strong>
                                                {!! $sector_desc_list_title !!}
                                            </strong>
                                        @endif
                                    </p>

                                    <ul class="list">
                                        @foreach($sector_desc_list as $index => $list)
                                            <li class="list__items">{{$list}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if(isset($project_link) and !empty($project_link))
                            <div class="project__link">
                                <a href="{{$project_link}}">Click Here</a> to view Government Projects by Sparkle Clean Tech
                            </div>

                            <div class="sct__vendor">
                                <div class="sct__vendor__letter">
                                    <a href="{{asset('downloads/government_sector/mecon_letter.pdf')}}" target="_blank">
                                        <img src="{{asset('img/sectors/mecon_letter.jpg')}}" alt="Mecon Letter">
                                    </a>
                                </div>
                                <div class="sct__vendor__content">
                                    "We are now registered vendor for SAIL and MECON"
                                </div>
                            </div>                   
                        @endif                      
                        <div class="section__divider"></div>
                    </div>
                </div>

                <div class="sector__solutions">
                    <div class="width-90">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="section__head">
                                    <h2 class="section__head__desc">Solution</h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="solutions">
                            @foreach($solutions as $solution_index => $solution)
                                <div class="solutions__slide">
                                    <div class="slide__heading">{{$solution['solution_heading']}}</div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="slide__img">
                                                <img src="{{asset('/img/sectors/solution/'.$solution['solution_image'])}}" alt="{{$solution['solution_heading']}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-md-9">
                                            <div class="slide__content text-justify">
                                                @foreach($solution['solution_desc'] as $index => $desc)
                                                    <p>
                                                        {{$desc}}
                                                    </p>
                                                @endforeach
                                            </div>
                                            <div class="slide__cta">
                                                <a href="{{$solution['solution_link']}}" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-top z-depth-1"></div>
    </div>
@stop