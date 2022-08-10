(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/common/login/index.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/common/login/index.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

// import LinkInline from "@layouts/form-layout";
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Login",
  components: {// FormLayout,
  },
  data: function data() {
    return {
      rememberEmail: false,
      user: {
        email: null,
        password: null
      }
    };
  },
  mounted: function mounted() {
    var email = localStorage.getItem('user_email');

    if (email) {
      this.user.email = email;
      this.rememberEmail = true;
    }
  },
  methods: {
    login: function login() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var result;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.prev = 0;
                _context.next = 3;
                return _this.$http.postWithoutHeaders("login", {
                  email: _this.user.email.trim(),
                  password: _this.user.password
                });

              case 3:
                result = _context.sent;

                _this.$store.dispatch("auth/login", result.data);

                _this.rememberEmail ? localStorage.setItem('user_email', _this.user.email) : localStorage.setItem('user_email', '');
                _context.next = 11;
                break;

              case 8:
                _context.prev = 8;
                _context.t0 = _context["catch"](0);

                _this.$utility.showErrorMessage(_context.t0.message);

              case 11:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, null, [[0, 8]]);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/pug-plain-loader/index.js!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/common/login/index.vue?vue&type=template&id=87ed6c9e&lang=pug&":
/*!*********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/pug-plain-loader!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/common/login/index.vue?vue&type=template&id=87ed6c9e&lang=pug& ***!
  \*********************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.login()
        }
      }
    },
    [
      _c(
        "div",
        { staticClass: "form-group" },
        [
          _c("form-field-input", {
            attrs: {
              attribute: "email",
              "input-type": "text",
              placeholder: "Email",
              required: true
            },
            model: {
              value: _vm.user.email,
              callback: function($$v) {
                _vm.$set(_vm.user, "email", $$v)
              },
              expression: "user.email"
            }
          })
        ],
        1
      ),
      _c(
        "div",
        { staticClass: "form-group" },
        [
          _c("form-field-input", {
            attrs: {
              attribute: "Password",
              "input-type": "password",
              placeholder: "Password",
              required: true,
              maxLength: 25
            },
            model: {
              value: _vm.user.password,
              callback: function($$v) {
                _vm.$set(_vm.user, "password", $$v)
              },
              expression: "user.password"
            }
          })
        ],
        1
      ),
      _c("div", { staticClass: "row" }, [
        _c(
          "div",
          { staticClass: "col-8 col-lg-12" },
          [
            _c("form-field-input", {
              staticClass: "pull-left",
              attrs: { inputType: "checkbox-el", attribute: "Remember me" },
              model: {
                value: _vm.rememberEmail,
                callback: function($$v) {
                  _vm.rememberEmail = $$v
                },
                expression: "rememberEmail"
              }
            }),
            _c(
              "span",
              { staticClass: "pull-right" },
              [
                _c(
                  "link-inline",
                  { attrs: { route: "user.forgot_password" } },
                  [
                    _c("a", { staticClass: "pull-right" }),
                    _c("i", { staticClass: "tx-14 fa fa-lock mr-1" }),
                    _vm._v("Forgot Password?")
                  ]
                )
              ],
              1
            )
          ],
          1
        ),
        _vm._m(0),
        _c(
          "div",
          { staticClass: "mg-t-30 tx-center tx-14" },
          [
            _vm._v("New Student?"),
            _c("link-inline", {
              staticClass: "tx-14",
              attrs: { route: "student.register", label: "Register Here" }
            })
          ],
          1
        )
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-12 col-lg-12 mt-1 text-center" }, [
      _c("button", { staticClass: "btn btn-info btn-block" }, [
        _vm._v("Sign In")
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/common/login/index.vue":
/*!***************************************************!*\
  !*** ./resources/js/pages/common/login/index.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_87ed6c9e_lang_pug___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=87ed6c9e&lang=pug& */ "./resources/js/pages/common/login/index.vue?vue&type=template&id=87ed6c9e&lang=pug&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/pages/common/login/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_87ed6c9e_lang_pug___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_87ed6c9e_lang_pug___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/common/login/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/common/login/index.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/pages/common/login/index.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/common/login/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/common/login/index.vue?vue&type=template&id=87ed6c9e&lang=pug&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/pages/common/login/index.vue?vue&type=template&id=87ed6c9e&lang=pug& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_pug_plain_loader_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_87ed6c9e_lang_pug___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/pug-plain-loader!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=87ed6c9e&lang=pug& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/pug-plain-loader/index.js!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/common/login/index.vue?vue&type=template&id=87ed6c9e&lang=pug&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_pug_plain_loader_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_87ed6c9e_lang_pug___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_pug_plain_loader_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_87ed6c9e_lang_pug___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);