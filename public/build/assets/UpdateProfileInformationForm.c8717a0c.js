import { k as ref, ay as openBlock, U as createBlock, b1 as withCtx, W as createElementBlock, X as createBaseVNode, a2 as createVNode, b3 as withDirectives, bn as vShow, C as normalizeStyle, bp as withModifiers, V as createCommentVNode, x as unref, A as normalizeClass, a1 as createTextVNode } from "./runtime-dom.esm-bundler.3714f197.js";
import { u as useForm, L as Link, d as dist } from "./app.73e7ef0c.js";
import { _ as _sfc_main$7 } from "./Button.05052283.js";
import { _ as _sfc_main$1 } from "./FormSection.b57bd017.js";
import { _ as _sfc_main$5 } from "./Input.4d723479.js";
import { _ as _sfc_main$4 } from "./InputError.c01bb545.js";
import { _ as _sfc_main$2 } from "./Label.6120fd41.js";
import { _ as _sfc_main$6 } from "./ActionMessage.a358f0ed.js";
import { _ as _sfc_main$3 } from "./SecondaryButton.2caec6f6.js";
/* empty css              */import "./_commonjsHelpers.c10bf6cb.js";
import "./SectionTitle.62d42adc.js";
import "./_plugin-vue_export-helper.cdc0426e.js";
const _hoisted_1 = /* @__PURE__ */ createTextVNode(" Profile Information ");
const _hoisted_2 = /* @__PURE__ */ createTextVNode(" Update your account's profile information and email address. ");
const _hoisted_3 = {
  key: 0,
  class: "col-span-6 sm:col-span-4"
};
const _hoisted_4 = { class: "mt-2" };
const _hoisted_5 = ["src", "alt"];
const _hoisted_6 = { class: "mt-2" };
const _hoisted_7 = /* @__PURE__ */ createTextVNode(" Select A New Photo ");
const _hoisted_8 = /* @__PURE__ */ createTextVNode(" Remove Photo ");
const _hoisted_9 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_10 = { class: "col-span-6 sm:col-span-4" };
const _hoisted_11 = { key: 0 };
const _hoisted_12 = { class: "text-sm mt-2" };
const _hoisted_13 = /* @__PURE__ */ createTextVNode(" Your email address is unverified. ");
const _hoisted_14 = /* @__PURE__ */ createTextVNode(" Click here to re-send the verification email. ");
const _hoisted_15 = { class: "mt-2 font-medium text-sm text-green-600" };
const _hoisted_16 = /* @__PURE__ */ createTextVNode(" Saved. ");
const _hoisted_17 = /* @__PURE__ */ createTextVNode(" Save ");
const _sfc_main = {
  __name: "UpdateProfileInformationForm",
  props: {
    user: Object
  },
  setup(__props) {
    const props = __props;
    const form = useForm({
      _method: "PUT",
      username: props.user.username,
      email: props.user.email,
      photo: null
    });
    const verificationLinkSent = ref(null);
    const photoPreview = ref(null);
    const photoInput = ref(null);
    const updateProfileInformation = () => {
      if (photoInput.value) {
        form.photo = photoInput.value.files[0];
      }
      form.post(route("user-profile-information.update"), {
        errorBag: "updateProfileInformation",
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput()
      });
    };
    const sendEmailVerification = () => {
      verificationLinkSent.value = true;
    };
    const selectNewPhoto = () => {
      photoInput.value.click();
    };
    const updatePhotoPreview = () => {
      const photo = photoInput.value.files[0];
      if (!photo)
        return;
      const reader = new FileReader();
      reader.onload = (e) => {
        photoPreview.value = e.target.result;
      };
      reader.readAsDataURL(photo);
    };
    const deletePhoto = () => {
      dist.Inertia.delete(route("current-user-photo.destroy"), {
        preserveScroll: true,
        onSuccess: () => {
          photoPreview.value = null;
          clearPhotoFileInput();
        }
      });
    };
    const clearPhotoFileInput = () => {
      var _a;
      if ((_a = photoInput.value) == null ? void 0 : _a.value) {
        photoInput.value.value = null;
      }
    };
    return (_ctx, _cache) => {
      return openBlock(), createBlock(_sfc_main$1, { onSubmitted: updateProfileInformation }, {
        title: withCtx(() => [
          _hoisted_1
        ]),
        description: withCtx(() => [
          _hoisted_2
        ]),
        form: withCtx(() => [
          _ctx.$page.props.jetstream.managesProfilePhotos ? (openBlock(), createElementBlock("div", _hoisted_3, [
            createBaseVNode("input", {
              ref_key: "photoInput",
              ref: photoInput,
              type: "file",
              class: "hidden",
              onChange: updatePhotoPreview
            }, null, 544),
            createVNode(_sfc_main$2, {
              for: "photo",
              value: "Photo"
            }),
            withDirectives(createBaseVNode("div", _hoisted_4, [
              createBaseVNode("img", {
                src: __props.user.profile_photo_url,
                alt: __props.user.name,
                class: "rounded-full h-20 w-20 object-cover"
              }, null, 8, _hoisted_5)
            ], 512), [
              [vShow, !photoPreview.value]
            ]),
            withDirectives(createBaseVNode("div", _hoisted_6, [
              createBaseVNode("span", {
                class: "block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center",
                style: normalizeStyle("background-image: url('" + photoPreview.value + "');")
              }, null, 4)
            ], 512), [
              [vShow, photoPreview.value]
            ]),
            createVNode(_sfc_main$3, {
              class: "mt-2 mr-2",
              type: "button",
              onClick: withModifiers(selectNewPhoto, ["prevent"])
            }, {
              default: withCtx(() => [
                _hoisted_7
              ]),
              _: 1
            }, 8, ["onClick"]),
            __props.user.profile_photo_path ? (openBlock(), createBlock(_sfc_main$3, {
              key: 0,
              type: "button",
              class: "mt-2",
              onClick: withModifiers(deletePhoto, ["prevent"])
            }, {
              default: withCtx(() => [
                _hoisted_8
              ]),
              _: 1
            }, 8, ["onClick"])) : createCommentVNode("", true),
            createVNode(_sfc_main$4, {
              message: unref(form).errors.photo,
              class: "mt-2"
            }, null, 8, ["message"])
          ])) : createCommentVNode("", true),
          createBaseVNode("div", _hoisted_9, [
            createVNode(_sfc_main$2, {
              for: "name",
              value: "Username"
            }),
            createVNode(_sfc_main$5, {
              id: "username",
              modelValue: unref(form).username,
              "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => unref(form).username = $event),
              type: "text",
              class: "mt-1 block w-full",
              autocomplete: "username"
            }, null, 8, ["modelValue"]),
            createVNode(_sfc_main$4, {
              message: unref(form).errors.username,
              class: "mt-2"
            }, null, 8, ["message"])
          ]),
          createBaseVNode("div", _hoisted_10, [
            createVNode(_sfc_main$2, {
              for: "email",
              value: "Email"
            }),
            createVNode(_sfc_main$5, {
              id: "email",
              modelValue: unref(form).email,
              "onUpdate:modelValue": _cache[1] || (_cache[1] = ($event) => unref(form).email = $event),
              type: "email",
              class: "mt-1 block w-full"
            }, null, 8, ["modelValue"]),
            createVNode(_sfc_main$4, {
              message: unref(form).errors.email,
              class: "mt-2"
            }, null, 8, ["message"]),
            _ctx.$page.props.jetstream.hasEmailVerification && __props.user.email_verified_at === null ? (openBlock(), createElementBlock("div", _hoisted_11, [
              createBaseVNode("p", _hoisted_12, [
                _hoisted_13,
                createVNode(unref(Link), {
                  href: _ctx.route("verification.send"),
                  method: "post",
                  as: "button",
                  class: "underline text-gray-600 hover:text-gray-900",
                  onClick: withModifiers(sendEmailVerification, ["prevent"])
                }, {
                  default: withCtx(() => [
                    _hoisted_14
                  ]),
                  _: 1
                }, 8, ["href", "onClick"])
              ]),
              withDirectives(createBaseVNode("div", _hoisted_15, " A new verification link has been sent to your email address. ", 512), [
                [vShow, verificationLinkSent.value]
              ])
            ])) : createCommentVNode("", true)
          ])
        ]),
        actions: withCtx(() => [
          createVNode(_sfc_main$6, {
            on: unref(form).recentlySuccessful,
            class: "mr-3"
          }, {
            default: withCtx(() => [
              _hoisted_16
            ]),
            _: 1
          }, 8, ["on"]),
          createVNode(_sfc_main$7, {
            class: normalizeClass({ "opacity-25": unref(form).processing }),
            disabled: unref(form).processing
          }, {
            default: withCtx(() => [
              _hoisted_17
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
//# sourceMappingURL=UpdateProfileInformationForm.c8717a0c.js.map
