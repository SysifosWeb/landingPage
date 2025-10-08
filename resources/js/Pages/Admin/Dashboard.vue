<template>
  <AdminLayout page-title="Dashboard">
    <div class="p-6 space-y-6">
      <!-- Estadísticas principales mejoradas -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Posts -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">Total Posts</dt>
                <dd class="text-lg font-medium text-gray-900">{{ stats.total_posts }}</dd>
              </dl>
            </div>
          </div>
          <div class="mt-4">
            <div class="text-sm text-gray-600">
              <span class="text-green-600 font-medium">{{ stats.published_posts }}</span> publicados,
              <span class="text-yellow-600 font-medium">{{ stats.draft_posts }}</span> borradores,
              <span class="text-purple-600 font-medium">{{ stats.featured_posts }}</span> destacados
            </div>
            <div class="text-xs text-gray-500 mt-1">
              {{ periodStats.posts_last_7_days }} nuevos esta semana
            </div>
          </div>
        </div>

        <!-- Total Contactos -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">Contactos</dt>
                <dd class="text-lg font-medium text-gray-900">{{ stats.total_contacts }}</dd>
              </dl>
            </div>
          </div>
          <div class="mt-4">
            <div class="text-sm text-gray-600">
              <span class="text-red-600 font-medium">{{ stats.new_contacts }}</span> nuevos,
              <span class="text-green-600 font-medium">{{ stats.replied_contacts }}</span> respondidos
            </div>
            <div class="text-xs text-gray-500 mt-1">
              {{ periodStats.contacts_last_7_days }} esta semana
            </div>
          </div>
        </div>

        <!-- Total Vistas -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">Total Vistas</dt>
                <dd class="text-lg font-medium text-gray-900">{{ stats.total_views.toLocaleString() }}</dd>
              </dl>
            </div>
          </div>
          <div class="mt-4">
            <div class="text-sm text-gray-600">
              Promedio: <span class="font-medium">{{ stats.avg_views_per_post }}</span> por post
            </div>
            <div class="text-xs text-gray-500 mt-1">
              {{ periodStats.views_last_7_days.toLocaleString() }} esta semana
            </div>
          </div>
        </div>

        <!-- Categorías y Usuarios -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="w-8 h-8 bg-orange-500 rounded-md flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">Categorías</dt>
                <dd class="text-lg font-medium text-gray-900">{{ stats.total_categories }}</dd>
              </dl>
            </div>
          </div>
          <div class="mt-4">
            <div class="text-sm text-gray-600">
              <span class="text-green-600 font-medium">{{ stats.active_categories }}</span> activas
            </div>
            <div class="text-xs text-gray-500 mt-1">
              {{ stats.total_users }} usuarios ({{ stats.admin_users }} admins)
            </div>
          </div>
        </div>
      </div>

      <!-- Gráfico de actividad mejorado -->
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Actividad de los últimos 12 meses</h3>
        <div class="h-64 flex items-end justify-between space-x-1">
          <div v-for="month in monthlyStats" :key="month.month" class="flex-1 flex flex-col items-center">
            <div class="w-full flex flex-col items-center space-y-1">
              <!-- Barra de Posts -->
              <div 
                class="w-6 bg-blue-500 rounded-t"
                :style="{ height: `${Math.max((month.posts / maxMonthlyValue) * 200, 4)}px` }"
                :title="`${month.posts} posts`"
              ></div>
              <!-- Barra de Contactos -->
              <div 
                class="w-6 bg-purple-500"
                :style="{ height: `${Math.max((month.contacts / maxMonthlyValue) * 200, 4)}px` }"
                :title="`${month.contacts} contactos`"
              ></div>
              <!-- Barra de Vistas (dividido por 10 para escala) -->
              <div 
                class="w-6 bg-green-500 rounded-b"
                :style="{ height: `${Math.max((month.views / 10 / maxMonthlyValue) * 200, 4)}px` }"
                :title="`${month.views} vistas`"
              ></div>
            </div>
            <span class="text-xs text-gray-500 mt-2 transform -rotate-45 origin-top-left">{{ month.month_short }}</span>
          </div>
        </div>
        <div class="flex justify-center mt-4 space-x-6">
          <div class="flex items-center">
            <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
            <span class="text-sm text-gray-600">Posts</span>
          </div>
          <div class="flex items-center">
            <div class="w-3 h-3 bg-purple-500 rounded mr-2"></div>
            <span class="text-sm text-gray-600">Contactos</span>
          </div>
          <div class="flex items-center">
            <div class="w-3 h-3 bg-green-500 rounded mr-2"></div>
            <span class="text-sm text-gray-600">Vistas</span>
          </div>
        </div>
      </div>

      <!-- Sección de contenido principal -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Posts recientes -->
        <div class="bg-white rounded-lg shadow">
          <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
              <h3 class="text-lg font-medium text-gray-900">Posts Recientes</h3>
              <Link :href="route('admin.posts.index')" class="text-sm text-blue-600 hover:text-blue-500">
                Ver todos
              </Link>
            </div>
          </div>
          <div class="divide-y divide-gray-200 max-h-96 overflow-y-auto">
            <div v-if="recentPosts.length === 0" class="px-6 py-4 text-center text-gray-500">
              No hay posts aún
            </div>
            <div v-for="post in recentPosts" :key="post.id" class="px-6 py-3 hover:bg-gray-50">
              <div class="flex items-start justify-between">
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900 truncate">{{ post.title }}</p>
                  <div class="flex items-center mt-1 space-x-2">
                    <span class="text-xs text-gray-500">{{ post.author }}</span>
                    <span v-if="post.category" 
                          class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium text-white"
                          :style="{ backgroundColor: post.category_color }">
                      {{ post.category }}
                    </span>
                  </div>
                  <p class="text-xs text-gray-400 mt-1">{{ post.time_ago }} • {{ post.views }} vistas</p>
                </div>
                <div class="ml-4 flex-shrink-0 flex flex-col items-end space-y-1">
                  <span 
                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                    :class="post.is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'"
                  >
                    {{ post.is_published ? 'Publicado' : 'Borrador' }}
                  </span>
                  <span v-if="post.featured" class="text-xs text-yellow-600">⭐ Destacado</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contactos recientes -->
        <div class="bg-white rounded-lg shadow">
          <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
              <h3 class="text-lg font-medium text-gray-900">Contactos Recientes</h3>
              <Link :href="route('admin.contacts.index')" class="text-sm text-blue-600 hover:text-blue-500">
                Ver todos
              </Link>
            </div>
          </div>
          <div class="divide-y divide-gray-200 max-h-96 overflow-y-auto">
            <div v-if="recentContacts.length === 0" class="px-6 py-4 text-center text-gray-500">
              No hay contactos aún
            </div>
            <div v-for="contact in recentContacts" :key="contact.id" class="px-6 py-3 hover:bg-gray-50">
              <div class="flex items-start justify-between">
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900 truncate">{{ contact.name }}</p>
                  <p class="text-sm text-gray-700 truncate">{{ contact.subject }}</p>
                  <p class="text-xs text-gray-500 truncate">{{ contact.email }}</p>
                  <p class="text-xs text-gray-400 mt-1">{{ contact.time_ago }}</p>
                </div>
                <div class="ml-4 flex-shrink-0">
                  <span 
                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                    :class="{
                      'bg-red-100 text-red-800': contact.status === 'new',
                      'bg-yellow-100 text-yellow-800': contact.status === 'read',
                      'bg-green-100 text-green-800': contact.status === 'replied',
                      'bg-gray-100 text-gray-800': contact.status === 'archived'
                    }"
                  >
                    {{ getStatusText(contact.status) }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Actividad reciente -->
        <div class="bg-white rounded-lg shadow">
          <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Actividad Reciente</h3>
          </div>
          <div class="divide-y divide-gray-200 max-h-96 overflow-y-auto">
            <div v-if="recentActivity.length === 0" class="px-6 py-4 text-center text-gray-500">
              No hay actividad reciente
            </div>
            <div v-for="activity in recentActivity" :key="`${activity.type}-${activity.time}`" class="px-6 py-3">
              <div class="flex items-start">
                <div class="flex-shrink-0">
                  <div class="w-8 h-8 rounded-full flex items-center justify-center"
                       :class="getActivityColor(activity.color)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="getActivityIcon(activity.type)" />
                    </svg>
                  </div>
                </div>
                <div class="ml-3 flex-1 min-w-0">
                  <p class="text-sm text-gray-900">
                    <span class="font-medium">{{ activity.user }}</span>
                    {{ activity.action }}
                    <span class="font-medium">"{{ activity.title }}"</span>
                  </p>
                  <p class="text-xs text-gray-500">{{ activity.time_ago }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Posts populares y categorías -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Posts más populares -->
        <div class="bg-white rounded-lg shadow">
          <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Posts Más Populares</h3>
          </div>
          <div class="divide-y divide-gray-200">
            <div v-if="popularPosts.length === 0" class="px-6 py-4 text-center text-gray-500">
              No hay posts populares aún
            </div>
            <div v-for="post in popularPosts" :key="post.id" class="px-6 py-3 hover:bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900 truncate">{{ post.title }}</p>
                  <div class="flex items-center mt-1 space-x-2">
                    <span v-if="post.category" 
                          class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium text-white"
                          :style="{ backgroundColor: post.category_color }">
                      {{ post.category }}
                    </span>
                    <span class="text-xs text-gray-500">{{ post.published_at }}</span>
                  </div>
                </div>
                <div class="ml-4 flex-shrink-0 text-right">
                  <p class="text-sm font-medium text-gray-900">{{ post.views.toLocaleString() }}</p>
                  <p class="text-xs text-gray-500">vistas</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Categorías más activas -->
        <div class="bg-white rounded-lg shadow">
          <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Categorías Más Activas</h3>
          </div>
          <div class="divide-y divide-gray-200">
            <div v-if="topCategories.length === 0" class="px-6 py-4 text-center text-gray-500">
              No hay categorías aún
            </div>
            <div v-for="category in topCategories" :key="category.id" class="px-6 py-3 hover:bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                  <div class="flex items-center">
                    <div class="w-3 h-3 rounded-full mr-2" :style="{ backgroundColor: category.color }"></div>
                    <p class="text-sm font-medium text-gray-900 truncate">{{ category.name }}</p>
                  </div>
                  <p class="text-xs text-gray-500 mt-1">
                    {{ category.published_posts_count }} publicados • {{ category.total_views.toLocaleString() }} vistas
                  </p>
                </div>
                <div class="ml-4 flex-shrink-0 text-right">
                  <p class="text-sm font-medium text-gray-900">{{ category.posts_count }}</p>
                  <p class="text-xs text-gray-500">posts</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Estadísticas de rendimiento -->
      <div v-if="performanceStats" class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Estadísticas de Rendimiento</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div v-if="performanceStats.most_viewed_post" class="text-center">
            <p class="text-sm text-gray-500">Post Más Visto</p>
            <p class="text-lg font-medium text-gray-900 truncate">{{ performanceStats.most_viewed_post.title }}</p>
            <p class="text-sm text-blue-600">{{ performanceStats.most_viewed_post.views.toLocaleString() }} vistas</p>
          </div>
          <div v-if="performanceStats.most_active_category" class="text-center">
            <p class="text-sm text-gray-500">Categoría Más Activa</p>
            <p class="text-lg font-medium text-gray-900">{{ performanceStats.most_active_category.name }}</p>
            <p class="text-sm text-green-600">{{ performanceStats.most_active_category.published_posts_count }} posts</p>
          </div>
          <div class="text-center">
            <p class="text-sm text-gray-500">Promedio Contactos/Día</p>
            <p class="text-lg font-medium text-gray-900">{{ performanceStats.avg_contacts_per_day }}</p>
            <p class="text-sm text-purple-600">contactos diarios</p>
          </div>
          <div class="text-center">
            <p class="text-sm text-gray-500">Actividad Total</p>
            <p class="text-lg font-medium text-gray-900">{{ currentMonthActivity }}</p>
            <p class="text-sm text-orange-600">este mes</p>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import AdminLayout from './Layout.vue'
import { route } from '../../utils/route.js'

const props = defineProps({
  stats: Object,
  periodStats: Object,
  recentPosts: Array,
  recentContacts: Array,
  popularPosts: Array,
  topCategories: Array,
  monthlyStats: Array,
  recentActivity: Array,
  performanceStats: Object,
})

const getStatusText = (status) => {
  const statusMap = {
    'new': 'Nuevo',
    'read': 'Leído',
    'replied': 'Respondido',
    'archived': 'Archivado'
  }
  return statusMap[status] || status
}

const maxMonthlyValue = computed(() => {
  if (!props.monthlyStats || props.monthlyStats.length === 0) return 1
  return Math.max(
    ...props.monthlyStats.map((month) =>
      Math.max(month.posts, month.contacts, month.views / 10)
    )
  )
})

const currentMonthActivity = computed(() => {
  if (!props.monthlyStats || props.monthlyStats.length === 0) return 0
  const currentMonth = props.monthlyStats[props.monthlyStats.length - 1]
  return currentMonth.posts + currentMonth.contacts
})

const getActivityIcon = (type) => {
  const icons = {
    post: "M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z",
    contact: "M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z",
  }
  return icons[type] || icons.post
}

const getActivityColor = (color) => {
  const colors = {
    green: "text-green-600 bg-green-100",
    yellow: "text-yellow-600 bg-yellow-100",
    blue: "text-blue-600 bg-blue-100",
    red: "text-red-600 bg-red-100",
  }
  return colors[color] || colors.blue
}
</script>

<style scoped>
/* Solo estilos que no se puedan lograr con Tailwind */
</style> 