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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/entries/common.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/entries/common.js":
/*!**********************************!*\
  !*** ./src/js/entries/common.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _utils_header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/header */ \"./src/js/utils/header.js\");\n/* harmony import */ var _utils_slick__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/slick */ \"./src/js/utils/slick.js\");\n/* harmony import */ var _utils_scroll__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/scroll */ \"./src/js/utils/scroll.js\");\n/* harmony import */ var _utils_Hugelink__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/Hugelink */ \"./src/js/utils/Hugelink.js\");\n/* harmony import */ var _utils_fixedButton__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils/fixedButton */ \"./src/js/utils/fixedButton.js\");\n\n\n\n\n // ヘッダーメニュー\n\nvar header = new _utils_header__WEBPACK_IMPORTED_MODULE_0__[\"default\"]();\nheader.openHeaderNav(); // SLICK\n\nvar slick = new _utils_slick__WEBPACK_IMPORTED_MODULE_1__[\"default\"]();\nslick.slickInit(); // スムーズスクロール\n\nvar scroll = new _utils_scroll__WEBPACK_IMPORTED_MODULE_2__[\"default\"]();\nscroll.init(); // リンクパネル\n\nvar hugelink = new _utils_Hugelink__WEBPACK_IMPORTED_MODULE_3__[\"default\"]();\nhugelink.init();\nvar fixedButton = new _utils_fixedButton__WEBPACK_IMPORTED_MODULE_4__[\"default\"]();\nfixedButton.clickMenu();\n\n//# sourceURL=webpack:///./src/js/entries/common.js?");

/***/ }),

