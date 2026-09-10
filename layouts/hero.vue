<script setup>
const route = useRoute()
</script>

<template>
  <div class="min-h-screen font-sans bg-section-dark">
    <AppNavbar class="absolute top-0 left-0 w-full z-50"/>
    <main>
      <slot />
    </main>
    <Footer />
    <!-- Floating WhatsApp -->
    <a href="https://wa.me/56985021549?text=Hola%20SysifosWeb!%20Quiero%20más%20información%20sobre%20sus%20servicios"
       target="_blank"
       rel="noopener"
       aria-label="WhatsApp"
       class="fixed bottom-6 right-6 z-[100] w-20 h-20 rounded-full bg-[#25D366] flex items-center justify-center shadow-xl hover:scale-105 transition-transform">
      <svg viewBox="0 0 32 32" class="w-12 h-12 text-white" fill="none">
        <path fill="currentColor" d="M16 3a13 13 0 0 0-13 13c0 2.3.6 4.5 1.7 6.5L3 29l6.8-1.8A13 13 0 0 0 16 29a13 13 0 0 0 13-13A13 13 0 0 0 16 3z"/>
        <path fill="white" d="M24 18.5c-.3-.2-1.8-.9-2.1-.9-.3 0-.5-.2-.7-.2-.2 0-.5.1-.8.2-1.1.5-2.1.9-3.3.9-2.1 0-3.8-1.7-3.8-3.8 0-1 .3-1.9.9-2.7.1-.1.1-.3 0-.4 0-.1-.2-.3-.5-.5-.3-.2-.6-.5-.6-.5-.2-.2-.5-.5-.2-.9.4-.4 1.1-.5 1.9-.5.9 0 1.8.1 2.7.3.9.2 1.7.5 2.4 1 .6.4 1.2 1 1.5 1.7.4.7.5 1.5.5 2.4 0 1.1-.4 2.1-1 2.9z"/>
      </svg>
    </a>
  </div>
</template>
