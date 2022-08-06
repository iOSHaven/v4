import { Q as computed, b3 as withDirectives, bi as vModelCheckbox, x as unref, ay as openBlock, W as createElementBlock, f as isRef } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = ["value"];
const _sfc_main = {
  __name: "Checkbox",
  props: {
    checked: {
      type: [Array, Boolean],
      default: false
    },
    value: {
      type: String,
      default: null
    }
  },
  emits: ["update:checked"],
  setup(__props, { emit }) {
    const props = __props;
    const proxyChecked = computed({
      get() {
        return props.checked;
      },
      set(val) {
        emit("update:checked", val);
      }
    });
    return (_ctx, _cache) => {
      return withDirectives((openBlock(), createElementBlock("input", {
        "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => isRef(proxyChecked) ? proxyChecked.value = $event : null),
        type: "checkbox",
        value: __props.value,
        class: "rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
      }, null, 8, _hoisted_1)), [
        [vModelCheckbox, unref(proxyChecked)]
      ]);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=Checkbox.e7d12896.js.map
