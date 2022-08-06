import { ay as openBlock, W as createElementBlock, a2 as createVNode, x as unref, b1 as withCtx, I as Fragment, X as createBaseVNode, V as createCommentVNode, A as normalizeClass, bp as withModifiers, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm, H as Head, L as Link } from "./app.73e7ef0c.js";
import { J as JetAuthenticationCard } from "./AuthenticationCard.377687db.js";
import { _ as _sfc_main$1 } from "./AuthenticationCardLogo.75f38a35.js";
import { _ as _sfc_main$6 } from "./Button.05052283.js";
import { _ as _sfc_main$4 } from "./Input.4d723479.js";
import { _ as _sfc_main$5 } from "./Checkbox.e7d12896.js";
import { _ as _sfc_main$3 } from "./Label.6120fd41.js";
import { _ as _sfc_main$2 } from "./ValidationErrors.d163a669.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = ["onSubmit"];
const _hoisted_2 = { class: "mt-4" };
const _hoisted_3 = { class: "mt-4" };
const _hoisted_4 = { class: "mt-4" };
const _hoisted_5 = {
  key: 0,
  class: "mt-4"
};
const _hoisted_6 = { class: "flex items-center" };
const _hoisted_7 = { class: "ml-2" };
const _hoisted_8 = /* @__PURE__ */ createTextVNode(" I agree to the ");
const _hoisted_9 = ["href"];
const _hoisted_10 = /* @__PURE__ */ createTextVNode(" and ");
const _hoisted_11 = ["href"];
const _hoisted_12 = { class: "flex items-center justify-end mt-4" };
const _hoisted_13 = /* @__PURE__ */ createTextVNode(" Already registered? ");
const _hoisted_14 = /* @__PURE__ */ createTextVNode(" Register ");
const _sfc_main = {
  __name: "Register",
  setup(__props) {
    const form = useForm({
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      terms: false
    });
    const submit = () => {
      form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation")
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(unref(Head), { title: "Register" }),
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
                  for: "name",
                  value: "Name"
                }),
                createVNode(_sfc_main$4, {
                  id: "name",
                  modelValue: unref(form).name,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).name = $event),
                  type: "text",
                  class: "mt-1 block w-full",
                  required: "",
                  autofocus: "",
                  autocomplete: "name"
                }, null, 8, ["modelValue"])
              ]),
              createBaseVNode("div", _hoisted_2, [
                createVNode(_sfc_main$3, {
                  for: "email",
                  value: "Email"
                }),
                createVNode(_sfc_main$4, {
                  id: "email",
                  modelValue: unref(form).email,
                  "onUpdate:modelValue": _cache[1] || (_cache[1] = ($event) => unref(form).email = $event),
                  type: "email",
                  class: "mt-1 block w-full",
                  required: ""
                }, null, 8, ["modelValue"])
              ]),
              createBaseVNode("div", _hoisted_3, [
                createVNode(_sfc_main$3, {
                  for: "password",
                  value: "Password"
                }),
                createVNode(_sfc_main$4, {
                  id: "password",
                  modelValue: unref(form).password,
                  "onUpdate:modelValue": _cache[2] || (_cache[2] = ($event) => unref(form).password = $event),
                  type: "password",
                  class: "mt-1 block w-full",
                  required: "",
                  autocomplete: "new-password"
                }, null, 8, ["modelValue"])
              ]),
              createBaseVNode("div", _hoisted_4, [
                createVNode(_sfc_main$3, {
                  for: "password_confirmation",
                  value: "Confirm Password"
                }),
                createVNode(_sfc_main$4, {
                  id: "password_confirmation",
                  modelValue: unref(form).password_confirmation,
                  "onUpdate:modelValue": _cache[3] || (_cache[3] = ($event) => unref(form).password_confirmation = $event),
                  type: "password",
                  class: "mt-1 block w-full",
                  required: "",
                  autocomplete: "new-password"
                }, null, 8, ["modelValue"])
              ]),
              _ctx.$page.props.jetstream.hasTermsAndPrivacyPolicyFeature ? (openBlock(), createElementBlock("div", _hoisted_5, [
                createVNode(_sfc_main$3, { for: "terms" }, {
                  default: withCtx(() => [
                    createBaseVNode("div", _hoisted_6, [
                      createVNode(_sfc_main$5, {
                        id: "terms",
                        checked: unref(form).terms,
                        "onUpdate:checked": _cache[4] || (_cache[4] = ($event) => unref(form).terms = $event),
                        name: "terms"
                      }, null, 8, ["checked"]),
                      createBaseVNode("div", _hoisted_7, [
                        _hoisted_8,
                        createBaseVNode("a", {
                          target: "_blank",
                          href: _ctx.route("terms.show"),
                          class: "underline text-sm text-gray-600 hover:text-gray-900"
                        }, "Terms of Service", 8, _hoisted_9),
                        _hoisted_10,
                        createBaseVNode("a", {
                          target: "_blank",
                          href: _ctx.route("policy.show"),
                          class: "underline text-sm text-gray-600 hover:text-gray-900"
                        }, "Privacy Policy", 8, _hoisted_11)
                      ])
                    ])
                  ]),
                  _: 1
                })
              ])) : createCommentVNode("", true),
              createBaseVNode("div", _hoisted_12, [
                createVNode(unref(Link), {
                  href: _ctx.route("login"),
                  class: "underline text-sm text-gray-600 hover:text-gray-900"
                }, {
                  default: withCtx(() => [
                    _hoisted_13
                  ]),
                  _: 1
                }, 8, ["href"]),
                createVNode(_sfc_main$6, {
                  class: normalizeClass(["ml-4", { "opacity-25": unref(form).processing }]),
                  disabled: unref(form).processing
                }, {
                  default: withCtx(() => [
                    _hoisted_14
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
//# sourceMappingURL=Register.7da75d1e.js.map
