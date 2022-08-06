import { ay as openBlock, W as createElementBlock, aF as renderSlot } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = ["type"];
const _sfc_main = {
  __name: "Button",
  props: {
    type: {
      type: String,
      default: "submit"
    }
  },
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("button", {
        type: __props.type,
        class: "inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
      }, [
        renderSlot(_ctx.$slots, "default")
      ], 8, _hoisted_1);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=Button.05052283.js.map
