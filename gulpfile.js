var elixir = require('laravel-elixir');


elixir(function (mix) {
    mix.sass('app.scss')
        .scripts([
            'vendor/jquery.min.js',
            'vendor/bootstrap.min.js',
            'vendor/slick.min.js',
            'vendor/jquery.validate.min.js',
            'vendor/sweetalert.min.js',
            'vendor/jquery.sumoselect.min.js',
            'vendor/jquery.visible.min.js',
            'web_pages/*',
            'web_pages/partials/*',
        ], 'public/js/app.js', 'resources/assets/js')
        .scripts([
                'vendor/jquery-jvectormap-2.0.3.min.js',
                'vendor/jquery-jvectormap-in-merc.js',
                'vendor/jquery-jvectormap-it-merc.js',
                'vendor/mal.js',
                'vendor/jquery-jvectormap-world-merc.js'

        ], 'public/js/maps.js', 'resources/assets/js')
        .scripts([
                'vendor/rain-effect-index.js'
        ], 'public/js/rain.js', 'resources/assets/js')
});

elixir.extend('sourcemaps', true);

