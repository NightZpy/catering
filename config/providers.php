<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Provider Groups
     |--------------------------------------------------------------------------
     |
     | You may configure your environments with provider groups. Providers
     | and aliases in a provider group will only be loaded in when your
     | application's environment is present in the group. Effortless.
     |
     */
    [
        'environments' => ['local', 'development', 'dev'],

        'providers' => [
            Collective\Html\HtmlServiceProvider::class,
            Laracasts\Flash\FlashServiceProvider::class,
            Prettus\Repository\Providers\RepositoryServiceProvider::class,
            Barryvdh\Debugbar\ServiceProvider::class, 
            Sofa\Eloquence\ServiceProvider::class       
        ],

        'aliases' => [
            'Form'      => Collective\Html\FormFacade::class,
            'Html'      => Collective\Html\HtmlFacade::class,
            'Flash'     => Laracasts\Flash\Flash::class,
            'Debugbar' => Barryvdh\Debugbar\Facade::class,  
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Customize
     |--------------------------------------------------------------------------
     |
     | Of course you may modify this file as much as you want.
     | Play around and find provider groups that are right
     | for you. I'll leave you to it now. Happy hacking!
     |
     */
    [
        'environments' => ['local', 'production'],
        'providers' => [
            Collective\Html\HtmlServiceProvider::class,
            Laracasts\Flash\FlashServiceProvider::class,
            Prettus\Repository\Providers\RepositoryServiceProvider::class,
            Arcanedev\LogViewer\LogViewerServiceProvider::class,
            'MathiasGrimm\LaravelDotEnvGen\DotEnvGenServiceProvider',
        ],
        'aliases' => [
            'Form'      => Collective\Html\FormFacade::class,
            'Html'      => Collective\Html\HtmlFacade::class,
            'Flash'     => Laracasts\Flash\Flash::class        
        ],
    ],
    [
        'environments' => ['local'],
        'providers' => [
            \InfyOm\Generator\InfyOmGeneratorServiceProvider::class,
            nickcousins\schemaview\SchemaViewServiceProvider::class,
            InfyOm\AdminLTETemplates\AdminLTETemplatesServiceProvider::class,
            Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
            Mpociot\ApiDoc\ApiDocGeneratorServiceProvider::class,

        ],
        'aliases' => [

        ],
    ],    
    [
        'environments' => ['production'],
        'providers' => [

        ],
        'aliases' => [

        ],
    ],       
];
