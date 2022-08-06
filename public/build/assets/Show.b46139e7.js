import { _ as _sfc_main$1 } from "./AppLayout.210417b5.js";
import _sfc_main$4 from "./DeleteTeamForm.ace775a1.js";
import { J as JetSectionBorder } from "./SectionBorder.88326c21.js";
import _sfc_main$3 from "./TeamMemberManager.717ba600.js";
import _sfc_main$2 from "./UpdateTeamNameForm.d120506c.js";
import { ay as openBlock, U as createBlock, b1 as withCtx, X as createBaseVNode, a2 as createVNode, W as createElementBlock, I as Fragment, V as createCommentVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import "./app.73e7ef0c.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./Modal.0bd03d02.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
import "./ConfirmationModal.115037dc.js";
import "./DangerButton.305a98be.js";
import "./SecondaryButton.2caec6f6.js";
import "./ActionMessage.a358f0ed.js";
import "./Button.05052283.js";
import "./DialogModal.13f682f7.js";
import "./FormSection.b57bd017.js";
import "./Input.4d723479.js";
import "./InputError.c01bb545.js";
import "./Label.6120fd41.js";
const _hoisted_1 = /* @__PURE__ */ createBaseVNode("h2", { class: "font-semibold text-xl text-gray-800 leading-tight" }, " Team Settings ", -1);
const _hoisted_2 = { class: "max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" };
const _sfc_main = {
  __name: "Show",
  props: {
    team: Object,
    availableRoles: Array,
    permissions: Object
  },
  setup(__props) {
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, { title: "Team Settings" }, {
        header: withCtx(() => [
          _hoisted_1
        ]),
        default: withCtx(() => [
          createBaseVNode("div", null, [
            createBaseVNode("div", _hoisted_2, [
              createVNode(_sfc_main$2, {
                team: __props.team,
                permissions: __props.permissions
              }, null, 8, ["team", "permissions"]),
              createVNode(_sfc_main$3, {
                class: "mt-10 sm:mt-0",
                team: __props.team,
                "available-roles": __props.availableRoles,
                "user-permissions": __props.permissions
              }, null, 8, ["team", "available-roles", "user-permissions"]),
              __props.permissions.canDeleteTeam && !__props.team.personal_team ? (openBlock(), createElementBlock(Fragment, { key: 0 }, [
                createVNode(JetSectionBorder),
                createVNode(_sfc_main$4, {
                  class: "mt-10 sm:mt-0",
                  team: __props.team
                }, null, 8, ["team"])
              ], 64)) : createCommentVNode("", true)
            ])
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
//# sourceMappingURL=Show.b46139e7.js.map
