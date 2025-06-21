// Función route simple para generar URLs de administración
export const route = (name, params = {}) => {
    const routes = {
        // Dashboard
        "admin.dashboard": "/admin",

        // Posts
        "admin.posts.index": "/admin/posts",
        "admin.posts.create": "/admin/posts/create",
        "admin.posts.store": "/admin/posts",
        "admin.posts.edit": (id) => `/admin/posts/${id}/edit`,
        "admin.posts.show": (id) => `/admin/posts/${id}`,
        "admin.posts.update": (id) => `/admin/posts/${id}`,
        "admin.posts.destroy": (id) => `/admin/posts/${id}`,
        "admin.posts.toggle-featured": (id) =>
            `/admin/posts/${id}/toggle-featured`,
        "admin.posts.publish": (id) => `/admin/posts/${id}/publish`,
        "admin.posts.unpublish": (id) => `/admin/posts/${id}/unpublish`,

        // Categories
        "admin.categories.index": "/admin/categories",
        "admin.categories.create": "/admin/categories/create",
        "admin.categories.store": "/admin/categories",
        "admin.categories.edit": (id) => `/admin/categories/${id}/edit`,
        "admin.categories.show": (id) => `/admin/categories/${id}`,
        "admin.categories.update": (id) => `/admin/categories/${id}`,
        "admin.categories.destroy": (id) => `/admin/categories/${id}`,
        "admin.categories.toggle-active": (id) =>
            `/admin/categories/${id}/toggle-active`,

        // Contacts
        "admin.contacts.index": "/admin/contacts",
        "admin.contacts.show": (id) => `/admin/contacts/${id}`,
        "admin.contacts.destroy": (id) => `/admin/contacts/${id}`,
        "admin.contacts.mark-read": (id) => `/admin/contacts/${id}/mark-read`,
        "admin.contacts.mark-replied": (id) =>
            `/admin/contacts/${id}/mark-replied`,
        "admin.contacts.archive": (id) => `/admin/contacts/${id}/archive`,
        "admin.contacts.bulk-action": "/admin/contacts/bulk-action",

        // Public routes
        home: "/",
        logout: "/logout",
    };

    if (typeof routes[name] === "function") {
        return routes[name](params.id || params);
    }

    return routes[name] || "#";
};

// Hacer route disponible globalmente
if (typeof window !== "undefined") {
    window.route = route;
}

export default route;
