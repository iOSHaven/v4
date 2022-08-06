import { ay as openBlock, W as createElementBlock, aF as renderSlot } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = ["type"];
const _sfc_main = {
  __name: "DangerButton",
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
        class: "inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
      }, [
        renderSlot(_ctx.$slots, "default")
      ], 8, _hoisted_1);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=DangerButton.305a98be.js.map
