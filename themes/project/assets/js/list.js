(self["webpackChunkExample_october_studio_project"] = self["webpackChunkExample_october_studio_project"] || []).push([["/js/list"],{

/***/ "./src/components/svg/time.js":
/*!************************************!*\
  !*** ./src/components/svg/time.js ***!
  \************************************/
/***/ (() => {

var hands = [];
hands.push(document.querySelector('#secondhand > *'));
hands.push(document.querySelector('#minutehand > *'));
hands.push(document.querySelector('#hourhand > *'));
var cx = 100;
var cy = 100;

function shifter(val) {
  return [val, cx, cy].join(' ');
}

var date = new Date();
var hoursAngle = 360 * date.getHours() / 12 + date.getMinutes() / 2;
var minuteAngle = 360 * date.getMinutes() / 60;
var secAngle = 360 * date.getSeconds() / 60;
hands[0].setAttribute('from', shifter(secAngle));
hands[0].setAttribute('to', shifter(secAngle + 360));
hands[1].setAttribute('from', shifter(minuteAngle));
hands[1].setAttribute('to', shifter(minuteAngle + 360));
hands[2].setAttribute('from', shifter(hoursAngle));
hands[2].setAttribute('to', shifter(hoursAngle + 360));

for (var i = 1; i <= 12; i++) {
  var el = document.createElementNS('http://www.w3.org/2000/svg', 'line');
  el.setAttribute('x1', '100');
  el.setAttribute('y1', '30');
  el.setAttribute('x2', '100');
  el.setAttribute('y2', '40');
  el.setAttribute('transform', 'rotate(' + i * 360 / 12 + ' 100 100)');
  el.setAttribute('style', 'stroke: #ffffff;');
  document.querySelector('svg').appendChild(el);
}

/***/ }),

/***/ "./src/pages/project/list.js":
/*!***********************************!*\
  !*** ./src/pages/project/list.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _src_components_svg_time__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @src/components/svg/time */ "./src/components/svg/time.js");
/* harmony import */ var _src_components_svg_time__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_src_components_svg_time__WEBPACK_IMPORTED_MODULE_0__);


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./src/pages/project/list.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiL2pzL2xpc3QuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7QUFBQSxJQUFJQSxLQUFLLEdBQUcsRUFBWjtBQUNBQSxLQUFLLENBQUNDLElBQU4sQ0FBV0MsUUFBUSxDQUFDQyxhQUFULENBQXVCLGlCQUF2QixDQUFYO0FBQ0FILEtBQUssQ0FBQ0MsSUFBTixDQUFXQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsaUJBQXZCLENBQVg7QUFDQUgsS0FBSyxDQUFDQyxJQUFOLENBQVdDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1QixlQUF2QixDQUFYO0FBRUEsSUFBSUMsRUFBRSxHQUFHLEdBQVQ7QUFDQSxJQUFJQyxFQUFFLEdBQUcsR0FBVDs7QUFFQSxTQUFTQyxPQUFULENBQWlCQyxHQUFqQixFQUFzQjtFQUNwQixPQUFPLENBQUNBLEdBQUQsRUFBTUgsRUFBTixFQUFVQyxFQUFWLEVBQWNHLElBQWQsQ0FBbUIsR0FBbkIsQ0FBUDtBQUNEOztBQUVELElBQUlDLElBQUksR0FBRyxJQUFJQyxJQUFKLEVBQVg7QUFDQSxJQUFJQyxVQUFVLEdBQUcsTUFBTUYsSUFBSSxDQUFDRyxRQUFMLEVBQU4sR0FBd0IsRUFBeEIsR0FBNkJILElBQUksQ0FBQ0ksVUFBTCxLQUFvQixDQUFsRTtBQUNBLElBQUlDLFdBQVcsR0FBRyxNQUFNTCxJQUFJLENBQUNJLFVBQUwsRUFBTixHQUEwQixFQUE1QztBQUNBLElBQUlFLFFBQVEsR0FBRyxNQUFNTixJQUFJLENBQUNPLFVBQUwsRUFBTixHQUEwQixFQUF6QztBQUVBaEIsS0FBSyxDQUFDLENBQUQsQ0FBTCxDQUFTaUIsWUFBVCxDQUFzQixNQUF0QixFQUE4QlgsT0FBTyxDQUFDUyxRQUFELENBQXJDO0FBQ0FmLEtBQUssQ0FBQyxDQUFELENBQUwsQ0FBU2lCLFlBQVQsQ0FBc0IsSUFBdEIsRUFBNEJYLE9BQU8sQ0FBQ1MsUUFBUSxHQUFHLEdBQVosQ0FBbkM7QUFDQWYsS0FBSyxDQUFDLENBQUQsQ0FBTCxDQUFTaUIsWUFBVCxDQUFzQixNQUF0QixFQUE4QlgsT0FBTyxDQUFDUSxXQUFELENBQXJDO0FBQ0FkLEtBQUssQ0FBQyxDQUFELENBQUwsQ0FBU2lCLFlBQVQsQ0FBc0IsSUFBdEIsRUFBNEJYLE9BQU8sQ0FBQ1EsV0FBVyxHQUFHLEdBQWYsQ0FBbkM7QUFDQWQsS0FBSyxDQUFDLENBQUQsQ0FBTCxDQUFTaUIsWUFBVCxDQUFzQixNQUF0QixFQUE4QlgsT0FBTyxDQUFDSyxVQUFELENBQXJDO0FBQ0FYLEtBQUssQ0FBQyxDQUFELENBQUwsQ0FBU2lCLFlBQVQsQ0FBc0IsSUFBdEIsRUFBNEJYLE9BQU8sQ0FBQ0ssVUFBVSxHQUFHLEdBQWQsQ0FBbkM7O0FBRUEsS0FBSSxJQUFJTyxDQUFDLEdBQUcsQ0FBWixFQUFlQSxDQUFDLElBQUksRUFBcEIsRUFBd0JBLENBQUMsRUFBekIsRUFBNkI7RUFDM0IsSUFBSUMsRUFBRSxHQUFHakIsUUFBUSxDQUFDa0IsZUFBVCxDQUF5Qiw0QkFBekIsRUFBdUQsTUFBdkQsQ0FBVDtFQUNBRCxFQUFFLENBQUNGLFlBQUgsQ0FBZ0IsSUFBaEIsRUFBc0IsS0FBdEI7RUFDQUUsRUFBRSxDQUFDRixZQUFILENBQWdCLElBQWhCLEVBQXNCLElBQXRCO0VBQ0FFLEVBQUUsQ0FBQ0YsWUFBSCxDQUFnQixJQUFoQixFQUFzQixLQUF0QjtFQUNBRSxFQUFFLENBQUNGLFlBQUgsQ0FBZ0IsSUFBaEIsRUFBc0IsSUFBdEI7RUFDQUUsRUFBRSxDQUFDRixZQUFILENBQWdCLFdBQWhCLEVBQTZCLFlBQWFDLENBQUMsR0FBQyxHQUFGLEdBQU0sRUFBbkIsR0FBeUIsV0FBdEQ7RUFDQUMsRUFBRSxDQUFDRixZQUFILENBQWdCLE9BQWhCLEVBQXlCLGtCQUF6QjtFQUNBZixRQUFRLENBQUNDLGFBQVQsQ0FBdUIsS0FBdkIsRUFBOEJrQixXQUE5QixDQUEwQ0YsRUFBMUM7QUFDRCIsInNvdXJjZXMiOlsid2VicGFjazovL0V4YW1wbGUgb2N0b2Jlci1zdHVkaW8gcHJvamVjdC8uL3NyYy9jb21wb25lbnRzL3N2Zy90aW1lLmpzIiwid2VicGFjazovL0V4YW1wbGUgb2N0b2Jlci1zdHVkaW8gcHJvamVjdC8uL3NyYy9wYWdlcy9wcm9qZWN0L2xpc3QuanMiXSwic291cmNlc0NvbnRlbnQiOlsidmFyIGhhbmRzID0gW107XG5oYW5kcy5wdXNoKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNzZWNvbmRoYW5kID4gKicpKTtcbmhhbmRzLnB1c2goZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI21pbnV0ZWhhbmQgPiAqJykpO1xuaGFuZHMucHVzaChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjaG91cmhhbmQgPiAqJykpO1xuXG52YXIgY3ggPSAxMDA7XG52YXIgY3kgPSAxMDA7XG5cbmZ1bmN0aW9uIHNoaWZ0ZXIodmFsKSB7XG4gIHJldHVybiBbdmFsLCBjeCwgY3ldLmpvaW4oJyAnKTtcbn1cblxudmFyIGRhdGUgPSBuZXcgRGF0ZSgpO1xudmFyIGhvdXJzQW5nbGUgPSAzNjAgKiBkYXRlLmdldEhvdXJzKCkgLyAxMiArIGRhdGUuZ2V0TWludXRlcygpIC8gMjtcbnZhciBtaW51dGVBbmdsZSA9IDM2MCAqIGRhdGUuZ2V0TWludXRlcygpIC8gNjA7XG52YXIgc2VjQW5nbGUgPSAzNjAgKiBkYXRlLmdldFNlY29uZHMoKSAvIDYwO1xuXG5oYW5kc1swXS5zZXRBdHRyaWJ1dGUoJ2Zyb20nLCBzaGlmdGVyKHNlY0FuZ2xlKSk7XG5oYW5kc1swXS5zZXRBdHRyaWJ1dGUoJ3RvJywgc2hpZnRlcihzZWNBbmdsZSArIDM2MCkpO1xuaGFuZHNbMV0uc2V0QXR0cmlidXRlKCdmcm9tJywgc2hpZnRlcihtaW51dGVBbmdsZSkpO1xuaGFuZHNbMV0uc2V0QXR0cmlidXRlKCd0bycsIHNoaWZ0ZXIobWludXRlQW5nbGUgKyAzNjApKTtcbmhhbmRzWzJdLnNldEF0dHJpYnV0ZSgnZnJvbScsIHNoaWZ0ZXIoaG91cnNBbmdsZSkpO1xuaGFuZHNbMl0uc2V0QXR0cmlidXRlKCd0bycsIHNoaWZ0ZXIoaG91cnNBbmdsZSArIDM2MCkpO1xuXG5mb3IodmFyIGkgPSAxOyBpIDw9IDEyOyBpKyspIHtcbiAgdmFyIGVsID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudE5TKCdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycsICdsaW5lJyk7XG4gIGVsLnNldEF0dHJpYnV0ZSgneDEnLCAnMTAwJyk7XG4gIGVsLnNldEF0dHJpYnV0ZSgneTEnLCAnMzAnKTtcbiAgZWwuc2V0QXR0cmlidXRlKCd4MicsICcxMDAnKTtcbiAgZWwuc2V0QXR0cmlidXRlKCd5MicsICc0MCcpO1xuICBlbC5zZXRBdHRyaWJ1dGUoJ3RyYW5zZm9ybScsICdyb3RhdGUoJyArIChpKjM2MC8xMikgKyAnIDEwMCAxMDApJyk7XG4gIGVsLnNldEF0dHJpYnV0ZSgnc3R5bGUnLCAnc3Ryb2tlOiAjZmZmZmZmOycpO1xuICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdzdmcnKS5hcHBlbmRDaGlsZChlbCk7XG59XG4iLCJpbXBvcnQgJ0BzcmMvY29tcG9uZW50cy9zdmcvdGltZSc7XG4iXSwibmFtZXMiOlsiaGFuZHMiLCJwdXNoIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiY3giLCJjeSIsInNoaWZ0ZXIiLCJ2YWwiLCJqb2luIiwiZGF0ZSIsIkRhdGUiLCJob3Vyc0FuZ2xlIiwiZ2V0SG91cnMiLCJnZXRNaW51dGVzIiwibWludXRlQW5nbGUiLCJzZWNBbmdsZSIsImdldFNlY29uZHMiLCJzZXRBdHRyaWJ1dGUiLCJpIiwiZWwiLCJjcmVhdGVFbGVtZW50TlMiLCJhcHBlbmRDaGlsZCJdLCJzb3VyY2VSb290IjoiIn0=