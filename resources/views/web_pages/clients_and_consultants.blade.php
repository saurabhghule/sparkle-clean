@extends('index')

@section('title') Clients Of Sparkle Clean Tech Pvt.Ltd. @stop

@section('seo_tags')
    <meta name="description" content="At Sparkle, We have our wide client base in Automobile, Construction & Infrastructure, Oil & Gas Refinery and various other industries.">
@stop

@section('content')
    
    <div class="clients__page section__1" title="Clients">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <h1 class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Clients
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clients__page section__2">
        <div class="row width-100 margin-l-0 margin-r-0">
            <div class="col-xs-12 col-sm-3 padding-r-0 hidden-xs calculate-width">
                <div class="clients__nav__menu">
                    <div class="clients__nav__menu__title">Industries</div>

                    @foreach($clients_and_consultants as $index => $data)
                        <div class="clients__nav__menu__items">
                            <a href="#{{str_replace(',','_',str_replace('&','_',str_replace(' ','',$index)))}}">{{$index}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="clients__nav__content">
                    <div class="width-90">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="section__head">
                                    <h2 class="section__head__desc">INDUSTRIES</h2>
                                </div>
                            </div>
                        </div>
                        
                        @foreach($clients_and_consultants as $index => $data)
                            <div class="grid">
                                <div id="{{str_replace(',','_',str_replace('&','_',str_replace(' ','',$index)))}}" class="grid__title">
                                    {{$index}}
                                </div>
                                <ul class="block-grid-xs-2 block-grid-sm-3 block-grid-md-4 client__grid">
                                    @foreach($data as $element)
                                        @if(isset($element['client_logo']))
                                            <li class="client__grid__items">
                                                <div class="sct__client__logo">
                                                    <span class="pivot top-h"></span>
                                                    <span class="pivot top-v"></span>
                                                    <img src="{{asset('img/clients&consultants/'.strtolower($index).'/'.$element["client_logo"])}}" alt="{{$element['client_name']}}">
                                                    <span class="pivot bottom-h"></span>
                                                    <span class="pivot bottom-v"></span>
                                                </div>
                                                <div class="sct__client__name">{{$element['client_name']}}</div>
                                            </li>
                                        @else
                                            <li class="client__grid__items">
                                                <div class="sct__client__logo">
                                                    <span class="pivot top-h"></span>
                                                    <span class="pivot top-v"></span>
                                                    <div class="dummy-image">
                                                        <div class="sct__client__name">
                                                            {{$element['client_name']}}
                                                        </div>
                                                    </div>
                                                    <span class="pivot bottom-h"></span>
                                                    <span class="pivot bottom-v"></span>
                                                </div>
                                                <div class="sct__client__name">{{$element['client_name']}}</div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="section__divider"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-top z-depth-1"></div>
    </div>
@stop