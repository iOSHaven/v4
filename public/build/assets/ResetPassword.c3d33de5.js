import { ay as openBlock, W as createElementBlock, a2 as createVNode, x as unref, b1 as withCtx, I as Fragment, X as createBaseVNode, A as normalizeClass, bp as withModifiers, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm, H as Head } from "./app.73e7ef0c.js";
import { J as JetAuthenticationCard } from "./AuthenticationCard.377687db.js";
import { _ as _sfc_main$1 } from "./AuthenticationCardLogo.75f38a35.js";
import { _ as _sfc_main$5 } from "./Button.05052283.js";
import { _ as _sfc_main$4 } from "./Input.4d723479.js";
import { _ as _sfc_main$3 } from "./Label.6120fd41.js";
import { _ as _sfc_main$2 } from "./ValidationErrors.d163a669.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = ["onSubmit"];
const _hoisted_2 = { class: "mt-4" };
const _hoisted_3 = { class: "mt-4" };
const _hoisted_4 = { class: "flex items-center justify-end mt-4" };
const _hoisted_5 = /* @__PURE__ */ createTextVNode(" Reset Password ");
const _sfc_main = {
  __name: "ResetPassword",
  props: {
    email: String,
    token: String
  },
  setup(__props) {
    const props = __props;
    const form = useForm({
      token: props.token,
      email: props.email,
      password: "",
      password_confirmation: ""
    });
    const submit = () => {
      form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation")
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(unref(Head), { title: "Reset Password" }),
        createVNode(JetAuthenticationCard, null, {
          logo: withCtx(() => [
            createVNode(_sfc_main$1)
          ]),
          default: withCtx(() => [
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
              createBaseVNode("div", _hoisted_2, [
                createVNode(_sfc_main$3, {
                  for: "password",
                  value: "Password"
                }),
                createVNode(_sfc_main$4, {
                  id: "password",
                  modelValue: unref(form).password,
                  "onUpdate:modelValue": _cache[1] || (_cache[1] = ($event) => unref(form).password = $event),
                  type: "password",
                  class: "mt-1 block w-full",
                  required: "",
                  autocomplete: "new-password"
                }, null, 8, ["modelValue"])
              ]),
              createBaseVNode("div", _hoisted_3, [
                createVNode(_sfc_main$3, {
                  for: "password_confirmation",
                  value: "Confirm Password"
                }),
                createVNode(_sfc_main$4, {
                  id: "password_confirmation",
                  modelValue: unref(form).password_confirmation,
                  "onUpdate:modelValue": _cache[2] || (_cache[2] = ($event) => unref(form).password_confirmation = $event),
                  type: "password",
                  class: "mt-1 block w-full",
                  required: "",
                  autocomplete: "new-password"
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
            ], 40, _hoisted_1)
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
//# sourceMappingURL=ResetPassword.c3d33de5.js.map
