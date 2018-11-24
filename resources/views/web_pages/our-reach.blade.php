@extends('index')

@section('title') Our Reach | Sparkle Clean Tech Pvt.Ltd. @stop

@section('seo_tags')
    <meta name="description" content="Sparkle Clean Tech offers end to end water treatment solutions across the globe, both geographical spread as well as in-depth reach">
@stop

@section('link_tag')
    <style>
        #sct_map {
            height: 450px;
        }
    </style>
@stop

@section('content')
    
    <div class="ourReach__page section__1">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <h1 class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Our Reach
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ourReach__page section__2 section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__head">
                        <h2 class="section__head__desc">Our Reach</h2>
                    </div>
                    <div class="section__sub__head">
                        Sparkle Clean Tech offers end to end water treatment solutions across the globe. While our intention is to reach in terms of both geographical spread as well as in-depth reach in within each community we aim to serve.
                        <br><br>
                        Our office locations in India, Singapore, and Philippines add to our overall capabilities to offer customized research solutions irrespective of where you are based or which water management solution you wish to explore. Having such phenomenal expertise, we have served more than 700 projects worldwide.
                        Check out our reach in India as well as Internationally.
                    </div>
                </div>
            </div>
            
            <div class="display_maps">
                <div class="row">            
                    <div class="col-xs-12 col-sm-12">
                        <div class="map-wrapper">
                            <div id="india-map" class="map-india z-depth-1">
                                <div class="india-map-title hidden-sm hidden-md hidden-lg">INDIA</div>
                            </div>
                            @foreach($indian_clients as $index => $data)
                                <div class="modal fade" id="myModal-{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModal">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title" id="exampleModalLabel"></h3>
                                            </div>
                                            <div class="modal-body">
                                            @foreach($data as $key => $element)
                                                <div class="grid">
                                                    <div id="{{str_replace(',','_',str_replace('&','_',str_replace(' ','',$index)))}}" class="grid__title">
                                                        {{$key}}
                                                    </div>
                                                    <ul class="block-grid-xs-2 block-grid-sm-3 block-grid-md-4 client__grid">
                                                        @foreach($element as $ele)
                                                            @if(isset($ele['client_logo']))
                                                                <li class="client__grid__items">
                                                                    <div class="sct__client__logo">
                                                                        <span class="pivot top-h"></span>
                                                                        <span class="pivot top-v"></span>
                                                                        <img src="{!!asset('img/clients&consultants/'.strtolower($key).'/'.$ele["client_logo"].'.jpg')!!}">
                                                                        <span class="pivot bottom-h"></span>
                                                                        <span class="pivot bottom-v"></span>
                                                                    </div>
                                                                    <div class="sct__client__name">{{$ele['client_name']}}</div>
                                                                </li>
                                                            @else
                                                                <li class="client__grid__items">
                                                                    <div class="sct__client__logo">
                                                                        <span class="pivot top-h"></span>
                                                                        <span class="pivot top-v"></span>
                                                                        <div class="dummy-image">
                                                                            <div class="sct__client__name">
                                                                                {{$ele['client_name']}}
                                                                            </div>
                                                                        </div>
                                                                        <span class="pivot bottom-h"></span>
                                                                        <span class="pivot bottom-v"></span>
                                                                    </div>
                                                                    <div class="sct__client__name">{{$ele['client_name']}}</div>
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
                            @endforeach

                            @foreach($foreign_clients as $index => $data)
                            <div id="{{$index}}" class="map z-depth-1">
                                <div class="map-image {{$index}}-map"></div>
                                <div class="map-title {{$index}}-title">{{$data['client_country']}}</div>
                            </div>

                            <div class="modal fade" id="myModal-{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModal">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h3 class="modal-title" id="exampleModalLabel">
                                                {{$data['client_country']}}
                                            </h3>
                                        </div>
                                        <div class="modal-body">
                                            @foreach($data['others'] as $key => $ele)
                                            <div class="grid">
                                                <ul class="block-grid-xs-2 block-grid-sm-3 block-grid-md-4 client__grid">
                                                    @if(isset($ele['client_logo']))
                                                    <li class="client__grid__items">
                                                        <div class="sct__client__logo">
                                                            <span class="pivot top-h"></span>
                                                            <span class="pivot top-v"></span>
                                                            <img src="{!!asset('img/clients&consultants/foreign/'.$ele["client_logo"].'.jpg')!!}">
                                                            <span class="pivot bottom-h"></span>
                                                            <span class="pivot bottom-v"></span>
                                                        </div>
                                                        <div class="sct__client__name">{{$ele['client_name']}}</div>
                                                    </li>
                                                    @else
                                                        <li class="client__grid__items">
                                                            <div class="sct__client__logo">
                                                                <span class="pivot top-h"></span>
                                                                <span class="pivot top-v"></span>
                                                                <div class="dummy-image">
                                                                    <div class="sct__client__name ">
                                                                        {{$ele['client_name']}}
                                                                    </div>
                                                                </div>
                                                                <span class="pivot bottom-h"></span>
                                                                <span class="pivot bottom-v"></span>
                                                            </div>
                                                            <div class="sct__client__name">
                                                                {{$ele['client_name']}}
                                                            </div>
                                                        </li>

                                                    @endif
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="india-map-title text-center hidden-xs">INDIA</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script_tag')
    <script src="{{asset('js/maps.js')}}"></script>
@endsection


