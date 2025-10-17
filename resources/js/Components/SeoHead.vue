<script setup>
import { Head } from '@inertiajs/vue3';
import { computed, getCurrentInstance, onMounted, watch } from 'vue';

const props = defineProps({
    seo: {
        type: Object,
        default: () => ({}),
    },
    disabled: {
        type: Boolean,
        default: false,
    },
});

const instance = getCurrentInstance();

const hasHeadManager = computed(() => {
    return Boolean(instance?.appContext?.config?.globalProperties?.$headManager);
});

const headComponent = computed(() => {
    if (props.disabled) {
        return null;
    }

    return hasHeadManager.value ? Head : null;
});

const setMetaTag = (attribute, name, content) => {
    if (!name || !content) {
        return;
    }

    const selector = attribute === 'property'
        ? `meta[property="${name}"]`
        : `meta[name="${name}"]`;

    let element = document.head.querySelector(selector);

    if (!element) {
        element = document.createElement('meta');
        element.setAttribute(attribute, name);
        document.head.appendChild(element);
    }

    element.setAttribute('content', content);
};

const setLinkTag = (rel, href) => {
    if (!rel || !href) {
        return;
    }

    let element = document.head.querySelector(`link[rel="${rel}"]`);

    if (!element) {
        element = document.createElement('link');
        element.setAttribute('rel', rel);
        document.head.appendChild(element);
    }

    element.setAttribute('href', href);
};

const updateDocumentHead = () => {
    if (!props.seo || props.disabled) {
        return;
    }

    if (props.seo.title) {
        document.title = props.seo.title;
    }

    setMetaTag('name', 'description', props.seo.description);
    setMetaTag('name', 'keywords', props.seo.keywords);
    setMetaTag('name', 'robots', props.seo.robots ?? 'index, follow');
    setLinkTag('canonical', props.seo.canonical);

    setMetaTag('property', 'og:type', props.seo.og_type);
    setMetaTag('property', 'og:title', props.seo.title);
    setMetaTag('property', 'og:description', props.seo.description);
    setMetaTag('property', 'og:url', props.seo.canonical);
    setMetaTag('property', 'og:image', props.seo.og_image);

    setMetaTag('name', 'twitter:card', props.seo.twitter_card);
    setMetaTag('name', 'twitter:title', props.seo.title);
    setMetaTag('name', 'twitter:description', props.seo.description);
    setMetaTag('name', 'twitter:image', props.seo.og_image);

    setMetaTag('name', 'author', props.seo.article_author);
    setMetaTag('property', 'article:author', props.seo.article_author);
    setMetaTag('property', 'article:published_time', props.seo.article_published_time);
    setMetaTag('property', 'article:modified_time', props.seo.article_modified_time);
    setMetaTag('property', 'article:section', props.seo.article_section);
};

onMounted(() => {
    if (!hasHeadManager.value && !props.disabled) {
        updateDocumentHead();
    }
});

watch(
    () => props.seo,
    () => {
        if (!hasHeadManager.value && !props.disabled) {
            updateDocumentHead();
        }
    },
    { deep: true }
);

watch(
    () => props.disabled,
    (isDisabled) => {
        if (!isDisabled && !hasHeadManager.value) {
            updateDocumentHead();
        }
    }
);
</script>

<template>
    <component :is="headComponent" v-if="headComponent" :title="seo?.title">
        <meta v-if="seo?.description" name="description" :content="seo.description" />
        <meta v-if="seo?.keywords" name="keywords" :content="seo.keywords" />
        <meta name="robots" content="index, follow" />
        <link v-if="seo?.canonical" rel="canonical" :href="seo.canonical" />

        <meta v-if="seo?.og_type" property="og:type" :content="seo.og_type" />
        <meta v-if="seo?.title" property="og:title" :content="seo.title" />
        <meta v-if="seo?.description" property="og:description" :content="seo.description" />
        <meta v-if="seo?.canonical" property="og:url" :content="seo.canonical" />
        <meta v-if="seo?.og_image" property="og:image" :content="seo.og_image" />

        <meta v-if="seo?.twitter_card" name="twitter:card" :content="seo.twitter_card" />
        <meta v-if="seo?.title" name="twitter:title" :content="seo.title" />
        <meta v-if="seo?.description" name="twitter:description" :content="seo.description" />
        <meta v-if="seo?.og_image" name="twitter:image" :content="seo.og_image" />

        <meta v-if="seo?.article_author" name="author" :content="seo.article_author" />
        <meta v-if="seo?.article_author" property="article:author" :content="seo.article_author" />
        <meta v-if="seo?.article_published_time" property="article:published_time" :content="seo.article_published_time" />
        <meta v-if="seo?.article_modified_time" property="article:modified_time" :content="seo.article_modified_time" />
        <meta v-if="seo?.article_section" property="article:section" :content="seo.article_section" />
    </component>
</template>
