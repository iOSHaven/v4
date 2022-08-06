import { a as _sfc_main$1 } from "./Modal.0bd03d02.js";
import { ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, aF as renderSlot } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = { class: "bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" };
const _hoisted_2 = { class: "sm:flex sm:items-start" };
const _hoisted_3 = /* @__PURE__ */ createBaseVNode("div", { class: "mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10" }, [
  /* @__PURE__ */ createBaseVNode("svg", {
    class: "h-6 w-6 text-red-600",
    stroke: "currentColor",
    fill: "none",
    viewBox: "0 0 24 24"
  }, [
    /* @__PURE__ */ createBaseVNode("path", {
      "stroke-linecap": "round",
      "stroke-linejoin": "round",
      "stroke-width": "2",
      d: "M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
    })
  ])
], -1);
const _hoisted_4 = { class: "mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" };
const _hoisted_5 = { class: "text-lg" };
const _hoisted_6 = { class: "mt-2" };
const _hoisted_7 = { class: "flex flex-row justify-end px-6 py-4 bg-gray-100 text-right" };
const _sfc_main = {
  __name: "ConfirmationModal",
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
              _hoisted_3,
              createBaseVNode("div", _hoisted_4, [
                createBaseVNode("h3", _hoisted_5, [
                  renderSlot(_ctx.$slots, "title")
                ]),
                createBaseVNode("div", _hoisted_6, [
                  renderSlot(_ctx.$slots, "content")
                ])
              ])
            ])
          ]),
          createBaseVNode("div", _hoisted_7, [
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
//# sourceMappingURL=ConfirmationModal.115037dc.js.map
