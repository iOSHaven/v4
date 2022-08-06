var _a, _b;
import { c as commonjsGlobal } from "./_commonjsHelpers.c10bf6cb.js";
var umbrella_min = { exports: {} };
(function(module) {
  var u2 = function(t, e) {
    return this instanceof u2 ? t instanceof u2 ? t : ((t = "string" == typeof t ? this.select(t, e) : t) && t.nodeName && (t = [t]), void (this.nodes = this.slice(t))) : new u2(t, e);
  };
  u2.prototype = { get length() {
    return this.nodes.length;
  } }, u2.prototype.nodes = [], u2.prototype.addClass = function() {
    return this.eacharg(arguments, function(t, e) {
      t.classList.add(e);
    });
  }, u2.prototype.adjacent = function(o, t, i) {
    return "number" == typeof t && (t = 0 === t ? [] : new Array(t).join().split(",").map(Number.call, Number)), this.each(function(n, r) {
      var e = document.createDocumentFragment();
      u2(t || {}).map(function(t2, e2) {
        e2 = "function" == typeof o ? o.call(this, t2, e2, n, r) : o;
        return "string" == typeof e2 ? this.generate(e2) : u2(e2);
      }).each(function(t2) {
        this.isInPage(t2) ? e.appendChild(u2(t2).clone().first()) : e.appendChild(t2);
      }), i.call(this, n, e);
    });
  }, u2.prototype.after = function(t, e) {
    return this.adjacent(t, e, function(t2, e2) {
      t2.parentNode.insertBefore(e2, t2.nextSibling);
    });
  }, u2.prototype.append = function(t, e) {
    return this.adjacent(t, e, function(t2, e2) {
      t2.appendChild(e2);
    });
  }, u2.prototype.args = function(t, e, n) {
    return (t = "string" != typeof (t = "function" == typeof t ? t(e, n) : t) ? this.slice(t).map(this.str(e, n)) : t).toString().split(/[\s,]+/).filter(function(t2) {
      return t2.length;
    });
  }, u2.prototype.array = function(o) {
    var i = this;
    return this.nodes.reduce(function(t, e, n) {
      var r;
      return o ? (r = "string" == typeof (r = (r = o.call(i, e, n)) || false) ? u2(r) : r) instanceof u2 && (r = r.nodes) : r = e.innerHTML, t.concat(false !== r ? r : []);
    }, []);
  }, u2.prototype.attr = function(t, e, r) {
    return r = r ? "data-" : "", this.pairs(t, e, function(t2, e2) {
      return t2.getAttribute(r + e2);
    }, function(t2, e2, n) {
      n ? t2.setAttribute(r + e2, n) : t2.removeAttribute(r + e2);
    });
  }, u2.prototype.before = function(t, e) {
    return this.adjacent(t, e, function(t2, e2) {
      t2.parentNode.insertBefore(e2, t2);
    });
  }, u2.prototype.children = function(t) {
    return this.map(function(t2) {
      return this.slice(t2.children);
    }).filter(t);
  }, u2.prototype.clone = function() {
    return this.map(function(t, e) {
      var n = t.cloneNode(true), r = this.getAll(n);
      return this.getAll(t).each(function(t2, e2) {
        for (var n2 in this.mirror)
          this.mirror[n2] && this.mirror[n2](t2, r.nodes[e2]);
      }), n;
    });
  }, u2.prototype.getAll = function(t) {
    return u2([t].concat(u2("*", t).nodes));
  }, u2.prototype.mirror = {}, u2.prototype.mirror.events = function(t, e) {
    if (t._e)
      for (var n in t._e)
        t._e[n].forEach(function(t2) {
          u2(e).on(n, t2.callback);
        });
  }, u2.prototype.mirror.select = function(t, e) {
    u2(t).is("select") && (e.value = t.value);
  }, u2.prototype.mirror.textarea = function(t, e) {
    u2(t).is("textarea") && (e.value = t.value);
  }, u2.prototype.closest = function(e) {
    return this.map(function(t) {
      do {
        if (u2(t).is(e))
          return t;
      } while ((t = t.parentNode) && t !== document);
    });
  }, u2.prototype.data = function(t, e) {
    return this.attr(t, e, true);
  }, u2.prototype.each = function(t) {
    return this.nodes.forEach(t.bind(this)), this;
  }, u2.prototype.eacharg = function(n, r) {
    return this.each(function(e, t) {
      this.args(n, e, t).forEach(function(t2) {
        r.call(this, e, t2);
      }, this);
    });
  }, u2.prototype.empty = function() {
    return this.each(function(t) {
      for (; t.firstChild; )
        t.removeChild(t.firstChild);
    });
  }, u2.prototype.filter = function(e) {
    var t = e instanceof u2 ? function(t2) {
      return -1 !== e.nodes.indexOf(t2);
    } : "function" == typeof e ? e : function(t2) {
      return t2.matches = t2.matches || t2.msMatchesSelector || t2.webkitMatchesSelector, t2.matches(e || "*");
    };
    return u2(this.nodes.filter(t));
  }, u2.prototype.find = function(e) {
    return this.map(function(t) {
      return u2(e || "*", t);
    });
  }, u2.prototype.first = function() {
    return this.nodes[0] || false;
  }, u2.prototype.generate = function(t) {
    return /^\s*<tr[> ]/.test(t) ? u2(document.createElement("table")).html(t).children().children().nodes : /^\s*<t(h|d)[> ]/.test(t) ? u2(document.createElement("table")).html(t).children().children().children().nodes : /^\s*</.test(t) ? u2(document.createElement("div")).html(t).children().nodes : document.createTextNode(t);
  }, u2.prototype.handle = function() {
    var t = this.slice(arguments).map(function(e) {
      return "function" == typeof e ? function(t2) {
        t2.preventDefault(), e.apply(this, arguments);
      } : e;
    }, this);
    return this.on.apply(this, t);
  }, u2.prototype.hasClass = function() {
    return this.is("." + this.args(arguments).join("."));
  }, u2.prototype.html = function(e) {
    return void 0 === e ? this.first().innerHTML || "" : this.each(function(t) {
      t.innerHTML = e;
    });
  }, u2.prototype.is = function(t) {
    return 0 < this.filter(t).length;
  }, u2.prototype.isInPage = function(t) {
    return t !== document.body && document.body.contains(t);
  }, u2.prototype.last = function() {
    return this.nodes[this.length - 1] || false;
  }, u2.prototype.map = function(t) {
    return t ? u2(this.array(t)).unique() : this;
  }, u2.prototype.not = function(e) {
    return this.filter(function(t) {
      return !u2(t).is(e || true);
    });
  }, u2.prototype.off = function(t, e, n) {
    var r = null == e && null == n, o = null, i = e;
    return "string" == typeof e && (o = e, i = n), this.eacharg(t, function(e2, n2) {
      u2(e2._e ? e2._e[n2] : []).each(function(t2) {
        (r || t2.orig_callback === i && t2.selector === o) && e2.removeEventListener(n2, t2.callback);
      });
    });
  }, u2.prototype.on = function(t, e, o) {
    function i(t2, e2) {
      try {
        Object.defineProperty(t2, "currentTarget", { value: e2, configurable: true });
      } catch (t3) {
      }
    }
    var c = null, n = e;
    "string" == typeof e && (c = e, n = o, e = function(n2) {
      var r2 = arguments;
      u2(n2.currentTarget).find(c).each(function(t2) {
        var e2;
        t2.contains(n2.target) && (e2 = n2.currentTarget, i(n2, t2), o.apply(t2, r2), i(n2, e2));
      });
    });
    function r(t2) {
      return e.apply(this, [t2].concat(t2.detail || []));
    }
    return this.eacharg(t, function(t2, e2) {
      t2.addEventListener(e2, r), t2._e = t2._e || {}, t2._e[e2] = t2._e[e2] || [], t2._e[e2].push({ callback: r, orig_callback: n, selector: c });
    });
  }, u2.prototype.pairs = function(r, t, e, o) {
    var n;
    return void 0 !== t && (n = r, (r = {})[n] = t), "object" == typeof r ? this.each(function(t2, e2) {
      for (var n2 in r)
        "function" == typeof r[n2] ? o(t2, n2, r[n2](t2, e2)) : o(t2, n2, r[n2]);
    }) : this.length ? e(this.first(), r) : "";
  }, u2.prototype.param = function(e) {
    return Object.keys(e).map(function(t) {
      return this.uri(t) + "=" + this.uri(e[t]);
    }.bind(this)).join("&");
  }, u2.prototype.parent = function(t) {
    return this.map(function(t2) {
      return t2.parentNode;
    }).filter(t);
  }, u2.prototype.prepend = function(t, e) {
    return this.adjacent(t, e, function(t2, e2) {
      t2.insertBefore(e2, t2.firstChild);
    });
  }, u2.prototype.remove = function() {
    return this.each(function(t) {
      t.parentNode && t.parentNode.removeChild(t);
    });
  }, u2.prototype.removeClass = function() {
    return this.eacharg(arguments, function(t, e) {
      t.classList.remove(e);
    });
  }, u2.prototype.replace = function(t, e) {
    var n = [];
    return this.adjacent(t, e, function(t2, e2) {
      n = n.concat(this.slice(e2.children)), t2.parentNode.replaceChild(e2, t2);
    }), u2(n);
  }, u2.prototype.scroll = function() {
    return this.first().scrollIntoView({ behavior: "smooth" }), this;
  }, u2.prototype.select = function(t, e) {
    return t = t.replace(/^\s*/, "").replace(/\s*$/, ""), /^</.test(t) ? u2().generate(t) : (e || document).querySelectorAll(t);
  }, u2.prototype.serialize = function() {
    var r = this;
    return this.slice(this.first().elements).reduce(function(e, n) {
      return !n.name || n.disabled || "file" === n.type || /(checkbox|radio)/.test(n.type) && !n.checked ? e : "select-multiple" === n.type ? (u2(n.options).each(function(t) {
        t.selected && (e += "&" + r.uri(n.name) + "=" + r.uri(t.value));
      }), e) : e + "&" + r.uri(n.name) + "=" + r.uri(n.value);
    }, "").slice(1);
  }, u2.prototype.siblings = function(t) {
    return this.parent().children(t).not(this);
  }, u2.prototype.size = function() {
    return this.first().getBoundingClientRect();
  }, u2.prototype.slice = function(t) {
    return t && 0 !== t.length && "string" != typeof t && "[object Function]" !== t.toString() ? t.length ? [].slice.call(t.nodes || t) : [t] : [];
  }, u2.prototype.str = function(e, n) {
    return function(t) {
      return "function" == typeof t ? t.call(this, e, n) : t.toString();
    };
  }, u2.prototype.text = function(e) {
    return void 0 === e ? this.first().textContent || "" : this.each(function(t) {
      t.textContent = e;
    });
  }, u2.prototype.toggleClass = function(t, e) {
    return !!e === e ? this[e ? "addClass" : "removeClass"](t) : this.eacharg(t, function(t2, e2) {
      t2.classList.toggle(e2);
    });
  }, u2.prototype.trigger = function(t) {
    var o = this.slice(arguments).slice(1);
    return this.eacharg(t, function(t2, e) {
      var n, r = { bubbles: true, cancelable: true, detail: o };
      try {
        n = new window.CustomEvent(e, r);
      } catch (t3) {
        (n = document.createEvent("CustomEvent")).initCustomEvent(e, true, true, o);
      }
      t2.dispatchEvent(n);
    });
  }, u2.prototype.unique = function() {
    return u2(this.nodes.reduce(function(t, e) {
      return null != e && false !== e && -1 === t.indexOf(e) ? t.concat(e) : t;
    }, []));
  }, u2.prototype.uri = function(t) {
    return encodeURIComponent(t).replace(/!/g, "%21").replace(/'/g, "%27").replace(/\(/g, "%28").replace(/\)/g, "%29").replace(/\*/g, "%2A").replace(/%20/g, "+");
  }, u2.prototype.wrap = function(t) {
    return this.map(function(e) {
      return u2(t).each(function(t2) {
        !function(t3) {
          for (; t3.firstElementChild; )
            t3 = t3.firstElementChild;
          return u2(t3);
        }(t2).append(e.cloneNode(true)), e.parentNode.replaceChild(t2, e);
      });
    });
  }, module.exports && (module.exports = u2, module.exports.u = u2);
})(umbrella_min);
const u = umbrella_min.exports;
function render(str, data = {}) {
  var newhtml = str;
  Object.keys(data).forEach((key) => {
    var expr = "{%= " + key + " =%}";
    var re = new RegExp(expr, "g");
    newhtml = newhtml.replace(re, data[key]);
  });
  return newhtml;
}
function getJSON$1(url, callback, type = "json") {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.responseType = type;
  xhr.onload = function() {
    var status = xhr.status;
    if (status === 200) {
      callback(null, xhr.response);
    } else {
      callback(status, xhr.response);
    }
  };
  xhr.send();
}
function autocomplete(id, cb = null) {
  var el = document.getElementById(id);
  var url = el.dataset.fetch;
  var result = el.dataset.result;
  var resultEl = document.getElementById(result);
  var template = el.dataset.template;
  getJSON$1(url, function(err, json) {
    if (err)
      return;
    getJSON$1(template, function(err2, tmpl) {
      if (err2)
        return;
      if (cb && Array.isArray(json)) {
        el.addEventListener("keyup", function(e) {
          if (!el.value || el.value.length < 2)
            return resultEl.innerHTML = "";
          var $json = json.slice();
          modified = cb.call(void 0, e, el, $json) || $json;
          var res = modified.map((item) => render(tmpl, item)).join("");
          resultEl.innerHTML = res;
        });
      }
    }, "text");
  });
}
window.autocomplete = autocomplete;
window.getJSON = getJSON$1;
window.render = render;
var _shared = {
  pullStartY: null,
  pullMoveY: null,
  handlers: [],
  styleEl: null,
  events: null,
  dist: 0,
  state: "pending",
  timeout: null,
  distResisted: 0,
  supportsPassive: false,
  supportsPointerEvents: typeof window !== "undefined" && !!window.PointerEvent
};
try {
  window.addEventListener("test", null, {
    get passive() {
      _shared.supportsPassive = true;
    }
  });
} catch (e) {
}
function setupDOM(handler) {
  if (!handler.ptrElement) {
    var ptr = document.createElement("div");
    if (handler.mainElement !== document.body) {
      handler.mainElement.parentNode.insertBefore(ptr, handler.mainElement);
    } else {
      document.body.insertBefore(ptr, document.body.firstChild);
    }
    ptr.classList.add(handler.classPrefix + "ptr");
    ptr.innerHTML = handler.getMarkup().replace(/__PREFIX__/g, handler.classPrefix);
    handler.ptrElement = ptr;
    if (typeof handler.onInit === "function") {
      handler.onInit(handler);
    }
    if (!_shared.styleEl) {
      _shared.styleEl = document.createElement("style");
      _shared.styleEl.setAttribute("id", "pull-to-refresh-js-style");
      document.head.appendChild(_shared.styleEl);
    }
    _shared.styleEl.textContent = handler.getStyles().replace(/__PREFIX__/g, handler.classPrefix).replace(/\s+/g, " ");
  }
  return handler;
}
function onReset(handler) {
  if (!handler.ptrElement) {
    return;
  }
  handler.ptrElement.classList.remove(handler.classPrefix + "refresh");
  handler.ptrElement.style[handler.cssProp] = "0px";
  setTimeout(function() {
    if (handler.ptrElement && handler.ptrElement.parentNode) {
      handler.ptrElement.parentNode.removeChild(handler.ptrElement);
      handler.ptrElement = null;
    }
    _shared.state = "pending";
  }, handler.refreshTimeout);
}
function update(handler) {
  var iconEl = handler.ptrElement.querySelector("." + handler.classPrefix + "icon");
  var textEl = handler.ptrElement.querySelector("." + handler.classPrefix + "text");
  if (iconEl) {
    if (_shared.state === "refreshing") {
      iconEl.innerHTML = handler.iconRefreshing;
    } else {
      iconEl.innerHTML = handler.iconArrow;
    }
  }
  if (textEl) {
    if (_shared.state === "releasing") {
      textEl.innerHTML = handler.instructionsReleaseToRefresh;
    }
    if (_shared.state === "pulling" || _shared.state === "pending") {
      textEl.innerHTML = handler.instructionsPullToRefresh;
    }
    if (_shared.state === "refreshing") {
      textEl.innerHTML = handler.instructionsRefreshing;
    }
  }
}
var _ptr = {
  setupDOM,
  onReset,
  update
};
var _timeout;
var screenY = function screenY2(event) {
  if (_shared.pointerEventsEnabled && _shared.supportsPointerEvents) {
    return event.screenY;
  }
  return event.touches[0].screenY;
};
var _setupEvents = function() {
  var _el;
  function _onTouchStart(e) {
    var target = _shared.handlers.filter(function(h) {
      return h.contains(e.target);
    })[0];
    _shared.enable = !!target;
    if (target && _shared.state === "pending") {
      _el = _ptr.setupDOM(target);
      if (target.shouldPullToRefresh()) {
        _shared.pullStartY = screenY(e);
      }
      clearTimeout(_shared.timeout);
      _ptr.update(target);
    }
  }
  function _onTouchMove(e) {
    if (!(_el && _el.ptrElement && _shared.enable)) {
      return;
    }
    if (!_shared.pullStartY) {
      if (_el.shouldPullToRefresh()) {
        _shared.pullStartY = screenY(e);
      }
    } else {
      _shared.pullMoveY = screenY(e);
    }
    if (_shared.state === "refreshing") {
      if (e.cancelable && _el.shouldPullToRefresh() && _shared.pullStartY < _shared.pullMoveY) {
        e.preventDefault();
      }
      return;
    }
    if (_shared.state === "pending") {
      _el.ptrElement.classList.add(_el.classPrefix + "pull");
      _shared.state = "pulling";
      _ptr.update(_el);
    }
    if (_shared.pullStartY && _shared.pullMoveY) {
      _shared.dist = _shared.pullMoveY - _shared.pullStartY;
    }
    _shared.distExtra = _shared.dist - _el.distIgnore;
    if (_shared.distExtra > 0) {
      if (e.cancelable) {
        e.preventDefault();
      }
      _el.ptrElement.style[_el.cssProp] = _shared.distResisted + "px";
      _shared.distResisted = _el.resistanceFunction(_shared.distExtra / _el.distThreshold) * Math.min(_el.distMax, _shared.distExtra);
      if (_shared.state === "pulling" && _shared.distResisted > _el.distThreshold) {
        _el.ptrElement.classList.add(_el.classPrefix + "release");
        _shared.state = "releasing";
        _ptr.update(_el);
      }
      if (_shared.state === "releasing" && _shared.distResisted < _el.distThreshold) {
        _el.ptrElement.classList.remove(_el.classPrefix + "release");
        _shared.state = "pulling";
        _ptr.update(_el);
      }
    }
  }
  function _onTouchEnd() {
    if (!(_el && _el.ptrElement && _shared.enable)) {
      return;
    }
    clearTimeout(_timeout);
    _timeout = setTimeout(function() {
      if (_el && _el.ptrElement && _shared.state === "pending") {
        _ptr.onReset(_el);
      }
    }, 500);
    if (_shared.state === "releasing" && _shared.distResisted > _el.distThreshold) {
      _shared.state = "refreshing";
      _el.ptrElement.style[_el.cssProp] = _el.distReload + "px";
      _el.ptrElement.classList.add(_el.classPrefix + "refresh");
      _shared.timeout = setTimeout(function() {
        var retval = _el.onRefresh(function() {
          return _ptr.onReset(_el);
        });
        if (retval && typeof retval.then === "function") {
          retval.then(function() {
            return _ptr.onReset(_el);
          });
        }
        if (!retval && !_el.onRefresh.length) {
          _ptr.onReset(_el);
        }
      }, _el.refreshTimeout);
    } else {
      if (_shared.state === "refreshing") {
        return;
      }
      _el.ptrElement.style[_el.cssProp] = "0px";
      _shared.state = "pending";
    }
    _ptr.update(_el);
    _el.ptrElement.classList.remove(_el.classPrefix + "release");
    _el.ptrElement.classList.remove(_el.classPrefix + "pull");
    _shared.pullStartY = _shared.pullMoveY = null;
    _shared.dist = _shared.distResisted = 0;
  }
  function _onScroll() {
    if (_el) {
      _el.mainElement.classList.toggle(_el.classPrefix + "top", _el.shouldPullToRefresh());
    }
  }
  var _passiveSettings = _shared.supportsPassive ? {
    passive: _shared.passive || false
  } : void 0;
  if (_shared.pointerEventsEnabled && _shared.supportsPointerEvents) {
    window.addEventListener("pointerup", _onTouchEnd);
    window.addEventListener("pointerdown", _onTouchStart);
    window.addEventListener("pointermove", _onTouchMove, _passiveSettings);
  } else {
    window.addEventListener("touchend", _onTouchEnd);
    window.addEventListener("touchstart", _onTouchStart);
    window.addEventListener("touchmove", _onTouchMove, _passiveSettings);
  }
  window.addEventListener("scroll", _onScroll);
  return {
    onTouchEnd: _onTouchEnd,
    onTouchStart: _onTouchStart,
    onTouchMove: _onTouchMove,
    onScroll: _onScroll,
    destroy: function destroy() {
      if (_shared.pointerEventsEnabled && _shared.supportsPointerEvents) {
        window.removeEventListener("pointerdown", _onTouchStart);
        window.removeEventListener("pointerup", _onTouchEnd);
        window.removeEventListener("pointermove", _onTouchMove, _passiveSettings);
      } else {
        window.removeEventListener("touchstart", _onTouchStart);
        window.removeEventListener("touchend", _onTouchEnd);
        window.removeEventListener("touchmove", _onTouchMove, _passiveSettings);
      }
      window.removeEventListener("scroll", _onScroll);
    }
  };
};
var _ptrMarkup = '\n<div class="__PREFIX__box">\n  <div class="__PREFIX__content">\n    <div class="__PREFIX__icon"></div>\n    <div class="__PREFIX__text"></div>\n  </div>\n</div>\n';
var _ptrStyles = "\n.__PREFIX__ptr {\n  box-shadow: inset 0 -3px 5px rgba(0, 0, 0, 0.12);\n  pointer-events: none;\n  font-size: 0.85em;\n  font-weight: bold;\n  top: 0;\n  height: 0;\n  transition: height 0.3s, min-height 0.3s;\n  text-align: center;\n  width: 100%;\n  overflow: hidden;\n  display: flex;\n  align-items: flex-end;\n  align-content: stretch;\n}\n\n.__PREFIX__box {\n  padding: 10px;\n  flex-basis: 100%;\n}\n\n.__PREFIX__pull {\n  transition: none;\n}\n\n.__PREFIX__text {\n  margin-top: .33em;\n  color: rgba(0, 0, 0, 0.3);\n}\n\n.__PREFIX__icon {\n  color: rgba(0, 0, 0, 0.3);\n  transition: transform .3s;\n}\n\n/*\nWhen at the top of the page, disable vertical overscroll so passive touch\nlisteners can take over.\n*/\n.__PREFIX__top {\n  touch-action: pan-x pan-down pinch-zoom;\n}\n\n.__PREFIX__release .__PREFIX__icon {\n  transform: rotate(180deg);\n}\n";
var _defaults = {
  distThreshold: 60,
  distMax: 80,
  distReload: 50,
  distIgnore: 0,
  mainElement: "body",
  triggerElement: "body",
  ptrElement: ".ptr",
  classPrefix: "ptr--",
  cssProp: "min-height",
  iconArrow: "&#8675;",
  iconRefreshing: "&hellip;",
  instructionsPullToRefresh: "Pull down to refresh",
  instructionsReleaseToRefresh: "Release to refresh",
  instructionsRefreshing: "Refreshing",
  refreshTimeout: 500,
  getMarkup: function() {
    return _ptrMarkup;
  },
  getStyles: function() {
    return _ptrStyles;
  },
  onInit: function() {
  },
  onRefresh: function() {
    return location.reload();
  },
  resistanceFunction: function(t) {
    return Math.min(1, t / 2.5);
  },
  shouldPullToRefresh: function() {
    return !window.scrollY;
  }
};
var _methods = ["mainElement", "ptrElement", "triggerElement"];
var _setupHandler = function(options) {
  var _handler = {};
  Object.keys(_defaults).forEach(function(key) {
    _handler[key] = options[key] || _defaults[key];
  });
  _handler.refreshTimeout = typeof options.refreshTimeout === "number" ? options.refreshTimeout : _defaults.refreshTimeout;
  _methods.forEach(function(method) {
    if (typeof _handler[method] === "string") {
      _handler[method] = document.querySelector(_handler[method]);
    }
  });
  if (!_shared.events) {
    _shared.events = _setupEvents();
  }
  _handler.contains = function(target) {
    return _handler.triggerElement.contains(target);
  };
  _handler.destroy = function() {
    clearTimeout(_shared.timeout);
    var offset = _shared.handlers.indexOf(_handler);
    _shared.handlers.splice(offset, 1);
  };
  return _handler;
};
var index = {
  setPassiveMode: function setPassiveMode(isPassive) {
    _shared.passive = isPassive;
  },
  setPointerEventsMode: function setPointerEventsMode(isEnabled) {
    _shared.pointerEventsEnabled = isEnabled;
  },
  destroyAll: function destroyAll() {
    if (_shared.events) {
      _shared.events.destroy();
      _shared.events = null;
    }
    _shared.handlers.forEach(function(h) {
      h.destroy();
    });
  },
  init: function init(options) {
    if (options === void 0)
      options = {};
    var handler = _setupHandler(options);
    _shared.handlers.push(handler);
    return handler;
  },
  _: {
    setupHandler: _setupHandler,
    setupEvents: _setupEvents,
    setupDOM: _ptr.setupDOM,
    onReset: _ptr.onReset,
    update: _ptr.update
  }
};
var scrollLock = { exports: {} };
(function(module, exports) {
  (function webpackUniversalModuleDefinition(root, factory) {
    module.exports = factory();
  })(commonjsGlobal, function() {
    return function(modules) {
      var installedModules = {};
      function __webpack_require__(moduleId) {
        if (installedModules[moduleId]) {
          return installedModules[moduleId].exports;
        }
        var module2 = installedModules[moduleId] = {
          i: moduleId,
          l: false,
          exports: {}
        };
        modules[moduleId].call(module2.exports, module2, module2.exports, __webpack_require__);
        module2.l = true;
        return module2.exports;
      }
      __webpack_require__.m = modules;
      __webpack_require__.c = installedModules;
      __webpack_require__.d = function(exports2, name, getter) {
        if (!__webpack_require__.o(exports2, name)) {
          Object.defineProperty(exports2, name, { enumerable: true, get: getter });
        }
      };
      __webpack_require__.r = function(exports2) {
        if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
          Object.defineProperty(exports2, Symbol.toStringTag, { value: "Module" });
        }
        Object.defineProperty(exports2, "__esModule", { value: true });
      };
      __webpack_require__.t = function(value, mode) {
        if (mode & 1)
          value = __webpack_require__(value);
        if (mode & 8)
          return value;
        if (mode & 4 && typeof value === "object" && value && value.__esModule)
          return value;
        var ns = /* @__PURE__ */ Object.create(null);
        __webpack_require__.r(ns);
        Object.defineProperty(ns, "default", { enumerable: true, value });
        if (mode & 2 && typeof value != "string")
          for (var key in value)
            __webpack_require__.d(ns, key, function(key2) {
              return value[key2];
            }.bind(null, key));
        return ns;
      };
      __webpack_require__.n = function(module2) {
        var getter = module2 && module2.__esModule ? function getDefault() {
          return module2["default"];
        } : function getModuleExports() {
          return module2;
        };
        __webpack_require__.d(getter, "a", getter);
        return getter;
      };
      __webpack_require__.o = function(object, property) {
        return Object.prototype.hasOwnProperty.call(object, property);
      };
      __webpack_require__.p = "";
      return __webpack_require__(__webpack_require__.s = 0);
    }([
      function(module2, __webpack_exports__, __webpack_require__) {
        __webpack_require__.r(__webpack_exports__);
        var argumentAsArray = function argumentAsArray2(argument) {
          return Array.isArray(argument) ? argument : [argument];
        };
        var isElement = function isElement2(target) {
          return target instanceof Node;
        };
        var isElementList = function isElementList2(nodeList) {
          return nodeList instanceof NodeList;
        };
        var eachNode = function eachNode2(nodeList, callback) {
          if (nodeList && callback) {
            nodeList = isElementList(nodeList) ? nodeList : [nodeList];
            for (var i = 0; i < nodeList.length; i++) {
              if (callback(nodeList[i], i, nodeList.length) === true) {
                break;
              }
            }
          }
        };
        var throwError = function throwError2(message) {
          return console.error("[scroll-lock] ".concat(message));
        };
        var arrayAsSelector = function arrayAsSelector2(array) {
          if (Array.isArray(array)) {
            var selector = array.join(", ");
            return selector;
          }
        };
        var nodeListAsArray = function nodeListAsArray2(nodeList) {
          var nodes = [];
          eachNode(nodeList, function(node) {
            return nodes.push(node);
          });
          return nodes;
        };
        var findParentBySelector = function findParentBySelector2($el, selector) {
          var self = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : true;
          var $root = arguments.length > 3 && arguments[3] !== void 0 ? arguments[3] : document;
          if (self && nodeListAsArray($root.querySelectorAll(selector)).indexOf($el) !== -1) {
            return $el;
          }
          while (($el = $el.parentElement) && nodeListAsArray($root.querySelectorAll(selector)).indexOf($el) === -1) {
          }
          return $el;
        };
        var elementHasSelector = function elementHasSelector2($el, selector) {
          var $root = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : document;
          var has = nodeListAsArray($root.querySelectorAll(selector)).indexOf($el) !== -1;
          return has;
        };
        var elementHasOverflowHidden = function elementHasOverflowHidden2($el) {
          if ($el) {
            var computedStyle = getComputedStyle($el);
            var overflowIsHidden = computedStyle.overflow === "hidden";
            return overflowIsHidden;
          }
        };
        var elementScrollTopOnStart = function elementScrollTopOnStart2($el) {
          if ($el) {
            if (elementHasOverflowHidden($el)) {
              return true;
            }
            var scrollTop = $el.scrollTop;
            return scrollTop <= 0;
          }
        };
        var elementScrollTopOnEnd = function elementScrollTopOnEnd2($el) {
          if ($el) {
            if (elementHasOverflowHidden($el)) {
              return true;
            }
            var scrollTop = $el.scrollTop;
            var scrollHeight = $el.scrollHeight;
            var scrollTopWithHeight = scrollTop + $el.offsetHeight;
            return scrollTopWithHeight >= scrollHeight;
          }
        };
        var elementScrollLeftOnStart = function elementScrollLeftOnStart2($el) {
          if ($el) {
            if (elementHasOverflowHidden($el)) {
              return true;
            }
            var scrollLeft = $el.scrollLeft;
            return scrollLeft <= 0;
          }
        };
        var elementScrollLeftOnEnd = function elementScrollLeftOnEnd2($el) {
          if ($el) {
            if (elementHasOverflowHidden($el)) {
              return true;
            }
            var scrollLeft = $el.scrollLeft;
            var scrollWidth = $el.scrollWidth;
            var scrollLeftWithWidth = scrollLeft + $el.offsetWidth;
            return scrollLeftWithWidth >= scrollWidth;
          }
        };
        var elementIsScrollableField = function elementIsScrollableField2($el) {
          var selector = 'textarea, [contenteditable="true"]';
          return elementHasSelector($el, selector);
        };
        var elementIsInputRange = function elementIsInputRange2($el) {
          var selector = 'input[type="range"]';
          return elementHasSelector($el, selector);
        };
        __webpack_require__.d(__webpack_exports__, "disablePageScroll", function() {
          return disablePageScroll;
        });
        __webpack_require__.d(__webpack_exports__, "enablePageScroll", function() {
          return enablePageScroll;
        });
        __webpack_require__.d(__webpack_exports__, "getScrollState", function() {
          return getScrollState;
        });
        __webpack_require__.d(__webpack_exports__, "clearQueueScrollLocks", function() {
          return clearQueueScrollLocks;
        });
        __webpack_require__.d(__webpack_exports__, "getTargetScrollBarWidth", function() {
          return scroll_lock_getTargetScrollBarWidth;
        });
        __webpack_require__.d(__webpack_exports__, "getCurrentTargetScrollBarWidth", function() {
          return scroll_lock_getCurrentTargetScrollBarWidth;
        });
        __webpack_require__.d(__webpack_exports__, "getPageScrollBarWidth", function() {
          return getPageScrollBarWidth;
        });
        __webpack_require__.d(__webpack_exports__, "getCurrentPageScrollBarWidth", function() {
          return getCurrentPageScrollBarWidth;
        });
        __webpack_require__.d(__webpack_exports__, "addScrollableTarget", function() {
          return scroll_lock_addScrollableTarget;
        });
        __webpack_require__.d(__webpack_exports__, "removeScrollableTarget", function() {
          return scroll_lock_removeScrollableTarget;
        });
        __webpack_require__.d(__webpack_exports__, "addScrollableSelector", function() {
          return scroll_lock_addScrollableSelector;
        });
        __webpack_require__.d(__webpack_exports__, "removeScrollableSelector", function() {
          return scroll_lock_removeScrollableSelector;
        });
        __webpack_require__.d(__webpack_exports__, "addLockableTarget", function() {
          return scroll_lock_addLockableTarget;
        });
        __webpack_require__.d(__webpack_exports__, "addLockableSelector", function() {
          return scroll_lock_addLockableSelector;
        });
        __webpack_require__.d(__webpack_exports__, "setFillGapMethod", function() {
          return scroll_lock_setFillGapMethod;
        });
        __webpack_require__.d(__webpack_exports__, "addFillGapTarget", function() {
          return scroll_lock_addFillGapTarget;
        });
        __webpack_require__.d(__webpack_exports__, "removeFillGapTarget", function() {
          return scroll_lock_removeFillGapTarget;
        });
        __webpack_require__.d(__webpack_exports__, "addFillGapSelector", function() {
          return scroll_lock_addFillGapSelector;
        });
        __webpack_require__.d(__webpack_exports__, "removeFillGapSelector", function() {
          return scroll_lock_removeFillGapSelector;
        });
        __webpack_require__.d(__webpack_exports__, "refillGaps", function() {
          return refillGaps;
        });
        function _objectSpread(target) {
          for (var i = 1; i < arguments.length; i++) {
            var source = arguments[i] != null ? arguments[i] : {};
            var ownKeys = Object.keys(source);
            if (typeof Object.getOwnPropertySymbols === "function") {
              ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function(sym) {
                return Object.getOwnPropertyDescriptor(source, sym).enumerable;
              }));
            }
            ownKeys.forEach(function(key) {
              _defineProperty(target, key, source[key]);
            });
          }
          return target;
        }
        function _defineProperty(obj, key, value) {
          if (key in obj) {
            Object.defineProperty(obj, key, { value, enumerable: true, configurable: true, writable: true });
          } else {
            obj[key] = value;
          }
          return obj;
        }
        var FILL_GAP_AVAILABLE_METHODS = ["padding", "margin", "width", "max-width", "none"];
        var TOUCH_DIRECTION_DETECT_OFFSET = 3;
        var state = {
          scroll: true,
          queue: 0,
          scrollableSelectors: ["[data-scroll-lock-scrollable]"],
          lockableSelectors: ["body", "[data-scroll-lock-lockable]"],
          fillGapSelectors: ["body", "[data-scroll-lock-fill-gap]", "[data-scroll-lock-lockable]"],
          fillGapMethod: FILL_GAP_AVAILABLE_METHODS[0],
          startTouchY: 0,
          startTouchX: 0
        };
        var disablePageScroll = function disablePageScroll2(target) {
          if (state.queue <= 0) {
            state.scroll = false;
            scroll_lock_hideLockableOverflow();
            fillGaps();
          }
          scroll_lock_addScrollableTarget(target);
          state.queue++;
        };
        var enablePageScroll = function enablePageScroll2(target) {
          state.queue > 0 && state.queue--;
          if (state.queue <= 0) {
            state.scroll = true;
            scroll_lock_showLockableOverflow();
            unfillGaps();
          }
          scroll_lock_removeScrollableTarget(target);
        };
        var getScrollState = function getScrollState2() {
          return state.scroll;
        };
        var clearQueueScrollLocks = function clearQueueScrollLocks2() {
          state.queue = 0;
        };
        var scroll_lock_getTargetScrollBarWidth = function getTargetScrollBarWidth($target) {
          var onlyExists = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : false;
          if (isElement($target)) {
            var currentOverflowYProperty = $target.style.overflowY;
            if (onlyExists) {
              if (!getScrollState()) {
                $target.style.overflowY = $target.getAttribute("data-scroll-lock-saved-overflow-y-property");
              }
            } else {
              $target.style.overflowY = "scroll";
            }
            var width = scroll_lock_getCurrentTargetScrollBarWidth($target);
            $target.style.overflowY = currentOverflowYProperty;
            return width;
          } else {
            return 0;
          }
        };
        var scroll_lock_getCurrentTargetScrollBarWidth = function getCurrentTargetScrollBarWidth($target) {
          if (isElement($target)) {
            if ($target === document.body) {
              var documentWidth = document.documentElement.clientWidth;
              var windowWidth = window.innerWidth;
              var currentWidth = windowWidth - documentWidth;
              return currentWidth;
            } else {
              var borderLeftWidthCurrentProperty = $target.style.borderLeftWidth;
              var borderRightWidthCurrentProperty = $target.style.borderRightWidth;
              $target.style.borderLeftWidth = "0px";
              $target.style.borderRightWidth = "0px";
              var _currentWidth = $target.offsetWidth - $target.clientWidth;
              $target.style.borderLeftWidth = borderLeftWidthCurrentProperty;
              $target.style.borderRightWidth = borderRightWidthCurrentProperty;
              return _currentWidth;
            }
          } else {
            return 0;
          }
        };
        var getPageScrollBarWidth = function getPageScrollBarWidth2() {
          var onlyExists = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : false;
          return scroll_lock_getTargetScrollBarWidth(document.body, onlyExists);
        };
        var getCurrentPageScrollBarWidth = function getCurrentPageScrollBarWidth2() {
          return scroll_lock_getCurrentTargetScrollBarWidth(document.body);
        };
        var scroll_lock_addScrollableTarget = function addScrollableTarget(target) {
          if (target) {
            var targets = argumentAsArray(target);
            targets.map(function($targets) {
              eachNode($targets, function($target) {
                if (isElement($target)) {
                  $target.setAttribute("data-scroll-lock-scrollable", "");
                } else {
                  throwError('"'.concat($target, '" is not a Element.'));
                }
              });
            });
          }
        };
        var scroll_lock_removeScrollableTarget = function removeScrollableTarget(target) {
          if (target) {
            var targets = argumentAsArray(target);
            targets.map(function($targets) {
              eachNode($targets, function($target) {
                if (isElement($target)) {
                  $target.removeAttribute("data-scroll-lock-scrollable");
                } else {
                  throwError('"'.concat($target, '" is not a Element.'));
                }
              });
            });
          }
        };
        var scroll_lock_addScrollableSelector = function addScrollableSelector(selector) {
          if (selector) {
            var selectors = argumentAsArray(selector);
            selectors.map(function(selector2) {
              state.scrollableSelectors.push(selector2);
            });
          }
        };
        var scroll_lock_removeScrollableSelector = function removeScrollableSelector(selector) {
          if (selector) {
            var selectors = argumentAsArray(selector);
            selectors.map(function(selector2) {
              state.scrollableSelectors = state.scrollableSelectors.filter(function(sSelector) {
                return sSelector !== selector2;
              });
            });
          }
        };
        var scroll_lock_addLockableTarget = function addLockableTarget(target) {
          if (target) {
            var targets = argumentAsArray(target);
            targets.map(function($targets) {
              eachNode($targets, function($target) {
                if (isElement($target)) {
                  $target.setAttribute("data-scroll-lock-lockable", "");
                } else {
                  throwError('"'.concat($target, '" is not a Element.'));
                }
              });
            });
            if (!getScrollState()) {
              scroll_lock_hideLockableOverflow();
            }
          }
        };
        var scroll_lock_addLockableSelector = function addLockableSelector(selector) {
          if (selector) {
            var selectors = argumentAsArray(selector);
            selectors.map(function(selector2) {
              state.lockableSelectors.push(selector2);
            });
            if (!getScrollState()) {
              scroll_lock_hideLockableOverflow();
            }
            scroll_lock_addFillGapSelector(selector);
          }
        };
        var scroll_lock_setFillGapMethod = function setFillGapMethod(method) {
          if (method) {
            if (FILL_GAP_AVAILABLE_METHODS.indexOf(method) !== -1) {
              state.fillGapMethod = method;
              refillGaps();
            } else {
              var methods = FILL_GAP_AVAILABLE_METHODS.join(", ");
              throwError('"'.concat(method, '" method is not available!\nAvailable fill gap methods: ').concat(methods, "."));
            }
          }
        };
        var scroll_lock_addFillGapTarget = function addFillGapTarget(target) {
          if (target) {
            var targets = argumentAsArray(target);
            targets.map(function($targets) {
              eachNode($targets, function($target) {
                if (isElement($target)) {
                  $target.setAttribute("data-scroll-lock-fill-gap", "");
                  if (!state.scroll) {
                    scroll_lock_fillGapTarget($target);
                  }
                } else {
                  throwError('"'.concat($target, '" is not a Element.'));
                }
              });
            });
          }
        };
        var scroll_lock_removeFillGapTarget = function removeFillGapTarget(target) {
          if (target) {
            var targets = argumentAsArray(target);
            targets.map(function($targets) {
              eachNode($targets, function($target) {
                if (isElement($target)) {
                  $target.removeAttribute("data-scroll-lock-fill-gap");
                  if (!state.scroll) {
                    scroll_lock_unfillGapTarget($target);
                  }
                } else {
                  throwError('"'.concat($target, '" is not a Element.'));
                }
              });
            });
          }
        };
        var scroll_lock_addFillGapSelector = function addFillGapSelector(selector) {
          if (selector) {
            var selectors = argumentAsArray(selector);
            selectors.map(function(selector2) {
              if (state.fillGapSelectors.indexOf(selector2) === -1) {
                state.fillGapSelectors.push(selector2);
                if (!state.scroll) {
                  scroll_lock_fillGapSelector(selector2);
                }
              }
            });
          }
        };
        var scroll_lock_removeFillGapSelector = function removeFillGapSelector(selector) {
          if (selector) {
            var selectors = argumentAsArray(selector);
            selectors.map(function(selector2) {
              state.fillGapSelectors = state.fillGapSelectors.filter(function(fSelector) {
                return fSelector !== selector2;
              });
              if (!state.scroll) {
                scroll_lock_unfillGapSelector(selector2);
              }
            });
          }
        };
        var refillGaps = function refillGaps2() {
          if (!state.scroll) {
            fillGaps();
          }
        };
        var scroll_lock_hideLockableOverflow = function hideLockableOverflow() {
          var selector = arrayAsSelector(state.lockableSelectors);
          scroll_lock_hideLockableOverflowSelector(selector);
        };
        var scroll_lock_showLockableOverflow = function showLockableOverflow() {
          var selector = arrayAsSelector(state.lockableSelectors);
          scroll_lock_showLockableOverflowSelector(selector);
        };
        var scroll_lock_hideLockableOverflowSelector = function hideLockableOverflowSelector(selector) {
          var $targets = document.querySelectorAll(selector);
          eachNode($targets, function($target) {
            scroll_lock_hideLockableOverflowTarget($target);
          });
        };
        var scroll_lock_showLockableOverflowSelector = function showLockableOverflowSelector(selector) {
          var $targets = document.querySelectorAll(selector);
          eachNode($targets, function($target) {
            scroll_lock_showLockableOverflowTarget($target);
          });
        };
        var scroll_lock_hideLockableOverflowTarget = function hideLockableOverflowTarget($target) {
          if (isElement($target) && $target.getAttribute("data-scroll-lock-locked") !== "true") {
            var computedStyle = window.getComputedStyle($target);
            $target.setAttribute("data-scroll-lock-saved-overflow-y-property", computedStyle.overflowY);
            $target.setAttribute("data-scroll-lock-saved-inline-overflow-property", $target.style.overflow);
            $target.setAttribute("data-scroll-lock-saved-inline-overflow-y-property", $target.style.overflowY);
            $target.style.overflow = "hidden";
            $target.setAttribute("data-scroll-lock-locked", "true");
          }
        };
        var scroll_lock_showLockableOverflowTarget = function showLockableOverflowTarget($target) {
          if (isElement($target) && $target.getAttribute("data-scroll-lock-locked") === "true") {
            $target.style.overflow = $target.getAttribute("data-scroll-lock-saved-inline-overflow-property");
            $target.style.overflowY = $target.getAttribute("data-scroll-lock-saved-inline-overflow-y-property");
            $target.removeAttribute("data-scroll-lock-saved-overflow-property");
            $target.removeAttribute("data-scroll-lock-saved-inline-overflow-property");
            $target.removeAttribute("data-scroll-lock-saved-inline-overflow-y-property");
            $target.removeAttribute("data-scroll-lock-locked");
          }
        };
        var fillGaps = function fillGaps2() {
          state.fillGapSelectors.map(function(selector) {
            scroll_lock_fillGapSelector(selector);
          });
        };
        var unfillGaps = function unfillGaps2() {
          state.fillGapSelectors.map(function(selector) {
            scroll_lock_unfillGapSelector(selector);
          });
        };
        var scroll_lock_fillGapSelector = function fillGapSelector(selector) {
          var $targets = document.querySelectorAll(selector);
          var isLockable = state.lockableSelectors.indexOf(selector) !== -1;
          eachNode($targets, function($target) {
            scroll_lock_fillGapTarget($target, isLockable);
          });
        };
        var scroll_lock_fillGapTarget = function fillGapTarget($target) {
          var isLockable = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : false;
          if (isElement($target)) {
            var scrollBarWidth;
            if ($target.getAttribute("data-scroll-lock-lockable") === "" || isLockable) {
              scrollBarWidth = scroll_lock_getTargetScrollBarWidth($target, true);
            } else {
              var $lockableParent = findParentBySelector($target, arrayAsSelector(state.lockableSelectors));
              scrollBarWidth = scroll_lock_getTargetScrollBarWidth($lockableParent, true);
            }
            if ($target.getAttribute("data-scroll-lock-filled-gap") === "true") {
              scroll_lock_unfillGapTarget($target);
            }
            var computedStyle = window.getComputedStyle($target);
            $target.setAttribute("data-scroll-lock-filled-gap", "true");
            $target.setAttribute("data-scroll-lock-current-fill-gap-method", state.fillGapMethod);
            if (state.fillGapMethod === "margin") {
              var currentMargin = parseFloat(computedStyle.marginRight);
              $target.style.marginRight = "".concat(currentMargin + scrollBarWidth, "px");
            } else if (state.fillGapMethod === "width") {
              $target.style.width = "calc(100% - ".concat(scrollBarWidth, "px)");
            } else if (state.fillGapMethod === "max-width") {
              $target.style.maxWidth = "calc(100% - ".concat(scrollBarWidth, "px)");
            } else if (state.fillGapMethod === "padding") {
              var currentPadding = parseFloat(computedStyle.paddingRight);
              $target.style.paddingRight = "".concat(currentPadding + scrollBarWidth, "px");
            }
          }
        };
        var scroll_lock_unfillGapSelector = function unfillGapSelector(selector) {
          var $targets = document.querySelectorAll(selector);
          eachNode($targets, function($target) {
            scroll_lock_unfillGapTarget($target);
          });
        };
        var scroll_lock_unfillGapTarget = function unfillGapTarget($target) {
          if (isElement($target)) {
            if ($target.getAttribute("data-scroll-lock-filled-gap") === "true") {
              var currentFillGapMethod = $target.getAttribute("data-scroll-lock-current-fill-gap-method");
              $target.removeAttribute("data-scroll-lock-filled-gap");
              $target.removeAttribute("data-scroll-lock-current-fill-gap-method");
              if (currentFillGapMethod === "margin") {
                $target.style.marginRight = "";
              } else if (currentFillGapMethod === "width") {
                $target.style.width = "";
              } else if (currentFillGapMethod === "max-width") {
                $target.style.maxWidth = "";
              } else if (currentFillGapMethod === "padding") {
                $target.style.paddingRight = "";
              }
            }
          }
        };
        var onResize = function onResize2(e) {
          refillGaps();
        };
        var onTouchStart = function onTouchStart2(e) {
          if (!state.scroll) {
            state.startTouchY = e.touches[0].clientY;
            state.startTouchX = e.touches[0].clientX;
          }
        };
        var scroll_lock_onTouchMove = function onTouchMove(e) {
          if (!state.scroll) {
            var startTouchY = state.startTouchY, startTouchX = state.startTouchX;
            var currentClientY = e.touches[0].clientY;
            var currentClientX = e.touches[0].clientX;
            if (e.touches.length < 2) {
              var selector = arrayAsSelector(state.scrollableSelectors);
              var direction = {
                up: startTouchY < currentClientY,
                down: startTouchY > currentClientY,
                left: startTouchX < currentClientX,
                right: startTouchX > currentClientX
              };
              var directionWithOffset = {
                up: startTouchY + TOUCH_DIRECTION_DETECT_OFFSET < currentClientY,
                down: startTouchY - TOUCH_DIRECTION_DETECT_OFFSET > currentClientY,
                left: startTouchX + TOUCH_DIRECTION_DETECT_OFFSET < currentClientX,
                right: startTouchX - TOUCH_DIRECTION_DETECT_OFFSET > currentClientX
              };
              var handle = function handle2($el) {
                var skip = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : false;
                if ($el) {
                  var parentScrollableEl = findParentBySelector($el, selector, false);
                  if (elementIsInputRange($el)) {
                    return false;
                  }
                  if (skip || elementIsScrollableField($el) && findParentBySelector($el, selector) || elementHasSelector($el, selector)) {
                    var prevent = false;
                    if (elementScrollLeftOnStart($el) && elementScrollLeftOnEnd($el)) {
                      if (direction.up && elementScrollTopOnStart($el) || direction.down && elementScrollTopOnEnd($el)) {
                        prevent = true;
                      }
                    } else if (elementScrollTopOnStart($el) && elementScrollTopOnEnd($el)) {
                      if (direction.left && elementScrollLeftOnStart($el) || direction.right && elementScrollLeftOnEnd($el)) {
                        prevent = true;
                      }
                    } else if (directionWithOffset.up && elementScrollTopOnStart($el) || directionWithOffset.down && elementScrollTopOnEnd($el) || directionWithOffset.left && elementScrollLeftOnStart($el) || directionWithOffset.right && elementScrollLeftOnEnd($el)) {
                      prevent = true;
                    }
                    if (prevent) {
                      if (parentScrollableEl) {
                        handle2(parentScrollableEl, true);
                      } else {
                        if (e.cancelable) {
                          e.preventDefault();
                        }
                      }
                    }
                  } else {
                    handle2(parentScrollableEl);
                  }
                } else {
                  if (e.cancelable) {
                    e.preventDefault();
                  }
                }
              };
              handle(e.target);
            }
          }
        };
        var onTouchEnd = function onTouchEnd2(e) {
          if (!state.scroll) {
            state.startTouchY = 0;
            state.startTouchX = 0;
          }
        };
        if (typeof window !== "undefined") {
          window.addEventListener("resize", onResize);
        }
        if (typeof document !== "undefined") {
          document.addEventListener("touchstart", onTouchStart);
          document.addEventListener("touchmove", scroll_lock_onTouchMove, {
            passive: false
          });
          document.addEventListener("touchend", onTouchEnd);
        }
        var deprecatedMethods = {
          hide: function hide(target) {
            throwError('"hide" is deprecated! Use "disablePageScroll" instead. \n https://github.com/FL3NKEY/scroll-lock#disablepagescrollscrollabletarget');
            disablePageScroll(target);
          },
          show: function show(target) {
            throwError('"show" is deprecated! Use "enablePageScroll" instead. \n https://github.com/FL3NKEY/scroll-lock#enablepagescrollscrollabletarget');
            enablePageScroll(target);
          },
          toggle: function toggle(target) {
            throwError('"toggle" is deprecated! Do not use it.');
            if (getScrollState()) {
              disablePageScroll();
            } else {
              enablePageScroll(target);
            }
          },
          getState: function getState() {
            throwError('"getState" is deprecated! Use "getScrollState" instead. \n https://github.com/FL3NKEY/scroll-lock#getscrollstate');
            return getScrollState();
          },
          getWidth: function getWidth() {
            throwError('"getWidth" is deprecated! Use "getPageScrollBarWidth" instead. \n https://github.com/FL3NKEY/scroll-lock#getpagescrollbarwidth');
            return getPageScrollBarWidth();
          },
          getCurrentWidth: function getCurrentWidth() {
            throwError('"getCurrentWidth" is deprecated! Use "getCurrentPageScrollBarWidth" instead. \n https://github.com/FL3NKEY/scroll-lock#getcurrentpagescrollbarwidth');
            return getCurrentPageScrollBarWidth();
          },
          setScrollableTargets: function setScrollableTargets(target) {
            throwError('"setScrollableTargets" is deprecated! Use "addScrollableTarget" instead. \n https://github.com/FL3NKEY/scroll-lock#addscrollabletargetscrollabletarget');
            scroll_lock_addScrollableTarget(target);
          },
          setFillGapSelectors: function setFillGapSelectors(selector) {
            throwError('"setFillGapSelectors" is deprecated! Use "addFillGapSelector" instead. \n https://github.com/FL3NKEY/scroll-lock#addfillgapselectorfillgapselector');
            scroll_lock_addFillGapSelector(selector);
          },
          setFillGapTargets: function setFillGapTargets(target) {
            throwError('"setFillGapTargets" is deprecated! Use "addFillGapTarget" instead. \n https://github.com/FL3NKEY/scroll-lock#addfillgaptargetfillgaptarget');
            scroll_lock_addFillGapTarget(target);
          },
          clearQueue: function clearQueue() {
            throwError('"clearQueue" is deprecated! Use "clearQueueScrollLocks" instead. \n https://github.com/FL3NKEY/scroll-lock#clearqueuescrolllocks');
            clearQueueScrollLocks();
          }
        };
        var scrollLock2 = _objectSpread({
          disablePageScroll,
          enablePageScroll,
          getScrollState,
          clearQueueScrollLocks,
          getTargetScrollBarWidth: scroll_lock_getTargetScrollBarWidth,
          getCurrentTargetScrollBarWidth: scroll_lock_getCurrentTargetScrollBarWidth,
          getPageScrollBarWidth,
          getCurrentPageScrollBarWidth,
          addScrollableSelector: scroll_lock_addScrollableSelector,
          removeScrollableSelector: scroll_lock_removeScrollableSelector,
          addScrollableTarget: scroll_lock_addScrollableTarget,
          removeScrollableTarget: scroll_lock_removeScrollableTarget,
          addLockableSelector: scroll_lock_addLockableSelector,
          addLockableTarget: scroll_lock_addLockableTarget,
          addFillGapSelector: scroll_lock_addFillGapSelector,
          removeFillGapSelector: scroll_lock_removeFillGapSelector,
          addFillGapTarget: scroll_lock_addFillGapTarget,
          removeFillGapTarget: scroll_lock_removeFillGapTarget,
          setFillGapMethod: scroll_lock_setFillGapMethod,
          refillGaps,
          _state: state
        }, deprecatedMethods);
        __webpack_exports__["default"] = scrollLock2;
      }
    ])["default"];
  });
})(scrollLock);
const framework7Icons = "";
var breakpoint = 768;
if (window.innerWidth < breakpoint) {
  (document.body.style.marginTop = ((_a = document.querySelector("#nav-top-phone")) == null ? void 0 : _a.offsetHeight) || 0) + "px";
} else {
  (document.body.style.marginTop = ((_b = document.querySelector("#nav-top-desktop")) == null ? void 0 : _b.offsetHeight) || 0) + "px";
}
index.init({
  mainElement: "body",
  onRefresh() {
    window.location.reload(true);
  }
});
u(".scroll-toggler").on("click", function() {
  console.log("toggle scroll");
  if (scrollLock.exports.getScrollState()) {
    scrollLock.exports.disablePageScroll();
  } else {
    scrollLock.exports.enablePageScroll();
  }
});
window.loadMoreApps = function(el, id = "apps") {
  var meta = document.head.querySelector("meta[name=page][content]");
  var currentPage = parseInt(meta.content);
  var nextPage = currentPage + 1;
  if (window.location.href.includes("?")) {
    var url = window.location.href + "&html=true&page=" + nextPage;
  } else {
    var url = window.location.href + "?html=true&page=" + nextPage;
  }
  getJSON(url, function(err, doc) {
    if (err || typeof doc.body == "undefined") {
      el.innerHTML = "No more " + id + ". Try again?";
    } else {
      var apps = document.getElementById(id);
      apps.innerHTML += doc.body.innerHTML;
      meta.setAttribute("content", nextPage.toString());
      (adsbygoogle = window.adsbygoogle || []).push({});
    }
  }, "document");
};
window.onSearchInput = function(el) {
  window.searchinput = el.value.toLowerCase();
};
//# sourceMappingURL=main.ea8e344c.js.map
