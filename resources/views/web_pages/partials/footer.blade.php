<footer id="sct_footer" class="footer">
    
    <div class="footer__panel">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="footer__panel__head">
                        Company
                    </div>
                    <div class="footer__panel__desc">
                        <ul class="menu">
                            <li class="menu__items"><a href="{{route('about')}}">About us</a></li>
                            <li class="menu__items"><a href="{{route('contact')}}">Contact us</a></li>
                            <li class="menu__items"><a href="{{route('case-studies')}}">Case Studies</a></li>
                            <li class="menu__items"><a href="{{route('careers')}}">Careers</a></li>
                            <li class="menu__items"><a href="{{route('download')}}">Downloads</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="footer__panel__head">
                        Solutions
                    </div>
                    <div class="footer__panel__desc">
                        <ul class="menu menu-solutions">
                            <li class="menu__items wm"><a href="{{route('water-management-solution')}}">Water Management</a></li>
                            <li class="menu__items wwm"><a href="{{route('waste-water-management-solution')}}">Waste Water Management</a></li>
                            <li class="menu__items dw"><a href="{{route('drinking-water-solution')}}">Drinking Water</a></li>
                            <li class="menu__items zld"><a href="{{route('zero-liquid-discharge-solution')}}">Zero Liquid Discharge(ZLD)</a></li>
                            <li class="menu__items og"><a href="{{route('oil-and-gas-solution')}}">Water Management for Oil & Gas</a></li>
                            <li class="menu__items othr"><a href="{{route('other-solution')}}">Others</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="footer__panel__head">
                        Contact Us
                    </div>
                    <div class="footer__panel__desc">
                        <div class="contacts">
                            <i class="fa fa-map-marker contacts__icon" aria-hidden="true"></i>
                            <div class="contacts__desc">
                                Sparkle Clean Tech Pvt. Ltd.(India)
                                #89 Gautam Complex, Sector - 11, C.B.D Belapur, Navi Mumbai - 400614
                            </div>
                        </div>

                        <div class="contacts">
                            <i class="fa fa-phone contacts__icon" aria-hidden="true"></i>
                            <div class="contacts__desc">
                                +91-22-4061-9000
                            </div>
                        </div>
                        <div class="contacts">
                            <i class="fa fa-envelope contacts__icon" aria-hidden="true"></i>
                            <div class="contacts__desc">
                                <a href="mailto:info@sparklecleantech.com">info@sparklecleantech.com</a>
                            </div>
                        </div>
                        <div class="contacts">
                            <i class="fa fa-linkedin contacts__icon" aria-hidden="true"></i>
                            <div class="contacts__desc">
                                <a href="https://www.linkedin.com/company/sparkle-clean-tech" target="_blank">Get in touch on LinkedIn</a>
                            </div>
                        </div>
                        <div class="contacts">
                            <i class="fa fa-facebook contacts__icon" aria-hidden="true"></i>
                            <div class="contacts__desc">
                                <a href="https://www.facebook.com/SparkleCleanTech/" target="_blank">Get in touch on Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="footer__panel__head">
                        Subscribe to our newsletter
                    </div>
                    <div class="footer__panel__desc">
                        <form action="{{route('send.subscription')}}" class="footer__form">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                            <input type="hidden" value="footer__form" name="footer__form__id"/>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group footer__form__group">
                                        <input type="text" name="first_name" class="form-control footer__form__field"
                                               placeholder="First Name*" required>
                                    <span class="icons">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group footer__form__group">
                                        <input type="text" name="last_name" class="form-control footer__form__field padding_left_0"
                                               placeholder="Last Name*" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 margin_top_10">
                                    <div class="form-group footer__form__group">
                                        <input type="text" name="company_name" class="form-control footer__form__field"
                                               placeholder="Company Name" required>
                                    <span class="icons">
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 margin_top_10">
                                    <div class="form-group footer__form__group">
                                        <input type="email" name="email" class="form-control footer__form__field"
                                               placeholder="Email*" required>
                                    <span class="icons">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="footer__panel__cta">
                        <button type="submit" id="send__subscription__btn" class="btn btn-primary btn-lg sc_btn__cta z-depth-1">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__other__links">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{route('site-map')}}">Sitemap</a>
                    <a href="http://webmail.sparklecleantech.com/" target="_blank">Webmail</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__stagger">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="footer__stagger__copyrights">
                        &copy Copyright by Sparkle Clean Tech Pvt. Ltd.
                        <br class="hidden-sm hidden-md hidden-lg"> All Rights Reserved
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                </div>
            </div>
        </div>
    </div>
</footer>