@extends('index')

@section('title') {{ $seo_titleTag }} @stop

@section('seo_tags')
    <meta name="keywords" content="{{ $seo_keywords }}">

    <meta name="description" content="{{ $seo_metaDesc }}">
@stop

@section('content')
    
    <div class="solutions__page section__1" title="Solutions">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <div class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Solutions
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="solutions__page section__2">
        <div class="row width-100 margin-l-0 margin-r-0">
            <div class="col-xs-12 col-sm-3 padding-r-0 hidden-xs calculate-width">
                <div class="solution__nav__menu">
                    <div class="solution__nav__menu__title">Solutions</div>
                
                    <div class="solution__nav__menu__items {{ Request::is('water-management-solution') ? 'active' : ''}}">
                        <a href="{{ route('water-management-solution')}}">Water Management</a>
                    </div>
                    <div class="solution__nav__menu__items {{ Request::is('waste-water-management-solution') ? 'active' : ''}}">
                        <a href="{{ route('waste-water-management-solution')}}">Waste Water Management</a>
                    </div>
                    <div class="solution__nav__menu__items {{ Request::is('drinking-water-solution') ? 'active' : ''}}">
                        <a href="{{ route('drinking-water-solution')}}">Drinking Water</a>
                    </div>
                    <div class="solution__nav__menu__items {{ Request::is('zero-liquid-discharge-solution') ? 'active' : ''}}">
                        <a href="{{ route('zero-liquid-discharge-solution')}}">Zero Liquid Discharge</a>
                    </div>
                    <div class="solution__nav__menu__items {{ Request::is('oil-and-gas-solution') ? 'active' : ''}}">
                        <a href="{{ route('oil-and-gas-solution')}}">Water Management for Oil & Gas</a>
                    </div>
                    <div class="solution__nav__menu__items {{ Request::is('other-solutions') ? 'active' : ''}}">
                        <a href="{{ route('other-solution')}}">Others</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="solution__nav__content">
                    <div class="width-90">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="section__head">
                                    <h1 class="section__head__desc">{{$solution_title}}</h1>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="solution__block text-justify">
                                    @foreach($solution_desc_block as $index => $block)
                                        <p>
                                            {{$block}}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        @if(isset($project_link) and !empty($project_link))
                            <div class="project__link">
                                <a href="{{$project_link}}">Click Here</a> to view Water Management Projects by Sparkle Clean Tech
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
                                    <h2 class="section__head__desc">Technology</h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="technology">
                            @foreach($technologies as $technology_index => $technology)
                                <div class="technology__slide">
                                    <div class="slide__heading">{{$technology['technology_heading']}}</div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-5 col-md-4">
                                            <div class="slide__img">
                                                <img src="{{asset('/img/solutions/technology/'.$technology['technology_image'])}}" alt="{{$technology['technology_heading']}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-md-8">
                                            <div class="slide__content text-justify">
                                                @foreach($technology['technology_desc'] as $index => $desc)
                                                    <p>
                                                        {{$desc}}
                                                    </p>
                                                @endforeach
                                            </div>
                                            <div class="slide__cta">
                                                <a href="{{$technology['technology_link']}}" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="products__title">Products :</div>
                                                <ul class="products__grid block-grid-xs-1 block-grid-sm-2">
                                                    @foreach($technology['products'] as $product_index => $product)
                                                        <li class="products__grid__items ">
                                                            <a href="{{$product['product_link']}}" class="product z-depth-1">
                                                                {{$product['product_name']}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
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