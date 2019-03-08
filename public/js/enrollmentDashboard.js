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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/enrollmentDashboard.js":
/*!*********************************************!*\
  !*** ./resources/js/enrollmentDashboard.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  console.log('try'); // Create the chart

  Highcharts.chart('container', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Enrollment Population'
    },
    xAxis: {
      type: 'category'
    },
    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 0,
        dataLabels: {
          enabled: true
        }
      }
    },
    series: [{
      name: 'Population of Enrollees',
      colorByPoint: true,
      data: [{
        name: 'School Year 2017-2018',
        y: 450,
        drilldown: '201718'
      }, {
        name: 'School Year 2018-2019',
        y: 600,
        drilldown: '201819'
      }]
    }],
    drilldown: {
      series: [{
        id: '201718',
        name: 'Population',
        data: [{
          name: 'Summer',
          y: 200,
          drilldown: 'summer2018'
        }, {
          name: '1st Semester',
          y: 100,
          drilldown: 'firstSem2018'
        }, {
          name: '2nd Semester',
          y: 150,
          drilldown: 'secondSem2018'
        }]
      }, {
        id: 'summer2018',
        data: [{
          name: 'Engineering',
          y: 30
        }, {
          name: 'Computer Studies',
          y: 45
        }, {
          name: 'Business and Public Administration',
          y: 35
        }, {
          name: 'Education',
          y: 25
        }, {
          name: 'Arts and Sciences',
          y: 65
        }]
      }, {
        id: 'firstSem2018',
        data: [{
          name: 'Engineering',
          y: 10
        }, {
          name: 'Computer Studies',
          y: 20
        }, {
          name: 'Business and Public Administration',
          y: 30
        }, {
          name: 'Education',
          y: 25
        }, {
          name: 'Arts and Sciences',
          y: 15
        }]
      }, {
        id: 'secondSem2018',
        data: [{
          name: 'Engineering',
          y: 10
        }, {
          name: 'Computer Studies',
          y: 30
        }, {
          name: 'Business and Public Administration',
          y: 50
        }, {
          name: 'Education',
          y: 10
        }, {
          name: 'Arts and Sciences',
          y: 50
        }]
      }, {
        id: '201819',
        name: 'Population',
        data: [{
          name: 'Summer',
          y: 100,
          drilldown: 'summer2019'
        }, {
          name: '1st Semester',
          y: 300,
          drilldown: 'firstSem2019'
        }, {
          name: '2nd Semester',
          y: 200,
          drilldown: 'secondSem2019'
        }]
      }, {
        id: 'summer2019',
        data: [{
          name: 'Engineering',
          y: 30
        }, {
          name: 'Computer Studies',
          y: 30
        }, {
          name: 'Business and Public Administration',
          y: 10
        }, {
          name: 'Education',
          y: 10
        }, {
          name: 'Arts and Sciences',
          y: 20
        }]
      }, {
        id: 'firstSem2019',
        data: [{
          name: 'Engineering',
          y: 150
        }, {
          name: 'Computer Studies',
          y: 150
        }, {
          name: 'Business and Public Administration',
          y: 100
        }, {
          name: 'Education',
          y: 100
        }, {
          name: 'Arts and Sciences',
          y: 100
        }]
      }, {
        id: 'secondSem2019',
        data: [{
          name: 'Engineering',
          y: 30
        }, {
          name: 'Computer Studies',
          y: 30
        }, {
          name: 'Business and Public Administration',
          y: 40
        }, {
          name: 'Education',
          y: 30
        }, {
          name: 'Arts and Sciences',
          y: 70
        }]
      }]
    }
  });
});

/***/ }),

/***/ 1:
/*!***************************************************!*\
  !*** multi ./resources/js/enrollmentDashboard.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\jaraneta\dwproject\resources\js\enrollmentDashboard.js */"./resources/js/enrollmentDashboard.js");


/***/ })

/******/ });