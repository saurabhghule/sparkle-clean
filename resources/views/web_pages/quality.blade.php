@extends('index')

@section('title') Quality Policy | Sparkle Clean Tech Pvt.Ltd. @stop

@section('seo_tags')
    <meta name="description" content="Sparkle Clean Tech Pvt. Ltd is commited to serve it's customers and meet their needs and expectations in the design, manufacture, supply & installation.">
@stop

@section('content')
    
    <div class="quality__page section__1" title="Quality">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="col-xs-12">
                <div class="banner__content text-center">
                    <h1 class="inline-block tagline">
                        <span class="pivot top-h"></span>
                        <span class="pivot top-v"></span>
                        Quality
                        <span class="pivot bottom-h"></span>
                        <span class="pivot bottom-v"></span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="quality__page section__2 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h1 class="section__head__desc">QUALITY POLICY</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="quality__content__title">
                        Customer Centricity, <br> Cutting Edge <br><span>Solutions</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="quality__content__desc text-justify">
                        <span>Sparkle Clean Tech Pvt. Ltd</span> is commited to serve it's customers and meet their needs and expectations in the design, manufacture, supply, installation and commission of reliable and innovative technologies and products for Water Treatment using modern management, engineering and material sciences.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-push-8 col-sm-4">
                    <div class="quality__content__title second">
                        Premium Quality <br><span>Products</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-pull-4 col-sm-8">
                    <div class="quality__content__desc second text-justify">
                        <span>Sparkle Clean Tech Pvt. Ltd</span> is committed to continuing improvement of its products and services to achieve increased customer delight as well as to ensure compliance with the requirements of the Quality Management System and it’s continual improvement”
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section__divider"></div>
    </div>

    <div class="quality__page section__3 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="sct__iso">
                        <div class="sct__iso__certificate">
                            <a href="{{asset('downloads/quality_page/iso-9000-certificate.pdf')}}" target="_blank">
                                <img src="{{asset('img/quality_page/iso-9000.jpg?v=2')}}" alt="ISO Quality Certificate">
                            </a>
                        </div>
                        <div class="sct__iso__content">
                            Sparkle Clean Tech has been awarded ISO 9001:2015 certification
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop