/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/scroll-lock/dist/scroll-lock.js":
/*!******************************************************!*\
  !*** ./node_modules/scroll-lock/dist/scroll-lock.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

(function webpackUniversalModuleDefinition(root, factory) {
	if(true)
		module.exports = factory();
	else {}
})(this, function() {
return /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./src/tools.js
var argumentAsArray = function argumentAsArray(argument) {
  return Array.isArray(argument) ? argument : [argument];
};
var isElement = function isElement(target) {
  return target instanceof Node;
};
var isElementList = function isElementList(nodeList) {
  return nodeList instanceof NodeList;
};
var eachNode = function eachNode(nodeList, callback) {
  if (nodeList && callback) {
    nodeList = isElementList(nodeList) ? nodeList : [nodeList];

    for (var i = 0; i < nodeList.length; i++) {
      if (callback(nodeList[i], i, nodeList.length) === true) {
        break;
      }
    }
  }
};
var throwError = function throwError(message) {
  return console.error("[scroll-lock] ".concat(message));
};
var arrayAsSelector = function arrayAsSelector(array) {
  if (Array.isArray(array)) {
    var selector = array.join(', ');
    return selector;
  }
};
var nodeListAsArray = function nodeListAsArray(nodeList) {
  var nodes = [];
  eachNode(nodeList, function (node) {
    return nodes.push(node);
  });
  return nodes;
};
var findParentBySelector = function findParentBySelector($el, selector) {
  var self = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
  var $root = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : document;

  if (self && nodeListAsArray($root.querySelectorAll(selector)).indexOf($el) !== -1) {
    return $el;
  }

  while (($el = $el.parentElement) && nodeListAsArray($root.querySelectorAll(selector)).indexOf($el) === -1) {
    ;
  }

  return $el;
};
var elementHasSelector = function elementHasSelector($el, selector) {
  var $root = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : document;
  var has = nodeListAsArray($root.querySelectorAll(selector)).indexOf($el) !== -1;
  return has;
};
var elementHasOverflowHidden = function elementHasOverflowHidden($el) {
  if ($el) {
    var computedStyle = getComputedStyle($el);
    var overflowIsHidden = computedStyle.overflow === 'hidden';
    return overflowIsHidden;
  }
};
var elementScrollTopOnStart = function elementScrollTopOnStart($el) {
  if ($el) {
    if (elementHasOverflowHidden($el)) {
      return true;
    }

    var scrollTop = $el.scrollTop;
    return scrollTop <= 0;
  }
};
var elementScrollTopOnEnd = function elementScrollTopOnEnd($el) {
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
var elementScrollLeftOnStart = function elementScrollLeftOnStart($el) {
  if ($el) {
    if (elementHasOverflowHidden($el)) {
      return true;
    }

    var scrollLeft = $el.scrollLeft;
    return scrollLeft <= 0;
  }
};
var elementScrollLeftOnEnd = function elementScrollLeftOnEnd($el) {
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
var elementIsScrollableField = function elementIsScrollableField($el) {
  var selector = 'textarea, [contenteditable="true"]';
  return elementHasSelector($el, selector);
};
var elementIsInputRange = function elementIsInputRange($el) {
  var selector = 'input[type="range"]';
  return elementHasSelector($el, selector);
};
// CONCATENATED MODULE: ./src/scroll-lock.js
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "disablePageScroll", function() { return disablePageScroll; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "enablePageScroll", function() { return enablePageScroll; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getScrollState", function() { return getScrollState; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "clearQueueScrollLocks", function() { return clearQueueScrollLocks; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getTargetScrollBarWidth", function() { return scroll_lock_getTargetScrollBarWidth; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getCurrentTargetScrollBarWidth", function() { return scroll_lock_getCurrentTargetScrollBarWidth; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getPageScrollBarWidth", function() { return getPageScrollBarWidth; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getCurrentPageScrollBarWidth", function() { return getCurrentPageScrollBarWidth; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addScrollableTarget", function() { return scroll_lock_addScrollableTarget; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeScrollableTarget", function() { return scroll_lock_removeScrollableTarget; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addScrollableSelector", function() { return scroll_lock_addScrollableSelector; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeScrollableSelector", function() { return scroll_lock_removeScrollableSelector; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addLockableTarget", function() { return scroll_lock_addLockableTarget; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addLockableSelector", function() { return scroll_lock_addLockableSelector; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setFillGapMethod", function() { return scroll_lock_setFillGapMethod; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addFillGapTarget", function() { return scroll_lock_addFillGapTarget; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeFillGapTarget", function() { return scroll_lock_removeFillGapTarget; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addFillGapSelector", function() { return scroll_lock_addFillGapSelector; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeFillGapSelector", function() { return scroll_lock_removeFillGapSelector; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "refillGaps", function() { return refillGaps; });
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; var ownKeys = Object.keys(source); if (typeof Object.getOwnPropertySymbols === 'function') { ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) { return Object.getOwnPropertyDescriptor(source, sym).enumerable; })); } ownKeys.forEach(function (key) { _defineProperty(target, key, source[key]); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }


var FILL_GAP_AVAILABLE_METHODS = ['padding', 'margin', 'width', 'max-width', 'none'];
var TOUCH_DIRECTION_DETECT_OFFSET = 3;
var state = {
  scroll: true,
  queue: 0,
  scrollableSelectors: ['[data-scroll-lock-scrollable]'],
  lockableSelectors: ['body', '[data-scroll-lock-lockable]'],
  fillGapSelectors: ['body', '[data-scroll-lock-fill-gap]', '[data-scroll-lock-lockable]'],
  fillGapMethod: FILL_GAP_AVAILABLE_METHODS[0],
  //
  startTouchY: 0,
  startTouchX: 0
};
var disablePageScroll = function disablePageScroll(target) {
  if (state.queue <= 0) {
    state.scroll = false;
    scroll_lock_hideLockableOverflow();
    fillGaps();
  }

  scroll_lock_addScrollableTarget(target);
  state.queue++;
};
var enablePageScroll = function enablePageScroll(target) {
  state.queue > 0 && state.queue--;

  if (state.queue <= 0) {
    state.scroll = true;
    scroll_lock_showLockableOverflow();
    unfillGaps();
  }

  scroll_lock_removeScrollableTarget(target);
};
var getScrollState = function getScrollState() {
  return state.scroll;
};
var clearQueueScrollLocks = function clearQueueScrollLocks() {
  state.queue = 0;
};
var scroll_lock_getTargetScrollBarWidth = function getTargetScrollBarWidth($target) {
  var onlyExists = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

  if (isElement($target)) {
    var currentOverflowYProperty = $target.style.overflowY;

    if (onlyExists) {
      if (!getScrollState()) {
        $target.style.overflowY = $target.dataset.scrollLockSavedOverflowYProperty;
      }
    } else {
      $target.style.overflowY = 'scroll';
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
      $target.style.borderLeftWidth = '0px';
      $target.style.borderRightWidth = '0px';

      var _currentWidth = $target.offsetWidth - $target.clientWidth;

      $target.style.borderLeftWidth = borderLeftWidthCurrentProperty;
      $target.style.borderRightWidth = borderRightWidthCurrentProperty;
      return _currentWidth;
    }
  } else {
    return 0;
  }
};
var getPageScrollBarWidth = function getPageScrollBarWidth() {
  var onlyExists = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
  return scroll_lock_getTargetScrollBarWidth(document.body, onlyExists);
};
var getCurrentPageScrollBarWidth = function getCurrentPageScrollBarWidth() {
  return scroll_lock_getCurrentTargetScrollBarWidth(document.body);
};
var scroll_lock_addScrollableTarget = function addScrollableTarget(target) {
  if (target) {
    var targets = argumentAsArray(target);
    targets.map(function ($targets) {
      eachNode($targets, function ($target) {
        if (isElement($target)) {
          $target.dataset.scrollLockScrollable = '';
        } else {
          throwError("\"".concat($target, "\" is not a Element."));
        }
      });
    });
  }
};
var scroll_lock_removeScrollableTarget = function removeScrollableTarget(target) {
  if (target) {
    var targets = argumentAsArray(target);
    targets.map(function ($targets) {
      eachNode($targets, function ($target) {
        if (isElement($target)) {
          delete $target.dataset.scrollLockScrollable;
        } else {
          throwError("\"".concat($target, "\" is not a Element."));
        }
      });
    });
  }
};
var scroll_lock_addScrollableSelector = function addScrollableSelector(selector) {
  if (selector) {
    var selectors = argumentAsArray(selector);
    selectors.map(function (selector) {
      state.scrollableSelectors.push(selector);
    });
  }
};
var scroll_lock_removeScrollableSelector = function removeScrollableSelector(selector) {
  if (selector) {
    var selectors = argumentAsArray(selector);
    selectors.map(function (selector) {
      state.scrollableSelectors = state.scrollableSelectors.filter(function (sSelector) {
        return sSelector !== selector;
      });
    });
  }
};
var scroll_lock_addLockableTarget = function addLockableTarget(target) {
  if (target) {
    var targets = argumentAsArray(target);
    targets.map(function ($targets) {
      eachNode($targets, function ($target) {
        if (isElement($target)) {
          $target.dataset.scrollLockLockable = '';
        } else {
          throwError("\"".concat($target, "\" is not a Element."));
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
    selectors.map(function (selector) {
      state.lockableSelectors.push(selector);
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
      var methods = FILL_GAP_AVAILABLE_METHODS.join(', ');
      throwError("\"".concat(method, "\" method is not available!\nAvailable fill gap methods: ").concat(methods, "."));
    }
  }
};
var scroll_lock_addFillGapTarget = function addFillGapTarget(target) {
  if (target) {
    var targets = argumentAsArray(target);
    targets.map(function ($targets) {
      eachNode($targets, function ($target) {
        if (isElement($target)) {
          $target.dataset.scrollLockFillGap = '';

          if (!state.scroll) {
            scroll_lock_fillGapTarget($target);
          }
        } else {
          throwError("\"".concat($target, "\" is not a Element."));
        }
      });
    });
  }
};
var scroll_lock_removeFillGapTarget = function removeFillGapTarget(target) {
  if (target) {
    var targets = argumentAsArray(target);
    targets.map(function ($targets) {
      eachNode($targets, function ($target) {
        if (isElement($target)) {
          delete $target.dataset.scrollLockFillGap;

          if (!state.scroll) {
            scroll_lock_unfillGapTarget($target);
          }
        } else {
          throwError("\"".concat($target, "\" is not a Element."));
        }
      });
    });
  }
};
var scroll_lock_addFillGapSelector = function addFillGapSelector(selector) {
  if (selector) {
    var selectors = argumentAsArray(selector);
    selectors.map(function (selector) {
      state.fillGapSelectors.push(selector);

      if (!state.scroll) {
        scroll_lock_fillGapSelector(selector);
      }
    });
  }
};
var scroll_lock_removeFillGapSelector = function removeFillGapSelector(selector) {
  if (selector) {
    var selectors = argumentAsArray(selector);
    selectors.map(function (selector) {
      state.fillGapSelectors = state.fillGapSelectors.filter(function (fSelector) {
        return fSelector !== selector;
      });

      if (!state.scroll) {
        scroll_lock_unfillGapSelector(selector);
      }
    });
  }
};
var refillGaps = function refillGaps() {
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
  eachNode($targets, function ($target) {
    scroll_lock_hideLockableOverflowTarget($target);
  });
};

var scroll_lock_showLockableOverflowSelector = function showLockableOverflowSelector(selector) {
  var $targets = document.querySelectorAll(selector);
  eachNode($targets, function ($target) {
    scroll_lock_showLockableOverflowTarget($target);
  });
};

var scroll_lock_hideLockableOverflowTarget = function hideLockableOverflowTarget($target) {
  if (isElement($target) && $target.dataset.scrollLockLocked !== 'true') {
    var computedStyle = window.getComputedStyle($target);
    $target.dataset.scrollLockSavedOverflowYProperty = computedStyle.overflowY;
    $target.dataset.scrollLockSavedInlineOverflowProperty = $target.style.overflow;
    $target.dataset.scrollLockSavedInlineOverflowYProperty = $target.style.overflowY;
    $target.style.overflow = 'hidden';
    $target.dataset.scrollLockLocked = 'true';
  }
};

var scroll_lock_showLockableOverflowTarget = function showLockableOverflowTarget($target) {
  if (isElement($target) && $target.dataset.scrollLockLocked === 'true') {
    $target.style.overflow = $target.dataset.scrollLockSavedInlineOverflowProperty;
    $target.style.overflowY = $target.dataset.scrollLockSavedInlineOverflowYProperty;
    delete $target.dataset.scrollLockSavedOverflowYProperty;
    delete $target.dataset.scrollLockSavedInlineOverflowProperty;
    delete $target.dataset.scrollLockSavedInlineOverflowYProperty;
    delete $target.dataset.scrollLockLocked;
  }
};

var fillGaps = function fillGaps() {
  state.fillGapSelectors.map(function (selector) {
    scroll_lock_fillGapSelector(selector);
  });
};

var unfillGaps = function unfillGaps() {
  state.fillGapSelectors.map(function (selector) {
    scroll_lock_unfillGapSelector(selector);
  });
};

var scroll_lock_fillGapSelector = function fillGapSelector(selector) {
  var $targets = document.querySelectorAll(selector);
  var isLockable = state.lockableSelectors.indexOf(selector) !== -1;
  eachNode($targets, function ($target) {
    scroll_lock_fillGapTarget($target, isLockable);
  });
};

var scroll_lock_fillGapTarget = function fillGapTarget($target) {
  var isLockable = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

  if (isElement($target)) {
    var scrollBarWidth;

    if ($target.dataset.scrollLockLockable === '' || isLockable) {
      scrollBarWidth = scroll_lock_getTargetScrollBarWidth($target, true);
    } else {
      var $lockableParent = findParentBySelector($target, arrayAsSelector(state.lockableSelectors));
      scrollBarWidth = scroll_lock_getTargetScrollBarWidth($lockableParent, true);
    }

    if ($target.dataset.scrollLockFilledGap === 'true') {
      scroll_lock_unfillGapTarget($target);
    }

    var computedStyle = window.getComputedStyle($target);
    $target.dataset.scrollLockFilledGap = 'true';
    $target.dataset.scrollLockCurrentFillGapMethod = state.fillGapMethod;

    if (state.fillGapMethod === 'margin') {
      var currentMargin = parseFloat(computedStyle.marginRight);
      $target.style.marginRight = "".concat(currentMargin + scrollBarWidth, "px");
    } else if (state.fillGapMethod === 'width') {
      $target.style.width = "calc(100% - ".concat(scrollBarWidth, "px)");
    } else if (state.fillGapMethod === 'max-width') {
      $target.style.maxWidth = "calc(100% - ".concat(scrollBarWidth, "px)");
    } else if (state.fillGapMethod === 'padding') {
      var currentPadding = parseFloat(computedStyle.paddingRight);
      $target.style.paddingRight = "".concat(currentPadding + scrollBarWidth, "px");
    }
  }
};

var scroll_lock_unfillGapSelector = function unfillGapSelector(selector) {
  var $targets = document.querySelectorAll(selector);
  eachNode($targets, function ($target) {
    scroll_lock_unfillGapTarget($target);
  });
};

var scroll_lock_unfillGapTarget = function unfillGapTarget($target) {
  if (isElement($target)) {
    if ($target.dataset.scrollLockFilledGap === 'true') {
      var currentFillGapMethod = $target.dataset.scrollLockCurrentFillGapMethod;
      delete $target.dataset.scrollLockFilledGap;
      delete $target.dataset.scrollLockCurrentFillGapMethod;

      if (currentFillGapMethod === 'margin') {
        $target.style.marginRight = "";
      } else if (currentFillGapMethod === 'width') {
        $target.style.width = "";
      } else if (currentFillGapMethod === 'max-width') {
        $target.style.maxWidth = "";
      } else if (currentFillGapMethod === 'padding') {
        $target.style.paddingRight = "";
      }
    }
  }
};

var onResize = function onResize(e) {
  refillGaps();
};

var onTouchStart = function onTouchStart(e) {
  if (!state.scroll) {
    state.startTouchY = e.touches[0].clientY;
    state.startTouchX = e.touches[0].clientX;
  }
};

var scroll_lock_onTouchMove = function onTouchMove(e) {
  if (!state.scroll) {
    var startTouchY = state.startTouchY,
        startTouchX = state.startTouchX;
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

      var handle = function handle($el) {
        var skip = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

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
                handle(parentScrollableEl, true);
              } else {
                e.preventDefault();
              }
            }
          } else {
            handle(parentScrollableEl);
          }
        } else {
          e.preventDefault();
        }
      };

      handle(e.target);
    }
  }
};

var onTouchEnd = function onTouchEnd(e) {
  if (!state.scroll) {
    state.startTouchY = 0;
    state.startTouchX = 0;
  }
};

if (typeof window !== 'undefined') {
  window.addEventListener('resize', onResize);
}

if (typeof document !== 'undefined') {
  document.addEventListener('touchstart', onTouchStart);
  document.addEventListener('touchmove', scroll_lock_onTouchMove, {
    passive: false
  });
  document.addEventListener('touchend', onTouchEnd);
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

var scrollLock = _objectSpread({
  disablePageScroll: disablePageScroll,
  enablePageScroll: enablePageScroll,
  getScrollState: getScrollState,
  clearQueueScrollLocks: clearQueueScrollLocks,
  getTargetScrollBarWidth: scroll_lock_getTargetScrollBarWidth,
  getCurrentTargetScrollBarWidth: scroll_lock_getCurrentTargetScrollBarWidth,
  getPageScrollBarWidth: getPageScrollBarWidth,
  getCurrentPageScrollBarWidth: getCurrentPageScrollBarWidth,
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
  refillGaps: refillGaps,
  _state: state
}, deprecatedMethods);

/* harmony default export */ var scroll_lock = __webpack_exports__["default"] = (scrollLock);

