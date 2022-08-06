var __defProp = Object.defineProperty;
var __defProps = Object.defineProperties;
var __getOwnPropDescs = Object.getOwnPropertyDescriptors;
var __getOwnPropSymbols = Object.getOwnPropertySymbols;
var __hasOwnProp = Object.prototype.hasOwnProperty;
var __propIsEnum = Object.prototype.propertyIsEnumerable;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __spreadValues = (a, b) => {
  for (var prop in b || (b = {}))
    if (__hasOwnProp.call(b, prop))
      __defNormalProp(a, prop, b[prop]);
  if (__getOwnPropSymbols)
    for (var prop of __getOwnPropSymbols(b)) {
      if (__propIsEnum.call(b, prop))
        __defNormalProp(a, prop, b[prop]);
    }
  return a;
};
var __spreadProps = (a, b) => __defProps(a, __getOwnPropDescs(b));
import { ay as openBlock, W as createElementBlock, a2 as createVNode, x as unref, b1 as withCtx, I as Fragment, D as toDisplayString, V as createCommentVNode, X as createBaseVNode, U as createBlock, A as normalizeClass, bp as withModifiers, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
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
const _hoisted_1 = {
  key: 0,
  class: "mb-4 font-medium text-sm text-green-600"
};
const _hoisted_2 = ["onSubmit"];
const _hoisted_3 = { class: "mt-4" };
const _hoisted_4 = { class: "block mt-4" };
const _hoisted_5 = { class: "flex items-center" };
const _hoisted_6 = /* @__PURE__ */ createBaseVNode("span", { class: "ml-2 text-sm text-gray-600" }, "Remember me", -1);
const _hoisted_7 = { class: "flex items-center justify-end mt-4" };
const _hoisted_8 = /* @__PURE__ */ createTextVNode(" Forgot your password? ");
const _hoisted_9 = /* @__PURE__ */ createTextVNode(" Log in ");
const _sfc_main = {
  __name: "Login",
  props: {
    canResetPassword: Boolean,
    status: String
  },
  setup(__props) {
    const form = useForm({
      email: "",
      password: "",
      remember: false
    });
    const submit = () => {
      form.transform((data) => __spreadProps(__spreadValues({}, data), {
        remember: form.remember ? "on" : ""
      })).post(route("login"), {
        onFinish: () => form.reset("password")
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(unref(Head), { title: "Log in" }),
        createVNode(JetAuthenticationCard, null, {
          logo: withCtx(() => [
            createVNode(_sfc_main$1)
          ]),
          default: withCtx(() => [
            createVNode(_sfc_main$2, { class: "mb-4" }),
            __props.status ? (openBlock(), createElementBlock("div", _hoisted_1, toDisplayString(__props.status), 1)) : createCommentVNode("", true),
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
              createBaseVNode("div", _hoisted_3, [
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
                  autocomplete: "current-password"
                }, null, 8, ["modelValue"])
              ]),
              createBaseVNode("div", _hoisted_4, [
                createBaseVNode("label", _hoisted_5, [
                  createVNode(_sfc_main$5, {
                    checked: unref(form).remember,
                    "onUpdate:checked": _cache[2] || (_cache[2] = ($event) => unref(form).remember = $event),
                    name: "remember"
                  }, null, 8, ["checked"]),
                  _hoisted_6
                ])
              ]),
              createBaseVNode("div", _hoisted_7, [
                __props.canResetPassword ? (openBlock(), createBlock(unref(Link), {
                  key: 0,
                  href: _ctx.route("password.request"),
                  class: "underline text-sm text-gray-600 hover:text-gray-900"
                }, {
                  default: withCtx(() => [
                    _hoisted_8
                  ]),
                  _: 1
                }, 8, ["href"])) : createCommentVNode("", true),
                createVNode(_sfc_main$6, {
                  class: normalizeClass(["ml-4", { "opacity-25": unref(form).processing }]),
                  disabled: unref(form).processing
                }, {
                  default: withCtx(() => [
                    _hoisted_9
                  ]),
                  _: 1
                }, 8, ["class", "disabled"])
              ])
            ], 40, _hoisted_2)
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
//# sourceMappingURL=Login.1eb2450f.js.map
