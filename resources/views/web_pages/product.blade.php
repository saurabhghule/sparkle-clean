@extends('index')

@section('title') {{ $product['seo_titleTag'] }} @stop

@section('seo_tags')
    <meta name="keywords" content="{{ $product['seo_keywords'] }}">
    <meta name="description" content="{{ $product['seo_metaDesc'] }}">
@stop

@section('content')
    
    <div class="product__page section__1">
        <div class="sctLightBlue__section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="sctLightBlue__section__head">
                            <h1 class="sctLightBlue__section__head__desc">{{$product['product_heading']}}</h1>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

    <div class="product__page section__2 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="product__details">
                        <div class="product__image">
                            <div class="section__image text-center">
                                <img src="{{asset('/img/technology/products/'.$product['product_image'])}}" alt="{{$product['product_imageAlt']}}" title="{{$product['product_imageAlt']}}">
                            </div>
                        </div>

                        <div class="product__desc">
                            <div class="section__head">
                                <h2 class="section__head__desc">Product Description</h2>
                            </div>

                            <div class="section__description">
                                @foreach($product['product_desc'] as $desc)
                                    <p>{!!$desc!!}</p>      
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop