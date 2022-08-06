import { ay as openBlock, W as createElementBlock, a2 as createVNode, x as unref, b1 as withCtx, I as Fragment, D as toDisplayString, V as createCommentVNode, X as createBaseVNode, A as normalizeClass, bp as withModifiers, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm, H as Head } from "./app.73e7ef0c.js";
import { J as JetAuthenticationCard } from "./AuthenticationCard.377687db.js";
import { _ as _sfc_main$1 } from "./AuthenticationCardLogo.75f38a35.js";
import { _ as _sfc_main$5 } from "./Button.05052283.js";
import { _ as _sfc_main$4 } from "./Input.4d723479.js";
import { _ as _sfc_main$3 } from "./Label.6120fd41.js";
import { _ as _sfc_main$2 } from "./ValidationErrors.d163a669.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createBaseVNode("div", { class: "mb-4 text-sm text-gray-600" }, " Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. ", -1);
const _hoisted_2 = {
  key: 0,
  class: "mb-4 font-medium text-sm text-green-600"
};
const _hoisted_3 = ["onSubmit"];
const _hoisted_4 = { class: "flex items-center justify-end mt-4" };
const _hoisted_5 = /* @__PURE__ */ createTextVNode(" Email Password Reset Link ");
const _sfc_main = {
  __name: "ForgotPassword",
  props: {
    status: String
  },
  setup(__props) {
    const form = useForm({
      email: ""
    });
    const submit = () => {
      form.post(route("password.email"));
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(unref(Head), { title: "Forgot Password" }),
        createVNode(JetAuthenticationCard, null, {
          logo: withCtx(() => [
            createVNode(_sfc_main$1)
          ]),
          default: withCtx(() => [
            _hoisted_1,
            __props.status ? (openBlock(), createElementBlock("div", _hoisted_2, toDisplayString(__props.status), 1)) : createCommentVNode("", true),
            createVNode(_sfc_main$2, { class: "mb-4" }),
            createBaseVNode("form", {
              onSubmit: withModifiers(submit, ["prevent"])
            }, [
              createBaseVNode("div", null, [
                createVNode(_sfc_main$3, {
                  for: "email",
                  value: "Email"
                }),
                createVNode(_sfc_main$4, {
                  id: "email",
                  modelValue: unref(form).email,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).email = $event),
                  type: "email",
                  class: "mt-1 block w-full",
                  required: "",
                  autofocus: ""
                }, null, 8, ["modelValue"])
              ]),
              createBaseVNode("div", _hoisted_4, [
                createVNode(_sfc_main$5, {
                  class: normalizeClass({ "opacity-25": unref(form).processing }),
                  disabled: unref(form).processing
                }, {
                  default: withCtx(() => [
                    _hoisted_5
                  ]),
                  _: 1
                }, 8, ["class", "disabled"])
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
//# sourceMappingURL=ForgotPassword.804a49dc.js.map
