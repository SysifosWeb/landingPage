<script setup>
import { Link } from '@inertiajs/vue3'
import Navbar from './Component/Navbar.vue';
</script>

<template>
  <main>
    <header>
      <!-- <Link href="/">Home</Link>
      <Link href="/about">About</Link>
      <Link href="/contact">Contact</Link> -->
      <Navbar/>
    </header>
    <article>
      <slot />
    </article>
  </main>
</template>
