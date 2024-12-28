<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gerenate sitemap for the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Static pages
        $sitemap->add('/');
        $sitemap->add('/nosotros');
        $sitemap->add('/servicios');
        $sitemap->add('/contacto');

        // Dynamic pages
        // $users = User::all();
        // foreach ($users as $user) {
        //     $sitemap->add("/users/{$user->id}");
        // }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
