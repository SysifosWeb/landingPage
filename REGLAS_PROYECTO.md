# 📋 Reglas del Proyecto - Landing Page

## 🏗️ Stack Tecnológico

-   **Backend**: Laravel 11 + PHP 8.2
-   **Frontend**: Vue 3 + Inertia.js + Vite
-   **Estilos**: Tailwind CSS
-   **Gestión de paquetes**: pnpm (frontend) + Composer (backend)
-   **Base de datos**: SQLite (desarrollo)

## 🎯 Principios Generales

### DRY (Don't Repeat Yourself)

-   ✅ Reutilizar componentes Vue
-   ✅ Crear helpers y utilities compartidos
-   ✅ Usar traits en Laravel para funcionalidades comunes
-   ✅ Centralizar configuraciones

### Verificación antes de Asumir

-   ✅ Siempre revisar archivos existentes antes de crear nuevos
-   ✅ Verificar dependencias antes de instalar
-   ✅ Comprobar rutas y controladores existentes
-   ✅ Validar estructura de base de datos actual

## 📦 Gestión de Dependencias

### Frontend (pnpm)

```bash
# Instalar dependencias
pnpm install

# Agregar nueva dependencia
pnpm add [paquete]

# Agregar dependencia de desarrollo
pnpm add -D [paquete]

# Actualizar dependencias
pnpm update
```

### Backend (Composer)

```bash
# Instalar dependencias
composer install

# Agregar nueva dependencia
composer require [paquete]

# Agregar dependencia de desarrollo
composer require --dev [paquete]

# Actualizar dependencias
composer update
```

## 🏛️ Estructura de Archivos

### Backend (Laravel)

```
app/
├── Http/
│   ├── Controllers/     # Controladores (PascalCase)
│   ├── Middleware/      # Middleware personalizado
│   └── Requests/        # Form Requests
├── Models/              # Modelos Eloquent (PascalCase)
├── Services/            # Lógica de negocio
└── Helpers/             # Funciones auxiliares
```

### Frontend (Vue + Inertia)

```
resources/
├── js/
│   ├── Components/      # Componentes reutilizables (PascalCase)
│   ├── Pages/           # Páginas de Inertia (PascalCase)
│   ├── Layouts/         # Layouts base
│   └── Composables/     # Composables de Vue
└── css/
    └── app.css          # Estilos globales + Tailwind
```

## 🎨 Convenciones de Código

### PHP (Laravel)

-   **Estilo**: PSR-12
-   **Nombres de clases**: PascalCase (`UserController`)
-   **Nombres de métodos**: camelCase (`getUserData`)
-   **Nombres de variables**: camelCase (`$userData`)
-   **Constantes**: UPPER_SNAKE_CASE (`MAX_USERS`)

### JavaScript/Vue

-   **Componentes**: PascalCase (`UserProfile.vue`)
-   **Props**: camelCase (`userName`)
-   **Eventos**: kebab-case (`user-updated`)
-   **Variables**: camelCase (`userData`)
-   **Constantes**: UPPER_SNAKE_CASE (`API_URL`)

#### 🏗️ Estructura de Archivos Vue

**OBLIGATORIO**: Todos los archivos `.vue` deben seguir esta estructura exacta:

```vue
<script setup>
// Imports
// Composables
// Props/defineProps
// Variables reactivas
// Métodos/funciones
// Lifecycle hooks
</script>

<template>
    <!-- HTML del componente -->
</template>

<style scoped>
/* Estilos específicos del componente */
/* Solo usar cuando Tailwind no sea suficiente */
</style>
```

**Ejemplo práctico:**

```vue
<script setup>
import { ref, onMounted } from "vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    title: String,
    data: Array,
});

const isLoading = ref(false);

const handleSubmit = () => {
    // lógica del método
};

onMounted(() => {
    // lógica de montaje
});
</script>

<template>
    <Head :title="props.title" />

    <div class="container mx-auto">
        <!-- contenido del componente -->
    </div>
</template>

<style scoped>
/* Solo estilos que no se puedan lograr con Tailwind */
.custom-animation {
    animation: fadeIn 0.3s ease-in-out;
}
</style>
```

### CSS/Tailwind

-   **Clases personalizadas**: kebab-case (`hero-section`)
-   **Usar Tailwind utilities primero**
-   **Componentes CSS solo cuando sea necesario**

## 🗺️ Documentación y Mapeo

### 📋 Uso del Mapa de Rutas

**OBLIGATORIO**: Usar y mantener actualizado el archivo `MAPA_RUTAS_PROYECTO.md`

#### Reglas de Uso:

1. **Consultar antes de crear**: Siempre revisar el mapa antes de agregar nuevas rutas, controladores o componentes
2. **Actualizar inmediatamente**: Cuando se agreguen nuevas funcionalidades, actualizar el mapa en el mismo commit
3. **Verificar estructura**: Usar el mapa para entender la arquitectura antes de hacer cambios
4. **Planificar con el mapa**: Usar la documentación para planificar nuevas features

#### Cuándo Actualizar el Mapa:

