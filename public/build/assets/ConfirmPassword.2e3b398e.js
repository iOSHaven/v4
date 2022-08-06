import { k as ref, ay as openBlock, W as createElementBlock, a2 as createVNode, x as unref, b1 as withCtx, I as Fragment, X as createBaseVNode, A as normalizeClass, bp as withModifiers, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm, H as Head } from "./app.73e7ef0c.js";
import { J as JetAuthenticationCard } from "./AuthenticationCard.377687db.js";
import { _ as _sfc_main$1 } from "./AuthenticationCardLogo.75f38a35.js";
import { _ as _sfc_main$5 } from "./Button.05052283.js";
import { _ as _sfc_main$4 } from "./Input.4d723479.js";
import { _ as _sfc_main$3 } from "./Label.6120fd41.js";
import { _ as _sfc_main$2 } from "./ValidationErrors.d163a669.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createBaseVNode("div", { class: "mb-4 text-sm text-gray-600" }, " This is a secure area of the application. Please confirm your password before continuing. ", -1);
const _hoisted_2 = ["onSubmit"];
const _hoisted_3 = { class: "flex justify-end mt-4" };
const _hoisted_4 = /* @__PURE__ */ createTextVNode(" Confirm ");
const _sfc_main = {
  __name: "ConfirmPassword",
  setup(__props) {
    const form = useForm({
      password: ""
    });
    const passwordInput = ref(null);
    const submit = () => {
      form.post(route("password.confirm"), {
        onFinish: () => {
          form.reset();
          passwordInput.value.focus();
        }
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(unref(Head), { title: "Secure Area" }),
        createVNode(JetAuthenticationCard, null, {
          logo: withCtx(() => [
            createVNode(_sfc_main$1)
          ]),
          default: withCtx(() => [
            _hoisted_1,
            createVNode(_sfc_main$2, { class: "mb-4" }),
            createBaseVNode("form", {
              onSubmit: withModifiers(submit, ["prevent"])
            }, [
              createBaseVNode("div", null, [
                createVNode(_sfc_main$3, {
                  for: "password",
                  value: "Password"
                }),
                createVNode(_sfc_main$4, {
                  id: "password",
                  ref_key: "passwordInput",
                  ref: passwordInput,
                  modelValue: unref(form).password,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).password = $event),
                  type: "password",
                  class: "mt-1 block w-full",
                  required: "",
                  autocomplete: "current-password",
                  autofocus: ""
                }, null, 8, ["modelValue"])
              ]),
              createBaseVNode("div", _hoisted_3, [
                createVNode(_sfc_main$5, {
                  class: normalizeClass(["ml-4", { "opacity-25": unref(form).processing }]),
                  disabled: unref(form).processing
                }, {
                  default: withCtx(() => [
                    _hoisted_4
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
//# sourceMappingURL=ConfirmPassword.2e3b398e.js.map
