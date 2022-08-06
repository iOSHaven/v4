import { Q as computed, ay as openBlock, W as createElementBlock, a2 as createVNode, x as unref, b1 as withCtx, I as Fragment, V as createCommentVNode, X as createBaseVNode, A as normalizeClass, bp as withModifiers, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm, H as Head, L as Link } from "./app.73e7ef0c.js";
import { J as JetAuthenticationCard } from "./AuthenticationCard.377687db.js";
import { _ as _sfc_main$1 } from "./AuthenticationCardLogo.75f38a35.js";
import { _ as _sfc_main$2 } from "./Button.05052283.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createBaseVNode("div", { class: "mb-4 text-sm text-gray-600" }, " Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ", -1);
const _hoisted_2 = {
  key: 0,
  class: "mb-4 font-medium text-sm text-green-600"
};
const _hoisted_3 = ["onSubmit"];
const _hoisted_4 = { class: "mt-4 flex items-center justify-between" };
const _hoisted_5 = /* @__PURE__ */ createTextVNode(" Resend Verification Email ");
const _hoisted_6 = /* @__PURE__ */ createTextVNode(" Edit Profile");
const _hoisted_7 = /* @__PURE__ */ createTextVNode(" Log Out ");
const _sfc_main = {
  __name: "VerifyEmail",
  props: {
    status: String
  },
  setup(__props) {
    const props = __props;
    const form = useForm();
    const submit = () => {
      form.post(route("verification.send"));
    };
    const verificationLinkSent = computed(() => props.status === "verification-link-sent");
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(unref(Head), { title: "Email Verification" }),
        createVNode(JetAuthenticationCard, null, {
          logo: withCtx(() => [
            createVNode(_sfc_main$1)
          ]),
          default: withCtx(() => [
            _hoisted_1,
            unref(verificationLinkSent) ? (openBlock(), createElementBlock("div", _hoisted_2, " A new verification link has been sent to the email address you provided in your profile settings. ")) : createCommentVNode("", true),
            createBaseVNode("form", {
              onSubmit: withModifiers(submit, ["prevent"])
            }, [
              createBaseVNode("div", _hoisted_4, [
                createVNode(_sfc_main$2, {
                  class: normalizeClass({ "opacity-25": unref(form).processing }),
                  disabled: unref(form).processing
                }, {
                  default: withCtx(() => [
                    _hoisted_5
                  ]),
                  _: 1
                }, 8, ["class", "disabled"]),
                createBaseVNode("div", null, [
                  createVNode(unref(Link), {
                    href: _ctx.route("profile.show"),
                    class: "underline text-sm text-gray-600 hover:text-gray-900"
                  }, {
                    default: withCtx(() => [
                      _hoisted_6
                    ]),
                    _: 1
                  }, 8, ["href"]),
                  createVNode(unref(Link), {
                    href: _ctx.route("logout"),
                    method: "post",
                    as: "button",
                    class: "underline text-sm text-gray-600 hover:text-gray-900 ml-2"
                  }, {
                    default: withCtx(() => [
                      _hoisted_7
                    ]),
                    _: 1
                  }, 8, ["href"])
                ])
              ])
            ], 40, _hoisted_3)
          ]),
          _: 1
        })
      ], 64);
    };
  }
};
export {
  _sfc_main as default
};
//# sourceMappingURL=VerifyEmail.b19aaf4a.js.map
