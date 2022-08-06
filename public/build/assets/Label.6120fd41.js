import { ay as openBlock, W as createElementBlock, D as toDisplayString, aF as renderSlot } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = { class: "block font-medium text-sm text-gray-700" };
const _hoisted_2 = { key: 0 };
const _hoisted_3 = { key: 1 };
const _sfc_main = {
  __name: "Label",
  props: {
    value: String
  },
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("label", _hoisted_1, [
        __props.value ? (openBlock(), createElementBlock("span", _hoisted_2, toDisplayString(__props.value), 1)) : (openBlock(), createElementBlock("span", _hoisted_3, [
          renderSlot(_ctx.$slots, "default")
        ]))
      ]);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=Label.6120fd41.js.map
