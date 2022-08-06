import { u as useForm } from "./app.73e7ef0c.js";
import { _ as _sfc_main$5 } from "./Button.05052283.js";
import { _ as _sfc_main$1 } from "./FormSection.b57bd017.js";
import { _ as _sfc_main$3 } from "./Input.4d723479.js";
import { _ as _sfc_main$4 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$2 } from "./Label.6120fd41.js";
import { ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, a2 as createVNode, D as toDisplayString, x as unref, A as normalizeClass, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Team Details ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Create a new team to collaborate with others on projects. ");
const _hoisted_3 = { class: "col-span-6" };
const _hoisted_4 = { class: "flex items-center mt-2" };
const _hoisted_5 = ["src", "alt"];
const _hoisted_6 = { class: "ml-4 leading-tight" };
const _hoisted_7 = { class: "text-sm text-gray-700" };
const _hoisted_8 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_9 = /* @__PURE__ */ createTextVNode(" Create ");
const _sfc_main = {
  __name: "CreateTeamForm",
  setup(__props) {
    const form = useForm({
      name: ""
    });
    const createTeam = () => {
      form.post(route("teams.store"), {
        errorBag: "createTeam",
        preserveScroll: true
      });
    };
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, { onSubmitted: createTeam }, {
        title: withCtx(() => [
          _hoisted_1
        ]),
        description: withCtx(() => [
          _hoisted_2
        ]),
        form: withCtx(() => [
          createBaseVNode("div", _hoisted_3, [
            createVNode(_sfc_main$2, { value: "Team Owner" }),
            createBaseVNode("div", _hoisted_4, [
              createBaseVNode("img", {
                class: "object-cover w-12 h-12 rounded-full",
                src: _ctx.$page.props.user.profile_photo_url,
                alt: _ctx.$page.props.user.name
              }, null, 8, _hoisted_5),
              createBaseVNode("div", _hoisted_6, [
                createBaseVNode("div", null, toDisplayString(_ctx.$page.props.user.name), 1),
                createBaseVNode("div", _hoisted_7, toDisplayString(_ctx.$page.props.user.email), 1)
              ])
            ])
          ]),
          createBaseVNode("div", _hoisted_8, [
            createVNode(_sfc_main$2, {
              for: "name",
              value: "Team Name"
            }),
            createVNode(_sfc_main$3, {
              id: "name",
              modelValue: unref(form).name,
              "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).name = $event),
              type: "text",
              class: "block w-full mt-1",
              autofocus: ""
            }, null, 8, ["modelValue"]),
            createVNode(_sfc_main$4, {
              message: unref(form).errors.name,
              class: "mt-2"
            }, null, 8, ["message"])
          ])
        ]),
        actions: withCtx(() => [
          createVNode(_sfc_main$5, {
            class: normalizeClass({ "opacity-25": unref(form).processing }),
            disabled: unref(form).processing
          }, {
            default: withCtx(() => [
              _hoisted_9
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
//# sourceMappingURL=CreateTeamForm.60e03bbb.js.map
