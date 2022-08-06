import { ay as openBlock, W as createElementBlock, aF as renderSlot } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = ["type"];
const _sfc_main = {
  __name: "SecondaryButton",
  props: {
    type: {
      type: String,
      default: "button"
    }
  },
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("button", {
        type: __props.type,
        class: "inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
      }, [
        renderSlot(_ctx.$slots, "default")
      ], 8, _hoisted_1);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=SecondaryButton.2caec6f6.js.map
