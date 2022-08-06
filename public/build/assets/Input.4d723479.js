import { k as ref, as as onMounted, ay as openBlock, W as createElementBlock } from "./runtime-dom.esm-bundler.3714f197.js";
const _hoisted_1 = ["value"];
const _sfc_main = {
  __name: "Input",
  props: {
    modelValue: String
  },
  emits: ["update:modelValue"],
  setup(__props, { expose }) {
    const input = ref(null);
    onMounted(() => {
      if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
      }
    });
    expose({ focus: () => input.value.focus() });
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("input", {
        ref_key: "input",
        ref: input,
        class: "border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",
        value: __props.modelValue,
        onInput: _cache[0] || (_cache[0] = ($event) => _ctx.$emit("update:modelValue", $event.target.value))
      }, null, 40, _hoisted_1);
    };
  }
};
export {
  _sfc_main as _
};
//# sourceMappingURL=Input.4d723479.js.map
