var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;
require('laravel-elixir-vueify');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'vue-styles.css'
    ], 'public/app/css/vue-styles.css');

    mix.browserify('crud.js', 'public/app/js/crud.js');
    // Add all model-config.js and generate 
    // then using gulp, but, generate one for each model.
	 mix.scripts(['models/provider-config.js'], 'public/app/js/models/provider-config.js')
	 mix.scripts(['models/type-config.js'], 'public/app/js/models/type-config.js')
	 mix.scripts(['models/presentation-config.js'], 'public/app/js/models/presentation-config.js')
     mix.scripts(['models/unit-config.js'], 'public/app/js/models/unit-config.js')
     mix.scripts(['models/input-material-config.js'], 'public/app/js/models/input-material-config.js')
     mix.scripts(['models/family-config.js'], 'public/app/js/models/family-config.js'),
     mix.scripts(['models/subFamily-config.js'], 'public/app/js/models/subFamily-config.js'),
	 mix.scripts(['models/item-config.js'], 'public/app/js/models/item-config.js')
       
});
