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

    mix.styles([
        'bootstrap/3.3.6/css/bootstrap.css',
        'font-awesome/4.5.0/css/font-awesome.css',
        'select2/4.0.2/css/select2.css',
        'admin-lte/2.3.3/css/AdminLTE.css',
        'admin-lte/2.3.3/css/skins/_all-skins.css',
        'ionicons/2.0.1/css/ionicons.css'        
    ], 'public/app/css/app.css');

    mix.scripts([
        'jquery/1.12.0/jquery.min.js',
        'bootstrap/3.3.6/js/bootstrap.min.js',
        'select2/4.0.2/js/select2.min.js',
        'iCheck/1.0.2/icheck.min.js',
        'admin-lte/2.3.3/js/app.min.js',
        'jquery.dataTables.min.js',
        'dataTables.bootstrap.min.js'        
    ], 'public/app/js/app.js');


    mix.browserify('crud.js', 'public/app/js/crud.js');
    // Add all model-config.js and generate 
    // then using gulp, but, generate one for each model.
	 mix.scripts(['models/kitchen/provider/config.js'], 'public/app/js/models/kitchen/provider/config.js')
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
     mix.scripts(['models/kitchen/recipe/utensil/config.js'], 'public/app/js/models/kitchen/recipe/utensil/config.js')
	 mix.scripts(['models/kitchen/recipe/base-recipe/config.js'], 'public/app/js/models/kitchen/recipe/base-recipe/config.js')
});
