<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ServicesController extends Controller
{
    /**
     * Mostrar la página de servicios
     */
    public function index()
    {
        $seoData = [
            'title' => 'Servicios de Desarrollo Web y Software en Chile | SysifosWeb',
            'description' => 'Servicios profesionales de desarrollo web, aplicaciones móviles, e-commerce y consultoría tecnológica en Chile. Laravel, React, Vue.js y más.',
            'keywords' => 'servicios desarrollo web, desarrollo aplicaciones móviles, e-commerce Chile, consultoría tecnológica, desarrollo Laravel, desarrollo React, desarrollo Vue.js, servicios digitales',
            'canonical' => 'https://sysifosweb.cl/servicios',
            'og_type' => 'website',
            'og_image' => 'https://sysifosweb.cl/img/og-services.jpg',
            'twitter_card' => 'summary_large_image'
        ];

        return Inertia::render('Services', ['seo' => $seoData]);
    }
}