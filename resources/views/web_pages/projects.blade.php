@extends('index')

@section('title') {{ $seo_titleTag }} @stop

@section('seo_tags')
    <meta name="description" content="{{ $seo_metaDesc }}">
@stop

@section('content')
    
    <div class="projects__page section__1" title="Projects">
        <div class="banner__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner__content text-center">
                        <h1 class="inline-block tagline">
                            <span class="pivot top-h"></span>
                            <span class="pivot top-v"></span>
                            Projects
                            <span class="pivot bottom-h"></span>
                            <span class="pivot bottom-v"></span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="projects__page section__2">
        <div class="row width-100 margin-l-0 margin-r-0">
            <div class="col-xs-12 col-sm-3 padding-r-0 hidden-xs calculate-width">
                <div class="projects__nav__menu">
                    <div class="projects__nav__menu__title">Projects</div>

                    <div class="projects__nav__menu__items {{ Request::is('water-management-project') ? 'active' : ''}}">
                        <a href="{{ route('water-management-project')}}">Water Management Projects</a>
                    </div>
                    <div class="projects__nav__menu__items {{ Request::is('waste-water-management-project') ? 'active' : ''}}">
                        <a href="{{ route('waste-water-management-project')}}">Waste Water Management Projects</a>
                    </div>
                    <div class="projects__nav__menu__items {{ Request::is('government-project') ? 'active' : ''}}">
                        <a href="{{ route('government-project')}}">Government Projects</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="projects__nav__content">
                    <div class="width-90">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="section__head">
                                    <h1 class="section__head__desc">{{$project_title}}</h1>
                                </div>
                            </div>
                        </div>
                        @if(isset($project) and !empty($project))
                            <div class="project">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-2 padding_r_0">
                                        <div class="project__image">
                                            <img src="{{asset('/img/projects/'.$project['project_client_logo'])}}" alt="ONGC Logo">
                                        </div> 
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-10">
                                        <div class="project__content">
                                           
                                            <div class="client__name">{{$project['project_client_name']}}</div>
                                            
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="solution__heading">Treatment</div>
                                                    <div class="solution">{{$project['project_treatment_solution']}}</div>
                                                </div>
                                            
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="solution__heading">Sector</div>
                                                    <div class="solution">{{$project['project_sector']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="project__table table table-striped">
                                    <thead>
                                        @foreach($project['content_title'] as $title_index => $title)
                                            <th>{{$title}}</th>
                                        @endforeach
                                    </thead>
                                    <tbody>
                                        @foreach($project['project_details'] as $details_index => $details)
                                            <tr>
                                                @foreach($details as $detail)
                                                    <td>{{$detail}}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        @if(isset($table) and !empty($table))
                            @foreach($table as $table_index => $table_entry)
                                <div class="govt__title">{{$table_index}}</div>

                                <div class="table-responsive">
                                    <table class="project__table govt__table table table-striped">
                                        <thead>
                                            @foreach($table_entry['table_head'] as $title)
                                                <th>{{$title}}</th>
                                            @endforeach
                                        </thead>
                                        <tbody>
                                            @foreach($table_entry['table_body'] as $row)
                                                <tr>
                                                    @foreach($row as $entry)
                                                        <td>{{$entry}}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach 
                        @endif
                        
                        <div class="section__divider {{ Request::is('government-project') ? 'hidden-xs hidden-sm hidden-md hidden-lg' :  ''}}"></div>
                        
                        @if(isset($treatment) and !empty($treatment))
                            <div class="water__treatment">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="section__head">
                                            <h2 class="section__head__desc">{{$treatment['treatment_heading']}}</h2>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="water__treatment__table table table-striped">
                                        <thead>
                                            @foreach($treatment['treatment_title'] as $treatment_index => $value)
                                                <th>{{$value}}</th>
                                            @endforeach
                                        </thead>
                                        <tbody>
                                            @foreach($treatment['treatment_details'] as $treatment_keys => $treatment_values)
                                                <tr>
                                                    @foreach($treatment_values as $treatment)
                                                        <td>{{$treatment}}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-top z-depth-1"></div>
    </div>
@stop