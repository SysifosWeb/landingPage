import "./bootstrap";
// Import our custom CSS
import "../scss/styles.scss";
import.meta.glob(["../img/**"]);

// Import all of Bootstrap's JS
import * as bootstrap from "bootstrap";

import { createInertiaApp } from "@inertiajs/react";
import { createRoot } from "react-dom/client";

createInertiaApp({
    title: (title) => `${title} | Sysifos Web Soluciones digitales`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.jsx", { eager: true });
        return pages[`./Pages/${name}.jsx`];
    },
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
});
