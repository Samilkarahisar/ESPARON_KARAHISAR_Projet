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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/fill_addresses.js":
/*!****************************************!*\
  !*** ./resources/js/fill_addresses.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#use-address-shipping-checkbox').change(function () {
  if ($(this).prop('checked')) {
    var url = $(this).data('href');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: url,
      type: 'post',
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function success(data) {
        $('#shipping_address_first_name').val(data.first_name);
        $('#shipping_address_last_name').val(data.last_name);
        $('#shipping_address_street_1').val(data.street_1);
        $('#shipping_address_street_2').val(data.street_2);
        $('#shipping_address_zip_code').val(data.zip_code);
        $('#shipping_address_city').val(data.city);
        $('#shipping_address_country').val(data.country);
        $('#shipping-part').find('input').each(function () {
          $(this).css({
            "background": "#F8F8F8",
            "pointer-events": "none"
          }).prop('readonly', true);
        });
      }
    });
  } else {
    $('#shipping-part').find('input').each(function () {
      $(this).val('');
      $(this).css({
        "background": "",
        "pointer-events": ""
      }).prop('readonly', false);
    });
  }
});
$('#use-address-billing-checkbox').change(function () {
  if ($(this).prop('checked')) {
    var url = $(this).data('href');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: url,
      type: 'post',
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function success(data) {
        $('#billing_address_first_name').val(data.first_name);
        $('#billing_address_last_name').val(data.last_name);
        $('#billing_address_street_1').val(data.street_1);
        $('#billing_address_street_2').val(data.street_2);
        $('#billing_address_zip_code').val(data.zip_code);
        $('#billing_address_city').val(data.city);
        $('#billing_address_country').val(data.country);
        $('#billing-part').find('input').each(function () {
          $(this).css({
            "background": "#F8F8F8",
            "pointer-events": "none"
          }).prop('readonly', true);
        });
        $('#same-address-checkbox-container').hide();
      }
    });
  } else {
    $('#billing-part').find('input').each(function () {
      $(this).val('');
      $(this).css({
        "background": "",
        "pointer-events": ""
      }).prop('readonly', false);
    });
    $('#same-address-checkbox-container').show();
  }
});
$('#same-address-checkbox').change(function () {
  if ($(this).prop('checked')) {
    $('#billing_address_first_name').val($('#shipping_address_first_name').val());
    $('#billing_address_last_name').val($('#shipping_address_last_name').val());
    $('#billing_address_street_1').val($('#shipping_address_street_1').val());
    $('#billing_address_street_2').val($('#shipping_address_street_2').val());
    $('#billing_address_city').val($('#shipping_address_city').val());
    $('#billing_address_zip_code').val($('#shipping_address_zip_code').val());
    $('#billing_address_country').val($('#shipping_address_country').val());
    $('#billing-part').find('input').each(function () {
      $(this).css({
        "background": "#F8F8F8",
        "pointer-events": "none"
      }).prop('readonly', true);
    });
    $('#use-address-billing-checkbox-container').hide();
  } else {
    $('#billing-part').find('input').each(function () {
      $(this).val('');
      $(this).css({
        "background": "",
        "pointer-events": ""
      }).prop('readonly', false);
    });
    $('#use-address-billing-checkbox-container').show();
  }
});

/***/ }),

/***/ 4:
/*!**********************************************!*\
  !*** multi ./resources/js/fill_addresses.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/user/websites/ESPARON_KARAHISAR_Projet/resources/js/fill_addresses.js */"./resources/js/fill_addresses.js");


/***/ })

/******/ });