import { u as useForm } from "./app.73e7ef0c.js";
import { _ as _sfc_main$1 } from "./Modal.0bd03d02.js";
import { _ as _sfc_main$4 } from "./ConfirmationModal.115037dc.js";
import { _ as _sfc_main$2 } from "./DangerButton.305a98be.js";
import { _ as _sfc_main$3 } from "./SecondaryButton.2caec6f6.js";
import { k as ref, ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, a2 as createVNode, A as normalizeClass, x as unref, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Delete Team ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Permanently delete this team. ");
const _hoisted_3 = /* @__PURE__ */ createBaseVNode("div", { class: "max-w-xl text-sm text-gray-600" }, " Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain. ", -1);
const _hoisted_4 = { class: "mt-5" };
const _hoisted_5 = /* @__PURE__ */ createTextVNode(" Delete Team ");
const _hoisted_6 = /* @__PURE__ */ createTextVNode(" Delete Team ");
const _hoisted_7 = /* @__PURE__ */ createTextVNode(" Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted. ");
const _hoisted_8 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_9 = /* @__PURE__ */ createTextVNode(" Delete Team ");
const _sfc_main = {
  __name: "DeleteTeamForm",
  props: {
    team: Object
  },
  setup(__props) {
    const props = __props;
    const confirmingTeamDeletion = ref(false);
    const form = useForm();
    const confirmTeamDeletion = () => {
      confirmingTeamDeletion.value = true;
    };
    const deleteTeam = () => {
      form.delete(route("teams.destroy", props.team), {
        errorBag: "deleteTeam"
      });
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
            createVNode(_sfc_main$2, { onClick: confirmTeamDeletion }, {
              default: withCtx(() => [
                _hoisted_5
              ]),
              _: 1
            })
          ]),
          createVNode(_sfc_main$4, {
            show: confirmingTeamDeletion.value,
            onClose: _cache[1] || (_cache[1] = ($event) => confirmingTeamDeletion.value = false)
          }, {
            title: withCtx(() => [
              _hoisted_6
            ]),
            content: withCtx(() => [
              _hoisted_7
            ]),
            footer: withCtx(() => [
              createVNode(_sfc_main$3, {
                onClick: _cache[0] || (_cache[0] = ($event) => confirmingTeamDeletion.value = false)
              }, {
                default: withCtx(() => [
                  _hoisted_8
                ]),
                _: 1
              }),
              createVNode(_sfc_main$2, {
                class: normalizeClass(["ml-3", { "opacity-25": unref(form).processing }]),
                disabled: unref(form).processing,
                onClick: deleteTeam
              }, {
                default: withCtx(() => [
                  _hoisted_9
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
//# sourceMappingURL=DeleteTeamForm.ace775a1.js.map
