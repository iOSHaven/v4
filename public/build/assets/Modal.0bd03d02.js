import { J as JetSectionTitle } from "./SectionTitle.62d42adc.js";
import { ay as openBlock, W as createElementBlock, a2 as createVNode, b1 as withCtx, aF as renderSlot, X as createBaseVNode, aY as watch, as as onMounted, aw as onUnmounted, Q as computed, U as createBlock, b3 as withDirectives, bn as vShow, b6 as Transition, A as normalizeClass, x as unref, V as createCommentVNode, T as Teleport } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1$1 = { class: "md:grid md:grid-cols-3 md:gap-6" };
const _hoisted_2$1 = { class: "mt-5 md:mt-0 md:col-span-2" };
const _hoisted_3$1 = { class: "px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg" };
const _sfc_main$1 = {
  __name: "ActionSection",
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", _hoisted_1$1, [
        createVNode(JetSectionTitle, null, {
          title: withCtx(() => [
            renderSlot(_ctx.$slots, "title")
          ]),
          description: withCtx(() => [
            renderSlot(_ctx.$slots, "description")
          ]),
          _: 3
        }),
        createBaseVNode("div", _hoisted_2$1, [
          createBaseVNode("div", _hoisted_3$1, [
            renderSlot(_ctx.$slots, "content")
          ])
        ])
      ]);
    };
  }
};
const _hoisted_1 = {
  class: "fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50",
  "scroll-region": ""
};
const _hoisted_2 = /* @__PURE__ */ createBaseVNode("div", { class: "absolute inset-0 bg-gray-500 opacity-75" }, null, -1);
const _hoisted_3 = [
  _hoisted_2
];
const _sfc_main = {
  __name: "Modal",
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
    const props = __props;
    watch(() => props.show, () => {
      if (props.show) {
        document.body.style.overflow = "hidden";
      } else {
        document.body.style.overflow = null;
      }
    });
    const close = () => {
      if (props.closeable) {
        emit("close");
      }
    };
    const closeOnEscape = (e) => {
      if (e.key === "Escape" && props.show) {
        close();
      }
    };
    onMounted(() => document.addEventListener("keydown", closeOnEscape));
    onUnmounted(() => {
      document.removeEventListener("keydown", closeOnEscape);
      document.body.style.overflow = null;
    });
    const maxWidthClass = computed(() => {
      return {
        "sm": "sm:max-w-sm",
        "md": "sm:max-w-md",
        "lg": "sm:max-w-lg",
        "xl": "sm:max-w-xl",
        "2xl": "sm:max-w-2xl"
      }[props.maxWidth];
    });
    return (_ctx, _cache) => {
      return openBlock(), createBlock(Teleport, { to: "body" }, [
        createVNode(Transition, { "leave-active-class": "duration-200" }, {
          default: withCtx(() => [
            withDirectives(createBaseVNode("div", _hoisted_1, [
              createVNode(Transition, {
                "enter-active-class": "ease-out duration-300",
                "enter-from-class": "opacity-0",
                "enter-to-class": "opacity-100",
                "leave-active-class": "ease-in duration-200",
                "leave-from-class": "opacity-100",
                "leave-to-class": "opacity-0"
              }, {
                default: withCtx(() => [
                  withDirectives(createBaseVNode("div", {
                    class: "fixed inset-0 transform transition-all",
                    onClick: close
                  }, _hoisted_3, 512), [
                    [vShow, __props.show]
                  ])
                ]),
                _: 1
              }),
              createVNode(Transition, {
                "enter-active-class": "ease-out duration-300",
                "enter-from-class": "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95",
                "enter-to-class": "opacity-100 translate-y-0 sm:scale-100",
                "leave-active-class": "ease-in duration-200",
                "leave-from-class": "opacity-100 translate-y-0 sm:scale-100",
                "leave-to-class": "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              }, {
                default: withCtx(() => [
                  withDirectives(createBaseVNode("div", {
                    class: normalizeClass(["mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto", unref(maxWidthClass)])
                  }, [
                    __props.show ? renderSlot(_ctx.$slots, "default", { key: 0 }) : createCommentVNode("", true)
                  ], 2), [
                    [vShow, __props.show]
                  ])
                ]),
                _: 3
              })
            ], 512), [
              [vShow, __props.show]
            ])
          ]),
          _: 3
        })
      ]);
    };
  }
};
export {
  _sfc_main$1 as _,
  _sfc_main as a
};
//# sourceMappingURL=Modal.0bd03d02.js.map
