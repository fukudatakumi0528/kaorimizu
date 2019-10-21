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
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _utils_header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/header */ \"./src/js/utils/header.js\");\n/* harmony import */ var _utils_slick__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/slick */ \"./src/js/utils/slick.js\");\n/* harmony import */ var _utils_scroll__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/scroll */ \"./src/js/utils/scroll.js\");\n/* harmony import */ var _utils_fixedButton__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/fixedButton */ \"./src/js/utils/fixedButton.js\");\n/* harmony import */ var _utils_sliderTab__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils/sliderTab */ \"./src/js/utils/sliderTab.js\");\n/* harmony import */ var _utils_refine__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../utils/refine */ \"./src/js/utils/refine.js\");\n/* harmony import */ var _utils_contact__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../utils/contact */ \"./src/js/utils/contact.js\");\n\n\n\n\n\n\n // ヘッダーメニュー\n\nvar header = new _utils_header__WEBPACK_IMPORTED_MODULE_0__[\"default\"]();\nheader.openHeaderNav();\nheader.clickHeaderButton(); // SLICK\n\nvar slick = new _utils_slick__WEBPACK_IMPORTED_MODULE_1__[\"default\"]();\nslick.slickInit(); // スムーズスクロール\n\nvar scroll = new _utils_scroll__WEBPACK_IMPORTED_MODULE_2__[\"default\"]();\nscroll.init(); // object-fit対策（IE対応）\n\nobjectFitImages(); //追従ボタン\n\nvar fixedButton = new _utils_fixedButton__WEBPACK_IMPORTED_MODULE_3__[\"default\"]();\nfixedButton.clickMenu(); //追従ボタン\n\nvar sliderTab = new _utils_sliderTab__WEBPACK_IMPORTED_MODULE_4__[\"default\"]();\nsliderTab.clickTab(); //追従ボタン\n\nvar refine = new _utils_refine__WEBPACK_IMPORTED_MODULE_5__[\"default\"]();\nrefine.clickRefineAccordion(); //お問合せページ\n\nvar contact = new _utils_contact__WEBPACK_IMPORTED_MODULE_6__[\"default\"]();\ncontact.selectBoxChange();\ncontact.selectContactChoice();\n\n//# sourceURL=webpack:///./src/js/entries/common.js?");

/***/ }),