/***/ "./src/js/utils/Hugelink.js":
/*!**********************************!*\
  !*** ./src/js/utils/Hugelink.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return Hugelink; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Hugelink =\n/*#__PURE__*/\nfunction () {\n  function Hugelink() {\n    _classCallCheck(this, Hugelink);\n  }\n\n  _createClass(Hugelink, [{\n    key: \"init\",\n    value: function init() {\n      var $selecter = $('.c-hugelinks');\n      $selecter.on({\n        'mouseenter': function mouseenter() {\n          $('.c-hugelinks ul + ul').css('border-left', '#f7e789 solid 1px');\n        },\n        'mouseleave': function mouseleave() {\n          $('.c-hugelinks ul + ul').css('border-left', '#F2F2F2 solid 1px');\n        }\n      });\n    }\n  }]);\n\n  return Hugelink;\n}();\n\n\n\n//# sourceURL=webpack:///./src/js/utils/Hugelink.js?");

/***/ }),

/***/ "./src/js/utils/fixedButton.js":
/*!*************************************!*\
  !*** ./src/js/utils/fixedButton.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return FixedButton; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar FixedButton =\n/*#__PURE__*/\nfunction () {\n  function FixedButton() {\n    _classCallCheck(this, FixedButton);\n  }\n\n  _createClass(FixedButton, [{\n    key: \"clickMenu\",\n    value: function clickMenu() {\n      var $innerTopperInner = $('.l-fixed-button__inner__topper__inner');\n      var $innerTopperInnerText = $('.l-fixed-button__inner__topper__inner__text');\n      var $innerTopperInnerMenuLine = $('.l-fixed-button__inner__topper__inner__menu__line');\n      var $innerMainButton = $('.l-fixed-button__inner__main__button');\n      $innerTopperInner.on('click', function () {\n        $innerMainButton.removeClass('is-click');\n        $innerTopperInnerMenuLine.toggleClass('is-active');\n\n        if ($innerTopperInnerMenuLine.hasClass('is-active')) {\n          $innerTopperInnerText.html('close');\n        } else {\n          $innerTopperInnerText.html('menu');\n        }\n      });\n      $innerMainButton.on('click', function () {\n        $innerMainButton.not(this).removeClass('is-click');\n        $innerTopperInnerMenuLine.removeClass('is-active');\n        $(this).toggleClass('is-click');\n      });\n    }\n  }]);\n\n  return FixedButton;\n}();\n\n\n;\n\n//# sourceURL=webpack:///./src/js/utils/fixedButton.js?");

/***/ }),

/***/ "./src/js/utils/header.js":
/*!********************************!*\
  !*** ./src/js/utils/header.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return Header; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Header =\n/*#__PURE__*/\nfunction () {\n  function Header() {\n    _classCallCheck(this, Header);\n  }\n\n  _createClass(Header, [{\n    key: \"openHeaderNav\",\n    value: function openHeaderNav() {\n      var $selecter = $('.header__btn');\n      var $navArea = $('.header__nav');\n      $selecter.on('click', function (event) {\n        $selecter.toggleClass('-isActive');\n        $navArea.toggleClass('-isOpen');\n      });\n    }\n  }]);\n\n  return Header;\n}();\n\n\n;\n\n//# sourceURL=webpack:///./src/js/utils/header.js?");

/***/ }),

/***/ "./src/js/utils/scroll.js":
/*!********************************!*\
  !*** ./src/js/utils/scroll.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return Scroll; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Scroll =\n/*#__PURE__*/\nfunction () {\n  function Scroll() {\n    _classCallCheck(this, Scroll);\n  }\n\n  _createClass(Scroll, [{\n    key: \"init\",\n    value: function init() {\n      $('a[href^=\"#\"]').click(function () {\n        var speed = 400,\n            href = $(this).attr('href'),\n            target = $(href == '#' || href == '' ? 'html' : href),\n            position = target.offset().top;\n        $('body,html').animate({\n          scrollTop: position - 60\n        }, speed, 'swing');\n        return false;\n      });\n    }\n  }]);\n\n  return Scroll;\n}();\n\n\n\n//# sourceURL=webpack:///./src/js/utils/scroll.js?");

/***/ }),

/***/ "./src/js/utils/slick.js":
/*!*******************************!*\
  !*** ./src/js/utils/slick.js ***!
  \*******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return Slick; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Slick =\n/*#__PURE__*/\nfunction () {\n  function Slick() {\n    _classCallCheck(this, Slick);\n  }\n\n  _createClass(Slick, [{\n    key: \"slickInit\",\n    value: function slickInit() {\n      var $topSlickSlider = $('.js-slickSlider--topkv');\n      var $topSlickItem = $('.js-slickSlider--topkv li');\n      $topSlickSlider.on(\"beforeChange\", function (event, slick, currentSlide, nextSlide) {\n        $topSlickSlider.find(\".slick-slide\").each(function (index, el) {\n          var $this = $(el),\n              slickindex = $this.attr(\"data-slick-index\");\n\n          if (nextSlide == slick.slideCount - 1 && currentSlide == 0) {\n            // 現在のスライドが最初のスライドでそこから最後のスライドに戻る場合\n            if (slickindex == \"-1\") {\n              // 最後のスライドに対してクラスを付与\n              $this.addClass(\"is-active-next\");\n            } else {\n              // それ以外は削除\n              $this.removeClass(\"is-active-next\");\n            }\n          } else if (nextSlide == 0) {\n            // 次のスライドが最初のスライドの場合\n            if (slickindex == slick.slideCount) {\n              // 最初のスライドに対してクラスを付与\n              $this.addClass(\"is-active-next\");\n            } else {\n              // それ以外は削除\n              $this.removeClass(\"is-active-next\");\n            }\n          } else {\n            // それ以外は削除\n            $this.removeClass(\"is-active-next\");\n          }\n        });\n      }); //\n      // top KV スライダー\n      //\n\n      $topSlickSlider.slick({\n        autoplay: true,\n        autoplaySpeed: 3000,\n        speed: 800,\n        arrows: false,\n        dots: true,\n        infinite: true,\n        centerMode: true,\n        centerPadding: '0 15% 0 0'\n      });\n      $(window).on('load resize', function () {\n        var $containerH = $topSlickSlider.innerHeight();\n        $topSlickItem.innerHeight($containerH);\n      });\n    }\n  }]);\n\n  return Slick;\n}();\n\n\n;\n\n//# sourceURL=webpack:///./src/js/utils/slick.js?");

/***/ })

/******/ });