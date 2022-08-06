import { u as useForm, a as usePage, d as dist } from "./app.73e7ef0c.js";
import { _ as _sfc_main$8 } from "./ActionMessage.a358f0ed.js";
import { _ as _sfc_main$2 } from "./Modal.0bd03d02.js";
import { _ as _sfc_main$9 } from "./Button.05052283.js";
import { _ as _sfc_main$4 } from "./ConfirmationModal.115037dc.js";
import { _ as _sfc_main$b } from "./DangerButton.305a98be.js";
import { _ as _sfc_main$3 } from "./DialogModal.13f682f7.js";
import { _ as _sfc_main$1 } from "./FormSection.b57bd017.js";
import { _ as _sfc_main$6 } from "./Input.4d723479.js";
import { _ as _sfc_main$7 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$5 } from "./Label.6120fd41.js";
import { _ as _sfc_main$a } from "./SecondaryButton.2caec6f6.js";
import { J as JetSectionBorder } from "./SectionBorder.88326c21.js";
import { k as ref, ay as openBlock, W as createElementBlock, a2 as createVNode, b1 as withCtx, V as createCommentVNode, X as createBaseVNode, x as unref, I as Fragment, aE as renderList, A as normalizeClass, a1 as createTextVNode, D as toDisplayString } from "./runtime-dom.esm-bundler.3714f197.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = { key: 0 };
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Add Team Member ");
const _hoisted_3 = /* @__PURE__ */ createTextVNode(" Add a new team member to your team, allowing them to collaborate with you. ");
const _hoisted_4 = /* @__PURE__ */ createBaseVNode("div", { class: "col-span-6" }, [
  /* @__PURE__ */ createBaseVNode("div", { class: "max-w-xl text-sm text-gray-600" }, " Please provide the email address of the person you would like to add to this team. ")
], -1);
const _hoisted_5 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_6 = {
  key: 0,
  class: "col-span-6 lg:col-span-4"
};
const _hoisted_7 = { class: "relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer" };
const _hoisted_8 = ["onClick"];
const _hoisted_9 = { class: "flex items-center" };
const _hoisted_10 = {
  key: 0,
  class: "ml-2 h-5 w-5 text-green-400",
  fill: "none",
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  "stroke-width": "2",
  stroke: "currentColor",
  viewBox: "0 0 24 24"
};
const _hoisted_11 = /* @__PURE__ */ createBaseVNode("path", { d: "M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" }, null, -1);
const _hoisted_12 = [
  _hoisted_11
];
const _hoisted_13 = { class: "mt-2 text-xs text-gray-600 text-left" };
const _hoisted_14 = /* @__PURE__ */ createTextVNode(" Added. ");
const _hoisted_15 = /* @__PURE__ */ createTextVNode(" Add ");
const _hoisted_16 = { key: 1 };
const _hoisted_17 = /* @__PURE__ */ createTextVNode(" Pending Team Invitations ");
const _hoisted_18 = /* @__PURE__ */ createTextVNode(" These people have been invited to your team and have been sent an invitation email. They may join the team by accepting the email invitation. ");
const _hoisted_19 = { class: "space-y-6" };
const _hoisted_20 = { class: "text-gray-600" };
const _hoisted_21 = { class: "flex items-center" };
const _hoisted_22 = ["onClick"];
const _hoisted_23 = { key: 2 };
const _hoisted_24 = /* @__PURE__ */ createTextVNode(" Team Members ");
const _hoisted_25 = /* @__PURE__ */ createTextVNode(" All of the people that are part of this team. ");
const _hoisted_26 = { class: "space-y-6" };
const _hoisted_27 = { class: "flex items-center" };
const _hoisted_28 = ["src", "alt"];
const _hoisted_29 = { class: "ml-4" };
const _hoisted_30 = { class: "flex items-center" };
const _hoisted_31 = ["onClick"];
const _hoisted_32 = {
  key: 1,
  class: "ml-2 text-sm text-gray-400"
};
const _hoisted_33 = ["onClick"];
const _hoisted_34 = /* @__PURE__ */ createTextVNode(" Manage Role ");
const _hoisted_35 = { key: 0 };
const _hoisted_36 = { class: "relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer" };
const _hoisted_37 = ["onClick"];
const _hoisted_38 = { class: "flex items-center" };
const _hoisted_39 = {
  key: 0,
  class: "ml-2 h-5 w-5 text-green-400",
  fill: "none",
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  "stroke-width": "2",
  stroke: "currentColor",
  viewBox: "0 0 24 24"
};
const _hoisted_40 = /* @__PURE__ */ createBaseVNode("path", { d: "M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" }, null, -1);
const _hoisted_41 = [
  _hoisted_40
];
const _hoisted_42 = { class: "mt-2 text-xs text-gray-600" };
const _hoisted_43 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_44 = /* @__PURE__ */ createTextVNode(" Save ");
const _hoisted_45 = /* @__PURE__ */ createTextVNode(" Leave Team ");
const _hoisted_46 = /* @__PURE__ */ createTextVNode(" Are you sure you would like to leave this team? ");
const _hoisted_47 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_48 = /* @__PURE__ */ createTextVNode(" Leave ");
const _hoisted_49 = /* @__PURE__ */ createTextVNode(" Remove Team Member ");
const _hoisted_50 = /* @__PURE__ */ createTextVNode(" Are you sure you would like to remove this person from the team? ");
const _hoisted_51 = /* @__PURE__ */ createTextVNode(" Cancel ");
const _hoisted_52 = /* @__PURE__ */ createTextVNode(" Remove ");
const _sfc_main = {
  __name: "TeamMemberManager",
  props: {
    team: Object,
    availableRoles: Array,
    userPermissions: Object
  },
  setup(__props) {
    const props = __props;
    const addTeamMemberForm = useForm({
      email: "",
      role: null
    });
    const updateRoleForm = useForm({
      role: null
    });
    const leaveTeamForm = useForm();
    const removeTeamMemberForm = useForm();
    const currentlyManagingRole = ref(false);
    const managingRoleFor = ref(null);
    const confirmingLeavingTeam = ref(false);
    const teamMemberBeingRemoved = ref(null);
    const addTeamMember = () => {
      addTeamMemberForm.post(route("team-members.store", props.team), {
        errorBag: "addTeamMember",
        preserveScroll: true,
        onSuccess: () => addTeamMemberForm.reset()
      });
    };
    const cancelTeamInvitation = (invitation) => {
      dist.Inertia.delete(route("team-invitations.destroy", invitation), {
        preserveScroll: true
      });
    };
    const manageRole = (teamMember) => {
      managingRoleFor.value = teamMember;
      updateRoleForm.role = teamMember.membership.role;
      currentlyManagingRole.value = true;
    };
    const updateRole = () => {
      updateRoleForm.put(route("team-members.update", [props.team, managingRoleFor.value]), {
        preserveScroll: true,
        onSuccess: () => currentlyManagingRole.value = false
      });
    };
    const confirmLeavingTeam = () => {
      confirmingLeavingTeam.value = true;
    };
    const leaveTeam = () => {
      leaveTeamForm.delete(route("team-members.destroy", [props.team, usePage().props.value.user]));
    };
    const confirmTeamMemberRemoval = (teamMember) => {
      teamMemberBeingRemoved.value = teamMember;
    };
    const removeTeamMember = () => {
      removeTeamMemberForm.delete(route("team-members.destroy", [props.team, teamMemberBeingRemoved.value]), {
        errorBag: "removeTeamMember",
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => teamMemberBeingRemoved.value = null
      });
    };
    const displayableRole = (role) => {
      return props.availableRoles.find((r) => r.key === role).name;
    };
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", null, [
        __props.userPermissions.canAddTeamMembers ? (openBlock(), createElementBlock("div", _hoisted_1, [
          createVNode(JetSectionBorder),
          createVNode(_sfc_main$1, { onSubmitted: addTeamMember }, {
            title: withCtx(() => [
              _hoisted_2
            ]),
            description: withCtx(() => [
              _hoisted_3
            ]),
            form: withCtx(() => [
              _hoisted_4,
              createBaseVNode("div", _hoisted_5, [
                createVNode(_sfc_main$5, {
                  for: "email",
                  value: "Email"
                }),
                createVNode(_sfc_main$6, {
                  id: "email",
                  modelValue: unref(addTeamMemberForm).email,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(addTeamMemberForm).email = $event),
                  type: "email",
                  class: "mt-1 block w-full"
                }, null, 8, ["modelValue"]),
                createVNode(_sfc_main$7, {
                  message: unref(addTeamMemberForm).errors.email,
                  class: "mt-2"
                }, null, 8, ["message"])
              ]),
              __props.availableRoles.length > 0 ? (openBlock(), createElementBlock("div", _hoisted_6, [
                createVNode(_sfc_main$5, {
                  for: "roles",
                  value: "Role"
                }),
                createVNode(_sfc_main$7, {
                  message: unref(addTeamMemberForm).errors.role,
                  class: "mt-2"
                }, null, 8, ["message"]),
                createBaseVNode("div", _hoisted_7, [
                  (openBlock(true), createElementBlock(Fragment, null, renderList(__props.availableRoles, (role, i) => {
                    return openBlock(), createElementBlock("button", {
                      key: role.key,
                      type: "button",
                      class: normalizeClass(["relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200", { "border-t border-gray-200 rounded-t-none": i > 0, "rounded-b-none": i != Object.keys(__props.availableRoles).length - 1 }]),
                      onClick: ($event) => unref(addTeamMemberForm).role = role.key
                    }, [
                      createBaseVNode("div", {
                        class: normalizeClass({ "opacity-50": unref(addTeamMemberForm).role && unref(addTeamMemberForm).role != role.key })
                      }, [
                        createBaseVNode("div", _hoisted_9, [
                          createBaseVNode("div", {
                            class: normalizeClass(["text-sm text-gray-600", { "font-semibold": unref(addTeamMemberForm).role == role.key }])
                          }, toDisplayString(role.name), 3),
                          unref(addTeamMemberForm).role == role.key ? (openBlock(), createElementBlock("svg", _hoisted_10, _hoisted_12)) : createCommentVNode("", true)
                        ]),
                        createBaseVNode("div", _hoisted_13, toDisplayString(role.description), 1)
                      ], 2)
                    ], 10, _hoisted_8);
                  }), 128))
                ])
              ])) : createCommentVNode("", true)
            ]),
            actions: withCtx(() => [
              createVNode(_sfc_main$8, {
                on: unref(addTeamMemberForm).recentlySuccessful,
                class: "mr-3"
              }, {
                default: withCtx(() => [
                  _hoisted_14
                ]),
                _: 1
              }, 8, ["on"]),
              createVNode(_sfc_main$9, {
                class: normalizeClass({ "opacity-25": unref(addTeamMemberForm).processing }),
                disabled: unref(addTeamMemberForm).processing
              }, {
                default: withCtx(() => [
                  _hoisted_15
                ]),
                _: 1
              }, 8, ["class", "disabled"])
            ]),
            _: 1
          })
        ])) : createCommentVNode("", true),
        __props.team.team_invitations.length > 0 && __props.userPermissions.canAddTeamMembers ? (openBlock(), createElementBlock("div", _hoisted_16, [
          createVNode(JetSectionBorder),
          createVNode(_sfc_main$2, { class: "mt-10 sm:mt-0" }, {
            title: withCtx(() => [
              _hoisted_17
            ]),
            description: withCtx(() => [
              _hoisted_18
            ]),
            content: withCtx(() => [
              createBaseVNode("div", _hoisted_19, [
                (openBlock(true), createElementBlock(Fragment, null, renderList(__props.team.team_invitations, (invitation) => {
                  return openBlock(), createElementBlock("div", {
                    key: invitation.id,
                    class: "flex items-center justify-between"
                  }, [
                    createBaseVNode("div", _hoisted_20, toDisplayString(invitation.email), 1),
                    createBaseVNode("div", _hoisted_21, [
                      __props.userPermissions.canRemoveTeamMembers ? (openBlock(), createElementBlock("button", {
                        key: 0,
                        class: "cursor-pointer ml-6 text-sm text-red-500 focus:outline-none",
                        onClick: ($event) => cancelTeamInvitation(invitation)
                      }, " Cancel ", 8, _hoisted_22)) : createCommentVNode("", true)
                    ])
                  ]);
                }), 128))
              ])
            ]),
            _: 1
          })
        ])) : createCommentVNode("", true),
        __props.team.users.length > 0 ? (openBlock(), createElementBlock("div", _hoisted_23, [
          createVNode(JetSectionBorder),
          createVNode(_sfc_main$2, { class: "mt-10 sm:mt-0" }, {
            title: withCtx(() => [
              _hoisted_24
            ]),
            description: withCtx(() => [
              _hoisted_25
            ]),
            content: withCtx(() => [
              createBaseVNode("div", _hoisted_26, [
                (openBlock(true), createElementBlock(Fragment, null, renderList(__props.team.users, (user) => {
                  return openBlock(), createElementBlock("div", {
                    key: user.id,
                    class: "flex items-center justify-between"
                  }, [
                    createBaseVNode("div", _hoisted_27, [
                      createBaseVNode("img", {
                        class: "w-8 h-8 rounded-full",
                        src: user.profile_photo_url,
                        alt: user.name
                      }, null, 8, _hoisted_28),
                      createBaseVNode("div", _hoisted_29, toDisplayString(user.name), 1)
                    ]),
                    createBaseVNode("div", _hoisted_30, [
                      __props.userPermissions.canAddTeamMembers && __props.availableRoles.length ? (openBlock(), createElementBlock("button", {
                        key: 0,
                        class: "ml-2 text-sm text-gray-400 underline",
                        onClick: ($event) => manageRole(user)
                      }, toDisplayString(displayableRole(user.membership.role)), 9, _hoisted_31)) : __props.availableRoles.length ? (openBlock(), createElementBlock("div", _hoisted_32, toDisplayString(displayableRole(user.membership.role)), 1)) : createCommentVNode("", true),
                      _ctx.$page.props.user.id === user.id ? (openBlock(), createElementBlock("button", {
                        key: 2,
                        class: "cursor-pointer ml-6 text-sm text-red-500",
                        onClick: confirmLeavingTeam
                      }, " Leave ")) : createCommentVNode("", true),
                      __props.userPermissions.canRemoveTeamMembers ? (openBlock(), createElementBlock("button", {
                        key: 3,
                        class: "cursor-pointer ml-6 text-sm text-red-500",
                        onClick: ($event) => confirmTeamMemberRemoval(user)
                      }, " Remove ", 8, _hoisted_33)) : createCommentVNode("", true)
                    ])
                  ]);
                }), 128))
              ])
            ]),
            _: 1
          })
        ])) : createCommentVNode("", true),
        createVNode(_sfc_main$3, {
          show: currentlyManagingRole.value,
          onClose: _cache[2] || (_cache[2] = ($event) => currentlyManagingRole.value = false)
        }, {
          title: withCtx(() => [
            _hoisted_34
          ]),
          content: withCtx(() => [
            managingRoleFor.value ? (openBlock(), createElementBlock("div", _hoisted_35, [
              createBaseVNode("div", _hoisted_36, [
                (openBlock(true), createElementBlock(Fragment, null, renderList(__props.availableRoles, (role, i) => {
                  return openBlock(), createElementBlock("button", {
                    key: role.key,
                    type: "button",
                    class: normalizeClass(["relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200", { "border-t border-gray-200 rounded-t-none": i > 0, "rounded-b-none": i !== Object.keys(__props.availableRoles).length - 1 }]),
                    onClick: ($event) => unref(updateRoleForm).role = role.key
                  }, [
                    createBaseVNode("div", {
                      class: normalizeClass({ "opacity-50": unref(updateRoleForm).role && unref(updateRoleForm).role !== role.key })
                    }, [
                      createBaseVNode("div", _hoisted_38, [
                        createBaseVNode("div", {
                          class: normalizeClass(["text-sm text-gray-600", { "font-semibold": unref(updateRoleForm).role === role.key }])
                        }, toDisplayString(role.name), 3),
                        unref(updateRoleForm).role === role.key ? (openBlock(), createElementBlock("svg", _hoisted_39, _hoisted_41)) : createCommentVNode("", true)
                      ]),
                      createBaseVNode("div", _hoisted_42, toDisplayString(role.description), 1)
                    ], 2)
                  ], 10, _hoisted_37);
                }), 128))
              ])
            ])) : createCommentVNode("", true)
          ]),
          footer: withCtx(() => [
            createVNode(_sfc_main$a, {
              onClick: _cache[1] || (_cache[1] = ($event) => currentlyManagingRole.value = false)
            }, {
              default: withCtx(() => [
                _hoisted_43
              ]),
              _: 1
            }),
            createVNode(_sfc_main$9, {
              class: normalizeClass(["ml-3", { "opacity-25": unref(updateRoleForm).processing }]),
              disabled: unref(updateRoleForm).processing,
              onClick: updateRole
            }, {
              default: withCtx(() => [
                _hoisted_44
              ]),
              _: 1
            }, 8, ["class", "disabled"])
          ]),
          _: 1
        }, 8, ["show"]),
        createVNode(_sfc_main$4, {
          show: confirmingLeavingTeam.value,
          onClose: _cache[4] || (_cache[4] = ($event) => confirmingLeavingTeam.value = false)
        }, {
          title: withCtx(() => [
            _hoisted_45
          ]),
          content: withCtx(() => [
            _hoisted_46
          ]),
          footer: withCtx(() => [
            createVNode(_sfc_main$a, {
              onClick: _cache[3] || (_cache[3] = ($event) => confirmingLeavingTeam.value = false)
            }, {
              default: withCtx(() => [
                _hoisted_47
              ]),
              _: 1
            }),
            createVNode(_sfc_main$b, {
              class: normalizeClass(["ml-3", { "opacity-25": unref(leaveTeamForm).processing }]),
              disabled: unref(leaveTeamForm).processing,
              onClick: leaveTeam
            }, {
              default: withCtx(() => [
                _hoisted_48
              ]),
              _: 1
            }, 8, ["class", "disabled"])
          ]),
          _: 1
        }, 8, ["show"]),
        createVNode(_sfc_main$4, {
          show: teamMemberBeingRemoved.value,
          onClose: _cache[6] || (_cache[6] = ($event) => teamMemberBeingRemoved.value = null)
        }, {
          title: withCtx(() => [
            _hoisted_49
          ]),
          content: withCtx(() => [
            _hoisted_50
          ]),
          footer: withCtx(() => [
            createVNode(_sfc_main$a, {
              onClick: _cache[5] || (_cache[5] = ($event) => teamMemberBeingRemoved.value = null)
            }, {
              default: withCtx(() => [
                _hoisted_51
              ]),
              _: 1
            }),
            createVNode(_sfc_main$b, {
              class: normalizeClass(["ml-3", { "opacity-25": unref(removeTeamMemberForm).processing }]),
              disabled: unref(removeTeamMemberForm).processing,
              onClick: removeTeamMember
            }, {
              default: withCtx(() => [
                _hoisted_52
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
//# sourceMappingURL=TeamMemberManager.717ba600.js.map
