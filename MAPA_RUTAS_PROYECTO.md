# 🗺️ Mapa de Rutas - SysifosWeb

## 📋 Resumen del Proyecto

**Tipo**: Landing Page + Blog + Panel Admin  
**Framework Backend**: Laravel 11 + Inertia.js  
**Framework Frontend**: Vue.js 3 + Tailwind CSS  
**Base de Datos**: MySQL/SQLite

---

## 🌐 RUTAS PÚBLICAS (Frontend)

### 🏠 Páginas Principales

| Ruta         | Componente Vue  | Controlador             | Descripción                                       |
| ------------ | --------------- | ----------------------- | ------------------------------------------------- |
| `/`          | `Home.vue`      | -                       | Página de inicio con hero, servicios, tecnologías |
| `/nosotros`  | `About.vue`     | -                       | Información de la empresa, equipo, misión/visión  |
| `/servicios` | `Services.vue`  | -                       | Catálogo de servicios ofrecidos                   |
| `/portfolio` | `Portfolio.vue` | -                       | Proyectos realizados y casos de éxito             |
| `/contacto`  | `Contact.vue`   | `ContactFormController` | Formulario de contacto + información              |

### 📝 Blog Público

| Ruta                     | Componente Vue     | Controlador       | Descripción                   |
| ------------------------ | ------------------ | ----------------- | ----------------------------- |
| `/blog`                  | `Blog.vue`         | Closure (web.php) | Lista de posts con paginación |
| `/blog/{slug}`           | `BlogPost.vue`     | Closure (web.php) | Detalle de post individual    |
| `/blog/categoria/{slug}` | `BlogCategory.vue` | Closure (web.php) | Posts filtrados por categoría |

---

## 🔐 RUTAS DE AUTENTICACIÓN

| Ruta           | Componente Vue   | Controlador            | Método            | Descripción         |
| -------------- | ---------------- | ---------------------- | ----------------- | ------------------- |
| `/login`       | `Auth/Login.vue` | `Auth\LoginController` | `showLoginForm()` | Formulario de login |
| `POST /login`  | -                | `Auth\LoginController` | `login()`         | Procesar login      |
| `POST /logout` | -                | `Auth\LoginController` | `logout()`        | Cerrar sesión       |

---

## ⚙️ RUTAS DE ADMINISTRACIÓN

**Prefijo**: `/admin`  
**Middleware**: `['auth', 'admin']`

### 📊 Dashboard

| Ruta     | Componente Vue        | Controlador                 | Método    | Descripción                      |
| -------- | --------------------- | --------------------------- | --------- | -------------------------------- |
| `/admin` | `Admin/Dashboard.vue` | `Admin\DashboardController` | `index()` | Panel principal con estadísticas |

### 📰 Gestión de Posts

| Ruta                       | Componente Vue           | Controlador                | Método      | Descripción        |
| -------------------------- | ------------------------ | -------------------------- | ----------- | ------------------ |
| `/admin/posts`             | `Admin/Posts/Index.vue`  | `Admin\BlogPostController` | `index()`   | Lista de posts     |
| `/admin/posts/create`      | `Admin/Posts/Create.vue` | `Admin\BlogPostController` | `create()`  | Crear nuevo post   |
| `/admin/posts/{id}`        | `Admin/Posts/Show.vue`   | `Admin\BlogPostController` | `show()`    | Ver post           |
| `/admin/posts/{id}/edit`   | `Admin/Posts/Edit.vue`   | `Admin\BlogPostController` | `edit()`    | Editar post        |
| `POST /admin/posts`        | -                        | `Admin\BlogPostController` | `store()`   | Guardar nuevo post |
| `PUT /admin/posts/{id}`    | -                        | `Admin\BlogPostController` | `update()`  | Actualizar post    |
| `DELETE /admin/posts/{id}` | -                        | `Admin\BlogPostController` | `destroy()` | Eliminar post      |

#### Acciones Especiales de Posts

| Ruta                                     | Método             | Descripción                     |
| ---------------------------------------- | ------------------ | ------------------------------- |
| `POST /admin/posts/{id}/toggle-featured` | `toggleFeatured()` | Marcar/desmarcar como destacado |
| `POST /admin/posts/{id}/publish`         | `publish()`        | Publicar post                   |
| `POST /admin/posts/{id}/unpublish`       | `unpublish()`      | Despublicar post                |

### 🏷️ Gestión de Categorías

| Ruta                                        | Componente Vue                | Controlador                | Método           | Descripción         |
| ------------------------------------------- | ----------------------------- | -------------------------- | ---------------- | ------------------- |
| `/admin/categories`                         | `Admin/Categories/Index.vue`  | `Admin\CategoryController` | `index()`        | Lista de categorías |
| `/admin/categories/create`                  | `Admin/Categories/Create.vue` | `Admin\CategoryController` | `create()`       | Crear categoría     |
| `POST /admin/categories/{id}/toggle-active` | -                             | `Admin\CategoryController` | `toggleActive()` | Activar/desactivar  |

### 📧 Gestión de Contactos

| Ruta                          | Componente Vue             | Controlador               | Método      | Descripción        |
| ----------------------------- | -------------------------- | ------------------------- | ----------- | ------------------ |
| `/admin/contacts`             | `Admin/Contacts/Index.vue` | `Admin\ContactController` | `index()`   | Lista de contactos |
| `/admin/contacts/{id}`        | `Admin/Contacts/Show.vue`  | `Admin\ContactController` | `show()`    | Ver contacto       |
| `DELETE /admin/contacts/{id}` | -                          | `Admin\ContactController` | `destroy()` | Eliminar contacto  |

