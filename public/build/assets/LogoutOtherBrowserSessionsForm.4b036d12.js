import { k as ref, ay as openBlock, U as createBlock, b1 as withCtx, W as createElementBlock, I as Fragment, aE as renderList, V as createCommentVNode, X as createBaseVNode, a2 as createVNode, x as unref, bo as withKeys, A as normalizeClass, a1 as createTextVNode, D as toDisplayString } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm } from "./app.73e7ef0c.js";
import { _ as _sfc_main$3 } from "./ActionMessage.a358f0ed.js";
import { _ as _sfc_main$1 } from "./Modal.0bd03d02.js";
import { _ as _sfc_main$2 } from "./Button.05052283.js";
import { _ as _sfc_main$7 } from "./DialogModal.13f682f7.js";
import { _ as _sfc_main$4 } from "./Input.4d723479.js";
import { _ as _sfc_main$5 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$6 } from "./SecondaryButton.2caec6f6.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Browser Sessions ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Manage and log out your active sessions on other browsers and devices. ");
const _hoisted_3 = /* @__PURE__ */ createBaseVNode("div", { class: "max-w-xl text-sm text-gray-600" }, " If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password. ", -1);
const _hoisted_4 = {
  key: 0,
  class: "mt-5 space-y-6"
};
const _hoisted_5 = {
  key: 0,
  fill: "none",
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  "stroke-width": "2",
  viewBox: "0 0 24 24",
  stroke: "currentColor",
  class: "w-8 h-8 text-gray-500"
};
const _hoisted_6 = /* @__PURE__ */ createBaseVNode("path", { d: "M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" }, null, -1);
const _hoisted_7 = [
  _hoisted_6
];
const _hoisted_8 = {
  key: 1,
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24",
  "stroke-width": "2",
  stroke: "currentColor",
  fill: "none",
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  class: "w-8 h-8 text-gray-500"
};
const _hoisted_9 = /* @__PURE__ */ createBaseVNode("path", {
  d: "M0 0h24v24H0z",
  stroke: "none"
}, null, -1);
const _hoisted_10 = /* @__PURE__ */ createBaseVNode("rect", {
  x: "7",
  y: "4",
  width: "10",
  height: "16",
  rx: "1"
}, null, -1);
const _hoisted_11 = /* @__PURE__ */ createBaseVNode("path", { d: "M11 5h2M12 17v.01" }, null, -1);
const _hoisted_12 = [
  _hoisted_9,
  _hoisted_10,
  _hoisted_11
];
const _hoisted_13 = { class: "ml-3" };
const _hoisted_14 = { class: "text-sm text-gray-600" };
const _hoisted_15 = { class: "text-xs text-gray-500" };
const _hoisted_16 = {
  key: 0,
  class: "text-green-500 font-semibold"
};
const _hoisted_17 = { key: 1 };
const _hoisted_18 = { class: "flex items-center mt-5" };
const _hoisted_19 = /* @__PURE__ */ createTextVNode(" Log Out Other Browser Sessions ");
const _hoisted_20 = /* @__PURE__ */ createTextVNode(" Done. ");
const _hoisted_21 = /* @__PURE__ */ createTextVNode(" Log Out Other Browser Sessions ");
const _hoisted_22 = /* @__PURE__ */ createTextVNode(" Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices. ");
const _hoisted_23 = { class: "mt-4" };
const _hoisted_24 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_25 = /* @__PURE__ */ createTextVNode(" Log Out Other Browser Sessions ");
const _sfc_main = {
  __name: "LogoutOtherBrowserSessionsForm",
  props: {
    sessions: Array
  },
  setup(__props) {
    const confirmingLogout = ref(false);
    const passwordInput = ref(null);
    const form = useForm({
      password: ""
    });
    const confirmLogout = () => {
      confirmingLogout.value = true;
      setTimeout(() => passwordInput.value.focus(), 250);
    };
    const logoutOtherBrowserSessions = () => {
      form.delete(route("other-browser-sessions.destroy"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset()
      });
    };
    const closeModal = () => {
      confirmingLogout.value = false;
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
          __props.sessions.length > 0 ? (openBlock(), createElementBlock("div", _hoisted_4, [
            (openBlock(true), createElementBlock(Fragment, null, renderList(__props.sessions, (session, i) => {
              return openBlock(), createElementBlock("div", {
                key: i,
                class: "flex items-center"
              }, [
                createBaseVNode("div", null, [
                  session.agent.is_desktop ? (openBlock(), createElementBlock("svg", _hoisted_5, _hoisted_7)) : (openBlock(), createElementBlock("svg", _hoisted_8, _hoisted_12))
                ]),
                createBaseVNode("div", _hoisted_13, [
                  createBaseVNode("div", _hoisted_14, toDisplayString(session.agent.platform ? session.agent.platform : "Unknown") + " - " + toDisplayString(session.agent.browser ? session.agent.browser : "Unknown"), 1),
                  createBaseVNode("div", null, [
                    createBaseVNode("div", _hoisted_15, [
                      createTextVNode(toDisplayString(session.ip_address) + ", ", 1),
                      session.is_current_device ? (openBlock(), createElementBlock("span", _hoisted_16, "This device")) : (openBlock(), createElementBlock("span", _hoisted_17, "Last active " + toDisplayString(session.last_active), 1))
                    ])
                  ])
                ])
              ]);
            }), 128))
          ])) : createCommentVNode("", true),
          createBaseVNode("div", _hoisted_18, [
            createVNode(_sfc_main$2, { onClick: confirmLogout }, {
              default: withCtx(() => [
                _hoisted_19
              ]),
              _: 1
            }),
            createVNode(_sfc_main$3, {
              on: unref(form).recentlySuccessful,
              class: "ml-3"
            }, {
              default: withCtx(() => [
                _hoisted_20
              ]),
              _: 1
            }, 8, ["on"])
          ]),
          createVNode(_sfc_main$7, {
            show: confirmingLogout.value,
            onClose: closeModal
          }, {
            title: withCtx(() => [
              _hoisted_21
            ]),
            content: withCtx(() => [
              _hoisted_22,
              createBaseVNode("div", _hoisted_23, [
                createVNode(_sfc_main$4, {
                  ref_key: "passwordInput",
                  ref: passwordInput,
                  modelValue: unref(form).password,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).password = $event),
                  type: "password",
                  class: "mt-1 block w-3/4",
                  placeholder: "Password",
                  onKeyup: withKeys(logoutOtherBrowserSessions, ["enter"])
                }, null, 8, ["modelValue", "onKeyup"]),
                createVNode(_sfc_main$5, {
                  message: unref(form).errors.password,
                  class: "mt-2"
                }, null, 8, ["message"])
              ])
            ]),
            footer: withCtx(() => [
              createVNode(_sfc_main$6, { onClick: closeModal }, {
                default: withCtx(() => [
                  _hoisted_24
                ]),
                _: 1
              }),
              createVNode(_sfc_main$2, {
                class: normalizeClass(["ml-3", { "opacity-25": unref(form).processing }]),
                disabled: unref(form).processing,
                onClick: logoutOtherBrowserSessions
              }, {
                default: withCtx(() => [
                  _hoisted_25
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
//# sourceMappingURL=LogoutOtherBrowserSessionsForm.4b036d12.js.map
