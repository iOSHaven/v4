import { u as useForm } from "./app.73e7ef0c.js";
import { _ as _sfc_main$8 } from "./ActionMessage.a358f0ed.js";
import { _ as _sfc_main$2 } from "./Modal.0bd03d02.js";
import { _ as _sfc_main$9 } from "./Button.05052283.js";
import { _ as _sfc_main$4 } from "./ConfirmationModal.115037dc.js";
import { _ as _sfc_main$b } from "./DangerButton.305a98be.js";
import { _ as _sfc_main$3 } from "./DialogModal.13f682f7.js";
import { _ as _sfc_main$1 } from "./FormSection.b57bd017.js";
import { _ as _sfc_main$6 } from "./Input.4d723479.js";
import { _ as _sfc_main$c } from "./Checkbox.e7d12896.js";
import { _ as _sfc_main$7 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$5 } from "./Label.6120fd41.js";
import { _ as _sfc_main$a } from "./SecondaryButton.2caec6f6.js";
import { J as JetSectionBorder } from "./SectionBorder.88326c21.js";
import { k as ref, ay as openBlock, W as createElementBlock, a2 as createVNode, b1 as withCtx, X as createBaseVNode, V as createCommentVNode, x as unref, I as Fragment, aE as renderList, A as normalizeClass, D as toDisplayString, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Create API Token ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" API tokens allow third-party services to authenticate with our application on your behalf. ");
const _hoisted_3 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_4 = {
  key: 0,
  class: "col-span-6"
};
const _hoisted_5 = { class: "mt-2 grid grid-cols-1 md:grid-cols-2 gap-4" };
const _hoisted_6 = { class: "flex items-center" };
const _hoisted_7 = { class: "ml-2 text-sm text-gray-600" };
const _hoisted_8 = /* @__PURE__ */ createTextVNode(" Created. ");
const _hoisted_9 = /* @__PURE__ */ createTextVNode(" Create ");
const _hoisted_10 = { key: 0 };
const _hoisted_11 = { class: "mt-10 sm:mt-0" };
const _hoisted_12 = /* @__PURE__ */ createTextVNode(" Manage API Tokens ");
const _hoisted_13 = /* @__PURE__ */ createTextVNode(" You may delete any of your existing tokens if they are no longer needed. ");
const _hoisted_14 = { class: "space-y-6" };
const _hoisted_15 = { class: "flex items-center" };
const _hoisted_16 = {
  key: 0,
  class: "text-sm text-gray-400"
};
const _hoisted_17 = ["onClick"];
const _hoisted_18 = ["onClick"];
const _hoisted_19 = /* @__PURE__ */ createTextVNode(" API Token ");
const _hoisted_20 = /* @__PURE__ */ createBaseVNode("div", null, " Please copy your new API token. For your security, it won't be shown again. ", -1);
const _hoisted_21 = {
  key: 0,
  class: "mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500"
};
const _hoisted_22 = /* @__PURE__ */ createTextVNode(" Close ");
const _hoisted_23 = /* @__PURE__ */ createTextVNode(" API Token Permissions ");
const _hoisted_24 = { class: "grid grid-cols-1 md:grid-cols-2 gap-4" };
const _hoisted_25 = { class: "flex items-center" };
const _hoisted_26 = { class: "ml-2 text-sm text-gray-600" };
const _hoisted_27 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_28 = /* @__PURE__ */ createTextVNode(" Save ");
const _hoisted_29 = /* @__PURE__ */ createTextVNode(" Delete API Token ");
const _hoisted_30 = /* @__PURE__ */ createTextVNode(" Are you sure you would like to delete this API token? ");
const _hoisted_31 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_32 = /* @__PURE__ */ createTextVNode(" Delete ");
const _sfc_main = {
  __name: "ApiTokenManager",
  props: {
    tokens: Array,
    availablePermissions: Array,
    defaultPermissions: Array
  },
  setup(__props) {
    const props = __props;
    const createApiTokenForm = useForm({
      name: "",
      permissions: props.defaultPermissions
    });
    const updateApiTokenForm = useForm({
      permissions: []
    });
    const deleteApiTokenForm = useForm();
    const displayingToken = ref(false);
    const managingPermissionsFor = ref(null);
    const apiTokenBeingDeleted = ref(null);
    const createApiToken = () => {
      createApiTokenForm.post(route("api-tokens.store"), {
        preserveScroll: true,
        onSuccess: () => {
          displayingToken.value = true;
          createApiTokenForm.reset();
        }
      });
    };
    const manageApiTokenPermissions = (token) => {
      updateApiTokenForm.permissions = token.abilities;
      managingPermissionsFor.value = token;
    };
    const updateApiToken = () => {
      updateApiTokenForm.put(route("api-tokens.update", managingPermissionsFor.value), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => managingPermissionsFor.value = null
      });
    };
    const confirmApiTokenDeletion = (token) => {
      apiTokenBeingDeleted.value = token;
    };
    const deleteApiToken = () => {
      deleteApiTokenForm.delete(route("api-tokens.destroy", apiTokenBeingDeleted.value), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => apiTokenBeingDeleted.value = null
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", null, [
        createVNode(_sfc_main$1, { onSubmitted: createApiToken }, {
          title: withCtx(() => [
            _hoisted_1
          ]),
          description: withCtx(() => [
            _hoisted_2
          ]),
          form: withCtx(() => [
            createBaseVNode("div", _hoisted_3, [
              createVNode(_sfc_main$5, {
                for: "name",
                value: "Name"
              }),
              createVNode(_sfc_main$6, {
                id: "name",
                modelValue: unref(createApiTokenForm).name,
                "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(createApiTokenForm).name = $event),
                type: "text",
                class: "mt-1 block w-full",
                autofocus: ""
              }, null, 8, ["modelValue"]),
              createVNode(_sfc_main$7, {
                message: unref(createApiTokenForm).errors.name,
                class: "mt-2"
              }, null, 8, ["message"])
            ]),
            __props.availablePermissions.length > 0 ? (openBlock(), createElementBlock("div", _hoisted_4, [
              createVNode(_sfc_main$5, {
                for: "permissions",
                value: "Permissions"
              }),
              createBaseVNode("div", _hoisted_5, [
                (openBlock(true), createElementBlock(Fragment, null, renderList(__props.availablePermissions, (permission) => {
                  return openBlock(), createElementBlock("div", { key: permission }, [
                    createBaseVNode("label", _hoisted_6, [
                      createVNode(_sfc_main$c, {
                        checked: unref(createApiTokenForm).permissions,
                        "onUpdate:checked": _cache[1] || (_cache[1] = ($event) => unref(createApiTokenForm).permissions = $event),
                        value: permission
                      }, null, 8, ["checked", "value"]),
                      createBaseVNode("span", _hoisted_7, toDisplayString(permission), 1)
                    ])
                  ]);
                }), 128))
              ])
            ])) : createCommentVNode("", true)
          ]),
          actions: withCtx(() => [
            createVNode(_sfc_main$8, {
              on: unref(createApiTokenForm).recentlySuccessful,
              class: "mr-3"
            }, {
              default: withCtx(() => [
                _hoisted_8
              ]),
              _: 1
            }, 8, ["on"]),
            createVNode(_sfc_main$9, {
              class: normalizeClass({ "opacity-25": unref(createApiTokenForm).processing }),
              disabled: unref(createApiTokenForm).processing
            }, {
              default: withCtx(() => [
                _hoisted_9
              ]),
              _: 1
            }, 8, ["class", "disabled"])
          ]),
          _: 1
        }),
        __props.tokens.length > 0 ? (openBlock(), createElementBlock("div", _hoisted_10, [
          createVNode(JetSectionBorder),
          createBaseVNode("div", _hoisted_11, [
            createVNode(_sfc_main$2, null, {
              title: withCtx(() => [
                _hoisted_12
              ]),
              description: withCtx(() => [
                _hoisted_13
              ]),
              content: withCtx(() => [
                createBaseVNode("div", _hoisted_14, [
                  (openBlock(true), createElementBlock(Fragment, null, renderList(__props.tokens, (token) => {
                    return openBlock(), createElementBlock("div", {
                      key: token.id,
                      class: "flex items-center justify-between"
                    }, [
                      createBaseVNode("div", null, toDisplayString(token.name), 1),
                      createBaseVNode("div", _hoisted_15, [
                        token.last_used_ago ? (openBlock(), createElementBlock("div", _hoisted_16, " Last used " + toDisplayString(token.last_used_ago), 1)) : createCommentVNode("", true),
                        __props.availablePermissions.length > 0 ? (openBlock(), createElementBlock("button", {
                          key: 1,
                          class: "cursor-pointer ml-6 text-sm text-gray-400 underline",
                          onClick: ($event) => manageApiTokenPermissions(token)
                        }, " Permissions ", 8, _hoisted_17)) : createCommentVNode("", true),
                        createBaseVNode("button", {
                          class: "cursor-pointer ml-6 text-sm text-red-500",
                          onClick: ($event) => confirmApiTokenDeletion(token)
                        }, " Delete ", 8, _hoisted_18)
                      ])
                    ]);
                  }), 128))
                ])
              ]),
              _: 1
            })
          ])
        ])) : createCommentVNode("", true),
        createVNode(_sfc_main$3, {
          show: displayingToken.value,
          onClose: _cache[3] || (_cache[3] = ($event) => displayingToken.value = false)
        }, {
          title: withCtx(() => [
            _hoisted_19
          ]),
          content: withCtx(() => [
            _hoisted_20,
            _ctx.$page.props.jetstream.flash.token ? (openBlock(), createElementBlock("div", _hoisted_21, toDisplayString(_ctx.$page.props.jetstream.flash.token), 1)) : createCommentVNode("", true)
          ]),
          footer: withCtx(() => [
            createVNode(_sfc_main$a, {
              onClick: _cache[2] || (_cache[2] = ($event) => displayingToken.value = false)
            }, {
              default: withCtx(() => [
                _hoisted_22
              ]),
              _: 1
            })
          ]),
          _: 1
        }, 8, ["show"]),
        createVNode(_sfc_main$3, {
          show: managingPermissionsFor.value != null,
          onClose: _cache[6] || (_cache[6] = ($event) => managingPermissionsFor.value = null)
        }, {
          title: withCtx(() => [
            _hoisted_23
          ]),
          content: withCtx(() => [
            createBaseVNode("div", _hoisted_24, [
              (openBlock(true), createElementBlock(Fragment, null, renderList(__props.availablePermissions, (permission) => {
                return openBlock(), createElementBlock("div", { key: permission }, [
                  createBaseVNode("label", _hoisted_25, [
                    createVNode(_sfc_main$c, {
                      checked: unref(updateApiTokenForm).permissions,
                      "onUpdate:checked": _cache[4] || (_cache[4] = ($event) => unref(updateApiTokenForm).permissions = $event),
                      value: permission
                    }, null, 8, ["checked", "value"]),
                    createBaseVNode("span", _hoisted_26, toDisplayString(permission), 1)
                  ])
                ]);
              }), 128))
            ])
          ]),
          footer: withCtx(() => [
            createVNode(_sfc_main$a, {
              onClick: _cache[5] || (_cache[5] = ($event) => managingPermissionsFor.value = null)
            }, {
              default: withCtx(() => [
                _hoisted_27
              ]),
              _: 1
            }),
            createVNode(_sfc_main$9, {
              class: normalizeClass(["ml-3", { "opacity-25": unref(updateApiTokenForm).processing }]),
              disabled: unref(updateApiTokenForm).processing,
              onClick: updateApiToken
            }, {
              default: withCtx(() => [
                _hoisted_28
              ]),
              _: 1
            }, 8, ["class", "disabled"])
          ]),
          _: 1
        }, 8, ["show"]),
        createVNode(_sfc_main$4, {
          show: apiTokenBeingDeleted.value != null,
          onClose: _cache[8] || (_cache[8] = ($event) => apiTokenBeingDeleted.value = null)
        }, {
          title: withCtx(() => [
            _hoisted_29
          ]),
          content: withCtx(() => [
            _hoisted_30
          ]),
          footer: withCtx(() => [
            createVNode(_sfc_main$a, {
              onClick: _cache[7] || (_cache[7] = ($event) => apiTokenBeingDeleted.value = null)
            }, {
              default: withCtx(() => [
                _hoisted_31
              ]),
              _: 1
            }),
            createVNode(_sfc_main$b, {
              class: normalizeClass(["ml-3", { "opacity-25": unref(deleteApiTokenForm).processing }]),
              disabled: unref(deleteApiTokenForm).processing,
              onClick: deleteApiToken
            }, {
              default: withCtx(() => [
                _hoisted_32
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
export {
  _sfc_main as default
};
//# sourceMappingURL=ApiTokenManager.669af433.js.map