/***/ })
/******/ ])["default"];
});

/***/ }),

/***/ "./resources/assets/js/autocomplete.js":
/*!*********************************************!*\
  !*** ./resources/assets/js/autocomplete.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function render(str) {
  var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var newhtml = str;
  Object.keys(data).forEach(function (key) {
    var expr = "{%= " + key + " =%}";
    var re = new RegExp(expr, "g");
    newhtml = newhtml.replace(re, data[key]);
  });
  return newhtml;
}

function getJSON(url, callback) {
  var type = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'json';
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = type;

  xhr.onload = function () {
    var status = xhr.status;

    if (status === 200) {
      callback(null, xhr.response);
    } else {
      callback(status, xhr.response);
    }
  };

  xhr.send();
}

function autocomplete(id) {
  var cb = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  var el = document.getElementById(id);
  var url = el.dataset.fetch;
  var result = el.dataset.result;
  var resultEl = document.getElementById(result);
  var template = el.dataset.template;
  getJSON(url, function (err, json) {
    if (err) return;
    getJSON(template, function (err, tmpl) {
      if (err) return;

      if (cb && Array.isArray(json)) {
        el.addEventListener("keyup", function (e) {
          if (!el.value || el.value.length < 2) return resultEl.innerHTML = "";
          var $json = json.slice();
          modified = cb.call(undefined, e, el, $json) || $json;
          var res = modified.map(function (item) {
            return render(tmpl, item);
          }).join("");
          resultEl.innerHTML = res;
        });
      }
    }, 'text');
  });
}

window.autocomplete = autocomplete;
window.getJSON = getJSON;
window.render = render;

/***/ }),

