import { ay as openBlock, W as createElementBlock, I as Fragment, aE as renderList, V as createCommentVNode, X as createBaseVNode, A as normalizeClass, aF as renderSlot, bp as withModifiers, D as toDisplayString, b9 as createApp } from "./runtime-dom.esm-bundler.3714f197.js";
import { _ as _export_sfc } from "./_plugin-vue_export-helper.cdc0426e.js";
const _sfc_main$1 = {
  props: ["theme", "phpdata", "isadmin"],
  mounted() {
    console.log("hello search");
  },
  computed: {
    input() {
      return this.$root.$data.searchinput.toLowerCase().trim();
    },
    filteredApps() {
      return this.phpdata.filter((o) => {
        var name = o.name || "";
        var short = o.short || "";
        var tags = o.tags || "";
        return name.toLowerCase().includes(this.input) || tags.toLowerCase().includes(this.input) || short.toLowerCase().includes(this.input);
      }).slice(0, 10);
    }
  },
  methods: {
    highlight(item) {
      if (item) {
        var exp = new RegExp(this.input, "gi");
        return item.replace(exp, '<span class="font-bold bg-yellow-500 text-black dark:text-white">' + this.input + "</span>");
      }
    },
    t(classname) {
      return classname + "-" + this.theme;
    }
  }
};
const _hoisted_1$1 = {
  key: 0,
  class: "mt-3"
};
const _hoisted_2$1 = /* @__PURE__ */ createBaseVNode("h1", null, "Search results", -1);
const _hoisted_3$1 = ["href"];
const _hoisted_4$1 = ["src"];
const _hoisted_5$1 = ["innerHTML"];
const _hoisted_6$1 = ["innerHTML"];
const _hoisted_7 = { class: "-ml-4" };
function _sfc_render$1(_ctx, _cache, $props, $setup, $data, $options) {
  return $options.input ? (openBlock(), createElementBlock("ul", _hoisted_1$1, [
    _hoisted_2$1,
    (openBlock(true), createElementBlock(Fragment, null, renderList($options.filteredApps, (app2) => {
      return openBlock(), createElementBlock("li", {
        key: app2.uid,
        class: normalizeClass(["flex", "items-center", "justify-between", $options.t("border-gray-200"), "border-b", "no-border-on-last"])
      }, [
        createBaseVNode("a", {
          href: `/${app2.type}/${app2.uid}`,
          class: "w-full flex items-center justify-start overflow-hidden py-3"
        }, [
          createBaseVNode("img", {
            class: "rounded-lg mr-3",
            src: app2.icon,
            alt: "",
            height: "40",
            width: "40"
          }, null, 8, _hoisted_4$1),
          createBaseVNode("div", null, [
            createBaseVNode("div", {
              innerHTML: $options.highlight(app2.name)
            }, null, 8, _hoisted_5$1),
            createBaseVNode("div", {
              innerHTML: $options.highlight(app2.short)
            }, null, 8, _hoisted_6$1)
          ])
        ], 8, _hoisted_3$1),
        createBaseVNode("div", _hoisted_7, [
          createBaseVNode("i", {
            class: normalizeClass(["fal", "fa-chevron-right", "fa-2x", $options.t("text-gray-400")])
          }, null, 2)
        ])
      ], 2);
    }), 128))
  ])) : createCommentVNode("", true);
}
const SearchResults = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["render", _sfc_render$1]]);
const _sfc_main = {
  props: {
    start: {
      default: 0
    },
    text: {
      default: "Add"
    },
    name: {
      default: "dynamic_input"
    }
  },
  data() {
    return {
      count: 0,
      hide: false
    };
  },
  mounted() {
    console.log(this.$refs.inputtemplate.innerHTML);
  },
  methods: {
    increment() {
      this.count += 1;
    },
    rendertemp(id) {
      var html = this.$refs.inputtemplate.innerHTML.split("==REPLACE==").join(id + this.start);
      this.hide = true;
      return html;
    }
  }
};
const _hoisted_1 = { class: "" };
const _hoisted_2 = {
  class: "hidden",
  ref: "inputtemplate"
};
const _hoisted_3 = ["innerHTML"];
const _hoisted_4 = { class: "text-center" };
const _hoisted_5 = ["name", "value"];
const _hoisted_6 = ["name", "value"];
function _sfc_render(_ctx, _cache, $props, $setup, $data, $options) {
  return openBlock(), createElementBlock("div", _hoisted_1, [
    renderSlot(_ctx.$slots, "content"),
    createBaseVNode("div", _hoisted_2, [
      renderSlot(_ctx.$slots, "template")
    ], 512),
    (openBlock(true), createElementBlock(Fragment, null, renderList($data.count, (n) => {
      return openBlock(), createElementBlock("div", {
        key: n,
        innerHTML: $options.rendertemp(n)
      }, null, 8, _hoisted_3);
    }), 128)),
    createBaseVNode("div", _hoisted_4, [
      !$data.hide ? (openBlock(), createElementBlock("a", {
        key: 0,
        onClick: _cache[0] || (_cache[0] = withModifiers((...args) => $options.increment && $options.increment(...args), ["prevent"])),
        class: "font-bold rounded-full text-sm mr-1 px-5 py-1 text-white dark:text-black bg-blue-500"
      }, toDisplayString(this.text), 1)) : createCommentVNode("", true)
    ]),
    createBaseVNode("input", {
      type: "hidden",
      name: this.name + "_count",
      value: this.count + this.start
    }, null, 8, _hoisted_5),
    createBaseVNode("input", {
      type: "hidden",
      name: this.name + "_start",
      value: this.count + this.start
    }, null, 8, _hoisted_6)
  ]);
}
const DynamicInput = /* @__PURE__ */ _export_sfc(_sfc_main, [["render", _sfc_render]]);
window.app = createApp({
  el: "#vue-scope",
  data() {
    return {
      searchinput: ""
    };
  },
  components: {
    SearchResults
  },
  mounted() {
    console.log("Hello vue");
  }
});
app.component("SearchResults", SearchResults.default);
app.component("DynamicInput", DynamicInput);
app.mount("#vue-scope");
//# sourceMappingURL=app.aa08f6c0.js.map
