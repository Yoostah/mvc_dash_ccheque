/*!
 * Jasny Bootstrap v4.0.0 (http://jasny.github.io/bootstrap)
 * Copyright 2012-2019 Arnold Daniels
 * Licensed under  ()
 */
if ("undefined" == typeof jQuery)
  throw new Error("Jasny Bootstrap's JavaScript requires jQuery");
+function (a) {
  "use strict";
  function b() {
    var a = document.createElement("bootstrap")
      , b = {
        WebkitTransition: "webkitTransitionEnd",
        MozTransition: "transitionend",
        OTransition: "oTransitionEnd otransitionend",
        transition: "transitionend"
      };
    for (var c in b)
      if (void 0 !== a.style[c])
        return {
          end: b[c]
        };
    return !1
  }
  void 0 === a.support.transition && (a.fn.emulateTransitionEnd = function (b) {
    var c = !1
      , d = this;
    a(this).one(a.support.transition.end, function () {
      c = !0
    });
    var e = function () {
      c || a(d).trigger(a.support.transition.end)
    };
    return setTimeout(e, b),
      this
  }
    ,
    a(function () {
      a.support.transition = b()
    }))
}(window.jQuery),
  +function (a) {
    "use strict";
    var b = navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i)
      , c = function (b, d) {
        if (this.$element = a(b),
          this.options = a.extend({}, c.DEFAULTS, d),
          this.state = null,
          this.placement = null,
          this.$calcClone = null,
          this.calcClone(),
          this.options.recalc && a(window).on("resize", a.proxy(this.recalc, this)),
          this.options.autohide && !this.options.modal) {
          null === navigator.userAgent.match(/(iPad|iPhone)/i) ? "click" : "touchstart";
          a(document).on("click touchstart", a.proxy(this.autohide, this))
        }
        a(this.$element).on("shown.bs.dropdown", a.proxy(function (b) {
          a(this.$element).find(".dropdown .dropdown-backdrop").remove()
        }, this)),
          "boolean" == typeof this.options.disablescrolling && (this.options.disableScrolling = this.options.disablescrolling,
            delete this.options.disablescrolling),
          this.options.toggle && this.toggle()
      };
    c.DEFAULTS = {
      toggle: !0,
      placement: "auto",
      autohide: !0,
      recalc: !0,
      disableScrolling: !0,
      modal: !1,
      backdrop: !1,
      exclude: null
    },
      c.prototype.setWidth = function () {
        var b = this.$element.outerWidth()
          , c = a(window).width();
        c -= 68,
          this.$element.css("width", b > c ? c : b)
      }
      ,
      c.prototype.offset = function () {
        switch (this.placement) {
          case "left":
          case "right":
            return this.$element.outerWidth();
          case "top":
          case "bottom":
            return this.$element.outerHeight()
        }
      }
      ,
      c.prototype.calcPlacement = function () {
        function b(a, b) {
          if ("auto" === e.css(b))
            return a;
          if ("auto" === e.css(a))
            return b;
          var c = parseInt(e.css(a), 10)
            , d = parseInt(e.css(b), 10);
          return c > d ? b : a
        }
        if ("auto" !== this.options.placement)
          return void (this.placement = this.options.placement);
        this.$element.hasClass("in") || this.$element.css("visiblity", "hidden !important").addClass("in");
        var c = a(window).width() / this.$element.outerWidth()
          , d = a(window).height() / this.$element.outerHeight()
          , e = this.$element;
        this.placement = c > d ? b("left", "right") : b("top", "bottom"),
          "hidden !important" === this.$element.css("visibility") && this.$element.removeClass("in").css("visiblity", "")
      }
      ,
      c.prototype.opposite = function (a) {
        switch (a) {
          case "top":
            return "bottom";
          case "left":
            return "right";
          case "bottom":
            return "top";
          case "right":
            return "left"
        }
      }
      ,
      c.prototype.getCanvasElements = function () {
        var b = this.options.canvas ? a(this.options.canvas) : this.$element
          , c = b.find("*").filter(function () {
            return "fixed" === getComputedStyle(this).getPropertyValue("position")
          }).not(this.options.exclude);
        return b.add(c)
      }
      ,
      c.prototype.slide = function (b, c, d) {
        if (!a.support.transition) {
          var e = {};
          return e[this.placement] = "+=" + c,
            e[this.opposite(this.placement)] = "-=" + c,
            b.animate(e, 350, d)
        }
        var f = this.placement
          , g = this.opposite(f);
        b.each(function () {
          "auto" !== a(this).css(f) && a(this).css(f, (parseInt(a(this).css(f), 10) || 0) + c),
            "auto" !== a(this).css(g) && a(this).css(g, (parseInt(a(this).css(g), 10) || 0) - c)
        }),
          this.$element.one(a.support.transition.end, d).emulateTransitionEnd(350)
      }
      ,
      c.prototype.disableScrolling = function () {
        var c = a("body").width()
          , d = "padding-right";
        if (void 0 === a("body").data("offcanvas-style") && a("body").data("offcanvas-style", a("body").attr("style") || ""),
          a("body").css("overflow", "hidden"),
          b && a("body").addClass("lockIphone"),
          a("body").width() > c) {
          var e = parseInt(a("body").css(d), 10) + a("body").width() - c;
          setTimeout(function () {
            a("body").css(d, e)
          }, 1)
        }
        a("body").on("touchmove.bs", function (b) {
          a(event.target).closest(".offcanvas").length || b.preventDefault()
        })
      }
      ,
      c.prototype.enableScrolling = function () {
        a("body").off("touchmove.bs"),
          a("body").removeClass("lockIphone")
      }
      ,
      c.prototype.show = function () {
        if (!this.state) {
          var c = a.Event("show.bs.offcanvas");
          this.$element.trigger(c),
            c.isDefaultPrevented() || this.hideOthers(a.proxy(function () {
              this.state = "slide-in",
                this.$element.css("width", ""),
                this.calcPlacement(),
                this.setWidth();
              var c = this.getCanvasElements()
                , d = this.placement
                , e = this.opposite(d)
                , f = this.offset();
              c.index(this.$element) !== -1 && (a(this.$element).data("offcanvas-style", a(this.$element).attr("style") || ""),
                this.$element.css(d, -1 * f),
                this.$element.css(d)),
                c.addClass("canvas-sliding").each(function () {
                  var c = a(this);
                  void 0 === c.data("offcanvas-style") && c.data("offcanvas-style", c.attr("style") || ""),
                    "static" !== c.css("position") || b || c.css("position", "relative"),
                    "auto" !== c.css(d) && "0px" !== c.css(d) || "auto" !== c.css(e) && "0px" !== c.css(e) || c.css(d, 0)
                }),
                this.options.disableScrolling && this.disableScrolling(),
                (this.options.modal || this.options.backdrop) && this.toggleBackdrop();
              var g = function () {
                "slide-in" == this.state && (this.state = "slid",
                  c.removeClass("canvas-sliding").addClass("canvas-slid"),
                  this.$element.trigger("shown.bs.offcanvas"))
              };
              setTimeout(a.proxy(function () {
                this.$element.addClass("in"),
                  this.slide(c, f, a.proxy(g, this))
              }, this), 1)
            }, this))
        }
      }
      ,
      c.prototype.hideOthers = function (b) {
        var c = !1
          , d = this.$element.attr("id")
          , e = a('.offcanvas-clone:not([data-id="' + d + '"])');
        return e.length ? (e.each(function (d, e) {
          var f = a(e).attr("data-id")
            , g = a("#" + f);
          c = g.hasClass("canvas-slid"),
            c && (g.one("hidden.bs.offcanvas", b),
              g.offcanvas("hide"))
        }),
          void (c || b())) : b()
      }
      ,
      c.prototype.hide = function () {
        if ("slid" === this.state) {
          var b = a.Event("hide.bs.offcanvas");
          if (this.$element.trigger(b),
            !b.isDefaultPrevented()) {
            this.state = "slide-out";
            var c = a(".canvas-slid")
              , d = (this.placement,
                -1 * this.offset())
              , e = function () {
                "slide-out" == this.state && (this.state = null,
                  this.placement = null,
                  this.$element.removeClass("in"),
                  c.removeClass("canvas-sliding"),
                  c.add(this.$element).add("body").each(function () {
                    a(this).attr("style", a(this).data("offcanvas-style")).removeData("offcanvas-style")
                  }),
                  this.$element.css("width", ""),
                  this.$element.trigger("hidden.bs.offcanvas"))
              };
            this.options.disableScrolling && this.enableScrolling(),
              (this.options.modal || this.options.backdrop) && this.toggleBackdrop(),
              c.removeClass("canvas-slid").addClass("canvas-sliding"),
              setTimeout(a.proxy(function () {
                this.slide(c, d, a.proxy(e, this))
              }, this), 1)
          }
        }
      }
      ,
      c.prototype.toggle = function () {
        "slide-in" !== this.state && "slide-out" !== this.state && this["slid" === this.state ? "hide" : "show"]()
      }
      ,
      c.prototype.toggleBackdrop = function (b) {
        b = b || a.noop;
        var c = 150;
        if ("slide-in" == this.state) {
          var d = a("body")
            , e = a.support.transition;
          this.$backdrop = a('<div class="modal-backdrop fade" />'),
            this.options.backdrop ? (this.$backdrop.addClass("allow-navbar"),
              this.options.canvas && a(this.options.canvas)[0] !== d[0] ? (a(this.options.canvas).addClass("limit-backdrop"),
                this.$backdrop.appendTo(this.options.canvas)) : this.$backdrop.insertAfter(this.$element)) : this.$backdrop.insertAfter(this.$element),
            e && this.$backdrop[0].offsetWidth,
            d.addClass("modal-open"),
            this.$backdrop.addClass("show").show(),
            this.$backdrop.on("click.bs", a.proxy(this.autohide, this)),
            e ? this.$backdrop.one(a.support.transition.end, b).emulateTransitionEnd(c) : b()
        } else if ("slide-out" == this.state && this.$backdrop) {
          var f = this;
          if (this.$backdrop.hide().removeClass("show"),
            a("body").removeClass("modal-open").off("touchmove.bs"),
            a.support.transition ? this.$backdrop.one(a.support.transition.end, function () {
              f.$backdrop.remove(),
                b(),
                f.$backdrop = null
            }).emulateTransitionEnd(c) : (this.$backdrop.remove(),
              this.$backdrop = null,
              b()),
            this.options.canvas && a(this.options.canvas)[0] !== a("body")[0]) {
            var g = this.options.canvas;
            setTimeout(function () {
              a(g).removeClass("limit-backdrop")
            }, c)
          }
        } else
          b && b()
      }
      ,
      c.prototype.calcClone = function () {
        var b = this.$element.attr("id");
        this.$calcClone = a('.offcanvas-clone[data-id="' + b + '"]'),
          this.$calcClone.length || (this.$calcClone = this.$element.clone().addClass("offcanvas-clone").attr("data-id", b).removeAttr("id").appendTo(a("body")).html("")),
          this.$calcClone.removeClass("in")
      }
      ,
      c.prototype.recalc = function () {
        if ("none" !== this.$calcClone.css("display") && ("slid" === this.state || "slide-in" === this.state)) {
          this.state = null,
            this.placement = null;
          var b = this.getCanvasElements();
          this.$element.trigger("hide.bs.offcanvas"),
            this.$element.removeClass("in"),
            b.removeClass("canvas-slid"),
            b.add(this.$element).add("body").each(function () {
              a(this).attr("style", a(this).data("offcanvas-style")).removeData("offcanvas-style")
            }),
            this.$element.trigger("hidden.bs.offcanvas")
        }
      }
      ,
      c.prototype.autohide = function (b) {
        var c = a(b.target)
          , d = !c.hasClass("dropdown-backdrop") && 0 === c.closest(this.$element).length;
        d && this.hide()
      }
      ;
    var d = a.fn.offcanvas;
    a.fn.offcanvas = function (b) {
      return this.each(function () {
        var d = a(this)
          , e = d.data("bs.offcanvas")
          , f = a.extend({}, c.DEFAULTS, d.data(), "object" == typeof b && b);
        d.hasClass("offcanvas-clone") || (e || d.data("bs.offcanvas", e = new c(this, f)),
          "string" == typeof b && e[b]())
      })
    }
      ,
      a.fn.offcanvas.Constructor = c,
      a.fn.offcanvas.noConflict = function () {
        return a.fn.offcanvas = d,
          this
      }
      ,
      a(document).on("click.bs.offcanvas.data-api", "[data-toggle=offcanvas]", function (b) {
        var c, d = a(this), e = d.attr("data-target") || (c = d.attr("href")) && c.replace(/.*(?=#[^\s]+$)/, ""), f = a(e), g = f.data("bs.offcanvas"), h = g ? "toggle" : a.extend(d.data(), f.data());
        b.preventDefault(),
          b.stopPropagation(),
          g ? g.toggle() : f.offcanvas(h)
      })
  }(window.jQuery) + function (a) {
    "use strict";
    var b = function (c, d) {
      this.$element = a(c),
        this.options = a.extend({}, b.DEFAULTS, d),
        this.$element.on("click.bs.rowlink mouseup.bs.rowlink", "td:not(.rowlink-skip)", a.proxy(this.click, this))
    };
    b.DEFAULTS = {
      target: "a"
    },
      b.prototype.click = function (b, c) {
        var d = a(b.currentTarget).closest("tr").find(this.options.target)[0];
        if ("undefined" != typeof d && a(b.target)[0] !== d && ("mouseup" !== b.type || 2 === b.which))
          if (b.preventDefault(),
            c = c || b.ctrlKey || "mouseup" === b.type && 2 === b.which,
            !c && d.click)
            d.click();
          else if (document.createEvent) {
            var e = new MouseEvent("click", {
              view: window,
              bubbles: !0,
              cancelable: !0,
              ctrlKey: c
            });
            d.dispatchEvent(e)
          }
      }
      ;
    var c = a.fn.rowlink;
    a.fn.rowlink = function (c) {
      return this.each(function () {
        var d = a(this)
          , e = d.data("bs.rowlink");
        e || d.data("bs.rowlink", e = new b(this, c))
      })
    }
      ,
      a.fn.rowlink.Constructor = b,
      a.fn.rowlink.noConflict = function () {
        return a.fn.rowlink = c,
          this
      }
      ,
      a(document).on("click.bs.rowlink.data-api mouseup.bs.rowlink.data-api", '[data-link="row"]', function (b) {
        if (("mouseup" !== b.type || 2 === b.which) && 0 === a(b.target).closest(".rowlink-skip").length) {
          var c = a(this);
          if (!c.data("bs.rowlink")) {
            c.rowlink(c.data());
            var d = b.ctrlKey || 2 === b.which;
            a(b.target).trigger("click.bs.rowlink", [d])
          }
        }
      })
  }(window.jQuery),
  +function (a) {
    "use strict";
    var b = "Microsoft Internet Explorer" == window.navigator.appName
      , c = function (b, d) {
        if (this.$element = a(b),
          this.options = a.extend({}, c.DEFAULTS, d),
          this.$input = this.$element.find(":file"),
          0 !== this.$input.length) {
          this.name = this.$input.attr("name") || d.name,
            this.$hidden = this.$element.find('input[type=hidden][name="' + this.name + '"]'),
            0 === this.$hidden.length && (this.$hidden = a('<input type="hidden">').insertBefore(this.$input)),
            this.$preview = this.$element.find(".fileinput-preview");
          var e = this.$preview.css("height");
          "inline" !== this.$preview.css("display") && "0px" !== e && "none" !== e && this.$preview.css("line-height", e),
            this.original = {
              exists: this.$element.hasClass("fileinput-exists"),
              preview: this.$preview.html(),
              hiddenVal: this.$hidden.val()
            },
            this.listen(),
            this.reset()
        }
      };
    c.DEFAULTS = {
      clearName: !0
    },
      c.prototype.listen = function () {
        this.$input.on("change.bs.fileinput", a.proxy(this.change, this)),
          a(this.$input[0].form).on("reset.bs.fileinput", a.proxy(this.reset, this)),
          this.$element.find('[data-trigger="fileinput"]').on("click.bs.fileinput", a.proxy(this.trigger, this)),
          this.$element.find('[data-dismiss="fileinput"]').on("click.bs.fileinput", a.proxy(this.clear, this))
      }
      ,
      c.prototype.verifySizes = function (a) {
        if ("undefined" == typeof this.options.maxSize)
          return !0;
        var b = parseFloat(this.options.maxSize);
        if (b !== this.options.maxSize)
          return !0;
        for (var c = 0; c < a.length; c++) {
          var d = "undefined" != typeof a[c].size ? a[c].size : null;
          if (null !== d && (d = d / 1e3 / 1e3,
            d > b))
            return !1
        }
        return !0
      }
      ,
      c.prototype.change = function (b) {
        var c = void 0 === b.target.files ? b.target && b.target.value ? [{
          name: b.target.value.replace(/^.+\\/, "")
        }] : [] : b.target.files;
        if (b.stopPropagation(),
          0 === c.length)
          return this.clear(),
            void this.$element.trigger("clear.bs.fileinput");
        if (!this.verifySizes(c))
          return this.$element.trigger("max_size.bs.fileinput"),
            this.clear(),
            void this.$element.trigger("clear.bs.fileinput");
        this.$hidden.val(""),
          this.$hidden.attr("name", ""),
          this.$input.attr("name", this.name);
        var d = c[0];
        if (this.$preview.length > 0 && ("undefined" != typeof d.type ? d.type.match(/^image\/(gif|png|jpeg|svg\+xml)$/) : d.name.match(/\.(gif|png|jpe?g|svg)$/i)) && "undefined" != typeof FileReader) {
          var e = this
            , f = new FileReader
            , g = this.$preview
            , h = this.$element;
          f.onload = function (b) {
            var f = a("<img>");
            if (f[0].src = b.target.result,
              c[0].result = b.target.result,
              h.find(".fileinput-filename").text(d.name),
              "none" != g.css("max-height")) {
              var i = parseInt(g.css("max-height"), 10) || 0
                , j = parseInt(g.css("padding-top"), 10) || 0
                , k = parseInt(g.css("padding-bottom"), 10) || 0
                , l = parseInt(g.css("border-top"), 10) || 0
                , m = parseInt(g.css("border-bottom"), 10) || 0;
              f.css("max-height", i - j - k - l - m)
            }
            g.html(f),
              e.options.exif && e.setImageTransform(f, d),
              h.addClass("fileinput-exists").removeClass("fileinput-new"),
              h.trigger("change.bs.fileinput", c)
          }
            ,
            f.readAsDataURL(d)
        } else {
          var i = d.name
            , j = this.$element.find(".fileinput-filename");
          c.length > 1 && (i = a.map(c, function (a) {
            return a.name
          }).join(", ")),
            j.text(i),
            this.$preview.text(d.name),
            this.$element.addClass("fileinput-exists").removeClass("fileinput-new"),
            this.$element.trigger("change.bs.fileinput")
        }
      }
      ,
      c.prototype.setImageTransform = function (a, b) {
        var c = this
          , d = new FileReader;
        d.onload = function (b) {
          var e = new DataView(d.result)
            , f = c.getImageExif(e);
          f && c.resetOrientation(a, f)
        }
          ,
          d.readAsArrayBuffer(b)
      }
      ,
      c.prototype.getImageExif = function (a) {
        if (65496 != a.getUint16(0, !1))
          return -2;
        for (var b = a.byteLength, c = 2; c < b;) {
          var d = a.getUint16(c, !1);
          if (c += 2,
            65505 == d) {
            if (1165519206 != a.getUint32(c += 2, !1))
              return -1;
            var e = 18761 == a.getUint16(c += 6, !1);
            c += a.getUint32(c + 4, e);
            var f = a.getUint16(c, e);
            c += 2;
            for (var g = 0; g < f; g++)
              if (274 == a.getUint16(c + 12 * g, e))
                return a.getUint16(c + 12 * g + 8, e)
          } else {
            if (65280 != (65280 & d))
              break;
            c += a.getUint16(c, !1)
          }
        }
        return -1
      }
      ,
      c.prototype.resetOrientation = function (a, b) {
        var c = new Image;
        c.onload = function () {
          var d = c.width
            , e = c.height
            , f = document.createElement("canvas")
            , g = f.getContext("2d");
          switch ([5, 6, 7, 8].indexOf(b) > -1 ? (f.width = e,
            f.height = d) : (f.width = d,
              f.height = e),
          b) {
            case 2:
              g.transform(-1, 0, 0, 1, d, 0);
              break;
            case 3:
              g.transform(-1, 0, 0, -1, d, e);
              break;
            case 4:
              g.transform(1, 0, 0, -1, 0, e);
              break;
            case 5:
              g.transform(0, 1, 1, 0, 0, 0);
              break;
            case 6:
              g.transform(0, 1, -1, 0, e, 0);
              break;
            case 7:
              g.transform(0, -1, -1, 0, e, d);
              break;
            case 8:
              g.transform(0, -1, 1, 0, 0, d);
              break;
            default:
              g.transform(1, 0, 0, 1, 0, 0)
          }
          g.drawImage(c, 0, 0),
            a.attr("src", f.toDataURL())
        }
          ,
          c.src = a.attr("src")
      }
      ,
      c.prototype.clear = function (a) {
        if (a && a.preventDefault(),
          this.$hidden.val(""),
          this.$hidden.attr("name", this.name),
          this.options.clearName && this.$input.attr("name", ""),
          b) {
          var c = this.$input.clone(!0);
          this.$input.after(c),
            this.$input.remove(),
            this.$input = c
        } else
          this.$input.val("");
        this.$preview.html(""),
          this.$element.find(".fileinput-filename").text(""),
          this.$element.addClass("fileinput-new").removeClass("fileinput-exists"),
          void 0 !== a && (this.$input.trigger("change"),
            this.$element.trigger("clear.bs.fileinput"))
      }
      ,
      c.prototype.reset = function () {
        this.clear(),
          this.$hidden.val(this.original.hiddenVal),
          this.$preview.html(this.original.preview),
          this.$element.find(".fileinput-filename").text(""),
          this.original.exists ? this.$element.addClass("fileinput-exists").removeClass("fileinput-new") : this.$element.addClass("fileinput-new").removeClass("fileinput-exists"),
          this.$element.trigger("reseted.bs.fileinput")
      }
      ,
      c.prototype.trigger = function (a) {
        this.$input.trigger("click"),
          a.preventDefault()
      }
      ;
    var d = a.fn.fileinput;
    a.fn.fileinput = function (b) {
      return this.each(function () {
        var d = a(this)
          , e = d.data("bs.fileinput");
        e || d.data("bs.fileinput", e = new c(this, b)),
          "string" == typeof b && e[b]()
      })
    }
      ,
      a.fn.fileinput.Constructor = c,
      a.fn.fileinput.noConflict = function () {
        return a.fn.fileinput = d,
          this
      }
      ,
      a(document).on("click.fileinput.data-api", '[data-provides="fileinput"]', function (b) {
        var c = a(this);
        if (!c.data("bs.fileinput")) {
          c.fileinput(c.data());
          var d = a(b.target).closest('[data-dismiss="fileinput"],[data-trigger="fileinput"]');
          d.length > 0 && (b.preventDefault(),
            d.trigger("click.bs.fileinput"))
        }
      })
  }(window.jQuery);