/***/ "./resources/assets/js/main.js":
/*!*************************************!*\
  !*** ./resources/assets/js/main.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _autocomplete__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./autocomplete */ "./resources/assets/js/autocomplete.js");
/* harmony import */ var _autocomplete__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_autocomplete__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _pullToRefresh__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./pullToRefresh */ "./resources/assets/js/pullToRefresh.js");
/* harmony import */ var scroll_lock__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! scroll-lock */ "./node_modules/scroll-lock/dist/scroll-lock.js");
/* harmony import */ var scroll_lock__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(scroll_lock__WEBPACK_IMPORTED_MODULE_2__);
 // import PullToRefresh from 'pulltorefreshjs';


 // import pullToRefresh from 'mobile-pull-to-refresh';
// import ptrAnimatesIos from 'mobile-pull-to-refresh/dist/styles/ios/animates';
// pullToRefresh({
//    container: document.querySelector("#app"),
//    animates: ptrAnimatesIos,
//    refresh() {
//       return new Promise(resolve => {
//          alert("reloade")
//          setTimeout(resolve, 2000)
//       })
//    }
// })
// const iNoBounce = require('./iNoBounce')
// iNoBounce.enable();

new _pullToRefresh__WEBPACK_IMPORTED_MODULE_1__["default"]({
  scrollTarget: document.getElementById("app"),
  el: document.getElementById('ptr')
}); // const ptr = PullToRefresh.init({
//    mainElement: '#ptr-target',
//    onRefresh() {
//       window.location.reload();
//    }
// })

