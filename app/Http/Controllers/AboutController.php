<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    /**
     * Mostrar la página Nosotros
     */
    public function index()
    {
        $seoData = [
            'title' => 'Sobre Nosotros - Equipo de Desarrollo de Software en Chile | SysifosWeb',
            'description' => 'Conoce nuestro equipo de desarrolladores expertos en Chile. Más de 5 años creando soluciones digitales innovadoras con tecnologías modernas.',
            'keywords' => 'equipo desarrollo Chile, desarrolladores software, empresa desarrollo web, sobre nosotros, experiencia desarrollo, tecnologías modernas, SysifosWeb Chile',
            'canonical' => 'https://sysifosweb.cl/nosotros',
            'og_type' => 'website',
            'og_image' => 'https://sysifosweb.cl/img/og-about.jpg',
            'twitter_card' => 'summary_large_image'
        ];

        if (config('app.use_blade_public_views')) {
            return view('public.about', [
                'seo' => $seoData,
            ]);
        }

        return Inertia::render('About', ['seo' => $seoData]);
    }
}