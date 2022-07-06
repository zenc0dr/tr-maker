(self["webpackChunkExample_october_studio_project"] = self["webpackChunkExample_october_studio_project"] || []).push([["/js/index"],{

/***/ "./src/components/deadline/_.js":
/*!**************************************!*\
  !*** ./src/components/deadline/_.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
var animationTime = 20,
    days = 7;
document.addEventListener('DOMContentLoaded', function () {
  // timer arguments:
  //   #1 - time of animation in mileseconds,
  //   #2 - days to deadline
  $('#progress-time-fill, #death-group').css({
    'animation-duration': animationTime + 's'
  });

  var deadlineAnimation = function deadlineAnimation() {
    setTimeout(function () {
      $('#designer-arm-grop').css({
        'animation-duration': '1.5s'
      });
    }, 0);
    setTimeout(function () {
      $('#designer-arm-grop').css({
        'animation-duration': '1s'
      });
    }, 4000);
    setTimeout(function () {
      $('#designer-arm-grop').css({
        'animation-duration': '0.7s'
      });
    }, 8000);
    setTimeout(function () {
      $('#designer-arm-grop').css({
        'animation-duration': '0.3s'
      });
    }, 12000);
    setTimeout(function () {
      $('#designer-arm-grop').css({
        'animation-duration': '0.2s'
      });
    }, 15000);
  };

  function timer(totalTime, deadline) {
    var time = totalTime * 1000;
    var dayDuration = time / deadline;
    var actualDay = deadline;
    var timer = setInterval(countTime, dayDuration);

    function countTime() {
      --actualDay;
      $('.deadline-days .day').text(actualDay);

      if (actualDay == 0) {
        clearInterval(timer);
        $('.deadline-days .day').text(deadline);
      }
    }
  }

  var deadlineText = function deadlineText() {
    var $el = $('.deadline-days');
    var html = '<div class="mask-red"><div class="inner">' + $el.html() + '</div></div><div class="mask-white"><div class="inner">' + $el.html() + '</div></div>';
    $el.html(html);
  };

  deadlineText();
  deadlineAnimation();
  timer(animationTime, days);
  setInterval(function () {
    timer(animationTime, days);
    deadlineAnimation();
    console.log('begin interval', animationTime * 1000);
  }, animationTime * 1000);
});

/***/ }),

/***/ "./src/pages/index/index.js":
/*!**********************************!*\
  !*** ./src/pages/index/index.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _src_components_deadline_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @src/components/deadline/_.js */ "./src/components/deadline/_.js");
