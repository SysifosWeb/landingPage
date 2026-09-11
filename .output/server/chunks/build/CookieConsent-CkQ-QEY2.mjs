import { _ as _export_sfc, a as __nuxt_component_0$1 } from './server.mjs';
import { unref, mergeProps, withCtx, createTextVNode, ref, useSSRContext } from 'vue';
import { ssrRenderAttrs, ssrRenderComponent } from 'vue/server-renderer';

const CONSENT_KEY = "sysifos_cookie_consent";
const consent = ref(null);
const bannerVisible = ref(false);
function useCookieConsent() {
  function accept() {
    consent.value = "accepted";
    localStorage.setItem(CONSENT_KEY, "accepted");
    bannerVisible.value = false;
  }
  function reject() {
    consent.value = "rejected";
    localStorage.setItem(CONSENT_KEY, "rejected");
    bannerVisible.value = false;
  }
  return {
    consent,
    bannerVisible,
    accept,
    reject
  };
}
const _sfc_main = {
  __name: "CookieConsent",
  __ssrInlineRender: true,
  setup(__props) {
    const { bannerVisible: bannerVisible2 } = useCookieConsent();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_NuxtLink = __nuxt_component_0$1;
      if (unref(bannerVisible2)) {
        _push(`<div${ssrRenderAttrs(mergeProps({
          class: "fixed bottom-4 left-4 right-4 sm:left-auto sm:right-6 sm:max-w-md z-[9999] rounded-2xl border border-white/10 bg-[#0b1222]/95 backdrop-blur-xl shadow-[0_8px_32px_rgba(0,0,0,0.5)] p-6",
          role: "dialog",
          "aria-labelledby": "cookie-title",
          "aria-describedby": "cookie-desc"
        }, _attrs))} data-v-01f971c1><div class="flex flex-col gap-4" data-v-01f971c1><div data-v-01f971c1><h2 id="cookie-title" class="text-sm font-bold text-white mb-2" data-v-01f971c1> Cookies y protecci\xF3n de datos </h2><p id="cookie-desc" class="text-xs text-white/60 leading-relaxed" data-v-01f971c1> Usamos cookies necesarias para el funcionamiento del sitio y, con tu consentimiento, cookies de anal\xEDtica para mejorar tu experiencia. Puedes gestionar tus preferencias o consultar nuestra `);
        _push(ssrRenderComponent(_component_NuxtLink, {
          to: "/privacidad",
          class: "text-sky-400 underline hover:text-sky-300"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(` Pol\xEDtica de Privacidad `);
            } else {
              return [
                createTextVNode(" Pol\xEDtica de Privacidad ")
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`. </p></div><div class="flex items-center gap-3" data-v-01f971c1><button class="flex-1 py-2.5 rounded-lg bg-white text-black font-semibold text-xs hover:bg-gray-200 transition-colors" data-v-01f971c1> Aceptar </button><button class="flex-1 py-2.5 rounded-lg border border-white/15 text-white/80 font-semibold text-xs hover:bg-white/5 transition-colors" data-v-01f971c1> Rechazar </button></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("components/CookieConsent.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const __nuxt_component_2 = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-01f971c1"]]);

export { __nuxt_component_2 as _ };
//# sourceMappingURL=CookieConsent-CkQ-QEY2.mjs.map
