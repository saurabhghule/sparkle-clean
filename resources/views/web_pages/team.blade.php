@extends('index')

@section('title') Our Team | Sparkle Clean Tech Pvt.Ltd. @stop

@section('seo_tags')
    <meta name="description" content="Sparkle Clean Technologies Pvt Ltd consists of some talented professionals. Our team includes leaders like Sumeet, Parthivv and Chetan.">
@stop

@section('content')
    <div class="team__page section__1">
        <div class="sctLightBlue__section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="sctLightBlue__section__head">
                            <h1 class="sctLightBlue__section__head__desc">MEET MANAGEMENT TEAM</h1>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <div class="sct__team sct__team--management">
            <div class="container">
                <div class="row team__members__row height-equalizer-wrapper">
                    @foreach($management_teamMembers as $member_name => $member)
                        <div class="col-xs-6 col-sm-6 col-md-4 team__members__column">
                            <div class="card">
                                <div class="card__image">
                                    <img class="activator" src="{{asset('/img/team_page/'.$member['image'].'.jpg')}}" alt="{{$member_name}}">
                                </div>
                                <div class="card__content">
                                    <span class="card__content__title activator">
                                        {{$member_name}}
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <p class="card__content__desc height-equalizer">
                                        {{$member['designation']}}
                                    </p>

                                </div>
                                <div class="card__reveal text-justify">
                                    <span class="card__reveal__name">
                                        {{$member_name}}
                                        <i class="fa fa-times card__close"></i>
                                    </span>
                                    <p class="card__reveal__designation">
                                        {{$member['designation']}}
                                    </p>
                                    <p class="card__reveal__email">
                                        <span class="hidden-xs">Email : </span>
                                        <a href="mailto:{{$member['email']}}">{{$member['email']}}</a>
                                    </p>
                                    @foreach($member['description'] as $desc)
                                        <p class="card__reveal__desc">
                                            {{$desc}}
                                        </p>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="sctLightBlue__section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="sctLightBlue__section__head">
                            <h1 class="sctLightBlue__section__head__desc">MEET FUNCTIONAL TEAM</h1>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <div class="sct__team sct__team--functional">
            <div class="container">
                <div class="row team__members__row height-equalizer-wrapper">
                    @foreach($functional_teamMembers as $member_name => $member)
                        <div class="col-xs-6 col-sm-6 col-md-4 team__members__column">
                            <div class="card">
                                <div class="card__image">
                                    <img class="activator" src="{{asset('/img/team_page/'.$member['image'].'.jpg')}}">
                                </div>
                                <div class="card__content">
                                    <span class="card__content__title activator">
                                        {{$member_name}}
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <p class="card__content__desc height-equalizer">
                                        {{$member['designation']}}
                                    </p>
                                </div>
                                <div class="card__reveal text-justify" style="display: none; top: 100%;">
                                    <span class="card__reveal__name">
                                        {{$member_name}}
                                        <i class="fa fa-times card__close"></i>
                                    </span>
                                    <p class="card__reveal__designation">
                                        {{$member['designation']}}
                                    </p>
                                    <p class="card__reveal__email">
                                        <span class="hidden-xs">Email : </span>
                                        <a href="mailto:{{$member['email']}}">{{$member['email']}}</a>
                                    </p>
                                    @foreach($member['description'] as $desc)
                                        <p class="card__reveal__desc">
                                            {{$desc}}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop