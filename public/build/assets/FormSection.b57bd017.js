import { Q as computed, ay as openBlock, W as createElementBlock, a2 as createVNode, b1 as withCtx, aF as renderSlot, X as createBaseVNode, bp as withModifiers, A as normalizeClass, x as unref, V as createCommentVNode, aU as useSlots } from "./runtime-dom.esm-bundler.3714f197.js";
import { J as JetSectionTitle } from "./SectionTitle.62d42adc.js";
const _hoisted_1 = { class: "md:grid md:grid-cols-3 md:gap-6" };
const _hoisted_2 = { class: "mt-5 md:mt-0 md:col-span-2" };
const _hoisted_3 = { class: "grid grid-cols-6 gap-6" };
const _hoisted_4 = {
  key: 0,
  class: "flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"
};
const _sfc_main = {
  __name: "FormSection",
  emits: ["submitted"],
  setup(__props) {
    const hasActions = computed(() => !!useSlots().actions);
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", _hoisted_1, [
        createVNode(JetSectionTitle, null, {
          title: withCtx(() => [
            renderSlot(_ctx.$slots, "title")
          ]),
          description: withCtx(() => [
            renderSlot(_ctx.$slots, "description")
          ]),
          _: 3
        }),
        createBaseVNode("div", _hoisted_2, [
          createBaseVNode("form", {
            onSubmit: _cache[0] || (_cache[0] = withModifiers(($event) => _ctx.$emit("submitted"), ["prevent"]))
          }, [
            createBaseVNode("div", {
              class: normalizeClass(["px-4 py-5 bg-white sm:p-6 shadow", unref(hasActions) ? "sm:rounded-tl-md sm:rounded-tr-md" : "sm:rounded-md"])
            }, [
              createBaseVNode("div", _hoisted_3, [
                renderSlot(_ctx.$slots, "form")
              ])
            ], 2),
            unref(hasActions) ? (openBlock(), createElementBlock("div", _hoisted_4, [
              renderSlot(_ctx.$slots, "actions")
            ])) : createCommentVNode("", true)
          ], 32)
        ])
      ]);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=FormSection.b57bd017.js.map
