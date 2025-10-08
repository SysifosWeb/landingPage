# 🚀 SysifosWeb - Landing Page + Blog + Admin Panel

**Sistema completo de landing page empresarial con blog integrado y panel de administración robusto.**

## ✨ Características Principales

### 🌐 Landing Page Empresarial

-   **Diseño moderno y responsive** con Tailwind CSS
-   **Header transparente/azul** que cambia con el scroll
-   **Secciones optimizadas**: Home, Nosotros, Servicios, Portfolio, Contacto
-   **Formulario de contacto funcional** con validación
-   **SEO optimizada** con meta tags dinámicos

### 📝 Blog Integrado

-   **Sistema de posts** con categorías y etiquetas
-   **Editor de contenido** con soporte HTML
-   **Posts destacados** y sistema de vistas
-   **Categorización avanzada** con colores personalizados
-   **URLs amigables** (SEO friendly)
-   **Paginación automática**

### 🔐 Panel de Administración Seguro

-   **Login robusto** con protección anti-fuerza bruta
-   **Dashboard completo** con estadísticas en tiempo real
-   **Gestión de posts** (crear, editar, publicar, destacar)
-   **Gestión de categorías** con activación/desactivación
-   **Gestión de contactos** con estados y acciones en lote
-   **Sistema de roles** (Admin/Editor)
-   **Logging de seguridad** completo

## 🛠️ Tecnologías Utilizadas

### Backend

-   **Laravel 11** - Framework PHP moderno
-   **Inertia.js** - Puente entre Laravel y Vue.js
-   **SQLite** - Base de datos (desarrollo)
-   **Eloquent ORM** - Manejo de base de datos

### Frontend

-   **Vue.js 3** - Framework JavaScript reactivo
-   **Tailwind CSS** - Framework CSS utility-first
-   **Vite** - Build tool y servidor de desarrollo
-   **Heroicons** - Iconografía

### Herramientas

-   **pnpm** - Gestor de paquetes frontend
-   **Composer** - Gestor de dependencias PHP
-   **Artisan** - CLI de Laravel

## 🚀 Instalación y Configuración

### Prerrequisitos

-   PHP 8.2 o superior
-   Node.js 18 o superior
-   pnpm (recomendado) o npm
-   Composer

### Instalación

1. **Clonar el repositorio**

```bash
git clone <repository-url>
cd landingPage
```

2. **Instalar dependencias PHP**

```bash
composer install
```

3. **Instalar dependencias Node.js**

```bash
pnpm install
```

4. **Configurar entorno**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Configurar base de datos**

```bash
php artisan migrate --seed
```

6. **Crear usuario administrador**

```bash
php artisan admin:create-user
```

### Desarrollo

**Terminal 1 - Laravel:**

```bash
php artisan serve
```

**Terminal 2 - Vite:**

```bash
pnpm run dev
```

**Acceso:**

-   **Sitio web**: http://localhost:8000
-   **Panel admin**: http://localhost:8000/admin
-   **Login**: http://localhost:8000/login

## 🔐 Credenciales por Defecto

### Administrador

-   **Email**: admin@sysifosweb.cl
-   **Contraseña**: admin123
-   **Permisos**: Completos (crear, editar, eliminar)

### Editor

-   **Email**: editor@sysifosweb.cl
-   **Contraseña**: editor123
-   **Permisos**: Gestión de contenido (sin eliminar)

## 📊 Características de Seguridad

### 🛡️ Protección de Login

-   **Rate Limiting**: Máximo 5 intentos por IP cada 5 minutos
-   **Bloqueo de cuentas**: Automático tras 5 intentos fallidos (30 min)
-   **Logging completo**: Registro de todos los intentos de acceso
-   **Verificación de estado**: Cuentas activas y desbloqueadas
-   **Sesiones seguras**: Regeneración de tokens

### 👥 Sistema de Roles

-   **Admin**: Acceso completo al sistema
-   **Editor**: Gestión de contenido sin permisos de eliminación
-   **Middleware**: Protección de rutas administrativas

## 📁 Estructura del Proyecto

```
landingPage/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Controladores del panel admin
│   │   ├── Auth/            # Autenticación
│   │   └── ...
│   ├── Models/              # Modelos Eloquent
│   └── Console/Commands/    # Comandos artisan personalizados
├── resources/
│   ├── js/Pages/
│   │   ├── Admin/           # Componentes Vue del admin
│   │   ├── Auth/            # Login
│   │   ├── Component/       # Componentes reutilizables
│   │   └── ...              # Páginas públicas
│   └── css/
├── routes/
│   └── web.php              # Definición de rutas
└── database/
    ├── migrations/          # Migraciones de BD
    └── seeders/             # Datos de prueba
```

## 🎯 Funcionalidades Implementadas

### ✅ Landing Page

-   [x] Header transparente/azul con scroll
-   [x] Secciones responsivas (Home, About, Services, Portfolio, Contact)
-   [x] Formulario de contacto funcional
-   [x] Footer informativo
-   [x] Navegación fluida

### ✅ Blog

-   [x] Lista de posts con paginación
-   [x] Vista individual de posts
-   [x] Categorías con filtrado
-   [x] Posts destacados
-   [x] Contador de vistas
-   [x] SEO optimizado

### ✅ Panel de Administración

-   [x] Dashboard con estadísticas
-   [x] Gestión completa de posts
-   [x] Gestión de categorías
-   [x] Gestión de contactos
-   [x] Sistema de autenticación robusto
-   [x] Roles y permisos

## 🔧 Comandos Útiles

### Desarrollo

```bash
# Servidor de desarrollo
php artisan serve

# Compilar assets (desarrollo)
pnpm run dev

# Compilar assets (producción)
pnpm run build

# Migraciones
php artisan migrate
php artisan migrate:fresh --seed
```

### Administración

```bash
# Crear usuario admin
php artisan admin:create-user

# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ver rutas
php artisan route:list
```

### Base de Datos

```bash
# Crear migración
php artisan make:migration nombre_migracion

# Crear modelo con migración
php artisan make:model NombreModelo -m

# Crear seeder
php artisan make:seeder NombreSeeder
```

## 📈 Próximas Mejoras Sugeridas

### 🎨 UX/UI

-   [ ] Animaciones avanzadas con GSAP
-   [ ] Modo oscuro/claro
-   [ ] Mejoras en accesibilidad (WCAG)

### 📝 Blog

-   [ ] Sistema de comentarios
-   [ ] Tags/etiquetas para posts
-   [ ] Búsqueda avanzada
-   [ ] Newsletter/suscripciones

### 🔐 Seguridad

-   [ ] Autenticación de dos factores (2FA)
-   [ ] Logs de auditoría avanzados
-   [ ] Backup automático de BD

### 📊 Analytics

-   [ ] Integración con Google Analytics
-   [ ] Dashboard de métricas avanzado
-   [ ] Reportes automáticos

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver `LICENSE` para más detalles.

## 📞 Contacto

**SysifosWeb** - Desarrollo Web Profesional

-   📧 Email: contacto@sysifosweb.cl
-   🌐 Web: https://sysifosweb.cl
-   📱 WhatsApp: +56 9 XXXX XXXX

---

⭐ **¡Dale una estrella si te gusta el proyecto!** ⭐
