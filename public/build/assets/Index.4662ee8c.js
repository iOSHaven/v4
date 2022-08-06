import _sfc_main$2 from "./ApiTokenManager.669af433.js";
import { _ as _sfc_main$1 } from "./AppLayout.210417b5.js";
import { ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, a2 as createVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import "./app.73e7ef0c.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./ActionMessage.a358f0ed.js";
import "./Modal.0bd03d02.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
import "./Button.05052283.js";
import "./ConfirmationModal.115037dc.js";
import "./DangerButton.305a98be.js";
import "./DialogModal.13f682f7.js";
import "./FormSection.b57bd017.js";
import "./Input.4d723479.js";
import "./Checkbox.e7d12896.js";
import "./InputError.c01bb545.js";
import "./Label.6120fd41.js";
import "./SecondaryButton.2caec6f6.js";
import "./SectionBorder.88326c21.js";
const _hoisted_1 = /* @__PURE__ */ createBaseVNode("h2", { class: "font-semibold text-xl text-gray-800 leading-tight" }, " API Tokens ", -1);
const _hoisted_2 = { class: "max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" };
const _sfc_main = {
  __name: "Index",
  props: {
    tokens: Array,
    availablePermissions: Array,
    defaultPermissions: Array
  },
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, { title: "API Tokens" }, {
        header: withCtx(() => [
          _hoisted_1
        ]),
        default: withCtx(() => [
          createBaseVNode("div", null, [
            createBaseVNode("div", _hoisted_2, [
              createVNode(_sfc_main$2, {
                tokens: __props.tokens,
                "available-permissions": __props.availablePermissions,
                "default-permissions": __props.defaultPermissions
              }, null, 8, ["tokens", "available-permissions", "default-permissions"])
            ])
          ])
        ]),
        _: 1
      });
    };
  }
};
export {
  _sfc_main as default
};
//# sourceMappingURL=Index.4662ee8c.js.map
