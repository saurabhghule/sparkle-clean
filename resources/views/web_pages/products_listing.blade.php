@extends('index')

@section('title') Products Of Sparkle Clean Tech Pvt.Ltd. @stop

@section('seo_tags')
    <meta name="description" content="Sparkle believes in the conservation & optimal utilization of water resources for its clients and pledges to build a better world of pure water.">
@stop

@section('content')
    
    <div class="products__listing section__1 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">PRODUCTS</h1>
                    </div>
                    <br>
                </div>
            </div>

            
            @foreach($products as $product_index => $product)
                <div class="products__grid">
                    <div class="products__grid__title">
                        {{$product_index}}
                    </div>
                    <div class="row products__grid_row height-equalizer-wrapper">
                        @foreach($product as $product_detail)
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 products__grid_column">
                                <div class="card">
                                    <div class="card__image">
                                        <img class="activator" src="{{asset('/img/technology/products/'.$product_detail['product_image'])}}" alt="{{ $product_detail['product_heading'] }}">
                                    </div>
                                    <div class="card__content height-equalizer">
                                        <span class="card__content__title">
                                            {{ $product_detail['product_heading'] }}
                                        </span>
                                    </div>
                                    <div class="card__link">
                                        <a href="{{$product_detail['product_url']}}">View details
                                        <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="section__divider"></div>
                </div>
            @endforeach
        </div>
    </div> 
@stop