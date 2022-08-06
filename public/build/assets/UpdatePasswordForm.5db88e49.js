import { u as useForm } from "./app.73e7ef0c.js";
import { _ as _sfc_main$5 } from "./ActionMessage.a358f0ed.js";
import { _ as _sfc_main$6 } from "./Button.05052283.js";
import { _ as _sfc_main$1 } from "./FormSection.b57bd017.js";
import { _ as _sfc_main$3 } from "./Input.4d723479.js";
import { _ as _sfc_main$4 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$2 } from "./Label.6120fd41.js";
import { k as ref, ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, a2 as createVNode, x as unref, A as normalizeClass, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Update Password ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Ensure your account is using a long, random password to stay secure. ");
const _hoisted_3 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_4 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_5 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_6 = /* @__PURE__ */ createTextVNode(" Saved. ");
const _hoisted_7 = /* @__PURE__ */ createTextVNode(" Save ");
const _sfc_main = {
  __name: "UpdatePasswordForm",
  setup(__props) {
    const passwordInput = ref(null);
    const currentPasswordInput = ref(null);
    const form = useForm({
      current_password: "",
      password: "",
      password_confirmation: ""
    });
    const updatePassword = () => {
      form.put(route("user-password.update"), {
        errorBag: "updatePassword",
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
          if (form.errors.password) {
            form.reset("password", "password_confirmation");
            passwordInput.value.focus();
          }
          if (form.errors.current_password) {
            form.reset("current_password");
            currentPasswordInput.value.focus();
          }
        }
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, { onSubmitted: updatePassword }, {
        title: withCtx(() => [
          _hoisted_1
        ]),
        description: withCtx(() => [
          _hoisted_2
        ]),
        form: withCtx(() => [
          createBaseVNode("div", _hoisted_3, [
            createVNode(_sfc_main$2, {
              for: "current_password",
              value: "Current Password"
            }),
            createVNode(_sfc_main$3, {
              id: "current_password",
              ref_key: "currentPasswordInput",
              ref: currentPasswordInput,
              modelValue: unref(form).current_password,
              "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).current_password = $event),
              type: "password",
              class: "mt-1 block w-full",
              autocomplete: "current-password"
            }, null, 8, ["modelValue"]),
            createVNode(_sfc_main$4, {
              message: unref(form).errors.current_password,
              class: "mt-2"
            }, null, 8, ["message"])
          ]),
          createBaseVNode("div", _hoisted_4, [
            createVNode(_sfc_main$2, {
              for: "password",
              value: "New Password"
            }),
            createVNode(_sfc_main$3, {
              id: "password",
              ref_key: "passwordInput",
              ref: passwordInput,
              modelValue: unref(form).password,
              "onUpdate:modelValue": _cache[1] || (_cache[1] = ($event) => unref(form).password = $event),
              type: "password",
              class: "mt-1 block w-full",
              autocomplete: "new-password"
            }, null, 8, ["modelValue"]),
            createVNode(_sfc_main$4, {
              message: unref(form).errors.password,
              class: "mt-2"
            }, null, 8, ["message"])
          ]),
          createBaseVNode("div", _hoisted_5, [
            createVNode(_sfc_main$2, {
              for: "password_confirmation",
              value: "Confirm Password"
            }),
            createVNode(_sfc_main$3, {
              id: "password_confirmation",
              modelValue: unref(form).password_confirmation,
              "onUpdate:modelValue": _cache[2] || (_cache[2] = ($event) => unref(form).password_confirmation = $event),
              type: "password",
              class: "mt-1 block w-full",
              autocomplete: "new-password"
            }, null, 8, ["modelValue"]),
            createVNode(_sfc_main$4, {
              message: unref(form).errors.password_confirmation,
              class: "mt-2"
            }, null, 8, ["message"])
          ])
        ]),
        actions: withCtx(() => [
          createVNode(_sfc_main$5, {
            on: unref(form).recentlySuccessful,
            class: "mr-3"
          }, {
            default: withCtx(() => [
              _hoisted_6
            ]),
            _: 1
          }, 8, ["on"]),
          createVNode(_sfc_main$6, {
            class: normalizeClass({ "opacity-25": unref(form).processing }),
            disabled: unref(form).processing
          }, {
            default: withCtx(() => [
              _hoisted_7
            ]),
            _: 1
          }, 8, ["class", "disabled"])
        ]),
        _: 1
      });
    };
  }
};
export {
  _sfc_main as default
};
//# sourceMappingURL=UpdatePasswordForm.5db88e49.js.map
