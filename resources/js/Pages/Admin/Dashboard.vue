<template>
  <AdminLayout page-title="Dashboard">
    <div class="p-6 space-y-6">
      <!-- Estadísticas principales -->
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
              <span class="text-yellow-600 font-medium">{{ stats.draft_posts }}</span> borradores
            </div>
          </div>
        </div>

        <!-- Total Categorías -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
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
              <span class="text-red-600 font-medium">{{ stats.unread_contacts }}</span> sin leer,
              <span class="text-green-600 font-medium">{{ stats.responded_contacts }}</span> respondidos
            </div>
          </div>
        </div>

        <!-- Actividad del mes -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="w-8 h-8 bg-orange-500 rounded-md flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">Este Mes</dt>
                <dd class="text-lg font-medium text-gray-900">{{ currentMonthActivity }}</dd>
              </dl>
            </div>
          </div>
          <div class="mt-4">
            <div class="text-sm text-gray-600">
              Posts y contactos combinados
            </div>
          </div>
        </div>
      </div>

      <!-- Gráfico de actividad -->
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Actividad de los últimos 6 meses</h3>
        <div class="h-64 flex items-end justify-between space-x-2">
          <div v-for="month in monthlyStats" :key="month.month" class="flex-1 flex flex-col items-center">
            <div class="w-full flex flex-col items-center space-y-1">
              <!-- Barra de Posts -->
              <div 
                class="w-8 bg-blue-500 rounded-t"
                :style="{ height: `${Math.max((month.posts / maxMonthlyValue) * 200, 4)}px` }"
                :title="`${month.posts} posts`"
              ></div>
              <!-- Barra de Contactos -->
              <div 
                class="w-8 bg-purple-500 rounded-b"
                :style="{ height: `${Math.max((month.contacts / maxMonthlyValue) * 200, 4)}px` }"
                :title="`${month.contacts} contactos`"
              ></div>
            </div>
            <span class="text-xs text-gray-500 mt-2">{{ month.month }}</span>
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
        </div>
      </div>

      <!-- Posts y Contactos recientes -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
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
          <div class="divide-y divide-gray-200">
            <div v-if="recentPosts.length === 0" class="px-6 py-4 text-center text-gray-500">
              No hay posts aún
            </div>
            <div v-for="post in recentPosts" :key="post.id" class="px-6 py-4 hover:bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900 truncate">{{ post.title }}</p>
                  <p class="text-sm text-gray-500">{{ post.category }} • {{ post.created_at }}</p>
                </div>
                <div class="ml-4 flex-shrink-0">
                  <span 
                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                    :class="post.is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'"
                  >
                    {{ post.is_published ? 'Publicado' : 'Borrador' }}
                  </span>
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
          <div class="divide-y divide-gray-200">
            <div v-if="recentContacts.length === 0" class="px-6 py-4 text-center text-gray-500">
              No hay contactos aún
            </div>
            <div v-for="contact in recentContacts" :key="contact.id" class="px-6 py-4 hover:bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900 truncate">{{ contact.name }}</p>
                  <p class="text-sm text-gray-500 truncate">{{ contact.subject }}</p>
                  <p class="text-xs text-gray-400">{{ contact.email }} • {{ contact.created_at }}</p>
                </div>
                <div class="ml-4 flex-shrink-0">
                  <span 
                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                    :class="{
                      'bg-red-100 text-red-800': contact.status === 'nuevo',
                      'bg-yellow-100 text-yellow-800': contact.status === 'en_proceso',
                      'bg-green-100 text-green-800': contact.status === 'respondido',
                      'bg-gray-100 text-gray-800': contact.status === 'archivado'
                    }"
                  >
                    {{ getStatusText(contact.status) }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import Layout from './Layout.vue'
import { route } from '../../utils/route.js'

const props = defineProps({
  stats: Object,
  recentPosts: Array,
  recentContacts: Array,
  monthlyStats: Array,
})

const getStatusText = (status) => {
  const statusMap = {
    'nuevo': 'Nuevo',
    'en_proceso': 'En Proceso',
    'respondido': 'Respondido',
    'archivado': 'Archivado'
  }
  return statusMap[status] || status
}

const maxMonthlyValue = computed(() => {
  if (!props.monthlyStats || props.monthlyStats.length === 0) return 1
  return Math.max(...props.monthlyStats.map(month => Math.max(month.posts, month.contacts)))
})

const currentMonthActivity = computed(() => {
  if (!props.monthlyStats || props.monthlyStats.length === 0) return 0
  const currentMonth = props.monthlyStats[props.monthlyStats.length - 1]
  return currentMonth.posts + currentMonth.contacts
})
</script> 