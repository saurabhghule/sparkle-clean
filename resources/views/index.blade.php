<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    
    <title>@yield('title')</title>
    @yield('seo_tags')
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="3 days">

    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


    <link href="/css/app.css?v=170720181130" rel="stylesheet">

    @yield('link_tag')


	<!-- Code for GOOGLE ANALYTICS -->
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-97811999-1', 'auto');
	  ga('send', 'pageview');
	</script>
</head>
<body>

@include('web_pages.partials.header')

@yield('content')

@include('web_pages.partials.footer')

<script src="/js/app.js?v=170720181130"></script>

@yield('script_tag')

</body>
</html>