import { _ as _export_sfc } from "./_plugin-vue_export-helper.cdc0426e.js";
import { ay as openBlock, W as createElementBlock, X as createBaseVNode, aF as renderSlot } from "./runtime-dom.esm-bundler.3714f197.js";
const _sfc_main = {};
const _hoisted_1 = { class: "md:col-span-1 flex justify-between" };
const _hoisted_2 = { class: "px-4 sm:px-0" };
const _hoisted_3 = { class: "text-lg font-medium text-gray-900" };
const _hoisted_4 = { class: "mt-1 text-sm text-gray-600" };
const _hoisted_5 = { class: "px-4 sm:px-0" };
function _sfc_render(_ctx, _cache) {
  return openBlock(), createElementBlock("div", _hoisted_1, [
    createBaseVNode("div", _hoisted_2, [
      createBaseVNode("h3", _hoisted_3, [
        renderSlot(_ctx.$slots, "title")
      ]),
      createBaseVNode("p", _hoisted_4, [
        renderSlot(_ctx.$slots, "description")
      ])
    ]),
    createBaseVNode("div", _hoisted_5, [
      renderSlot(_ctx.$slots, "aside")
    ])
  ]);
}
const JetSectionTitle = /* @__PURE__ */ _export_sfc(_sfc_main, [["render", _sfc_render]]);
export {
  JetSectionTitle as J
};
//# sourceMappingURL=SectionTitle.62d42adc.js.map
