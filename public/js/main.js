/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it uses a non-standard name for the exports (exports).
(() => {
var exports = __webpack_exports__;
/*!*************************************!*\
  !*** ./resources/js/canvas/main.ts ***!
  \*************************************/


function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  Object.defineProperty(Constructor, "prototype", {
    writable: false
  });
  return Constructor;
}

Object.defineProperty(exports, "__esModule", ({
  value: true
}));

var createCanvas = /*#__PURE__*/function () {
  function createCanvas() {
    _classCallCheck(this, createCanvas);
  }

  _createClass(createCanvas, [{
    key: "init",
    value: function init(properties, editor, canvas, ctx, args) {
      var newScale = this.shrinkDesignArea(args);
      this.draw(properties, newScale, ctx);
    }
  }, {
    key: "draw",
    value: function draw(properties, args, ctx) {
      ctx.canvas.width = args.newWidth;
      ctx.canvas.height = args.newHeight;
      ctx.fillStyle = properties.bgcolor;
      ctx.fillRect(0, 0, properties.width, properties.height);
    }
  }, {
    key: "shrinkDesignArea",
    value: function shrinkDesignArea(args) {
      var editorWidth = args.editorWidth;
      var editorHeight = args.editorHeight;
      var propWidth = args.propWidth;
      var propHeight = args.propHeight;
      var finalWidth = propWidth > editorWidth ? propWidth * 30 / 100 : propWidth;
      var finalHeight = propHeight > editorHeight ? propHeight * 30 / 100 : propHeight;
      return {
        "newWidth": finalWidth,
        "newHeight": finalHeight,
        "originalWidth": args.propWidth,
        "originalHeight": args.propHeight
      };
    }
  }]);

  return createCanvas;
}();

exports["default"] = createCanvas;
})();

/******/ })()
;