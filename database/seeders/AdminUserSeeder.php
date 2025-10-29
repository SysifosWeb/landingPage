<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\BlogPost;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador principal
        $admin = User::create([
            'name' => 'Osman Ahumada',
            'email' => 'admin@sysifosweb.cl',
            'password' => Hash::make('A2#R£0f8[Yj8'),
            'role' => 'admin',
            'active' => true,
            'email_verified_at' => now(),
        ]);

        // Crear usuario editor
        $editor = User::create([
            'name' => 'Editor SysifosWeb',
            'email' => 'editor@sysifosweb.cl',
            'password' => Hash::make('2[2D£lX57]H1'),
            'role' => 'editor',
            'active' => true,
            'email_verified_at' => now(),
        ]);

        // Crear categorías
        $categories = [
            [
                'name' => 'Desarrollo Web',
                'slug' => 'desarrollo-web',
                'description' => 'Artículos sobre desarrollo web, frameworks y tecnologías frontend/backend',
                'color' => '#3B82F6',
                'active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Aplicaciones Móviles',
                'slug' => 'aplicaciones-moviles',
                'description' => 'Todo sobre desarrollo de apps móviles para iOS y Android',
                'color' => '#10B981',
                'active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
                'description' => 'Herramientas y prácticas de DevOps, CI/CD, Docker, AWS',
                'color' => '#F59E0B',
                'active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Tutoriales',
                'slug' => 'tutoriales',
                'description' => 'Guías paso a paso y tutoriales técnicos',
                'color' => '#EF4444',
                'active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Noticias Tech',
                'slug' => 'noticias-tech',
                'description' => 'Últimas noticias y tendencias en tecnología',
                'color' => '#8B5CF6',
                'active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Crear posts de ejemplo
        $webCategory = Category::where('slug', 'desarrollo-web')->first();
        $mobileCategory = Category::where('slug', 'aplicaciones-moviles')->first();
        $devopsCategory = Category::where('slug', 'devops')->first();

        $posts = [
            [
                'title' => 'Introducción a Laravel 11: Novedades y Características',
                'slug' => 'introduccion-laravel-11-novedades-caracteristicas',
                'excerpt' => 'Descubre las nuevas características y mejoras que trae Laravel 11, el framework PHP más popular para desarrollo web.',
                'content' => '<h2>Laravel 11: Una Nueva Era</h2><p>Laravel 11 introduce mejoras significativas en rendimiento, nuevas características y una experiencia de desarrollo mejorada...</p><h3>Principales Novedades</h3><ul><li>Mejor rendimiento en consultas</li><li>Nuevos comandos Artisan</li><li>Mejoras en Eloquent ORM</li></ul>',
                'featured_image' => null,
                'meta_title' => 'Laravel 11: Guía Completa de Novedades | SysifosWeb',
                'meta_description' => 'Conoce todas las novedades de Laravel 11. Guía completa con ejemplos prácticos y mejores prácticas.',
                'meta_keywords' => ['laravel', 'php', 'framework', 'desarrollo web'],
                'status' => 'published',
                'featured' => true,
                'views' => 245,
                'user_id' => $admin->id,
                'category_id' => $webCategory->id,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Desarrollo de Apps Móviles con React Native',
                'slug' => 'desarrollo-apps-moviles-react-native',
                'excerpt' => 'Aprende a crear aplicaciones móviles multiplataforma con React Native. Guía completa desde cero.',
                'content' => '<h2>React Native: El Futuro del Desarrollo Móvil</h2><p>React Native permite crear aplicaciones nativas para iOS y Android usando JavaScript...</p>',
                'featured_image' => null,
                'meta_title' => 'React Native: Desarrollo de Apps Móviles | SysifosWeb',
                'meta_description' => 'Guía completa para desarrollar apps móviles con React Native. Desde configuración hasta publicación.',
                'meta_keywords' => ['react native', 'desarrollo móvil', 'javascript', 'apps'],
                'status' => 'published',
                'featured' => true,
                'views' => 189,
                'user_id' => $editor->id,
                'category_id' => $mobileCategory->id,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Docker para Desarrolladores: Guía Práctica',
                'slug' => 'docker-desarrolladores-guia-practica',
                'excerpt' => 'Domina Docker desde cero. Aprende a containerizar tus aplicaciones y mejorar tu flujo de desarrollo.',
                'content' => '<h2>¿Qué es Docker?</h2><p>Docker es una plataforma de containerización que permite empaquetar aplicaciones...</p>',
                'featured_image' => null,
                'meta_title' => 'Docker para Desarrolladores: Guía Completa | SysifosWeb',
                'meta_description' => 'Aprende Docker desde cero. Guía práctica con ejemplos reales para desarrolladores.',
                'meta_keywords' => ['docker', 'containerización', 'devops', 'desarrollo'],
                'status' => 'published',
                'featured' => false,
                'views' => 156,
                'user_id' => $admin->id,
                'category_id' => $devopsCategory->id,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Vue.js 3: Composition API y Nuevas Características',
                'slug' => 'vuejs-3-composition-api-nuevas-caracteristicas',
                'excerpt' => 'Explora las nuevas características de Vue.js 3, incluyendo la Composition API y mejoras de rendimiento.',
                'content' => '<h2>Vue.js 3: Evolución del Framework</h2><p>Vue.js 3 introduce la Composition API, una nueva forma de organizar la lógica...</p>',
                'featured_image' => null,
                'meta_title' => 'Vue.js 3: Composition API y Novedades | SysifosWeb',
                'meta_description' => 'Descubre Vue.js 3 y su Composition API. Guía completa con ejemplos prácticos.',
                'meta_keywords' => ['vue.js', 'composition api', 'javascript', 'frontend'],
                'status' => 'draft',
                'featured' => false,
                'views' => 0,
                'user_id' => $editor->id,
                'category_id' => $webCategory->id,
                'published_at' => null,
            ],
        ];

        foreach ($posts as $postData) {
            BlogPost::create($postData);
        }

        // Crear contactos de ejemplo
        $contacts = [
            [
                'name' => 'María González',
                'email' => 'maria@ejemplo.com',
                'phone' => '+56912345678',
                'company' => 'TechStart Chile',
                'subject' => 'Consulta sobre desarrollo de aplicación web',
                'message' => 'Hola, estamos interesados en desarrollar una aplicación web para nuestro negocio. ¿Podrían enviarnos más información sobre sus servicios?',
                'status' => 'new',
                'ip_address' => '192.168.1.100',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'created_at' => now()->subHours(2),
            ],
            [
                'name' => 'Carlos Rodríguez',
                'email' => 'carlos@empresa.cl',
                'phone' => '+56987654321',
                'company' => 'Innovación Digital',
                'subject' => 'Propuesta de colaboración',
                'message' => 'Nos gustaría explorar oportunidades de colaboración en proyectos de desarrollo móvil.',
                'status' => 'read',
                'ip_address' => '192.168.1.101',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36',
                'read_at' => now()->subMinutes(30),
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Ana Martínez',
                'email' => 'ana@startup.com',
                'phone' => null,
                'company' => 'StartupTech',
                'subject' => 'Cotización para sistema empresarial',
                'message' => 'Necesitamos un sistema de gestión empresarial. ¿Podrían enviarnos una cotización?',
                'status' => 'replied',
                'ip_address' => '192.168.1.102',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15',
                'read_at' => now()->subDays(2),
                'replied_at' => now()->subDays(1),
                'created_at' => now()->subDays(3),
            ],
        ];

        foreach ($contacts as $contactData) {
            Contact::create($contactData);
        }

        $this->command->info('✅ Datos de prueba creados exitosamente:');
        $this->command->info('👤 Admin: admin@sysifosweb.cl / admin123');
        $this->command->info('✏️  Editor: editor@sysifosweb.cl / editor123');
        $this->command->info('📝 ' . count($posts) . ' posts de blog creados');
        $this->command->info('📂 ' . count($categories) . ' categorías creadas');
        $this->command->info('📧 ' . count($contacts) . ' contactos de ejemplo');
    }
}
