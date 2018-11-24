@extends('index')

@section('title') {{ $seo_titleTag }} @stop

@section('seo_tags')
    <meta name="description" content="{{ $seo_metaDesc }}">
@stop

@section('content')

    <div class="technology__page section__1" title="Technology">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <div class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Technology
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="technology__page section__2">
        <div class="row width-100 margin-l-0 margin-r-0">
            <div class="col-xs-12 col-sm-3 hidden-xs calculate-width padding-r-0">
                <div class="technology__nav__menu">
                    <div class="technology__nav__menu__title">Technologies</div>

                    <div class="technology__nav__menu__items {{ Request::is('depth-filtration-technology') ? 'active' : ''}}">
                        <a href="{{ route('depth-filtration-technology')}}">Depth Filtration</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('micro-membrane-technology') ? 'active' : ''}}">
                        <a href="{{ route('micro-membrane-technology')}}">Micro / Membrane Filtration</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('ion-exchange-technology') ? 'active' : ''}}">
                        <a href="{{ route('ion-exchange-technology')}}">Ion Exchange</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('ro-technology') ? 'active' : ''}}">
                        <a href="{{ route('ro-technology')}}">RO Plant</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('setting-coagulation-flocculation-technology') ? 'active' : ''}}">
                        <a href="{{ route('setting-coagulation-flocculation-oil-seperation-technology')}}">Setting / Coagulation / Flocculation</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('oil-seperation-technology') ? 'active' : ''}}">
                        <a href="{{ route('oil-seperation-technology')}}">Oil Seperation</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('activated-sludge-technology') ? 'active' : ''}}">
                        <a href="{{ route('actuated-sludge-technology')}}">Activated Sludge Process</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('attached-growth-process-technology') ? 'active' : ''}}">
                        <a href="{{ route('attached-growth-process-technology')}}">Attached Growth Process</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('membrane-bio-reactor-technology') ? 'active' : ''}}">
                        <a href="{{ route('membrane-bio-reactor-technology')}}">Membrane Bio Reactor</a>
                    </div>
                    <div class="technology__nav__menu__items {{ Request::is('other-technologies') ? 'active' : ''}}">
                        <a href="{{ route('other-technology')}}">Others</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                @if(count($technology_desc_block) > 0)
                <div class="technology__nav__content">
                    <div class="width-90">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="section__head">
                                    <h1 class="section__head__desc">{{$technology_title}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="technology__block text-justify">
                                    @foreach($technology_desc_block as $index => $block)
                                        <p>
                                            {!!$block!!}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="section__divider"></div>
                    </div>
                </div>
                @endif
                @if(count($products) > 0)
                    <div class="technology__products">
                        <div class="width-90">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="section__head">
                                        <h2 class="section__head__desc">Products</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="products">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php $i = 0?>
                                    @foreach($products as $products_index => $product)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading{{(++$i)}}">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{($i)}}" aria-expanded="true" aria-controls="collapse{{($i)}}" class="slide__heading collapsed">
                                                        {{ $product['product_heading']}}
                                                        <i class="fa fa-arrow-circle-down right" aria-hidden="true"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse{{($i)}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{($i)}}">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="slide__block">
                                                                <div class="slide__block__img">
                                                                    <img src="{{asset('/img/technology/products/'.$product['product_image'])}}" alt="{{ $product['product_heading']}}">
                                                                </div> 
                                                                <div class="slide__block__content text-justify">
                                                                    @foreach($product['product_desc'] as $index => $desc)
                                                                        <p>
                                                                            {!!$desc!!}
                                                                        </p>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="scroll-top z-depth-1"></div>
    </div>
@stop