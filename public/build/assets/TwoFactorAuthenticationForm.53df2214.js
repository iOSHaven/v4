import { k as ref, r as reactive, ay as openBlock, W as createElementBlock, X as createBaseVNode, aF as renderSlot, a2 as createVNode, b1 as withCtx, a1 as createTextVNode, D as toDisplayString, bo as withKeys, A as normalizeClass, al as nextTick, Q as computed, aY as watch, U as createBlock, x as unref, V as createCommentVNode, I as Fragment, aE as renderList } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm, a as usePage, d as dist } from "./app.73e7ef0c.js";
import { _ as _sfc_main$7 } from "./Modal.0bd03d02.js";
import { _ as _sfc_main$5 } from "./Button.05052283.js";
import { _ as _sfc_main$6 } from "./DialogModal.13f682f7.js";
import { _ as _sfc_main$2 } from "./Input.4d723479.js";
import { _ as _sfc_main$3 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$4 } from "./SecondaryButton.2caec6f6.js";
import { _ as _sfc_main$9 } from "./DangerButton.305a98be.js";
import { _ as _sfc_main$8 } from "./Label.6120fd41.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1$1 = { class: "mt-4" };
const _hoisted_2$1 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _sfc_main$1 = {
  __name: "ConfirmsPassword",
  props: {
    title: {
      type: String,
      default: "Confirm Password"
    },
    content: {
      type: String,
      default: "For your security, please confirm your password to continue."
    },
    button: {
      type: String,
      default: "Confirm"
    }
  },
  emits: ["confirmed"],
  setup(__props, { emit }) {
    const confirmingPassword = ref(false);
    const form = reactive({
      password: "",
      error: "",
      processing: false
    });
    const passwordInput = ref(null);
    const startConfirmingPassword = () => {
      axios.get(route("password.confirmation")).then((response) => {
        if (response.data.confirmed) {
          emit("confirmed");
        } else {
          confirmingPassword.value = true;
          setTimeout(() => passwordInput.value.focus(), 250);
        }
      });
    };
    const confirmPassword = () => {
      form.processing = true;
      axios.post(route("password.confirm"), {
        password: form.password
      }).then(() => {
        form.processing = false;
        closeModal();
        nextTick().then(() => emit("confirmed"));
      }).catch((error) => {
        form.processing = false;
        form.error = error.response.data.errors.password[0];
        passwordInput.value.focus();
      });
    };
    const closeModal = () => {
      confirmingPassword.value = false;
      form.password = "";
      form.error = "";
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("span", null, [
        createBaseVNode("span", { onClick: startConfirmingPassword }, [
          renderSlot(_ctx.$slots, "default")
        ]),
        createVNode(_sfc_main$6, {
          show: confirmingPassword.value,
          onClose: closeModal
        }, {
          title: withCtx(() => [
            createTextVNode(toDisplayString(__props.title), 1)
          ]),
          content: withCtx(() => [
            createTextVNode(toDisplayString(__props.content) + " ", 1),
            createBaseVNode("div", _hoisted_1$1, [
              createVNode(_sfc_main$2, {
                ref_key: "passwordInput",
                ref: passwordInput,
                modelValue: form.password,
                "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => form.password = $event),
                type: "password",
                class: "mt-1 block w-3/4",
                placeholder: "Password",
                onKeyup: withKeys(confirmPassword, ["enter"])
              }, null, 8, ["modelValue", "onKeyup"]),
              createVNode(_sfc_main$3, {
                message: form.error,
                class: "mt-2"
              }, null, 8, ["message"])
            ])
          ]),
          footer: withCtx(() => [
            createVNode(_sfc_main$4, { onClick: closeModal }, {
              default: withCtx(() => [
                _hoisted_2$1
              ]),
              _: 1
            }),
            createVNode(_sfc_main$5, {
              class: normalizeClass(["ml-3", { "opacity-25": form.processing }]),
              disabled: form.processing,
              onClick: confirmPassword
            }, {
              default: withCtx(() => [
                createTextVNode(toDisplayString(__props.button), 1)
              ]),
              _: 1
            }, 8, ["class", "disabled"])
          ]),
          _: 1
        }, 8, ["show"])
      ]);
    };
  }
};
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Two Factor Authentication ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Add additional security to your account using two factor authentication. ");
const _hoisted_3 = {
  key: 0,
  class: "text-lg font-medium text-gray-900"
};
const _hoisted_4 = {
  key: 1,
  class: "text-lg font-medium text-gray-900"
};
const _hoisted_5 = {
  key: 2,
  class: "text-lg font-medium text-gray-900"
};
const _hoisted_6 = /* @__PURE__ */ createBaseVNode("div", { class: "mt-3 max-w-xl text-sm text-gray-600" }, [
  /* @__PURE__ */ createBaseVNode("p", null, " When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application. ")
], -1);
const _hoisted_7 = { key: 3 };
const _hoisted_8 = { key: 0 };
const _hoisted_9 = { class: "mt-4 max-w-xl text-sm text-gray-600" };
const _hoisted_10 = {
  key: 0,
  class: "font-semibold"
};
const _hoisted_11 = { key: 1 };
const _hoisted_12 = ["innerHTML"];
const _hoisted_13 = {
  key: 0,
  class: "mt-4 max-w-xl text-sm text-gray-600"
};
const _hoisted_14 = { class: "font-semibold" };
const _hoisted_15 = /* @__PURE__ */ createTextVNode(" Setup Key: ");
const _hoisted_16 = ["innerHTML"];
const _hoisted_17 = {
  key: 1,
  class: "mt-4"
};
const _hoisted_18 = { key: 1 };
const _hoisted_19 = /* @__PURE__ */ createBaseVNode("div", { class: "mt-4 max-w-xl text-sm text-gray-600" }, [
  /* @__PURE__ */ createBaseVNode("p", { class: "font-semibold" }, " Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost. ")
], -1);
const _hoisted_20 = { class: "grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg" };
const _hoisted_21 = { class: "mt-5" };
const _hoisted_22 = { key: 0 };
const _hoisted_23 = /* @__PURE__ */ createTextVNode(" Enable ");
const _hoisted_24 = { key: 1 };
const _hoisted_25 = /* @__PURE__ */ createTextVNode(" Confirm ");
const _hoisted_26 = /* @__PURE__ */ createTextVNode(" Regenerate Recovery Codes ");
const _hoisted_27 = /* @__PURE__ */ createTextVNode(" Show Recovery Codes ");
const _hoisted_28 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_29 = /* @__PURE__ */ createTextVNode(" Disable ");
const _sfc_main = {
  __name: "TwoFactorAuthenticationForm",
  props: {
    requiresConfirmation: Boolean
  },
  setup(__props) {
    const props = __props;
    const enabling = ref(false);
    const confirming = ref(false);
    const disabling = ref(false);
    const qrCode = ref(null);
    const setupKey = ref(null);
    const recoveryCodes = ref([]);
    const confirmationForm = useForm({
      code: ""
    });
    const twoFactorEnabled = computed(
      () => {
        var _a;
        return !enabling.value && ((_a = usePage().props.value.user) == null ? void 0 : _a.two_factor_enabled);
      }
    );
    watch(twoFactorEnabled, () => {
      if (!twoFactorEnabled.value) {
        confirmationForm.reset();
        confirmationForm.clearErrors();
      }
    });
    const enableTwoFactorAuthentication = () => {
      enabling.value = true;
      dist.Inertia.post("/user/two-factor-authentication", {}, {
        preserveScroll: true,
        onSuccess: () => Promise.all([
          showQrCode(),
          showSetupKey(),
          showRecoveryCodes()
        ]),
        onFinish: () => {
          enabling.value = false;
          confirming.value = props.requiresConfirmation;
        }
      });
    };
    const showQrCode = () => {
      return axios.get("/user/two-factor-qr-code").then((response) => {
        qrCode.value = response.data.svg;
      });
    };
    const showSetupKey = () => {
      return axios.get("/user/two-factor-secret-key").then((response) => {
        setupKey.value = response.data.secretKey;
      });
    };
    const showRecoveryCodes = () => {
      return axios.get("/user/two-factor-recovery-codes").then((response) => {
        recoveryCodes.value = response.data;
      });
    };
    const confirmTwoFactorAuthentication = () => {
      confirmationForm.post("/user/confirmed-two-factor-authentication", {
        errorBag: "confirmTwoFactorAuthentication",
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
          confirming.value = false;
          qrCode.value = null;
          setupKey.value = null;
        }
      });
    };
    const regenerateRecoveryCodes = () => {
      axios.post("/user/two-factor-recovery-codes").then(() => showRecoveryCodes());
    };
    const disableTwoFactorAuthentication = () => {
      disabling.value = true;
      dist.Inertia.delete("/user/two-factor-authentication", {
        preserveScroll: true,
        onSuccess: () => {
          disabling.value = false;
          confirming.value = false;
        }
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$7, null, {
        title: withCtx(() => [
          _hoisted_1
        ]),
        description: withCtx(() => [
          _hoisted_2
        ]),
        content: withCtx(() => [
          unref(twoFactorEnabled) && !confirming.value ? (openBlock(), createElementBlock("h3", _hoisted_3, " You have enabled two factor authentication. ")) : unref(twoFactorEnabled) && confirming.value ? (openBlock(), createElementBlock("h3", _hoisted_4, " Finish enabling two factor authentication. ")) : (openBlock(), createElementBlock("h3", _hoisted_5, " You have not enabled two factor authentication. ")),
          _hoisted_6,
          unref(twoFactorEnabled) ? (openBlock(), createElementBlock("div", _hoisted_7, [
            qrCode.value ? (openBlock(), createElementBlock("div", _hoisted_8, [
              createBaseVNode("div", _hoisted_9, [
                confirming.value ? (openBlock(), createElementBlock("p", _hoisted_10, " To finish enabling two factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code. ")) : (openBlock(), createElementBlock("p", _hoisted_11, " Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application or enter the setup key. "))
              ]),
              createBaseVNode("div", {
                class: "mt-4",
                innerHTML: qrCode.value
              }, null, 8, _hoisted_12),
              setupKey.value ? (openBlock(), createElementBlock("div", _hoisted_13, [
                createBaseVNode("p", _hoisted_14, [
                  _hoisted_15,
                  createBaseVNode("span", { innerHTML: setupKey.value }, null, 8, _hoisted_16)
                ])
              ])) : createCommentVNode("", true),
              confirming.value ? (openBlock(), createElementBlock("div", _hoisted_17, [
                createVNode(_sfc_main$8, {
                  for: "code",
                  value: "Code"
                }),
                createVNode(_sfc_main$2, {
                  id: "code",
                  modelValue: unref(confirmationForm).code,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(confirmationForm).code = $event),
                  type: "text",
                  name: "code",
                  class: "block mt-1 w-1/2",
                  inputmode: "numeric",
                  autofocus: "",
                  autocomplete: "one-time-code",
                  onKeyup: withKeys(confirmTwoFactorAuthentication, ["enter"])
                }, null, 8, ["modelValue", "onKeyup"]),
                createVNode(_sfc_main$3, {
                  message: unref(confirmationForm).errors.code,
                  class: "mt-2"
                }, null, 8, ["message"])
              ])) : createCommentVNode("", true)
            ])) : createCommentVNode("", true),
            recoveryCodes.value.length > 0 && !confirming.value ? (openBlock(), createElementBlock("div", _hoisted_18, [
              _hoisted_19,
              createBaseVNode("div", _hoisted_20, [
                (openBlock(true), createElementBlock(Fragment, null, renderList(recoveryCodes.value, (code) => {
                  return openBlock(), createElementBlock("div", { key: code }, toDisplayString(code), 1);
                }), 128))
              ])
            ])) : createCommentVNode("", true)
          ])) : createCommentVNode("", true),
          createBaseVNode("div", _hoisted_21, [
            !unref(twoFactorEnabled) ? (openBlock(), createElementBlock("div", _hoisted_22, [
              createVNode(_sfc_main$1, { onConfirmed: enableTwoFactorAuthentication }, {
                default: withCtx(() => [
                  createVNode(_sfc_main$5, {
                    type: "button",
                    class: normalizeClass({ "opacity-25": enabling.value }),
                    disabled: enabling.value
                  }, {
                    default: withCtx(() => [
                      _hoisted_23
                    ]),
                    _: 1
                  }, 8, ["class", "disabled"])
                ]),
                _: 1
              })
            ])) : (openBlock(), createElementBlock("div", _hoisted_24, [
              createVNode(_sfc_main$1, { onConfirmed: confirmTwoFactorAuthentication }, {
                default: withCtx(() => [
                  confirming.value ? (openBlock(), createBlock(_sfc_main$5, {
                    key: 0,
                    type: "button",
                    class: normalizeClass(["mr-3", { "opacity-25": enabling.value }]),
                    disabled: enabling.value
                  }, {
                    default: withCtx(() => [
                      _hoisted_25
                    ]),
                    _: 1
                  }, 8, ["class", "disabled"])) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_sfc_main$1, { onConfirmed: regenerateRecoveryCodes }, {
                default: withCtx(() => [
                  recoveryCodes.value.length > 0 && !confirming.value ? (openBlock(), createBlock(_sfc_main$4, {
                    key: 0,
                    class: "mr-3"
                  }, {
                    default: withCtx(() => [
                      _hoisted_26
                    ]),
                    _: 1
                  })) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_sfc_main$1, { onConfirmed: showRecoveryCodes }, {
                default: withCtx(() => [
                  recoveryCodes.value.length === 0 && !confirming.value ? (openBlock(), createBlock(_sfc_main$4, {
                    key: 0,
                    class: "mr-3"
                  }, {
                    default: withCtx(() => [
                      _hoisted_27
                    ]),
                    _: 1
                  })) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_sfc_main$1, { onConfirmed: disableTwoFactorAuthentication }, {
                default: withCtx(() => [
                  confirming.value ? (openBlock(), createBlock(_sfc_main$4, {
                    key: 0,
                    class: normalizeClass({ "opacity-25": disabling.value }),
                    disabled: disabling.value
                  }, {
                    default: withCtx(() => [
                      _hoisted_28
                    ]),
                    _: 1
                  }, 8, ["class", "disabled"])) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_sfc_main$1, { onConfirmed: disableTwoFactorAuthentication }, {
                default: withCtx(() => [
                  !confirming.value ? (openBlock(), createBlock(_sfc_main$9, {
                    key: 0,
                    class: normalizeClass({ "opacity-25": disabling.value }),
                    disabled: disabling.value
                  }, {
                    default: withCtx(() => [
                      _hoisted_29
                    ]),
                    _: 1
                  }, 8, ["class", "disabled"])) : createCommentVNode("", true)
                ]),
                _: 1
              })
            ]))
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
//# sourceMappingURL=TwoFactorAuthenticationForm.53df2214.js.map