console.log(document.getElementById('app'));
Object(scroll_lock__WEBPACK_IMPORTED_MODULE_2__["disablePageScroll"])(document.getElementById('app')); // enablePageScroll(document.getElementById('app'))

window.loadMoreApps = function (el) {
  var meta = document.head.querySelector('meta[name=page][content]');
  var currentPage = parseInt(meta.content);
  var nextPage = currentPage + 1;

  if (window.location.href.includes('?')) {
    var url = window.location.href + "&json=true&page=" + nextPage;
  } else {
    var url = window.location.origin + "/apps?json=true&page=" + nextPage;
  }

  getJSON(url, function (err, json) {
    if (err) {
      el.innerHTML = "No more apps. Try again?";
      el.className = "btn btn-red";
    } else {
      getJSON(el.dataset.template, function (err, template) {
        if (err) {
          el.innerHTML = "Template Error. Try again?";
          el.className = "btn btn-red";
        }

        var apps = document.getElementById('apps');
        apps.innerHTML += json.apps.data.map(function (app) {
          return render(template, app);
        }).join("");
        meta.setAttribute('content', nextPage.toString());
      }, 'text');
    }
  });
}; // document.body.addEventListener('touchmove', function (e) {e.preventDefault()}, {passive:true});
// document.body.addEventListener('touchmove', (e) => {e.preventDefault()});
// var iframes = document.querySelectorAll('.prevent-touchmove');
// for (let i = 0; i < iframes.length; i++) {
//    const el = iframes[i];
//    console.log(el)
//    el.addEventListener('touchstart', function (e) {e.preventDefault()}, false);
// }
// document.getElementById('view').addEventListener('touchmove', function (e) {
//    e.preventDefault();
// })
// (function () {
//    var _overlay = document.getElementById('app');
//    var _clientY = null; // remember Y position on touch start
//    _overlay.addEventListener('touchstart', function (event) {
//        if (event.targetTouches.length === 1) {
//            // detect single touch
//            _clientY = event.targetTouches[0].clientY;
//        }
//    }, false);
//    _overlay.addEventListener('touchmove', function (event) {
//        if (event.targetTouches.length === 1) {
//            // detect single touch
//            disableRubberBand(event);
//        }
//    }, false);
//    function disableRubberBand(event) {
//        var clientY = event.targetTouches[0].clientY - _clientY;
//        if (_overlay.scrollTop === 0 && clientY > 0) {
//            // element is at the top of its scroll
//            event.preventDefault();
//        }
//        if (isOverlayTotallyScrolled() && clientY < 0) {
//            //element is at the top of its scroll
//            event.preventDefault();
//        }
//    }
//    function isOverlayTotallyScrolled() {
//        // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollHeight#Problems_and_solutions
//        return _overlay.scrollHeight - _overlay.scrollTop <= _overlay.clientHeight;
//    }
// })();


