import { H as Head } from "./app.73e7ef0c.js";
import { _ as _sfc_main$1 } from "./AuthenticationCardLogo.75f38a35.js";
import { ay as openBlock, W as createElementBlock, a2 as createVNode, x as unref, X as createBaseVNode, I as Fragment } from "./runtime-dom.esm-bundler.3714f197.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
const _hoisted_1 = { class: "font-sans text-gray-900 antialiased" };
const _hoisted_2 = { class: "pt-4 bg-gray-100" };
const _hoisted_3 = { class: "min-h-screen flex flex-col items-center pt-6 sm:pt-0" };
const _hoisted_4 = ["innerHTML"];
const _sfc_main = {
  __name: "TermsOfService",
  props: {
    terms: String
  },
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(unref(Head), { title: "Terms of Service" }),
        createBaseVNode("div", _hoisted_1, [
          createBaseVNode("div", _hoisted_2, [
            createBaseVNode("div", _hoisted_3, [
              createBaseVNode("div", null, [
                createVNode(_sfc_main$1)
              ]),
              createBaseVNode("div", {
                class: "w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose",
                innerHTML: __props.terms
              }, null, 8, _hoisted_4)
            ])
          ])
        ])
      ], 64);
    };
  }
};
export {
  _sfc_main as default
};
//# sourceMappingURL=TermsOfService.0e248da0.js.map