#### Acciones Especiales de Contactos

| Ruta                                     | Método            | Descripción            |
| ---------------------------------------- | ----------------- | ---------------------- |
| `POST /admin/contacts/{id}/mark-read`    | `markAsRead()`    | Marcar como leído      |
| `POST /admin/contacts/{id}/mark-replied` | `markAsReplied()` | Marcar como respondido |
| `POST /admin/contacts/{id}/archive`      | `archive()`       | Archivar contacto      |
| `POST /admin/contacts/bulk-action`       | `bulkAction()`    | Acciones en lote       |

---

## 🗃️ MODELOS Y BASE DE DATOS

### 📊 Modelos Principales

| Modelo     | Tabla        | Descripción             | Relaciones                  |
| ---------- | ------------ | ----------------------- | --------------------------- |
| `User`     | `users`      | Usuarios del sistema    | `hasMany(BlogPost)`         |
| `BlogPost` | `blog_posts` | Posts del blog          | `belongsTo(User, Category)` |
| `Category` | `categories` | Categorías del blog     | `hasMany(BlogPost)`         |
| `Contact`  | `contacts`   | Formularios de contacto | -                           |

### 🔄 Migraciones Disponibles

-   `create_users_table.php` - Usuarios base
-   `create_cache_table.php` - Cache del sistema
-   `create_jobs_table.php` - Cola de trabajos
-   `create_categories_table.php` - Categorías del blog
-   `create_blog_posts_table.php` - Posts del blog
-   `create_contacts_table.php` - Formularios de contacto
-   `add_role_to_users_table.php` - Roles de usuario

---

## 🧩 COMPONENTES REUTILIZABLES

### 📦 Componentes Principales

| Componente   | Ubicación              | Descripción                               |
| ------------ | ---------------------- | ----------------------------------------- |
| `Header.vue` | `Component/Header.vue` | Header con navegación (transparente/azul) |
| `Footer.vue` | `Component/Footer.vue` | Footer del sitio                          |
| `Layout.vue` | `Admin/Layout.vue`     | Layout del panel admin                    |

---

## 🛠️ ESTRUCTURA DE ARCHIVOS

### 📁 Backend (Laravel)

```
app/
├── Http/Controllers/
│   ├── Admin/
│   │   ├── BlogPostController.php
│   │   ├── CategoryController.php
│   │   ├── ContactController.php
│   │   └── DashboardController.php
│   ├── Auth/
│   │   └── LoginController.php
│   └── ContactFormController.php
├── Models/
│   ├── BlogPost.php
│   ├── Category.php
│   ├── Contact.php
│   └── User.php
└── Console/Commands/
    └── CreateAdminUser.php
```

### 📁 Frontend (Vue.js)

```
resources/js/Pages/
├── Admin/
│   ├── Categories/
│   │   ├── Index.vue
│   │   └── Create.vue
│   ├── Contacts/
│   │   └── Index.vue
│   ├── Posts/
│   │   └── Index.vue
│   ├── Dashboard.vue
│   └── Layout.vue
├── Auth/
│   └── Login.vue
├── Component/
│   ├── Header.vue
│   └── Footer.vue
├── About.vue
├── Blog.vue
├── Contact.vue
├── Home.vue
├── Portfolio.vue
└── Services.vue
```

---

## 🔧 COMANDOS ÚTILES

### 🚀 Desarrollo

```bash
# Servidor de desarrollo
php artisan serve

# Compilar assets
npm run dev
# o para watch
npm run watch

# Migraciones
php artisan migrate
php artisan migrate:fresh --seed

# Crear admin
php artisan make:admin
```

### 📝 Generación de Código

```bash
# Nuevo controlador
php artisan make:controller NombreController

# Nuevo modelo con migración
php artisan make:model NombreModelo -m

# Nueva migración
php artisan make:migration nombre_de_la_migracion

# Nuevo seeder
php artisan make:seeder NombreSeeder
```

---

## 🎯 FLUJOS PRINCIPALES

### 👤 Flujo de Usuario Público

1. **Navegación**: Header transparente → azul al scroll
2. **Páginas**: Home → Servicios → Portfolio → Blog → Contacto
3. **Blog**: Lista → Detalle post → Categorías
4. **Contacto**: Formulario → Envío → Confirmación

### 🔐 Flujo de Administrador

1. **Login**: `/login` → Autenticación
2. **Dashboard**: Estadísticas generales
3. **Gestión**: Posts, Categorías, Contactos
4. **Acciones**: CRUD completo + acciones especiales

---

## 📋 NOTAS PARA DESARROLLO

### ✅ Funcionalidades Implementadas

-   ✅ Landing page completa con header transparente
-   ✅ Sistema de blog con categorías
-   ✅ Panel de administración
-   ✅ Formulario de contacto
-   ✅ Autenticación y roles
-   ✅ Responsive design

### 🔄 Próximas Mejoras Sugeridas

-   [ ] API REST para blog
-   [ ] Sistema de comentarios
-   [ ] Newsletter/suscripciones
-   [ ] SEO mejorado (meta tags dinámicos)
-   [ ] Optimización de imágenes
-   [ ] Cache de páginas
-   [ ] Búsqueda en blog
-   [ ] Filtros avanzados en admin

---

**📅 Última actualización**: Junio 2025  
**🔧 Versión Laravel**: 11.x  
**⚡ Versión Vue**: 3.x  
**🎨 Versión Tailwind**: 3.x
