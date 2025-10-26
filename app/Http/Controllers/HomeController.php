<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Mostrar la página principal
     */
    public function index()
    {
        $seoData = [
            'title' => 'Paginas Web, Tiendas Online y software a medida en chile | SysifosWeb',
            'description' => 'Especialistas en desarrollo de software, aplicaciones web y soluciones digitales en Chile. Laravel, Vue.js, React y más. Cotiza tu proyecto gratis.',
            'keywords' => 'desarrollo de software Chile, desarrollo web, aplicaciones web, Laravel, Vue.js, React, desarrollo frontend, desarrollo backend, soluciones digitales, programación, SysifosWeb',
            'canonical' => 'https://sysifosweb.cl/',
            'og_type' => 'website',
            'og_image' => 'https://sysifosweb.cl/img/og-home.jpg',
            'twitter_card' => 'summary_large_image'
        ];

        if (config('app.use_blade_public_views')) {
            return view('public.home', [
                'seo' => $seoData,
            ]);
        }

        return Inertia::render('Home', ['seo' => $seoData]);
    }
    public function indexSinapsys()
    {
        return view('public.sinapsys');
    }
}