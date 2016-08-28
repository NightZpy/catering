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
	 mix.scripts(['models/kitchen/provider/config.js'], 'public/app/js/models/kitchen/provider/config.js')
	 mix.scripts(['models/type/config.js'], 'public/app/js/models/type/config.js')
	 mix.scripts(['models/presentation/config.js'], 'public/app/js/models/presentation/config.js')
     mix.scripts(['models/unit/config.js'], 'public/app/js/models/unit/config.js')
     mix.scripts(['models/input-material-config.js'], 'public/app/js/models/input-material-config.js')
     mix.scripts(['models/family/config.js'], 'public/app/js/models/family/config.js')
     mix.scripts(['models/family/sub/config.js'], 'public/app/js/models/family/sub/config.js')
     mix.scripts(['models/kitchen/item/config.js'], 'public/app/js/models/kitchen/item/config.js')
     mix.scripts(['models/kitchen/item/provider/config.js'], 'public/app/js/models/kitchen/item/provider/config.js')
     mix.scripts(['models/kitchen/utensil/category/config.js'], 'public/app/js/models/kitchen/utensil/category/config.js')
     mix.scripts(['models/kitchen/utensil/config.js'], 'public/app/js/models/kitchen/utensil/config.js')
     mix.scripts(['models/kitchen/recipe/type/config.js'], 'public/app/js/models/kitchen/recipe/type/config.js')
     mix.scripts(['models/kitchen/recipe/base/config.js'], 'public/app/js/models/kitchen/recipe/base/config.js')
     mix.scripts(['models/kitchen/recipe/base/item/config.js'], 'public/app/js/models/kitchen/recipe/base/item/config.js')
     mix.scripts(['models/kitchen/recipe/base/utensil/config.js'], 'public/app/js/models/kitchen/recipe/base/utensil/config.js')
	 mix.scripts(['models/kitchen/recipe/config.js'], 'public/app/js/models/kitchen/recipe/config.js')
});
