import { a as _sfc_main$1 } from "./Modal.0bd03d02.js";
import { ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, aF as renderSlot } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = { class: "px-6 py-4" };
const _hoisted_2 = { class: "text-lg" };
const _hoisted_3 = { class: "mt-4" };
const _hoisted_4 = { class: "flex flex-row justify-end px-6 py-4 bg-gray-100 text-right" };
const _sfc_main = {
  __name: "DialogModal",
  props: {
    show: {
      type: Boolean,
      default: false
    },
    maxWidth: {
      type: String,
      default: "2xl"
    },
    closeable: {
      type: Boolean,
      default: true
    }
  },
  emits: ["close"],
  setup(__props, { emit }) {
    const close = () => {
      emit("close");
    };
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, {
        show: __props.show,
        "max-width": __props.maxWidth,
        closeable: __props.closeable,
        onClose: close
      }, {
        default: withCtx(() => [
          createBaseVNode("div", _hoisted_1, [
            createBaseVNode("div", _hoisted_2, [
              renderSlot(_ctx.$slots, "title")
            ]),
            createBaseVNode("div", _hoisted_3, [
              renderSlot(_ctx.$slots, "content")
            ])
          ]),
          createBaseVNode("div", _hoisted_4, [
            renderSlot(_ctx.$slots, "footer")
          ])
        ]),
        _: 3
      }, 8, ["show", "max-width", "closeable"]);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=DialogModal.13f682f7.js.map
