<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\BlogPost;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador si no existe
        $admin = User::firstOrCreate(
            ['email' => 'admin@sysifosweb.cl'],
            [
                'name' => 'Diego Araya',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Crear categorías
        $categories = [
            [
                'name' => 'Desarrollo Web',
                'slug' => 'desarrollo-web',
                'description' => 'Artículos sobre desarrollo web moderno, frameworks y mejores prácticas.',
                'color' => '#3B82F6',
                'active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Aplicaciones Móviles',
                'slug' => 'aplicaciones-moviles',
                'description' => 'Todo sobre desarrollo de apps móviles para iOS y Android.',
                'color' => '#10B981',
                'active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
                'description' => 'Herramientas y prácticas de DevOps para mejorar el desarrollo.',
                'color' => '#F59E0B',
                'active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'UX/UI Design',
                'slug' => 'ux-ui-design',
                'description' => 'Diseño de experiencia de usuario e interfaces.',
                'color' => '#EF4444',
                'active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Tecnología',
                'slug' => 'tecnologia',
                'description' => 'Últimas tendencias y noticias del mundo tecnológico.',
                'color' => '#8B5CF6',
                'active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        // Obtener categorías creadas
        $webDev = Category::where('slug', 'desarrollo-web')->first();
        $mobile = Category::where('slug', 'aplicaciones-moviles')->first();
        $devops = Category::where('slug', 'devops')->first();
        $design = Category::where('slug', 'ux-ui-design')->first();
        $tech = Category::where('slug', 'tecnologia')->first();

        // Crear posts de ejemplo
        $posts = [
            [
                'title' => 'Introducción a Laravel 11: Novedades y Características',
                'slug' => 'introduccion-laravel-11-novedades-caracteristicas',
                'excerpt' => 'Descubre las nuevas características y mejoras que trae Laravel 11 para el desarrollo web moderno.',
                'content' => '<h2>Laravel 11: Una Nueva Era</h2><p>Laravel 11 introduce importantes mejoras en rendimiento, nuevas características y una experiencia de desarrollo mejorada. En este artículo exploramos las principales novedades.</p><h3>Principales Características</h3><ul><li>Mejor rendimiento en consultas</li><li>Nuevos helpers y funcionalidades</li><li>Mejoras en la seguridad</li><li>Actualizaciones en Eloquent</li></ul><p>Laravel continúa siendo el framework PHP más popular para desarrollo web empresarial.</p>',
                'featured_image' => null,
                'meta_title' => 'Laravel 11: Novedades y Características | SysifosWeb',
                'meta_description' => 'Conoce las nuevas características de Laravel 11 y cómo pueden mejorar tu desarrollo web.',
                'meta_keywords' => ['laravel', 'php', 'desarrollo web', 'framework'],
                'status' => 'published',
                'featured' => true,
                'views' => 245,
                'user_id' => $admin->id,
                'category_id' => $webDev->id,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Desarrollo de Apps Móviles con React Native',
                'slug' => 'desarrollo-apps-moviles-react-native',
                'excerpt' => 'Guía completa para crear aplicaciones móviles multiplataforma con React Native.',
                'content' => '<h2>React Native para Principiantes</h2><p>React Native permite desarrollar aplicaciones móviles nativas usando JavaScript y React. Es una excelente opción para crear apps multiplataforma.</p><h3>Ventajas de React Native</h3><ul><li>Código compartido entre iOS y Android</li><li>Rendimiento nativo</li><li>Gran comunidad y ecosistema</li><li>Desarrollo más rápido</li></ul><p>En SysifosWeb utilizamos React Native para crear aplicaciones móviles de alta calidad.</p>',
                'featured_image' => null,
                'meta_title' => 'React Native: Desarrollo de Apps Móviles | SysifosWeb',
                'meta_description' => 'Aprende a desarrollar aplicaciones móviles con React Native de forma profesional.',
                'meta_keywords' => ['react native', 'aplicaciones móviles', 'javascript', 'desarrollo'],
                'status' => 'published',
                'featured' => false,
                'views' => 189,
                'user_id' => $admin->id,
                'category_id' => $mobile->id,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Docker para Desarrolladores: Guía Práctica',
                'slug' => 'docker-desarrolladores-guia-practica',
                'excerpt' => 'Aprende a usar Docker para mejorar tu flujo de desarrollo y despliegue de aplicaciones.',
                'content' => '<h2>Docker: Containerización Simplificada</h2><p>Docker revoluciona la forma en que desarrollamos y desplegamos aplicaciones. Permite crear entornos consistentes y reproducibles.</p><h3>Beneficios de Docker</h3><ul><li>Entornos consistentes</li><li>Fácil escalabilidad</li><li>Aislamiento de aplicaciones</li><li>Despliegue simplificado</li></ul><p>Implementar Docker en tu flujo de trabajo mejorará significativamente tu productividad como desarrollador.</p>',
                'featured_image' => null,
                'meta_title' => 'Docker para Desarrolladores: Guía Completa | SysifosWeb',
                'meta_description' => 'Domina Docker y mejora tu flujo de desarrollo con esta guía práctica.',
                'meta_keywords' => ['docker', 'devops', 'containerización', 'desarrollo'],
                'status' => 'published',
                'featured' => true,
                'views' => 156,
                'user_id' => $admin->id,
                'category_id' => $devops->id,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Principios de UX Design para Desarrolladores',
                'slug' => 'principios-ux-design-desarrolladores',
                'excerpt' => 'Conceptos fundamentales de UX que todo desarrollador debería conocer.',
                'content' => '<h2>UX Design para Desarrolladores</h2><p>Como desarrolladores, entender los principios básicos de UX nos ayuda a crear mejores productos digitales.</p><h3>Principios Fundamentales</h3><ul><li>Usabilidad y accesibilidad</li><li>Diseño centrado en el usuario</li><li>Prototipado y testing</li><li>Iteración continua</li></ul><p>La colaboración entre desarrollo y diseño es clave para el éxito de cualquier proyecto digital.</p>',
                'featured_image' => null,
                'meta_title' => 'UX Design para Desarrolladores | SysifosWeb',
                'meta_description' => 'Aprende los principios básicos de UX design para mejorar tus habilidades de desarrollo.',
                'meta_keywords' => ['ux design', 'usabilidad', 'desarrollo', 'diseño'],
                'status' => 'draft',
                'featured' => false,
                'views' => 0,
                'user_id' => $admin->id,
                'category_id' => $design->id,
                'published_at' => null,
            ],
        ];

        foreach ($posts as $postData) {
            BlogPost::firstOrCreate(
                ['slug' => $postData['slug']],
                $postData
            );
        }

        // Crear contactos de ejemplo
        $contacts = [
            [
                'name' => 'María González',
                'email' => 'maria@ejemplo.com',
                'phone' => '+56912345678',
                'company' => 'Empresa ABC',
                'subject' => 'Consulta sobre desarrollo de aplicación web',
                'message' => 'Hola, estoy interesada en desarrollar una aplicación web para mi empresa. ¿Podrían enviarme información sobre sus servicios y precios?',
                'status' => 'new',
                'ip_address' => '192.168.1.100',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'metadata' => ['source' => 'website', 'page' => 'contact'],
                'created_at' => now()->subHours(2),
            ],
            [
                'name' => 'Carlos Rodríguez',
                'email' => 'carlos@empresa.cl',
                'phone' => '+56987654321',
                'company' => 'Tech Solutions',
                'subject' => 'Propuesta de colaboración',
                'message' => 'Buenos días, somos una empresa de tecnología y nos gustaría explorar oportunidades de colaboración en proyectos de desarrollo.',
                'status' => 'read',
                'ip_address' => '192.168.1.101',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36',
                'metadata' => ['source' => 'website', 'page' => 'contact'],
                'read_at' => now()->subHours(1),
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Ana Martínez',
                'email' => 'ana@startup.cl',
                'phone' => '+56911223344',
                'company' => 'StartupXYZ',
                'subject' => 'Cotización para sistema empresarial',
                'message' => 'Necesitamos desarrollar un sistema de gestión empresarial. ¿Podrían enviarnos una cotización detallada?',
                'status' => 'replied',
                'ip_address' => '192.168.1.102',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15',
                'metadata' => ['source' => 'website', 'page' => 'contact'],
                'read_at' => now()->subDays(2),
                'replied_at' => now()->subDays(1),
                'created_at' => now()->subDays(3),
            ],
        ];

        foreach ($contacts as $contactData) {
            Contact::firstOrCreate(
                ['email' => $contactData['email']],
                $contactData
            );
        }

        $this->command->info('Blog seeder completed successfully!');
        $this->command->info('Admin user: admin@sysifosweb.cl / password');
        $this->command->info('Created: ' . Category::count() . ' categories');
        $this->command->info('Created: ' . BlogPost::count() . ' blog posts');
        $this->command->info('Created: ' . Contact::count() . ' contacts');
    }
}