function setvh() {
  setTimeout(function () {
    var vh = window.innerHeight;
    console.log(vh + 'px');
    document.documentElement.style.setProperty('--vh', "".concat(vh, "px"));
  }, 100);
}

if (typeof window.onorientationchange !== "undefined") {
  window.addEventListener('orientationchange', setvh);
} else {
  window.addEventListener('resize', setvh);
}

window.addEventListener('DOMContentLoaded', setvh); // window.addEventListener('resize', () => {let vh = window.innerHeight * 0.01;document.documentElement.style.setProperty('--vh', `${vh}px`);});
// (function () {
//     var nav = document.querySelector('nav.fixed')
//     var dropnavs = document.querySelectorAll('.dropnav')
//     var height = nav.getBoundingClientRect().height
//     var progress = document.getElementById('read-progress')
//     var fn = () => {
//       var height2 = nav.getBoundingClientRect().height
//       var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
//       var winHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
//       var scrolled = (winScroll / winHeight) * 100;
//       if (progress) {
//          progress.style.width = scrolled + "%";
//       }
//       // console.log(height2, height)
//       // if (height2 != height) {
//          document.body.style['margin-top'] = height2 + 'px'
//       // }
//       if (window.pageYOffset > height2) {
//           nav.classList.add('bg-white', 'text-dark')
//           nav.classList.remove('bg-blue', 'text-white')
//           Array.from(dropnavs).forEach(dropnav => {
//             dropnav.classList.remove('bg-white', 'text-dark')
//             dropnav.classList.add('bg-blue', 'text-white')
//           })
//       } else {
//           nav.classList.remove('bg-white', 'text-dark')
//           nav.classList.add('bg-blue', 'text-white')
//           Array.from(dropnavs).forEach(dropnav => {
//             dropnav.classList.add('bg-white', 'text-dark')
//             dropnav.classList.remove('bg-blue', 'text-white')
//           })
//       }
//       height = height2
//     }
//     fn()
//     window.addEventListener('scroll', fn)
//     window.addEventListener('resize', fn)
// })();
// (function () {
//    if (!window.Waves) return;
//    new Waves({
//       canvas: 'waves',
//       waveCount: 5,
//       backgroundColor: '#3EB5F7',
//       backgroundBlendMode: 'source-over',
//       waveBlendMode: 'screen',
//       scale: 0.5,
//    }, {
//       color: 'yellow',
//       amplitude: 30,
//    }, {
//       color: 'cyan',
//       amplitude: 20,
//    }, {
//       color: '#3EB5F7',
//       amplitude: 30,
//    })
//    $('#waves').parent().css('margin-bottom', '6rem')
// })();
// (function (){
//   // var i = setInterval(function () {
//   //   console.clear()
//   //   console.log("%cHello!", "color: #3EB5F7; text-shadow: 0px 2px black; -webkit-text-stroke: 1px black; font-size: 60px;font-weight:bold;");
//   //   console.log("%cDo you want to help develop this website?", "font-size: 20px;")
//   //   console.log("%cIf you do, then contact @wizardzeb on Twitter.", "font-size: 20px;")
//   // }, 1000)
//   // setTimeout(function () {
//   //   clearInterval(i)
//   // }, 10000)
// })();

