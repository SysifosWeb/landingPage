import { _ as __nuxt_component_0, a as __nuxt_component_2 } from './Footer-DfYAlqmj.mjs';
import { _ as __nuxt_component_2$1 } from './CookieConsent-CkQ-QEY2.mjs';
import { mergeProps, useSSRContext } from 'vue';
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderSlot } from 'vue/server-renderer';
import { u as useRoute } from './server.mjs';
import '../nitro/nitro.mjs';
import 'node:http';
import 'node:https';
import 'node:events';
import 'node:buffer';
import 'lru-cache';
import 'node:fs';
import 'node:path';
import 'node:crypto';
import 'node:url';
import 'consola';
import 'fast-xml-parser';
import 'xss';
import 'unhead/server';
import 'unhead/plugins';
import 'unhead/utils';
import 'vue-bundle-renderer/runtime';
import 'ipx';
import 'vue-router';

const _sfc_main = {
  __name: "hero",
  __ssrInlineRender: true,
  setup(__props) {
    useRoute();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_AppNavbar = __nuxt_component_0;
      const _component_Footer = __nuxt_component_2;
      const _component_CookieConsent = __nuxt_component_2$1;
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "min-h-screen font-sans bg-section-dark" }, _attrs))}>`);
      _push(ssrRenderComponent(_component_AppNavbar, { class: "absolute top-0 left-0 w-full z-50" }, null, _parent));
      _push(`<main>`);
      ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
      _push(`</main>`);
      _push(ssrRenderComponent(_component_Footer, null, null, _parent));
      _push(ssrRenderComponent(_component_CookieConsent, null, null, _parent));
      _push(`<a href="https://wa.me/56985021549?text=Hola%20SysifosWeb!%20Quiero%20m\xE1s%20informaci\xF3n%20sobre%20sus%20servicios" target="_blank" rel="noopener" aria-label="WhatsApp" class="fixed bottom-6 right-6 z-[100] w-20 h-20 rounded-full bg-[#25D366] flex items-center justify-center shadow-xl hover:scale-105 transition-transform"><svg viewBox="0 0 32 32" class="w-12 h-12 text-white" fill="none"><path fill="currentColor" d="M16 3a13 13 0 0 0-13 13c0 2.3.6 4.5 1.7 6.5L3 29l6.8-1.8A13 13 0 0 0 16 29a13 13 0 0 0 13-13A13 13 0 0 0 16 3z"></path><path fill="white" d="M24 18.5c-.3-.2-1.8-.9-2.1-.9-.3 0-.5-.2-.7-.2-.2 0-.5.1-.8.2-1.1.5-2.1.9-3.3.9-2.1 0-3.8-1.7-3.8-3.8 0-1 .3-1.9.9-2.7.1-.1.1-.3 0-.4 0-.1-.2-.3-.5-.5-.3-.2-.6-.5-.6-.5-.2-.2-.5-.5-.2-.9.4-.4 1.1-.5 1.9-.5.9 0 1.8.1 2.7.3.9.2 1.7.5 2.4 1 .6.4 1.2 1 1.5 1.7.4.7.5 1.5.5 2.4 0 1.1-.4 2.1-1 2.9z"></path></svg></a></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("layouts/hero.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};

export { _sfc_main as default };
//# sourceMappingURL=hero-BIs1Wn2c.mjs.map
