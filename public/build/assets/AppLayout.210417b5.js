import { a as usePage, H as Head } from "./app.73e7ef0c.js";
import { k as ref, Q as computed, aY as watch, ay as openBlock, W as createElementBlock, x as unref, A as normalizeClass, X as createBaseVNode, V as createCommentVNode, D as toDisplayString, bp as withModifiers, a2 as createVNode, aF as renderSlot } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1$1 = { class: "max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8" };
const _hoisted_2$1 = { class: "flex items-center justify-between flex-wrap" };
const _hoisted_3$1 = { class: "w-0 flex-1 flex items-center min-w-0" };
const _hoisted_4 = {
  key: 0,
  class: "h-5 w-5 text-white",
  xmlns: "http://www.w3.org/2000/svg",
  fill: "none",
  viewBox: "0 0 24 24",
  stroke: "currentColor"
};
const _hoisted_5 = /* @__PURE__ */ createBaseVNode("path", {
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  "stroke-width": "2",
  d: "M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
}, null, -1);
const _hoisted_6 = [
  _hoisted_5
];
const _hoisted_7 = {
  key: 1,
  class: "h-5 w-5 text-white",
  xmlns: "http://www.w3.org/2000/svg",
  fill: "none",
  viewBox: "0 0 24 24",
  stroke: "currentColor"
};
const _hoisted_8 = /* @__PURE__ */ createBaseVNode("path", {
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  "stroke-width": "2",
  d: "M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
}, null, -1);
const _hoisted_9 = [
  _hoisted_8
];
const _hoisted_10 = { class: "ml-3 font-medium text-sm text-white truncate" };
const _hoisted_11 = { class: "shrink-0 sm:ml-3" };
const _hoisted_12 = /* @__PURE__ */ createBaseVNode("svg", {
  class: "h-5 w-5 text-white",
  xmlns: "http://www.w3.org/2000/svg",
  fill: "none",
  viewBox: "0 0 24 24",
  stroke: "currentColor"
}, [
  /* @__PURE__ */ createBaseVNode("path", {
    "stroke-linecap": "round",
    "stroke-linejoin": "round",
    "stroke-width": "2",
    d: "M6 18L18 6M6 6l12 12"
  })
], -1);
const _hoisted_13 = [
  _hoisted_12
];
const _sfc_main$1 = {
  __name: "Banner",
  setup(__props) {
    const show = ref(true);
    const style = computed(() => {
      var _a;
      return ((_a = usePage().props.value.jetstream.flash) == null ? void 0 : _a.bannerStyle) || "success";
    });
    const message = computed(() => {
      var _a;
      return ((_a = usePage().props.value.jetstream.flash) == null ? void 0 : _a.banner) || "";
    });
    watch(message, async () => {
      show.value = true;
    });
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", null, [
        show.value && unref(message) ? (openBlock(), createElementBlock("div", {
          key: 0,
          class: normalizeClass({ "bg-indigo-500": unref(style) == "success", "bg-red-700": unref(style) == "danger" })
        }, [
          createBaseVNode("div", _hoisted_1$1, [
            createBaseVNode("div", _hoisted_2$1, [
              createBaseVNode("div", _hoisted_3$1, [
                createBaseVNode("span", {
                  class: normalizeClass(["flex p-2 rounded-lg", { "bg-indigo-600": unref(style) == "success", "bg-red-600": unref(style) == "danger" }])
                }, [
                  unref(style) == "success" ? (openBlock(), createElementBlock("svg", _hoisted_4, _hoisted_6)) : createCommentVNode("", true),
                  unref(style) == "danger" ? (openBlock(), createElementBlock("svg", _hoisted_7, _hoisted_9)) : createCommentVNode("", true)
                ], 2),
                createBaseVNode("p", _hoisted_10, toDisplayString(unref(message)), 1)
              ]),
              createBaseVNode("div", _hoisted_11, [
                createBaseVNode("button", {
                  type: "button",
                  class: normalizeClass(["-mr-1 flex p-2 rounded-md focus:outline-none sm:-mr-2 transition", { "hover:bg-indigo-600 focus:bg-indigo-600": unref(style) == "success", "hover:bg-red-600 focus:bg-red-600": unref(style) == "danger" }]),
                  "aria-label": "Dismiss",
                  onClick: _cache[0] || (_cache[0] = withModifiers(($event) => show.value = false, ["prevent"]))
                }, _hoisted_13, 2)
              ])
            ])
          ])
        ], 2)) : createCommentVNode("", true)
      ]);
    };
  }
};
const _hoisted_1 = { class: "min-h-screen bg-gray-100" };
const _hoisted_2 = {
  key: 0,
  class: "bg-white shadow"
};
const _hoisted_3 = { class: "max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" };
const _sfc_main = {
  __name: "AppLayout",
  props: {
    title: String
  },
  setup(__props) {
    ref(false);
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", null, [
        createVNode(unref(Head), { title: __props.title }, null, 8, ["title"]),
        createVNode(_sfc_main$1),
        createBaseVNode("div", _hoisted_1, [
          _ctx.$slots.header ? (openBlock(), createElementBlock("header", _hoisted_2, [
            createBaseVNode("div", _hoisted_3, [
              renderSlot(_ctx.$slots, "header")
            ])
          ])) : createCommentVNode("", true),
          createBaseVNode("main", null, [
            renderSlot(_ctx.$slots, "default")
          ])
        ])
      ]);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=AppLayout.210417b5.js.map
