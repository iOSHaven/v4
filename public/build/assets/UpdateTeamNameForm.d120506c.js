import { u as useForm } from "./app.73e7ef0c.js";
import { _ as _sfc_main$2 } from "./ActionMessage.a358f0ed.js";
import { _ as _sfc_main$3 } from "./Button.05052283.js";
import { _ as _sfc_main$1 } from "./FormSection.b57bd017.js";
import { _ as _sfc_main$5 } from "./Input.4d723479.js";
import { _ as _sfc_main$6 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$4 } from "./Label.6120fd41.js";
import { ay as openBlock, U as createBlock, $ as createSlots, b1 as withCtx, a2 as createVNode, x as unref, A as normalizeClass, X as createBaseVNode, D as toDisplayString, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Team Name ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" The team's name and owner information. ");
const _hoisted_3 = { class: "col-span-6" };
const _hoisted_4 = { class: "flex items-center mt-2" };
const _hoisted_5 = ["src", "alt"];
const _hoisted_6 = { class: "ml-4 leading-tight" };
const _hoisted_7 = { class: "text-gray-700 text-sm" };
const _hoisted_8 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_9 = /* @__PURE__ */ createTextVNode(" Saved. ");
const _hoisted_10 = /* @__PURE__ */ createTextVNode(" Save ");
const _sfc_main = {
  __name: "UpdateTeamNameForm",
  props: {
    team: Object,
    permissions: Object
  },
  setup(__props) {
    const props = __props;
    const form = useForm({
      name: props.team.name
    });
    const updateTeamName = () => {
      form.put(route("teams.update", props.team), {
        errorBag: "updateTeamName",
        preserveScroll: true
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, { onSubmitted: updateTeamName }, createSlots({
        title: withCtx(() => [
          _hoisted_1
        ]),
        description: withCtx(() => [
          _hoisted_2
        ]),
        form: withCtx(() => [
          createBaseVNode("div", _hoisted_3, [
            createVNode(_sfc_main$4, { value: "Team Owner" }),
            createBaseVNode("div", _hoisted_4, [
              createBaseVNode("img", {
                class: "w-12 h-12 rounded-full object-cover",
                src: __props.team.owner.profile_photo_url,
                alt: __props.team.owner.name
              }, null, 8, _hoisted_5),
              createBaseVNode("div", _hoisted_6, [
                createBaseVNode("div", null, toDisplayString(__props.team.owner.name), 1),
                createBaseVNode("div", _hoisted_7, toDisplayString(__props.team.owner.email), 1)
              ])
            ])
          ]),
          createBaseVNode("div", _hoisted_8, [
            createVNode(_sfc_main$4, {
              for: "name",
              value: "Team Name"
            }),
            createVNode(_sfc_main$5, {
              id: "name",
              modelValue: unref(form).name,
              "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).name = $event),
              type: "text",
              class: "mt-1 block w-full",
              disabled: !__props.permissions.canUpdateTeam
            }, null, 8, ["modelValue", "disabled"]),
            createVNode(_sfc_main$6, {
              message: unref(form).errors.name,
              class: "mt-2"
            }, null, 8, ["message"])
          ])
        ]),
        _: 2
      }, [
        __props.permissions.canUpdateTeam ? {
          name: "actions",
          fn: withCtx(() => [
            createVNode(_sfc_main$2, {
              on: unref(form).recentlySuccessful,
              class: "mr-3"
            }, {
              default: withCtx(() => [
                _hoisted_9
              ]),
              _: 1
            }, 8, ["on"]),
            createVNode(_sfc_main$3, {
              class: normalizeClass({ "opacity-25": unref(form).processing }),
              disabled: unref(form).processing
            }, {
              default: withCtx(() => [
                _hoisted_10
              ]),
              _: 1
            }, 8, ["class", "disabled"])
          ])
        } : void 0
      ]), 1024);
    };
  }
};
export {
  _sfc_main as default
};
//# sourceMappingURL=UpdateTeamNameForm.d120506c.js.map
