import { _ as _sfc_main$1 } from "./AppLayout.210417b5.js";
import _sfc_main$6 from "./DeleteUserForm.7ae9272d.js";
import { J as JetSectionBorder } from "./SectionBorder.88326c21.js";
import _sfc_main$5 from "./LogoutOtherBrowserSessionsForm.4b036d12.js";
import _sfc_main$4 from "./TwoFactorAuthenticationForm.53df2214.js";
import _sfc_main$3 from "./UpdatePasswordForm.5db88e49.js";
import _sfc_main$2 from "./UpdateProfileInformationForm.c8717a0c.js";
import { ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, W as createElementBlock, a2 as createVNode, V as createCommentVNode, I as Fragment } from "./runtime-dom.esm-bundler.3714f197.js";
import "./app.73e7ef0c.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./Modal.0bd03d02.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
import "./DialogModal.13f682f7.js";
import "./DangerButton.305a98be.js";
import "./Input.4d723479.js";
import "./InputError.c01bb545.js";
import "./SecondaryButton.2caec6f6.js";
import "./ActionMessage.a358f0ed.js";
import "./Button.05052283.js";
import "./Label.6120fd41.js";
import "./FormSection.b57bd017.js";
const _hoisted_1 = /* @__PURE__ */ createBaseVNode("h2", { class: "font-semibold text-xl text-gray-800 leading-tight" }, " Profile ", -1);
const _hoisted_2 = { class: "max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" };
const _hoisted_3 = { key: 0 };
const _hoisted_4 = { key: 1 };
const _hoisted_5 = { key: 2 };
const _sfc_main = {
  __name: "Show",
  props: {
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array
  },
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, { title: "Profile" }, {
        header: withCtx(() => [
          _hoisted_1
        ]),
        default: withCtx(() => [
          createBaseVNode("div", null, [
            createBaseVNode("div", _hoisted_2, [
              _ctx.$page.props.jetstream.canUpdateProfileInformation ? (openBlock(), createElementBlock("div", _hoisted_3, [
                createVNode(_sfc_main$2, {
                  user: _ctx.$page.props.user
                }, null, 8, ["user"]),
                createVNode(JetSectionBorder)
              ])) : createCommentVNode("", true),
              _ctx.$page.props.jetstream.canUpdatePassword ? (openBlock(), createElementBlock("div", _hoisted_4, [
                createVNode(_sfc_main$3, { class: "mt-10 sm:mt-0" }),
                createVNode(JetSectionBorder)
              ])) : createCommentVNode("", true),
              _ctx.$page.props.jetstream.canManageTwoFactorAuthentication ? (openBlock(), createElementBlock("div", _hoisted_5, [
                createVNode(_sfc_main$4, {
                  "requires-confirmation": __props.confirmsTwoFactorAuthentication,
                  class: "mt-10 sm:mt-0"
                }, null, 8, ["requires-confirmation"]),
                createVNode(JetSectionBorder)
              ])) : createCommentVNode("", true),
              createVNode(_sfc_main$5, {
                sessions: __props.sessions,
                class: "mt-10 sm:mt-0"
              }, null, 8, ["sessions"]),
              _ctx.$page.props.jetstream.hasAccountDeletionFeatures ? (openBlock(), createElementBlock(Fragment, { key: 3 }, [
                createVNode(JetSectionBorder),
                createVNode(_sfc_main$6, { class: "mt-10 sm:mt-0" })
              ], 64)) : createCommentVNode("", true)
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
//# sourceMappingURL=Show.1cce55c3.js.map