/***/ }),

/***/ "./resources/assets/js/pullToRefresh.js":
/*!**********************************************!*\
  !*** ./resources/assets/js/pullToRefresh.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return PullToRefresh; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * @typedef {Object} PtrOptions The options for the PullToRefresh class.
 * @property {HTMLElement} scrollTarget The element that has scolling.
 * @property {HTMLElement} el The element that will hold the pull to refresh messages.
 */
var PullToRefresh =
/*#__PURE__*/
function () {
  /**
   * 
   * @param {PtrOptions} obj
   */
  function PullToRefresh(obj) {
    _classCallCheck(this, PullToRefresh);

    this.scrollTarget = obj.scrollTarget; // obj.scrollTarget.addEventListener("scroll", this.onscroll.bind(this))

    obj.scrollTarget.addEventListener("touchstart", this.ontouchstart.bind(this));
    obj.scrollTarget.addEventListener("touchend", this.ontouchend.bind(this));
    obj.scrollTarget.addEventListener("touchmove", this.ontouchmove.bind(this));
    this.el = obj.el;
    this.scrollTimeout;
    this.touching = false;
    this.el.innerHTML = 'Pull to refresh';
    this.isLoading = false; // this.el.style.marginTop = (this.el.clientHeight * -1) + 'px'

    this.touches = {
      start: {
        x: 0,
        y: 0
      },
      current: {
        x: 0,
        y: 0
      },
      stop: {
        x: 0,
        y: 0
      } // this.el.style.maxHeight = '0px'
      // this.el.style.overflow = "hidden"
      // console.log(this.el)

    };
  }

  _createClass(PullToRefresh, [{
    key: "ontouchstart",
    value: function ontouchstart(e) {
      if (typeof e['changedTouches'] !== "undefined") {
        var touch = e.changedTouches[0]; // console.log(e.changedTouches)

        this.touches.start.x = touch.screenX;
        this.touches.start.y = touch.screenY;
      } else {
        this.touches.start.x = e.screenX;
        this.touches.start.y = e.screenY;
      }

      this.rubberbanding = this.scrollTarget.scrollTop <= 0;
    }
  }, {
    key: "ontouchmove",
    value: function ontouchmove(e) {
      if (typeof e['changedTouches'] !== "undefined") {
        var touch = e.changedTouches[0]; // console.log(e.changedTouches)

        this.touches.current.x = touch.screenX;
        this.touches.current.y = touch.screenY;
      } else {
        this.touches.current.x = e.screenX;
        this.touches.current.y = e.screenY;
      }

      var changeY = Math.abs(this.touches.start.y - this.touches.current.y);
      var rotation = changeY < 100 ? changeY * 30 / 100 : 30;

      if (document.body.scrollTop === 0) {
        if (changeY > 100) this.loading();
      }
    }
  }, {
    key: "ontouchend",
    value: function ontouchend(e) {
      if (document.body.scrollTop === 0 && !this.isLoading) {}
    } // isPullDown(dy, dx) {
    //     return dy < 0 && (
    //         (Math.abs(dx) <= 100 && Math.abs(dy) >= 300)
    //         ||
    //         (Math.abs(dx) / Math.abs(dy) <= 0.3 && dy >= 60)
    //     );
    // }

  }, {
    key: "loading",
    value: function loading() {
      this.isLoading = true;
      alert("pulled down");
    } // onscroll (e) {
    //     window.clearTimeout(this.scrollTimeout);
    //     var pos = e.target.scrollTop;
    //     // console.log("scrolling", e, e.target.scrollTop)
    //     // this.el.style.display = "block"
    //     if(pos < 0) {
    //         this.rubberbanding = true;
    //         // this.el.style.backgroundColor = "#ff0000"
    //         this.el.style.marginTop = (pos * -0.99) + "px"
    //     } else {
    //         this.el.style.backgroundColor = "#00ff00"
    //     }
    //     this.scrollTimeout = window.setTimeout(this.onscrollend.bind(this), 100);
    // }
    // onscrollend () {
    //     if (!this.touching) {
    //         this.el.style.backgroundColor = "#0000ff"
    //     }
    // }

  }]);

  return PullToRefresh;
}();



/***/ }),

/***/ "./resources/assets/postCss/redesign.css":
/*!***********************************************!*\
  !*** ./resources/assets/postCss/redesign.css ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************************************!*\
  !*** multi ./resources/assets/js/main.js ./resources/assets/postCss/redesign.css ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/zeb/code/v4/resources/assets/js/main.js */"./resources/assets/js/main.js");
module.exports = __webpack_require__(/*! /Users/zeb/code/v4/resources/assets/postCss/redesign.css */"./resources/assets/postCss/redesign.css");


/***/ })

/******/ });