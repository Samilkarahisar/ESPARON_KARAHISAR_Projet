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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/bag.js":
/*!*****************************!*\
  !*** ./resources/js/bag.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#update-btn').click(function () {
  var url = $(this).data('href');
  var quantityInputsArray = $('.quantity-input').serializeArray();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: url,
    type: 'post',
    data: {
      ordersProducts: quantityInputsArray
    },
    success: function success() {
      $('#toast-header').html('Succès');
      $('#toast-body').html('Panier mis à jour !');
      $('.toast').toast('show');
    }
  });
});
var totalPriceElements = $('.total-price-product');
$('.quantity-input').each(function (i) {
  $(this).on('input', function () {
    var priceUnit = $(this).data('priceunit');
    var quantity = $(this).val();
    var totalPriceElement = $(totalPriceElements[i]);
    var oldPrice = parseFloat(totalPriceElement.html());
    var newPrice = (priceUnit * quantity).toFixed(2);
    var difference = newPrice - oldPrice;
    totalPriceElement.html(newPrice);
    var totalOrderElement = $('#total-order');
    var totalOrderPrice = parseFloat(totalOrderElement.html());
    var total = (totalOrderPrice + difference).toFixed(2) + ' €';
    totalOrderElement.html(total);
    var fullTotalOrderElement = $('#full-total-order');
    fullTotalOrderElement.html(total);
  });
});
$('.delete-btn').each(function () {
  $(this).click(function () {
    var idToDelete = $(this).data('id');
    var url = $(this).data('href');
    var parent = $(this).closest('.product');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: url,
      type: 'post',
      data: {
        orderProductId: idToDelete
      },
      success: function success() {
        parent.hide(function () {
          parent.remove();

          if ($('#items').children().length === 0) {
            location.reload();
          }
        });
      }
    });
  });
});

/***/ }),

/***/ 2:
/*!***********************************!*\
  !*** multi ./resources/js/bag.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/user/websites/ESPARON_KARAHISAR_Projet/resources/js/bag.js */"./resources/js/bag.js");


/***/ })

/******/ });