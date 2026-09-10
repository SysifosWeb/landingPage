import { resolveDirective, mergeProps, useSSRContext } from 'vue';
import { ssrRenderAttrs, ssrGetDirectiveProps, ssrRenderList, ssrInterpolate, ssrRenderStyle } from 'vue/server-renderer';
import { _ as _export_sfc } from './server.mjs';
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
  __name: "HomeTestimonials",
  __ssrInlineRender: true,
  setup(__props) {
    const testimonials = [
      {
        name: "Mar\xEDa Rodr\xEDguez",
        initials: "MR",
        company: "Gerente General \xB7 Tech Solutions Corp",
        text: "Antes ten\xEDa una web que no me tra\xEDa nada. Desde que trabajamos con SysifosWeb, nuestras consultas online se triplicaron. El equipo entendi\xF3 exactamente lo que necesitaba y lo ejecutaron con precisi\xF3n.",
        metric: "3\xD7",
        metricLabel: "consultas online en 3 meses",
        avatarBg: "linear-gradient(135deg, #38BDF8, #6366F1)"
      },
      {
        name: "Carlos L\xF3pez",
        initials: "CL",
        company: "Founder \xB7 Innovatech",
        text: "Lanzamos nuestra tienda online en tiempo r\xE9cord. Nuestras ventas crecieron un 40% en el primer trimestre.",
        metric: "+40%",
        metricLabel: "en ventas el primer trimestre",
        avatarBg: "linear-gradient(135deg, #6366F1, #8B5CF6)"
      },
      {
        name: "Ana Silva",
        initials: "AS",
        company: "Directora de Operaciones \xB7 Global Systems",
        text: "El sistema que desarrollaron nos ahorr\xF3 horas de trabajo manual cada semana. Ahora el equipo se enfoca en lo que realmente importa.",
        metric: "12h",
        metricLabel: "ahorradas por semana",
        avatarBg: "linear-gradient(135deg, #34D399, #38BDF8)"
      }
    ];
    return (_ctx, _push, _parent, _attrs) => {
      const _directive_reveal = resolveDirective("reveal");
      _push(`<section${ssrRenderAttrs(mergeProps({ class: "testimonials-section relative overflow-hidden bg-section-dark" }, _attrs))} data-v-a1d27242><div class="ambient-orb" data-v-a1d27242></div><div class="section-container" data-v-a1d27242><div class="section-header" data-v-a1d27242><div data-v-a1d27242><p${ssrRenderAttrs(mergeProps({
        class: "overline-label",
        "data-delay": "0"
      }, ssrGetDirectiveProps(_ctx, _directive_reveal)))} data-v-a1d27242>Clientes</p><h2${ssrRenderAttrs(mergeProps({
        class: "section-headline",
        "data-delay": "100"
      }, ssrGetDirectiveProps(_ctx, _directive_reveal)))} data-v-a1d27242> Empresas que crecieron<br data-v-a1d27242><em data-v-a1d27242>con nuestra tecnolog\xEDa.</em></h2></div><div${ssrRenderAttrs(mergeProps({
        class: "proof-strip",
        "data-delay": "200"
      }, ssrGetDirectiveProps(_ctx, _directive_reveal)))} data-v-a1d27242><div class="proof-stars" data-v-a1d27242><!--[-->`);
      ssrRenderList(5, (s) => {
        _push(`<svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="#F59E0B" aria-hidden="true" data-v-a1d27242><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" data-v-a1d27242></path></svg>`);
      });
      _push(`<!--]--></div><p class="proof-label" data-v-a1d27242>5.0 \xB7 98% clientes satisfechos</p></div></div><div class="bento-grid" data-v-a1d27242><article${ssrRenderAttrs(mergeProps({
        class: "bento-card bento-card--featured group",
        "data-delay": "0"
      }, ssrGetDirectiveProps(_ctx, _directive_reveal)))} data-v-a1d27242><div class="card-accent-line card-accent-line--cyan" aria-hidden="true" data-v-a1d27242></div><span class="quote-mark" aria-hidden="true" data-v-a1d27242>\u201C</span><blockquote class="quote-text quote-text--lg" data-v-a1d27242><p data-v-a1d27242>${ssrInterpolate(testimonials[0].text)}</p></blockquote><div class="metric-block metric-block--featured" data-v-a1d27242><span class="metric-number metric-number--cyan" data-v-a1d27242>${ssrInterpolate(testimonials[0].metric)}</span><span class="metric-label" data-v-a1d27242>${ssrInterpolate(testimonials[0].metricLabel)}</span></div><footer class="author-row" data-v-a1d27242><div class="author-avatar" style="${ssrRenderStyle({ background: testimonials[0].avatarBg })}" aria-hidden="true" data-v-a1d27242>${ssrInterpolate(testimonials[0].initials)}</div><cite data-v-a1d27242><p class="author-name" data-v-a1d27242>${ssrInterpolate(testimonials[0].name)}</p><p class="author-company" data-v-a1d27242>${ssrInterpolate(testimonials[0].company)}</p></cite></footer></article><div class="bento-col-right" data-v-a1d27242><article${ssrRenderAttrs(mergeProps({
        class: "bento-card group",
        "data-delay": "150"
      }, ssrGetDirectiveProps(_ctx, _directive_reveal)))} data-v-a1d27242><div class="card-accent-line card-accent-line--purple" aria-hidden="true" data-v-a1d27242></div><span class="quote-mark quote-mark--sm" aria-hidden="true" data-v-a1d27242>\u201C</span><blockquote class="quote-text" data-v-a1d27242><p data-v-a1d27242>${ssrInterpolate(testimonials[1].text)}</p></blockquote><div class="metric-block" data-v-a1d27242><span class="metric-number metric-number--purple" data-v-a1d27242>${ssrInterpolate(testimonials[1].metric)}</span><span class="metric-label" data-v-a1d27242>${ssrInterpolate(testimonials[1].metricLabel)}</span></div><footer class="author-row" data-v-a1d27242><div class="author-avatar" style="${ssrRenderStyle({ background: testimonials[1].avatarBg })}" aria-hidden="true" data-v-a1d27242>${ssrInterpolate(testimonials[1].initials)}</div><cite data-v-a1d27242><p class="author-name" data-v-a1d27242>${ssrInterpolate(testimonials[1].name)}</p><p class="author-company" data-v-a1d27242>${ssrInterpolate(testimonials[1].company)}</p></cite></footer></article><article${ssrRenderAttrs(mergeProps({
        class: "bento-card group",
        "data-delay": "300"
      }, ssrGetDirectiveProps(_ctx, _directive_reveal)))} data-v-a1d27242><div class="card-accent-line card-accent-line--cyan" aria-hidden="true" data-v-a1d27242></div><span class="quote-mark quote-mark--sm" aria-hidden="true" data-v-a1d27242>\u201C</span><blockquote class="quote-text" data-v-a1d27242><p data-v-a1d27242>${ssrInterpolate(testimonials[2].text)}</p></blockquote><div class="metric-block" data-v-a1d27242><span class="metric-number metric-number--cyan" data-v-a1d27242>${ssrInterpolate(testimonials[2].metric)}</span><span class="metric-label" data-v-a1d27242>${ssrInterpolate(testimonials[2].metricLabel)}</span></div><footer class="author-row" data-v-a1d27242><div class="author-avatar" style="${ssrRenderStyle({ background: testimonials[2].avatarBg })}" aria-hidden="true" data-v-a1d27242>${ssrInterpolate(testimonials[2].initials)}</div><cite data-v-a1d27242><p class="author-name" data-v-a1d27242>${ssrInterpolate(testimonials[2].name)}</p><p class="author-company" data-v-a1d27242>${ssrInterpolate(testimonials[2].company)}</p></cite></footer></article></div></div></div></section>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("components/home/HomeTestimonials.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const HomeTestimonials = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-a1d27242"]]);

export { HomeTestimonials as default };
//# sourceMappingURL=HomeTestimonials-B-WYAK8c.mjs.map
