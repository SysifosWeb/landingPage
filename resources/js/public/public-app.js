import '../bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

const appId = 'public-app';
const el = document.getElementById(appId);

if (el) {
    const initialPage = el.dataset.page ? JSON.parse(el.dataset.page) : null;

    createInertiaApp({
        id: appId,
        page: initialPage || undefined,
        resolve: (name) => {
            const pages = import.meta.glob('../Pages/**/*.vue', { eager: true });
            const page = pages[`../Pages/${name}.vue`];

            if (!page) {
                throw new Error(`Component ${name}.vue not found`);
            }

            return page.default || page;
        },
        setup({ el: mountEl, App, props, plugin }) {
            createApp({ render: () => h(App, props) })
                .use(plugin)
                .mount(mountEl);
        },
    });
}
