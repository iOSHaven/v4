import { a as usePage } from "./app.73e7ef0c.js";
import { Q as computed, x as unref, ay as openBlock, W as createElementBlock, X as createBaseVNode, I as Fragment, aE as renderList, D as toDisplayString, V as createCommentVNode } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = { key: 0 };
const _hoisted_2 = /* @__PURE__ */ createBaseVNode("div", { class: "font-medium text-red-600" }, " Whoops! Something went wrong. ", -1);
const _hoisted_3 = { class: "mt-3 list-disc list-inside text-sm text-red-600" };
const _sfc_main = {
  __name: "ValidationErrors",
  setup(__props) {
    const errors = computed(() => usePage().props.value.errors);
    const hasErrors = computed(() => Object.keys(errors.value).length > 0);
    return (_ctx, _cache) => {
      return unref(hasErrors) ? (openBlock(), createElementBlock("div", _hoisted_1, [
        _hoisted_2,
        createBaseVNode("ul", _hoisted_3, [
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(errors), (error, key) => {
            return openBlock(), createElementBlock("li", { key }, toDisplayString(error), 1);
          }), 128))
        ])
      ])) : createCommentVNode("", true);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=ValidationErrors.d163a669.js.map
