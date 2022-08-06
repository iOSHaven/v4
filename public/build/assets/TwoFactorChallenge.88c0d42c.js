import { k as ref, ay as openBlock, W as createElementBlock, a2 as createVNode, x as unref, b1 as withCtx, I as Fragment, X as createBaseVNode, bp as withModifiers, A as normalizeClass, a1 as createTextVNode, al as nextTick } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm, H as Head } from "./app.73e7ef0c.js";
import { J as JetAuthenticationCard } from "./AuthenticationCard.377687db.js";
import { _ as _sfc_main$1 } from "./AuthenticationCardLogo.75f38a35.js";
import { _ as _sfc_main$5 } from "./Button.05052283.js";
import { _ as _sfc_main$4 } from "./Input.4d723479.js";
import { _ as _sfc_main$3 } from "./Label.6120fd41.js";
import { _ as _sfc_main$2 } from "./ValidationErrors.d163a669.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = { class: "mb-4 text-sm text-gray-600" };
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Please confirm access to your account by entering the authentication code provided by your authenticator application. ");
const _hoisted_3 = /* @__PURE__ */ createTextVNode(" Please confirm access to your account by entering one of your emergency recovery codes. ");
const _hoisted_4 = ["onSubmit"];
const _hoisted_5 = { key: 0 };
const _hoisted_6 = { key: 1 };
const _hoisted_7 = { class: "flex items-center justify-end mt-4" };
const _hoisted_8 = ["onClick"];
const _hoisted_9 = /* @__PURE__ */ createTextVNode(" Use a recovery code ");
const _hoisted_10 = /* @__PURE__ */ createTextVNode(" Use an authentication code ");
const _hoisted_11 = /* @__PURE__ */ createTextVNode(" Log in ");
const _sfc_main = {
  __name: "TwoFactorChallenge",
  setup(__props) {
    const recovery = ref(false);
    const form = useForm({
      code: "",
      recovery_code: ""
    });
    const recoveryCodeInput = ref(null);
    const codeInput = ref(null);
    const toggleRecovery = async () => {
      recovery.value ^= true;
      await nextTick();
      if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = "";
      } else {
        codeInput.value.focus();
        form.recovery_code = "";
      }
    };
    const submit = () => {
      form.post(route("two-factor.login"));
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock(Fragment, null, [
        createVNode(unref(Head), { title: "Two-factor Confirmation" }),
        createVNode(JetAuthenticationCard, null, {
          logo: withCtx(() => [
            createVNode(_sfc_main$1)
          ]),
          default: withCtx(() => [
            createBaseVNode("div", _hoisted_1, [
              !recovery.value ? (openBlock(), createElementBlock(Fragment, { key: 0 }, [
                _hoisted_2
              ], 64)) : (openBlock(), createElementBlock(Fragment, { key: 1 }, [
                _hoisted_3
              ], 64))
            ]),
            createVNode(_sfc_main$2, { class: "mb-4" }),
            createBaseVNode("form", {
              onSubmit: withModifiers(submit, ["prevent"])
            }, [
              !recovery.value ? (openBlock(), createElementBlock("div", _hoisted_5, [
                createVNode(_sfc_main$3, {
                  for: "code",
                  value: "Code"
                }),
                createVNode(_sfc_main$4, {
                  id: "code",
                  ref_key: "codeInput",
                  ref: codeInput,
                  modelValue: unref(form).code,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).code = $event),
                  type: "text",
                  inputmode: "numeric",
                  class: "mt-1 block w-full",
                  autofocus: "",
                  autocomplete: "one-time-code"
                }, null, 8, ["modelValue"])
              ])) : (openBlock(), createElementBlock("div", _hoisted_6, [
                createVNode(_sfc_main$3, {
                  for: "recovery_code",
                  value: "Recovery Code"
                }),
                createVNode(_sfc_main$4, {
                  id: "recovery_code",
                  ref_key: "recoveryCodeInput",
                  ref: recoveryCodeInput,
                  modelValue: unref(form).recovery_code,
                  "onUpdate:modelValue": _cache[1] || (_cache[1] = ($event) => unref(form).recovery_code = $event),
                  type: "text",
                  class: "mt-1 block w-full",
                  autocomplete: "one-time-code"
                }, null, 8, ["modelValue"])
              ])),
              createBaseVNode("div", _hoisted_7, [
                createBaseVNode("button", {
                  type: "button",
                  class: "text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer",
                  onClick: withModifiers(toggleRecovery, ["prevent"])
                }, [
                  !recovery.value ? (openBlock(), createElementBlock(Fragment, { key: 0 }, [
                    _hoisted_9
                  ], 64)) : (openBlock(), createElementBlock(Fragment, { key: 1 }, [
                    _hoisted_10
                  ], 64))
                ], 8, _hoisted_8),
                createVNode(_sfc_main$5, {
                  class: normalizeClass(["ml-4", { "opacity-25": unref(form).processing }]),
                  disabled: unref(form).processing
                }, {
                  default: withCtx(() => [
                    _hoisted_11
                  ]),
                  _: 1
                }, 8, ["class", "disabled"])
              ])
            ], 40, _hoisted_4)
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
//# sourceMappingURL=TwoFactorChallenge.88c0d42c.js.map
