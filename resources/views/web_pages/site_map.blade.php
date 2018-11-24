@extends('index')

@section('title') Sitemap | Sparkle Clean Tech Pvt.Ltd. @stop

@section('content')
    
    <div class="sitemap__page section__1">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <h1 class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Sitemap
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sitemap__page section__2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="sitemap__panel__head">
                        <a href="{{route('home')}}">Home</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="sitemap__panel__head">
                        <a href="{{route('case-studies')}}">Case Studies</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="sitemap__panel__head">
                        <a href="{{route('our-reach')}}">Our Reach</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2">
                    <div class="sitemap__panel__head">
                        <a href="{{route('contact')}}">Contact Us</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-1">
                    <div class="sitemap__panel__head">
                        <a href="{{route('clients')}}">Clients</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="sitemap__panel__head">
                        Company
                    </div>
                    <div class="sitemap__panel__desc">
                        <ul class="menu">
                            <li class="menu__items"><a href="{{route('about')}}">About us</a></li>
                            <li class="menu__items"><a href="{{route('team')}}">Team</a></li>
                            <li class="menu__items"><a href="{{route('quality')}}">Quality Policy</a></li>
                            <li class="menu__items"><a href="{{route('careers')}}">Careers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="sitemap__panel__head">
                        Solutions
                    </div>
                    <div class="sitemap__panel__desc">
                        <ul class="menu menu-solutions">
                            <li class="menu__items"><a href="water-management-solution">Water Management</a></li>
                            <li class="menu__items"><a href="waste-water-management-solution">Waste Water Management</a></li>
                            <li class="menu__items"><a href="drinking-water-solution">Drinking Water</a></li>
                            <li class="menu__items"><a href="zero-liquid-discharge-solution">Zero Liquid Discharge(ZLD)</a></li>
                            <li class="menu__items"><a href="{{ route('oil-and-gas-solution')}}">Water Management for Oil and Gas</a></li>
                            <li class="menu__items"><a href="other-solution">Others</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="sitemap__panel__head">
                        Technologies
                    </div>
                    <div class="sitemap__panel__desc">
                        <ul class="menu">
                            <li class="menu__items"><a href="{{ route('depth-filtration-technology')}}">Depth Filtration</a></li>
                            <li class="menu__items"><a href="{{ route('micro-membrane-technology')}}">Micro / Membrane Filtration</a></li>
                            <li class="menu__items"><a href="{{ route('ion-exchange-technology')}}">Ion Exchange</a></li>
                            <li class="menu__items"><a href="{{ route('ro-technology')}}">RO Plant</a></li>
                            <li class="menu__items"><a href="{{ route('setting-coagulation-flocculation-oil-seperation-technology') }}">Setting / Coagulation / Flocculation</a></li>
                            <li class="menu__items"><a href="{{ route('oil-seperation-technology')}}">Oil Seperation</a></li>
                            <li class="menu__items"><a href="{{ route('actuated-sludge-technology')}}">Activated Sludge Process</a></li>
                            <li class="menu__items"><a href="{{ route('attached-growth-process-technology')}}">Attached Growth Process</a> </li>
                            <li class="menu__items"><a href="{{ route('membrane-bio-reactor-technology')}}">Membrane Bio Reactor</a></li>
                            <li class="menu__items"><a href="{{ route('other-technology')}}">Others</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="sitemap__panel__head">
                        Sectors
                    </div>
                    <div class="sitemap__panel__desc">
                        <ul class="menu">
                            <li class="menu__items"><a href="{{ route('commercial-sector')}}">Commercial</a></li>
                            <li class="menu__items"><a href="{{ route('industrial-sector')}}">Industrial</a></li>
                            <li class="menu__items"><a href="{{ route('government-sector')}}">Government</a></li>
                            <li class="menu__items"><a href="{{ route('oil-and-gas-sector')}}">Oil & Gas</a></li>
                        </ul>
                    </div>
                </div>    
            </div>
        </div>
    </div>
@stop