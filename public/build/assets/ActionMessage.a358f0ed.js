import { ay as openBlock, W as createElementBlock, a2 as createVNode, b1 as withCtx, b3 as withDirectives, bn as vShow, X as createBaseVNode, aF as renderSlot, b6 as Transition } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = { class: "text-sm text-gray-600" };
const _sfc_main = {
  __name: "ActionMessage",
  props: {
    on: Boolean
  },
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", null, [
        createVNode(Transition, {
          "leave-active-class": "transition ease-in duration-1000",
          "leave-from-class": "opacity-100",
          "leave-to-class": "opacity-0"
        }, {
          default: withCtx(() => [
            withDirectives(createBaseVNode("div", _hoisted_1, [
              renderSlot(_ctx.$slots, "default")
            ], 512), [
              [vShow, __props.on]
            ])
          ]),
          _: 3
        })
      ]);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=ActionMessage.a358f0ed.js.map
