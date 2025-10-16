<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seoData = [
            'title' => 'Portfolio de Proyectos - Casos de Éxito en Desarrollo Web | SysifosWeb',
            'description' => 'Descubre nuestros proyectos exitosos de desarrollo web y software. Casos reales de aplicaciones, e-commerce y soluciones digitales en Chile.',
            'keywords' => 'portfolio desarrollo web, casos de éxito, proyectos desarrollo software, trabajos realizados, aplicaciones web Chile, e-commerce desarrollado, proyectos Laravel, proyectos React',
            'canonical' => 'https://sysifosweb.cl/portfolio',
            'og_type' => 'website',
            'og_image' => 'https://sysifosweb.cl/img/og-portfolio.jpg',
            'twitter_card' => 'summary_large_image'
        ];

        if (config('app.use_blade_public_views')) {
            return view('public.portfolio', [
                'seo' => $seoData,
            ]);
        }

        return Inertia::render('Portfolio', ['seo' => $seoData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
