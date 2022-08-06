import { k as ref, ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, a2 as createVNode, x as unref, bo as withKeys, A as normalizeClass, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm } from "./app.73e7ef0c.js";
import { _ as _sfc_main$1 } from "./Modal.0bd03d02.js";
import { _ as _sfc_main$6 } from "./DialogModal.13f682f7.js";
import { _ as _sfc_main$2 } from "./DangerButton.305a98be.js";
import { _ as _sfc_main$3 } from "./Input.4d723479.js";
import { _ as _sfc_main$4 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$5 } from "./SecondaryButton.2caec6f6.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Delete Account ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Permanently delete your account. ");
const _hoisted_3 = /* @__PURE__ */ createBaseVNode("div", { class: "max-w-xl text-sm text-gray-600" }, " Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ", -1);
const _hoisted_4 = { class: "mt-5" };
const _hoisted_5 = /* @__PURE__ */ createTextVNode(" Delete Account ");
const _hoisted_6 = /* @__PURE__ */ createTextVNode(" Delete Account ");
const _hoisted_7 = /* @__PURE__ */ createTextVNode(" Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. ");
const _hoisted_8 = { class: "mt-4" };
const _hoisted_9 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_10 = /* @__PURE__ */ createTextVNode(" Delete Account ");
const _sfc_main = {
  __name: "DeleteUserForm",
  setup(__props) {
    const confirmingUserDeletion = ref(false);
    const passwordInput = ref(null);
    const form = useForm({
      password: ""
    });
    const confirmUserDeletion = () => {
      confirmingUserDeletion.value = true;
      setTimeout(() => passwordInput.value.focus(), 250);
    };
    const deleteUser = () => {
      form.delete(route("current-user.destroy"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset()
      });
    };
    const closeModal = () => {
      confirmingUserDeletion.value = false;
      form.reset();
    };
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, null, {
        title: withCtx(() => [
          _hoisted_1
        ]),
        description: withCtx(() => [
          _hoisted_2
        ]),
        content: withCtx(() => [
          _hoisted_3,
          createBaseVNode("div", _hoisted_4, [
            createVNode(_sfc_main$2, { onClick: confirmUserDeletion }, {
              default: withCtx(() => [
                _hoisted_5
              ]),
              _: 1
            })
          ]),
          createVNode(_sfc_main$6, {
            show: confirmingUserDeletion.value,
            onClose: closeModal
          }, {
            title: withCtx(() => [
              _hoisted_6
            ]),
            content: withCtx(() => [
              _hoisted_7,
              createBaseVNode("div", _hoisted_8, [
                createVNode(_sfc_main$3, {
                  ref_key: "passwordInput",
                  ref: passwordInput,
                  modelValue: unref(form).password,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).password = $event),
                  type: "password",
                  class: "mt-1 block w-3/4",
                  placeholder: "Password",
                  onKeyup: withKeys(deleteUser, ["enter"])
                }, null, 8, ["modelValue", "onKeyup"]),
                createVNode(_sfc_main$4, {
                  message: unref(form).errors.password,
                  class: "mt-2"
                }, null, 8, ["message"])
              ])
            ]),
            footer: withCtx(() => [
              createVNode(_sfc_main$5, { onClick: closeModal }, {
                default: withCtx(() => [
                  _hoisted_9
                ]),
                _: 1
              }),
              createVNode(_sfc_main$2, {
                class: normalizeClass(["ml-3", { "opacity-25": unref(form).processing }]),
                disabled: unref(form).processing,
                onClick: deleteUser
              }, {
                default: withCtx(() => [
                  _hoisted_10
                ]),
                _: 1
              }, 8, ["class", "disabled"])
            ]),
            _: 1
          }, 8, ["show"])
        ]),
        _: 1
      });
    };
  }
};
export {
  _sfc_main as default
};
//# sourceMappingURL=DeleteUserForm.7ae9272d.js.map
