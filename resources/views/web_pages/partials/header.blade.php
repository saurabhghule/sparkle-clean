
<header class="sparkle__header z-depth-1">
    <nav class="navbar navbar-default sct__navbar">
        <div class="container width-100">
            <div class="navbar-header sct__navbar__logowrapper">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand sct__navbar__logo" href="{{route('home')}}">
                    <div class="img__wrap">
                        <img src="{{asset('img/sparkle-clean-tech.png')}}" alt="Sparkle Clean Tech" class="hidden-xs hidden-sm">
                        <img src="{{asset('img/sparkle_clean_tech.jpg')}}" alt="Sparkle Clean Tech" class="hidden-md hidden-lg">
                    </div>
                </a>
            </div>
            <div class="collapse navbar-collapse sct__navbar__collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right sct__navbar--right">

                    <li>
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <a href="{{route('products')}}">Products</a>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>
                    </li>

                    <li class="dropdown">
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>

                        <a href="{{route('depth-filtration-technology')}}" class="dropdown-toggle" data-index="2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Technology
                            <span class="chevron bottom"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('depth-filtration-technology')}}">Depth Filtration</a></li>
                            <li><a href="{{ route('micro-membrane-technology')}}">Micro / Membrane Filtration</a></li>
                            <li><a href="{{ route('ion-exchange-technology')}}">Ion Exchange</a></li>
                            <li><a href="{{ route('ro-technology')}}">RO Plant</a></li>
                            <li><a href="{{ route('setting-coagulation-flocculation-oil-seperation-technology')}}">Setting / Coagulation / Flocculation</a></li>
                            <li><a href="{{ route('oil-seperation-technology')}}">Oil Separation</a></li>
                            <li><a href="{{ route('actuated-sludge-technology')}}">Activated Sludge Process</a></li>
                            <li><a href="{{ route('attached-growth-process-technology')}}">Attached Growth Process</a></li>
                            <li><a href="{{ route('membrane-bio-reactor-technology')}}">Membrane Bio Reactor</a></li>
                            <li><a href="{{ route('other-technology')}}">Others</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>

                        <a href="{{route('commercial-sector')}}" class="dropdown-toggle" data-index="3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Sectors
                            <span class="chevron bottom"></span>
                        </a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('commercial-sector')}}">Commercial</a></li>
                            <li><a href="{{ route('industrial-sector')}}">Industrial</a></li>
                            <li><a href="{{ route('government-sector')}}">Government</a></li>
                            <li><a href="{{ route('oil-and-gas-sector')}}">Oil & Gas</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>
                        
                        <a href="{{route('water-management-solution')}}" class="dropdown-toggle" data-index="1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Solutions
                            <span class="chevron bottom"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('water-management-solution')}}">Water Management</a></li>
                            <li><a href="{{ route('waste-water-management-solution')}}">Waste Water Management</a></li>
                            <li><a href="{{ route('drinking-water-solution')}}">Drinking Water</a></li>
                            <li><a href="{{ route('zero-liquid-discharge-solution')}}">Zero Liquid Discharge</a></li>
                            <li><a href="{{ route('oil-and-gas-solution')}}">Water Management for Oil and Gas</a></li>
                            <li><a href="{{ route('other-solution')}}">Others</a></li>
                        </ul>
                    </li>

                    <li>
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <a href="{{route('case-studies')}}">Case Studies</a>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>
                    </li>

                    <li>
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <a href="{{route('our-reach')}}">Our Reach</a>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>
                    </li>

                    <li>
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <a href="{{route('clients')}}">Clients</a>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>
                    </li>

                    <li class="dropdown">
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>

                        <a href="{{route('about')}}" class="dropdown-toggle" data-index="4" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Company
                            <span class="chevron bottom"></span>
                        </a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('about')}}">About Us</a></li>
                            <li><a href="{{route('team')}}">Team</a></li>
                            <li><a href="{{ route('quality')}}">Quality Policy</a></li>
                            <li><a href="{{ route('careers')}}">Careers</a></li>
                            <li><a href="{{ route('download')}}">Download</a></li>
                        </ul>
                    </li>
                        
                    <li class="dropdown">
                        <span class="hidden-xs hidden-sm pivot top-h"></span>
                        <span class="hidden-xs hidden-sm pivot top-v"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-h"></span>
                        <span class="hidden-xs hidden-sm pivot bottom-v"></span>

                        <a href="{{route('contact')}}" class="dropdown-toggle" data-index="4" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Contact
                            <span class="chevron bottom"></span>
                        </a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="{{route('contact')}}">Reach Us</a></li>
                            <li><a href="{{route('product_support')}}">Product Support</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>  
    </nav>
</header>

