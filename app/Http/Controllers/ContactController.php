<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Mostrar la página de contacto
     */
    public function index()
    {
        $seoData = [
            'title' => 'Contacto - Solicita tu Cotización de Desarrollo Web Gratis | SysifosWeb',
            'description' => 'Contáctanos para tu proyecto de desarrollo web o software en Chile. Cotización gratuita, respuesta en 24 horas. ¡Hablemos de tu idea!',
            'keywords' => 'contacto desarrollo web, cotización gratis, solicitar presupuesto, contactar desarrolladores Chile, consultoría gratuita, proyecto desarrollo software',
            'canonical' => 'https://www.sysifosweb.cl/contacto',
            'og_type' => 'website',
            'og_image' => 'https://www.sysifosweb.cl/img/og-contact.jpg',
            'twitter_card' => 'summary_large_image'
        ];

        if (config('app.use_blade_public_views')) {
            $errors = session()->get('errors');

            return view('public.contact', [
                'seo' => $seoData,
                'errors' => $errors ? $errors->getMessages() : [],
                'success' => session('success'),
            ]);
        }

        return Inertia::render('Contact', ['seo' => $seoData]);
    }
}