-   ✅ **Nuevas rutas**: Cualquier ruta nueva en `web.php`
-   ✅ **Nuevos controladores**: Cualquier controlador creado
-   ✅ **Nuevos componentes Vue**: Páginas principales o componentes importantes
-   ✅ **Nuevos modelos**: Modelos y sus relaciones
-   ✅ **Cambios en estructura**: Modificaciones en la arquitectura
-   ✅ **Nuevas funcionalidades**: Features que cambien el flujo de la aplicación

#### Formato de Actualización:

```markdown
## Cambios en [Fecha]

-   ✅ Agregado: Nueva ruta `/api/users` con `UserApiController`
-   ✅ Modificado: `Contact.vue` ahora incluye validación avanzada
-   ✅ Nuevo modelo: `Subscription` con relación `belongsTo(User)`
```

### 📝 Documentación de Código:

-   **Métodos complejos**: Agregar comentarios explicativos
-   **Componentes reutilizables**: Documentar props y eventos
-   **APIs**: Documentar endpoints y responses
-   **Configuraciones**: Explicar variables de entorno importantes

## 🔧 Comandos de Desarrollo

### Desarrollo Local

```bash
# Iniciar servidor de desarrollo (usa concurrently)
composer run dev

# O manualmente:
php artisan serve          # Backend (puerto 8000)
pnpm run dev              # Frontend (Vite)
```

### Build de Producción

```bash
pnpm run build            # Compilar assets
php artisan optimize      # Optimizar Laravel
```

### Base de Datos

```bash
php artisan migrate       # Ejecutar migraciones
php artisan db:seed       # Ejecutar seeders
php artisan migrate:fresh --seed  # Reset completo
```

## 📝 Estándares de Commit

### Formato

```
tipo(alcance): descripción breve

Descripción detallada (opcional)
```

### Tipos

-   `feat`: Nueva funcionalidad
-   `fix`: Corrección de bug
-   `docs`: Documentación
-   `style`: Cambios de formato
-   `refactor`: Refactorización
-   `test`: Pruebas
-   `chore`: Tareas de mantenimiento

### Ejemplos

```
feat(landing): agregar sección de testimonios
fix(contact): corregir validación de formulario
docs(readme): actualizar instrucciones de instalación
```

## 🧪 Testing

### Backend (PHPUnit)

```bash
php artisan test          # Ejecutar todas las pruebas
php artisan test --filter UserTest  # Prueba específica
```

### Frontend

```bash
# Agregar testing framework si es necesario
pnpm add -D vitest @vue/test-utils
```

## 🚀 Despliegue

### Preparación

1. ✅ Ejecutar `pnpm run build`
2. ✅ Configurar variables de entorno
3. ✅ Ejecutar migraciones en producción
4. ✅ Optimizar Laravel (`php artisan optimize`)

### Variables de Entorno Requeridas

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com
DB_CONNECTION=mysql  # o tu base de datos de producción
```

## 🔒 Seguridad

### Laravel

-   ✅ Usar Form Requests para validación
-   ✅ Sanitizar inputs del usuario
-   ✅ Usar CSRF protection
-   ✅ Validar autorización en controladores

### Frontend

-   ✅ Validar datos en cliente Y servidor
-   ✅ Sanitizar contenido dinámico
-   ✅ Usar HTTPS en producción

## 📱 Responsive Design

### Breakpoints (Tailwind)

-   `sm`: 640px+
-   `md`: 768px+
-   `lg`: 1024px+
-   `xl`: 1280px+
-   `2xl`: 1536px+

### Enfoque

-   ✅ Mobile-first design
-   ✅ Probar en múltiples dispositivos
-   ✅ Optimizar imágenes para diferentes tamaños

## 🎯 Performance

### Frontend

-   ✅ Lazy loading de componentes
-   ✅ Optimización de imágenes
-   ✅ Minimizar bundle size
-   ✅ Usar CDN para assets estáticos

### Backend

-   ✅ Usar cache de Laravel
-   ✅ Optimizar consultas de base de datos
-   ✅ Implementar rate limiting

## 📚 Recursos Útiles

-   [Laravel Documentation](https://laravel.com/docs)
-   [Vue 3 Documentation](https://vuejs.org/)
-   [Inertia.js Documentation](https://inertiajs.com/)
-   [Tailwind CSS Documentation](https://tailwindcss.com/)

## ✅ Checklist de Desarrollo

### Antes de cada Feature

-   [ ] Revisar archivos existentes
-   [ ] Planificar estructura de componentes
-   [ ] Verificar dependencias necesarias
-   [ ] Crear branch específico

### Antes de cada Commit

-   [ ] Probar funcionalidad localmente
-   [ ] Verificar que no hay errores de consola
-   [ ] Revisar responsive design
-   [ ] Ejecutar linting (si está configurado)

### Antes de cada Deploy

-   [ ] Ejecutar build de producción
-   [ ] Probar en entorno de staging
-   [ ] Verificar variables de entorno
-   [ ] Backup de base de datos (si aplica)

---

**Nota**: Este documento debe actualizarse conforme evolucione el proyecto. Siempre consultar antes de hacer cambios significativos en la arquitectura.