/* harmony import */ var _src_components_deadline_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_src_components_deadline_js__WEBPACK_IMPORTED_MODULE_0__);


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["/js/vendor"], () => (__webpack_exec__("./src/pages/index/index.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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RCIsInNvdXJjZXMiOlsid2VicGFjazovL0V4YW1wbGUgb2N0b2Jlci1zdHVkaW8gcHJvamVjdC8uL3NyYy9jb21wb25lbnRzL2RlYWRsaW5lL18uanMiLCJ3ZWJwYWNrOi8vRXhhbXBsZSBvY3RvYmVyLXN0dWRpbyBwcm9qZWN0Ly4vc3JjL3BhZ2VzL2luZGV4L2luZGV4LmpzIl0sInNvdXJjZXNDb250ZW50IjpbIlxuXG52YXIgYW5pbWF0aW9uVGltZSA9IDIwLFxuICAgIGRheXMgPSA3O1xuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdET01Db250ZW50TG9hZGVkJywgZnVuY3Rpb24oKXtcblxuICAgIC8vIHRpbWVyIGFyZ3VtZW50czpcbiAgICAvLyAgICMxIC0gdGltZSBvZiBhbmltYXRpb24gaW4gbWlsZXNlY29uZHMsXG4gICAgLy8gICAjMiAtIGRheXMgdG8gZGVhZGxpbmVcblxuICAgICQoJyNwcm9ncmVzcy10aW1lLWZpbGwsICNkZWF0aC1ncm91cCcpLmNzcyh7J2FuaW1hdGlvbi1kdXJhdGlvbic6IGFuaW1hdGlvblRpbWUrJ3MnfSk7XG5cbiAgICB2YXIgZGVhZGxpbmVBbmltYXRpb24gPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKXtcbiAgICAgICAgICAgICQoJyNkZXNpZ25lci1hcm0tZ3JvcCcpLmNzcyh7J2FuaW1hdGlvbi1kdXJhdGlvbic6ICcxLjVzJ30pO1xuICAgICAgICB9LDApO1xuXG4gICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKXtcbiAgICAgICAgICAgICQoJyNkZXNpZ25lci1hcm0tZ3JvcCcpLmNzcyh7J2FuaW1hdGlvbi1kdXJhdGlvbic6ICcxcyd9KTtcbiAgICAgICAgfSw0MDAwKTtcblxuICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICAkKCcjZGVzaWduZXItYXJtLWdyb3AnKS5jc3MoeydhbmltYXRpb24tZHVyYXRpb24nOiAnMC43cyd9KTtcbiAgICAgICAgfSw4MDAwKTtcblxuICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICAkKCcjZGVzaWduZXItYXJtLWdyb3AnKS5jc3MoeydhbmltYXRpb24tZHVyYXRpb24nOiAnMC4zcyd9KTtcbiAgICAgICAgfSwxMjAwMCk7XG5cbiAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbigpe1xuICAgICAgICAgICAgJCgnI2Rlc2lnbmVyLWFybS1ncm9wJykuY3NzKHsnYW5pbWF0aW9uLWR1cmF0aW9uJzogJzAuMnMnfSk7XG4gICAgICAgIH0sMTUwMDApO1xuICAgIH07XG5cbiAgICBmdW5jdGlvbiB0aW1lcih0b3RhbFRpbWUsIGRlYWRsaW5lKSB7XG4gICAgICAgIHZhciB0aW1lID0gdG90YWxUaW1lICogMTAwMDtcbiAgICAgICAgdmFyIGRheUR1cmF0aW9uID0gdGltZSAvIGRlYWRsaW5lO1xuICAgICAgICB2YXIgYWN0dWFsRGF5ID0gZGVhZGxpbmU7XG5cbiAgICAgICAgdmFyIHRpbWVyID0gc2V0SW50ZXJ2YWwoY291bnRUaW1lLCBkYXlEdXJhdGlvbik7XG5cbiAgICAgICAgZnVuY3Rpb24gY291bnRUaW1lKCkge1xuICAgICAgICAgICAgLS1hY3R1YWxEYXk7XG4gICAgICAgICAgICAkKCcuZGVhZGxpbmUtZGF5cyAuZGF5JykudGV4dChhY3R1YWxEYXkpO1xuXG4gICAgICAgICAgICBpZiAoYWN0dWFsRGF5ID09IDApIHtcbiAgICAgICAgICAgICAgICBjbGVhckludGVydmFsKHRpbWVyKTtcbiAgICAgICAgICAgICAgICAkKCcuZGVhZGxpbmUtZGF5cyAuZGF5JykudGV4dChkZWFkbGluZSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICB2YXIgZGVhZGxpbmVUZXh0ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgJGVsID0gJCgnLmRlYWRsaW5lLWRheXMnKTtcbiAgICAgICAgdmFyIGh0bWwgPSAnPGRpdiBjbGFzcz1cIm1hc2stcmVkXCI+PGRpdiBjbGFzcz1cImlubmVyXCI+JyArICRlbC5odG1sKCkgKyAnPC9kaXY+PC9kaXY+PGRpdiBjbGFzcz1cIm1hc2std2hpdGVcIj48ZGl2IGNsYXNzPVwiaW5uZXJcIj4nICsgJGVsLmh0bWwoKSArICc8L2Rpdj48L2Rpdj4nO1xuICAgICAgICAkZWwuaHRtbChodG1sKTtcbiAgICB9XG5cbiAgICBkZWFkbGluZVRleHQoKTtcblxuICAgIGRlYWRsaW5lQW5pbWF0aW9uKCk7XG4gICAgdGltZXIoYW5pbWF0aW9uVGltZSwgZGF5cyk7XG5cbiAgICBzZXRJbnRlcnZhbChmdW5jdGlvbigpe1xuICAgICAgICB0aW1lcihhbmltYXRpb25UaW1lLCBkYXlzKTtcbiAgICAgICAgZGVhZGxpbmVBbmltYXRpb24oKTtcblxuICAgICAgICBjb25zb2xlLmxvZygnYmVnaW4gaW50ZXJ2YWwnLCBhbmltYXRpb25UaW1lICogMTAwMCk7XG5cbiAgICB9LCBhbmltYXRpb25UaW1lICogMTAwMCk7XG5cbn0pO1xuIiwiaW1wb3J0IFwiQHNyYy9jb21wb25lbnRzL2RlYWRsaW5lL18uanNcIjtcbiJdLCJuYW1lcyI6WyJhbmltYXRpb25UaW1lIiwiZGF5cyIsImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsIiQiLCJjc3MiLCJkZWFkbGluZUFuaW1hdGlvbiIsInNldFRpbWVvdXQiLCJ0aW1lciIsInRvdGFsVGltZSIsImRlYWRsaW5lIiwidGltZSIsImRheUR1cmF0aW9uIiwiYWN0dWFsRGF5Iiwic2V0SW50ZXJ2YWwiLCJjb3VudFRpbWUiLCJ0ZXh0IiwiY2xlYXJJbnRlcnZhbCIsImRlYWRsaW5lVGV4dCIsIiRlbCIsImh0bWwiLCJjb25zb2xlIiwibG9nIl0sInNvdXJjZVJvb3QiOiIifQ==