/***/ "./src/js/utils/contact.js":
/*!*********************************!*\
  !*** ./src/js/utils/contact.js ***!
  \*********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return Contact; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Contact =\n/*#__PURE__*/\nfunction () {\n  function Contact() {\n    _classCallCheck(this, Contact);\n  }\n\n  _createClass(Contact, [{\n    key: \"selectBoxChange\",\n    value: function selectBoxChange() {\n      var $selectBox = $('.js-selectbox');\n      $(function () {\n        $selectBox.on('change', function () {\n          $(this).css('color', '#262626');\n        });\n      });\n    }\n  }, {\n    key: \"selectContactChoice\",\n    value: function selectContactChoice() {\n      var $contactChoiceLabel = $('.p-contact__main__input__radiobutton__under__label');\n      var $inputAreaEmail = $('.p-contact__main__input__email');\n      var $inputAreaTel = $('.p-contact__main__input__tel');\n      $contactChoiceLabel.on('click', function () {\n        if ($(this).hasClass('js-contactChoiceEmailButton')) {\n          $inputAreaTel.removeClass('is-active');\n          $inputAreaEmail.addClass('is-active');\n        } else if ($(this).hasClass('js-contactChoiceTelButton')) {\n          $inputAreaEmail.removeClass('is-active');\n          $inputAreaTel.addClass('is-active');\n        }\n      });\n    }\n  }]);\n\n  return Contact;\n}();\n\n\n\n//# sourceURL=webpack:///./src/js/utils/contact.js?");

/***/ }),

/***/ "./src/js/utils/fixedButton.js":
/*!*************************************!*\
  !*** ./src/js/utils/fixedButton.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return FixedButton; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar FixedButton =\n/*#__PURE__*/\nfunction () {\n  function FixedButton() {\n    _classCallCheck(this, FixedButton);\n  }\n\n  _createClass(FixedButton, [{\n    key: \"clickMenu\",\n    value: function clickMenu() {\n      var $innerTopperInner = $('.l-fixed-button__inner__topper__inner');\n      var $innerTopperInnerText = $('.l-fixed-button__inner__topper__inner__text');\n      var $innerTopperInnerMenuLine = $('.l-fixed-button__inner__topper__inner__menu__line');\n      var $innerMainButton = $('.l-fixed-button__inner__main__button');\n      var $spSearchTrigger = $('#js-spSearch-trigger');\n      var $spGrantTrigger = $('#js-spGrant-trigger'); //menu部分\n\n      var $spMenu = $('#js-spMenu');\n      var $spSearch = $('#js-spSearch');\n      var $spGrant = $('#js-spGrant'); //スクロール禁止にするための設定\n\n      function handleTouchMove(event) {\n        event.preventDefault();\n      } //スクロール禁止\n\n\n      function scrollStop() {\n        document.addEventListener('touchmove', handleTouchMove, {\n          passive: false\n        });\n      }\n\n      ; //スクロール復帰\n\n      function scrollStart() {\n        document.removeEventListener('touchmove', handleTouchMove, {\n          passive: false\n        });\n      }\n\n      ; //スクロールの解除、非解除\n\n      function scrollControl() {\n        if ($spMenu.hasClass('is-active')) {\n          scrollStop();\n        } else {\n          scrollStart();\n        }\n\n        ;\n      } //spMenuの出し入れ\n\n\n      function spMenuToggle() {\n        if (!$spMenu.hasClass('is-active')) {\n          $spMenu.addClass('is-active');\n        } else {\n          $spMenu.removeClass('is-active');\n          $spMenu.addClass('is-left');\n          setTimeout(function () {\n            $spMenu.removeClass('is-left');\n          }, 400);\n        }\n      }\n\n      ; //spSearchの出し入れ\n\n      function spSearchToggle() {\n        if (!$spSearch.hasClass('is-active')) {\n          $spSearch.addClass('is-active');\n        } else {\n          $spSearch.removeClass('is-active');\n          $spSearch.addClass('is-left');\n          setTimeout(function () {\n            $spSearch.removeClass('is-left');\n          }, 400);\n        }\n      }\n\n      ; //spGrantの出し入れ\n\n      function spGrantToggle() {\n        if (!$spGrant.hasClass('is-active')) {\n          $spGrant.addClass('is-active');\n        } else {\n          $spGrant.removeClass('is-active');\n          $spGrant.addClass('is-left');\n          setTimeout(function () {\n            $spGrant.removeClass('is-left');\n          }, 400);\n        }\n      }\n\n      ; //spMenu開閉用ボタンを押した時\n\n      $innerTopperInner.on('click', function () {\n        $innerMainButton.removeClass('is-click');\n        $innerTopperInnerMenuLine.toggleClass('is-active');\n\n        if ($innerTopperInnerMenuLine.hasClass('is-active')) {\n          $innerTopperInnerText.html('close');\n        } else {\n          $innerTopperInnerText.html('menu');\n        }\n\n        spMenuToggle(); //grantボタンがクリックされた時は、必ずspMenuは閉じている。\n\n        if ($spSearch.hasClass('is-active')) {\n          $spSearch.removeClass('is-active');\n          $spSearch.addClass('is-right');\n          setTimeout(function () {\n            $spSearch.removeClass('is-right');\n          }, 400);\n        }\n\n        ; //searchボタンがクリックされた時は、必ずspGrantは閉じている。\n\n        if ($spGrant.hasClass('is-active')) {\n          $spGrant.removeClass('is-active');\n          $spGrant.addClass('is-right');\n          setTimeout(function () {\n            $spGrant.removeClass('is-right');\n          }, 400);\n        }\n\n        ;\n        scrollControl();\n      }); //spSearch開閉用ボタンを押した時\n\n      $spSearchTrigger.on('click', function () {\n        $innerMainButton.not(this).removeClass('is-click');\n        $innerTopperInnerMenuLine.removeClass('is-active');\n\n        if ($innerTopperInnerMenuLine.hasClass('is-active')) {\n          $innerTopperInnerText.html('close');\n        } else {\n          $innerTopperInnerText.html('menu');\n        }\n\n        $(this).toggleClass('is-click');\n        spSearchToggle(); //searchボタンがクリックされた時は、必ずspMenuは閉じている。\n\n        if ($spMenu.hasClass('is-active')) {\n          $spMenu.removeClass('is-active');\n          $spMenu.addClass('is-right');\n          setTimeout(function () {\n            $spMenu.removeClass('is-right');\n          }, 400);\n        }\n\n        ; //searchボタンがクリックされた時は、必ずspGrantは閉じている。\n\n        if ($spGrant.hasClass('is-active')) {\n          $spGrant.removeClass('is-active');\n          $spGrant.addClass('is-right');\n          setTimeout(function () {\n            $spGrant.removeClass('is-right');\n          }, 400);\n        }\n\n        ;\n        scrollStart();\n      }); //spGrant開閉用ボタンを押した時\n\n      $spGrantTrigger.on('click', function () {\n        $innerMainButton.not(this).removeClass('is-click');\n        $innerTopperInnerMenuLine.removeClass('is-active');\n\n        if ($innerTopperInnerMenuLine.hasClass('is-active')) {\n          $innerTopperInnerText.html('close');\n        } else {\n          $innerTopperInnerText.html('menu');\n        }\n\n        $(this).toggleClass('is-click');\n        spGrantToggle(); //grantボタンがクリックされた時は、必ずspMenuは閉じている。\n\n        if ($spMenu.hasClass('is-active')) {\n          $spMenu.removeClass('is-active');\n          $spMenu.addClass('is-right');\n          setTimeout(function () {\n            $spMenu.removeClass('is-right');\n          }, 400);\n        }\n\n        ; //grantボタンがクリックされた時は、必ずspMenuは閉じている。\n\n        if ($spSearch.hasClass('is-active')) {\n          $spSearch.removeClass('is-active');\n          $spSearch.addClass('is-right');\n          setTimeout(function () {\n            $spSearch.removeClass('is-right');\n          }, 400);\n        }\n\n        ;\n        scrollStart();\n      });\n    }\n  }]);\n\n  return FixedButton;\n}();\n\n\n;\n\n//# sourceURL=webpack:///./src/js/utils/fixedButton.js?");

/***/ }),

/***/ "./src/js/utils/header.js":
/*!********************************!*\
  !*** ./src/js/utils/header.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return Header; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Header =\n/*#__PURE__*/\nfunction () {\n  function Header() {\n    _classCallCheck(this, Header);\n  }\n\n  _createClass(Header, [{\n    key: \"openHeaderNav\",\n    value: function openHeaderNav() {\n      var $selecter = $('.header__btn');\n      var $navArea = $('.header__nav');\n      $selecter.on('click', function (event) {\n        $selecter.toggleClass('-isActive');\n        $navArea.toggleClass('-isOpen');\n      });\n    }\n  }, {\n    key: \"clickHeaderButton\",\n    value: function clickHeaderButton() {\n      var $headerInnerPcSearch = $('.js-headerInnerPc__search');\n      var $headerInnerPcGrant = $('.js-headerInnerPc__grant');\n      var $header = $('.l-header');\n      var $spSearch = $('#js-spSearch');\n      var $spGrant = $('#js-spGrant');\n      var $spMenu = $('#js-spMenu'); //spSearchの出し入れ\n\n      function spSearchToggle() {\n        if (!$spSearch.hasClass('is-active')) {\n          $spSearch.addClass('is-active');\n        } else {\n          $spSearch.removeClass('is-active');\n          $spSearch.addClass('is-left');\n          setTimeout(function () {\n            $spSearch.removeClass('is-left');\n          }, 400);\n        }\n      }\n\n      ; //spGrantの出し入れ\n\n      function spGrantToggle() {\n        if (!$spGrant.hasClass('is-active')) {\n          $spGrant.addClass('is-active');\n        } else {\n          $spGrant.removeClass('is-active');\n          $spGrant.addClass('is-left');\n          setTimeout(function () {\n            $spGrant.removeClass('is-left');\n          }, 400);\n        }\n      }\n\n      ; //spMenuの出し入れ\n\n      function spMenuToggle() {\n        if (!$spMenu.hasClass('is-active')) {\n          $spMenu.addClass('is-active');\n        } else {\n          $spMenu.removeClass('is-active');\n          $spMenu.addClass('is-left');\n          setTimeout(function () {\n            $spMenu.removeClass('is-left');\n          }, 400);\n        }\n      }\n\n      ; //headerへのクラスの出しわけ\n\n      function headerIsActive() {\n        if ($spSearch.hasClass(\"is-active\") || $spGrant.hasClass(\"is-active\") || $spMenu.hasClass(\"is-active\")) {\n          $header.addClass('is-active');\n        } else {\n          $header.removeClass('is-active');\n        }\n      } //pcMenuが押された時\n\n\n      $(\".js-headerInnerPc__Menu, .js-spMenu__close\").on('click', function () {\n        spMenuToggle();\n        headerIsActive(); //menuボタンがクリックされた時は、必ずspSearchは閉じている。\n\n        if ($spSearch.hasClass('is-active')) {\n          $spSearch.removeClass('is-active');\n        }\n\n        ; //menuボタンがクリックされた時は、必ずspGrantは閉じている。\n\n        if ($spGrant.hasClass('is-active')) {\n          $spGrant.removeClass('is-active');\n        }\n\n        ;\n      }); //pcSearchが押された時\n\n      $headerInnerPcSearch.on('click', function () {\n        spSearchToggle();\n        headerIsActive(); //searchボタンがクリックされた時は、必ずspMenuは閉じている。\n\n        if ($spMenu.hasClass('is-active')) {\n          $spMenu.removeClass('is-active');\n        }\n\n        ; //searchボタンがクリックされた時は、必ずspGrantは閉じている。\n\n        if ($spGrant.hasClass('is-active')) {\n          $spGrant.removeClass('is-active');\n        }\n\n        ;\n      }); //pcGrantが押された時\n\n      $headerInnerPcGrant.on('click', function () {\n        spGrantToggle();\n        headerIsActive(); //grantボタンがクリックされた時は、必ずspMenuは閉じている。\n\n        if ($spMenu.hasClass('is-active')) {\n          $spMenu.removeClass('is-active');\n        }\n\n        ; //grantボタンがクリックされた時は、必ずspSearchは閉じている。\n\n        if ($spSearch.hasClass('is-active')) {\n          $spSearch.removeClass('is-active');\n        }\n\n        ;\n      });\n    }\n  }]);\n\n  return Header;\n}();\n\n\n;\n\n//# sourceURL=webpack:///./src/js/utils/header.js?");

/***/ }),

/***/ "./src/js/utils/refine.js":
/*!********************************!*\
  !*** ./src/js/utils/refine.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return Refine; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Refine =\n/*#__PURE__*/\nfunction () {\n  function Refine() {\n    _classCallCheck(this, Refine);\n  }\n\n  _createClass(Refine, [{\n    key: \"clickRefineAccordion\",\n    value: function clickRefineAccordion() {\n      var $refineIcon = $('.js-refine__icon');\n      var $refineIconSpan = $refineIcon.children('span');\n      var $refineSelectArea = $('.js-refine__selectArea');\n      $refineSelectArea.hide();\n      $refineIcon.on('click', function () {\n        $refineIconSpan.toggleClass('is-active');\n        $refineSelectArea.slideToggle(100);\n      });\n    }\n  }]);\n\n  return Refine;\n}();\n\n\n\n//# sourceURL=webpack:///./src/js/utils/refine.js?");

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
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return Slick; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Slick =\n/*#__PURE__*/\nfunction () {\n  function Slick() {\n    _classCallCheck(this, Slick);\n  }\n\n  _createClass(Slick, [{\n    key: \"slickInit\",\n    value: function slickInit() {\n      // top KV スライダー\n      var $topSlickSlider = $('.js-slickSlider-top__kv');\n      var $topSlickItem = $('.js-slickSlider-top__kv li'); // top ranking スライダー\n\n      var $topRankingMonthSlider = $('.js-slickSlider-top__ranking__month');\n      var $topRankingWeeklySlider = $('.js-slickSlider-top__ranking__weekly');\n      var $topRankingAllSlider = $('.js-slickSlider-top__ranking__all'); // top feature スライダー\n\n      var $topFeatureSlider = $('.js-slickSlider-top__feature'); // top hobby スライダー\n\n      var $topHobbySlider = $('.js-slickSlider-top__hobby'); // top life スライダー\n\n      var $topLifeSlider = $('.js-slickSlider-top__life'); // top learn スライダー\n\n      var $topLearnSlider = $('.js-slickSlider-top__learn'); //animationさせるための設定\n\n      $topSlickSlider.on(\"beforeChange\", function (event, slick, currentSlide, nextSlide) {\n        $topSlickSlider.find(\".slick-slide\").each(function (index, el) {\n          var $this = $(el),\n              slickindex = $this.attr(\"data-slick-index\");\n\n          if (nextSlide == slick.slideCount - 1 && currentSlide == 0) {\n            // 現在のスライドが最初のスライドでそこから最後のスライドに戻る場合\n            if (slickindex == \"-1\") {\n              // 最後のスライドに対してクラスを付与\n              $this.addClass(\"is-active-next\");\n            } else {\n              // それ以外は削除\n              $this.removeClass(\"is-active-next\");\n            }\n          } else if (nextSlide == 0) {\n            // 次のスライドが最初のスライドの場合\n            if (slickindex == slick.slideCount) {\n              // 最初のスライドに対してクラスを付与\n              $this.addClass(\"is-active-next\");\n            } else {\n              // それ以外は削除\n              $this.removeClass(\"is-active-next\");\n            }\n          } else {\n            // それ以外は削除\n            $this.removeClass(\"is-active-next\");\n          }\n        });\n      }); // top KV スライダー\n\n      $topSlickSlider.slick({\n        autoplay: true,\n        autoplaySpeed: 3000,\n        speed: 800,\n        arrows: true,\n        dots: true,\n        infinite: true,\n        centerMode: true,\n        appendArrows: $('.p-top__kv__bg__js'),\n        variableWidth: true,\n        responsive: [{\n          breakpoint: 768,\n          //ブレイクポイントを指定\n          settings: {\n            variableWidth: false\n          }\n        }]\n      });\n      $(window).on('load resize', function () {\n        var $containerH = $topSlickSlider.innerHeight();\n        $topSlickItem.innerHeight($containerH);\n      });\n      var mediaQuery = matchMedia('(max-width: 768px)'); // ページが読み込まれた時に実行\n\n      handle(mediaQuery); // ウィンドウサイズが変更されても実行されるように\n\n      mediaQuery.addListener(handle);\n\n      function handle(mq) {\n        if (mq.matches) {\n          // ウィンドウサイズが798px以下のとき\n          // top ranking スライダー\n          $topRankingMonthSlider.slick({\n            autoplaySpeed: 3000,\n            speed: 800,\n            arrows: true,\n            dots: false,\n            infinite: true,\n            centerMode: true,\n            appendArrows: $('.js__arrow-top__ranking__month')\n          });\n          $topRankingWeeklySlider.slick({\n            autoplaySpeed: 3000,\n            speed: 800,\n            arrows: true,\n            dots: false,\n            infinite: true,\n            centerMode: true,\n            appendArrows: $('.js__arrow-top__ranking__weekly')\n          });\n          $topRankingAllSlider.slick({\n            autoplaySpeed: 3000,\n            speed: 800,\n            arrows: true,\n            dots: false,\n            infinite: true,\n            centerMode: true,\n            appendArrows: $('.js__arrow-top__ranking__all')\n          }); // top feature スライダー\n\n          $topFeatureSlider.slick({\n            autoplaySpeed: 3000,\n            speed: 800,\n            arrows: true,\n            dots: false,\n            infinite: true,\n            centerMode: true,\n            appendArrows: $('.js__arrow-top__feature')\n          }); // top hobby スライダー\n\n          $topHobbySlider.slick({\n            autoplaySpeed: 3000,\n            speed: 800,\n            arrows: true,\n            dots: false,\n            infinite: true,\n            centerMode: true,\n            appendArrows: $('.js__arrow-top__hobby')\n          });\n        } else {\n          // それ以外\n          // top hobby スライダー\n          $topLifeSlider.slick({\n            speed: 800,\n            arrows: true,\n            dots: true,\n            infinite: true,\n            centerMode: true,\n            slidesToShow: 3,\n            variableWidth: true,\n            appendArrows: $('.js__arrow-top__life')\n          }); // top hobby スライダー\n\n          $topLearnSlider.slick({\n            speed: 800,\n            arrows: true,\n            dots: true,\n            infinite: true,\n            centerMode: true,\n            slidesToShow: 3,\n            variableWidth: true,\n            appendArrows: $('.js__arrow-top__learn')\n          });\n        }\n      }\n    }\n  }]);\n\n  return Slick;\n}();\n\n\n;\n\n//# sourceURL=webpack:///./src/js/utils/slick.js?");

/***/ }),

/***/ "./src/js/utils/sliderTab.js":
/*!***********************************!*\
  !*** ./src/js/utils/sliderTab.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return SliderTab; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar SliderTab =\n/*#__PURE__*/\nfunction () {\n  function SliderTab() {\n    _classCallCheck(this, SliderTab);\n  }\n\n  _createClass(SliderTab, [{\n    key: \"clickTab\",\n    value: function clickTab() {\n      var $sliderTabRanking = $('.t-rankingArea__tab');\n      var $sliderTabRankingList = $sliderTabRanking.children('.t-rankingArea__tab__list');\n      $sliderTabRankingList.on('click', function () {\n        if (!$(this).hasClass('is-active')) {\n          $sliderTabRankingList.removeClass('is-active');\n          $(this).addClass('is-active');\n\n          if ($(this).hasClass('tab-month')) {\n            //クラスを初期化\n            $('.t-rankingArea__slider__inner').removeClass('is-active');\n            $('.t-rankingArea__slider__arrow').removeClass('is-active'); //is-activeを付与\n\n            $('.js-slickSlider-top__ranking__month').addClass('is-active');\n            $('.js__arrow-top__ranking__month').addClass('is-active');\n            $('.js-slickSlider-top__ranking__month').slick('setPosition');\n          } else if ($(this).hasClass('tab-weekly')) {\n            //クラスを初期化\n            $('.t-rankingArea__slider__inner').removeClass('is-active');\n            $('.t-rankingArea__slider__arrow').removeClass('is-active'); //is-activeを付与\n\n            $('.js-slickSlider-top__ranking__weekly').addClass('is-active');\n            $('.js__arrow-top__ranking__weekly').addClass('is-active');\n            $('.js-slickSlider-top__ranking__weekly').slick('setPosition');\n          } else if ($(this).hasClass('tab-all')) {\n            //クラスを初期化\n            $('.t-rankingArea__slider__inner').removeClass('is-active');\n            $('.t-rankingArea__slider__arrow').removeClass('is-active'); //is-activeを付与\n\n            $('.js-slickSlider-top__ranking__all').addClass('is-active');\n            $('.js__arrow-top__ranking__all').addClass('is-active');\n            $('.js-slickSlider-top__ranking__all').slick('setPosition');\n          }\n        }\n      });\n    }\n  }]);\n\n  return SliderTab;\n}();\n\n\n;\n\n//# sourceURL=webpack:///./src/js/utils/sliderTab.js?");

/***/ })

/******/ });