var $jscomp$this = this,
  $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.arrayIteratorImpl = function (c) {
  var d = 0;
  return function () {
    return d < c.length ? { done: !1, value: c[d++] } : { done: !0 };
  };
};
$jscomp.arrayIterator = function (c) {
  return { next: $jscomp.arrayIteratorImpl(c) };
};
$jscomp.makeIterator = function (c) {
  var d = "undefined" != typeof Symbol && Symbol.iterator && c[Symbol.iterator];
  return d ? d.call(c) : $jscomp.arrayIterator(c);
};
Date.prototype.hasOwnProperty("stdTimezoneOffset") ||
  ((Date.prototype.stdTimezoneOffset = function () {
    var c = this.getFullYear();
    if (!Date.prototype.stdTimezoneOffset.cache.hasOwnProperty(c)) {
      for (
        var d = new Date(c, 0, 1).getTimezoneOffset(),
          f = [6, 7, 5, 8, 4, 9, 3, 10, 2, 11, 1],
          k = 0;
        12 > k;
        k++
      ) {
        var m = new Date(c, f[k], 1).getTimezoneOffset();
        if (m != d) {
          d = Math.max(d, m);
          break;
        }
      }
      Date.prototype.stdTimezoneOffset.cache[c] = d;
    }
    return Date.prototype.stdTimezoneOffset.cache[c];
  }),
  (Date.prototype.stdTimezoneOffset.cache = {}));
Date.prototype.hasOwnProperty("isDST") ||
  (Date.prototype.isDST = function () {
    return this.getTimezoneOffset() < this.stdTimezoneOffset();
  });
Date.prototype.hasOwnProperty("isLeapYear") ||
  (Date.prototype.isLeapYear = function () {
    var c = this.getFullYear();
    return 0 != (c & 3) ? !1 : 0 != c % 100 || 0 == c % 400;
  });
Date.prototype.hasOwnProperty("getDOY") ||
  (Date.prototype.getDOY = function () {
    var c = this.getMonth(),
      d = this.getDate();
    d = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334][c] + d;
    1 < c && this.isLeapYear() && d++;
    return d;
  });
Date.prototype.hasOwnProperty("daysInMonth") ||
  (Date.prototype.daysInMonth = function () {
    return [
      31,
      this.isLeapYear() ? 29 : 28,
      31,
      30,
      31,
      30,
      31,
      31,
      30,
      31,
      30,
      31,
    ][this.getMonth()];
  });
Date.prototype.hasOwnProperty("getWOY") ||
  (Date.prototype.getWOY = function (c) {
    var d = new Date(+this);
    d.setHours(0, 0, 0, 0);
    d.setDate(d.getDate() + 4 - (d.getDay() || 7));
    return c
      ? d.getFullYear()
      : Math.ceil(((d - new Date(d.getFullYear(), 0, 1)) / 864e5 + 1) / 7);
  });
Date.prototype.hasOwnProperty("swatchTime") ||
  (Date.prototype.swatchTime = function () {
    return (
      "00" +
      Math.floor(
        (60 * (((this.getUTCHours() + 1) % 24) * 60 + this.getUTCMinutes()) +
          this.getUTCSeconds() +
          0.001 * this.getUTCMilliseconds()) /
          86.4
      )
    ).slice(-3);
  });
String.prototype.padStart ||
  (String.prototype.padStart = function (c, d) {
    c >>= 0;
    d = String(d || " ");
    if (this.length > c) return String(this);
    c -= this.length;
    c > d.length && (d += d.repeat(c / d.length));
    return d.slice(0, c) + String(this);
  });
Number.prototype.map ||
  (Number.prototype.map = function (c, d, f, k) {
    return f + ((this - c) / (d - c)) * (k - f);
  });
(function (c) {
  c.clock = {
    version: "2.3.6",
    options: [
      {
        type: "string",
        value: "destroy",
        description:
          "Passing in 'destroy' to an already initialized clock will remove the setTimeout for that clock to stop it from ticking, and remove all html markup and data associated with the plugin instance on the dom elements",
      },
      {
        type: "string",
        value: "stop",
        description:
          "Passing in 'stop' to an already initialized clock will clear the setTimeout for that clock to stop it from ticking",
      },
      {
        type: "string",
        value: "start",
        description:
          "Passing in 'start' to an already initialized clock will restart the setTimeout for that clock to get it ticking again, as though it had never lost time",
      },
      {
        type: "object",
        description: "option set {}",
        values: [
          {
            name: "timestamp",
            description:
              "Either a javascript timestamp as produces by [JAVASCRIPT new Date().getTime()] or a php timestamp as produced by [PHP time()] ",
            type: "unix timestamp",
            values: ["javascript timestamp", "php timestamp"],
          },
          {
            name: "langSet",
            description:
              "two letter locale to be used for the translation of Day names and Month names",
            type: "String",
            values:
              "am ar bn bg ca zh hr cs da nl en et fi fr de el gu hi hu id it ja kn ko lv lt ms ml mr mo ps fa pl pt ro ru sr sk sl es sw sv ta te th tr uk vi".split(
                " "
              ),
          },
          {
            name: "calendar",
            description:
              "Whether the date should be displayed together with the time",
            type: "Boolean",
            values: [!0, !1],
          },
          {
            name: "dateFormat",
            description:
              "PHP Style Format string for formatting a local date, see http://php.net/manual/en/function.date.php",
            type: "String",
            values: "dDjlNSwzWFmMntLoYy".split(""),
          },
          {
            name: "timeFormat",
            description:
              "PHP Style Format string for formatting a local date, see http://php.net/manual/en/function.date.php",
            type: "String",
            values: "aABgGhHisveIOPZcrU".split(""),
          },
          {
            name: "isDST",
            description:
              "When a client side timestamp is used, whether DST is active will be automatically determined. However this cannot be determined for a server-side timestamp which must be passed in as UTC, in that can case it can be set with this option",
            type: "Boolean",
            values: [!0, !1],
          },
          {
            name: "rate",
            description:
              "Defines the rate at which the clock will update, in milliseconds",
            type: "Integer",
            values: "1 - 9007199254740991 (recommended 10-60000)",
          },
        ],
      },
    ],
    methods: {
      destroy:
        "Chaining clock().destroy() has the same effect as passing the 'destroy' option as in clock('destroy')",
      stop: "Chaining clock().stop() has the same effect as passing the 'stop' option as in clock('stop')",
      start:
        "Chaining clock().start() has the same effect as passing the 'start' option as in clock('start')",
    },
  };
  Object.freeze(c.clock);
  var d = d || {};
  c.fn.clock = function (f) {
    var k = this,
      m = this;
    this.initialize = function () {
      return this;
    };
    this.destroy = function () {
      return m.each(function (a, b) {
        n.destroy(b);
      });
    };
    this.stop = function () {
      return m.each(function (a, b) {
        n.stop(b);
      });
    };
    this.start = function () {
      return m.each(function (a, b) {
        n.start(b);
      });
    };
    var q = {
        d: function (a) {
          return ("" + a.dt).padStart(2, "0");
        },
        D: function (a) {
          return new Intl.DateTimeFormat(a.myoptions.langSet, {
            weekday: "short",
          }).format(a.mytimestamp_sysdiff);
        },
        j: function (a) {
          return a.dt;
        },
        l: function (a) {
          return new Intl.DateTimeFormat(a.myoptions.langSet, {
            weekday: "long",
          }).format(a.mytimestamp_sysdiff);
        },
        N: function (a) {
          return 0 === a.dy ? 7 : a.dy;
        },
        S: function (a) {
          a = a.dt;
          return 1 === a || (1 === a % 10 && 11 != a)
            ? "st"
            : 2 === a || (2 === a % 10 && 12 != a)
            ? "nd"
            : 3 === a || (3 === a % 10 && 13 != a)
            ? "rd"
            : "th";
        },
        w: function (a) {
          return a.dy;
        },
        z: function (a) {
          return a.doy - 1;
        },
        W: function (a) {
          return a.woy;
        },
        F: function (a) {
          return new Intl.DateTimeFormat(a.myoptions.langSet, {
            month: "long",
          }).format(a.mytimestamp_sysdiff);
        },
        m: function (a) {
          return (a.mo + 1 + "").padStart(2, "0");
        },
        M: function (a) {
          return new Intl.DateTimeFormat(a.myoptions.langSet, {
            month: "short",
          }).format(a.mytimestamp_sysdiff);
        },
        n: function (a) {
          return a.mo + 1;
        },
        t: function (a) {
          return a.dim;
        },
        L: function (a) {
          return a.ly ? 1 : 0;
        },
        o: function (a) {
          return a.iso8601Year;
        },
        Y: function (a) {
          return a.y;
        },
        y: function (a) {
          return a.y.toString().substr(2, 2);
        },
      },
      r = {
        a: function (a) {
          return a.ap.toLowerCase();
        },
        A: function (a) {
          return a.ap;
        },
        B: function (a) {
          return a.swt;
        },
        g: function (a) {
          return a.H12;
        },
        G: function (a) {
          return a.h;
        },
        h: function (a) {
          return ("" + a.H12).padStart(2, "0");
        },
        H: function (a) {
          return ("" + a.h).padStart(2, "0");
        },
        i: function (a) {
          return ("" + a.m).padStart(2, "0");
        },
        s: function (a) {
          return ("" + a.s).padStart(2, "0");
        },
        u: function (a) {
          return ("" + a.ms).padStart(3, "0") + ("" + a.us).padStart(3, "0");
        },
        v: function (a) {
          return ("" + a.ms).padStart(3, "0");
        },
        e: function (a) {
          return a.myoptions.timezone;
        },
        I: function (a) {
          return a.myoptions.isDST ? "DST" : "";
        },
        O: function (a) {
          return (
            (0 > a.tzH
              ? "+" + ("" + Math.abs(a.tzH)).padStart(2, "0")
              : 0 < tzH
              ? ("" + -1 * a.tzH).padStart(2, "0")
              : "+00") + "00"
          );
        },
        P: function (a) {
          return (
            (0 > a.tzH
              ? "+" + ("" + Math.abs(a.tzH)).padStart(2, "0")
              : 0 < a.tzH
              ? ("" + -1 * a.tzH).padStart(2, "0")
              : "+00") + ":00"
          );
        },
        Z: function (a) {
          return 0 > a.tzS
            ? "" + Math.abs(a.tzS)
            : 0 < a.tzS
            ? "" + -1 * a.tzS
            : "0";
        },
        c: function (a) {
          return (
            a.y +
            "-" +
            (a.mo + 1 + "").padStart(2, "0") +
            "-" +
            ("" + a.dt).padStart(2, "0") +
            "T" +
            ("" + a.h).padStart(2, "0") +
            ":" +
            ("" + a.m).padStart(2, "0") +
            ":" +
            ("" + a.s).padStart(2, "0") +
            (0 > a.tzH
              ? "+" + ("" + Math.abs(a.tzH)).padStart(2, "0")
              : 0 < tzh
              ? ("" + -1 * a.tzh).padStart(2, "0")
              : "+00") +
            ":00"
          );
        },
        r: function (a) {
          return (
            new Intl.DateTimeFormat(a.myoptions.langSet, {
              weekday: "short",
            }).format(a.mytimestamp_sysdiff) +
            ", " +
            a.dt +
            " " +
            new Intl.DateTimeFormat(a.myoptions.langSet, {
              month: "short",
            }).format(a.mytimestamp_sysdiff) +
            " " +
            a.y +
            " " +
            ("" + a.h).padStart(2, "0") +
            ":" +
            ("" + a.m).padStart(2, "0") +
            ":" +
            ("" + a.s).padStart(2, "0") +
            " " +
            (0 > a.tzH
              ? "+" + ("" + Math.abs(a.tzH)).padStart(2, "0")
              : 0 < a.tzh
              ? ("" + -1 * a.tzh).padStart(2, "0")
              : "+00") +
            "00"
          );
        },
        U: function (a) {
          return Math.floor(a.mytimestamp / 1e3);
        },
      },
      n = {
        destroy: function (a) {
          var b = c(a).attr("id");
          d.hasOwnProperty(b) && (clearTimeout(d[b]), delete d[b]);
          c(a).html("");
          c(a).hasClass("jqclock jqclock-dark") &&
            c(a).removeClass("jqclock jqclock-dark");
          c(a).removeData("clockoptions");
        },
        stop: function (a) {
          a = c(a).attr("id");
          d.hasOwnProperty(a) && (clearTimeout(d[a]), delete d[a]);
        },
        start: function (a) {
          var b = c(a).attr("id"),
            e = c(a).data("clockoptions");
          void 0 !== e &&
            !1 === d.hasOwnProperty(b) &&
            (d[b] = setTimeout(function () {
              p(c(a));
            }, e.rate));
        },
      },
      v = function () {
        return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx"
          .replace(/[xy]/g, function (a) {
            var b = (16 * Math.random()) | 0;
            return ("x" == a ? b : (b & 3) | 8).toString(16);
          })
          .toUpperCase();
      },
      p = function (a) {
        var b = {};
        b.myoptions = c(a).data("clockoptions");
        b.currentTzOffset = new Date().getTimezoneOffset();
        b.correction =
          b.currentTzOffset === b.myoptions.tzOffset
            ? 0
            : 6e4 * (b.currentTzOffset - b.myoptions.tzOffset);
        b.pfnow = performance.now();
        b.mytimestamp =
          performance.timeOrigin + b.pfnow + b.myoptions.sysdiff + b.correction;
        b.mytimestamp_sysdiff = new Date(b.mytimestamp);
        b.h = b.mytimestamp_sysdiff.getHours();
        b.m = b.mytimestamp_sysdiff.getMinutes();
        b.s = b.mytimestamp_sysdiff.getSeconds();
        b.ms = b.mytimestamp_sysdiff.getMilliseconds();
        b.us = ("" + (b.pfnow % 1)).substring(2, 5);
        b.dy = b.mytimestamp_sysdiff.getDay();
        b.dt = b.mytimestamp_sysdiff.getDate();
        b.mo = b.mytimestamp_sysdiff.getMonth();
        b.y = b.mytimestamp_sysdiff.getFullYear();
        b.ly = b.mytimestamp_sysdiff.isLeapYear();
        b.doy = b.mytimestamp_sysdiff.getDOY();
        b.woy = b.mytimestamp_sysdiff.getWOY();
        b.iso8601Year = b.mytimestamp_sysdiff.getWOY(!0);
        b.dim = b.mytimestamp_sysdiff.daysInMonth();
        b.swt = b.mytimestamp_sysdiff.swatchTime();
        b.tzH = parseInt(b.myoptions.tzOffset / 60);
        b.tzS = parseInt(60 * b.myoptions.tzOffset);
        b.ap = "AM";
        b.calendElem = "";
        b.clockElem = "";
        11 < b.h && (b.ap = "PM");
        b.H12 = b.h;
        12 < b.H12 ? (b.H12 -= 12) : 0 === b.H12 && (b.H12 = 12);
        !0 === b.myoptions.calendar && (b.calendElem = w(b));
        b.clockElem = x(b);
        c(a).html(b.calendElem + b.clockElem);
        var e = c(a).attr("id");
        d[e] = setTimeout(function () {
          p(c(a));
        }, b.myoptions.rate);
      },
      w = function (a) {
        for (
          var b = "", e, g = a.myoptions, h = 0;
          h <= g.dateFormat.length;
          h++
        )
          if (((e = g.dateFormat.charAt(h)), e in q)) b += q[e](a);
          else
            switch (e) {
              case String.fromCharCode(92):
                b += g.dateFormat.charAt(++h);
                break;
              case "%":
                e = $jscomp.makeIterator(t(g, h, !0, b, e));
                b = e.next().value;
                h = e.next().value;
                break;
              default:
                b += e;
            }
        return '<span class="clockdate clockdate-dark">' + b + "</span>";
      },
      x = function (a) {
        for (
          var b = "", e, g = a.myoptions, h = 0;
          h <= g.timeFormat.length;
          h++
        )
          if (((e = g.timeFormat.charAt(h)), e in r)) b += r[e](a);
          else
            switch (e) {
              case String.fromCharCode(92):
                b += g.timeFormat.charAt(++h);
                break;
              case "%":
                e = $jscomp.makeIterator(t(g, h, !1, b, e));
                b = e.next().value;
                h = e.next().value;
                break;
              default:
                b += e;
            }
        return '<span class="clocktime">' + b + "</span>";
      },
      t = function (a, b, e, g, h) {
        var l = b + 1;
        for (
          a = e ? a.dateFormat : a.timeFormat;
          l < a.length && "%" != a.charAt(l);

        )
          l++;
        l > b + 1 && l != a.length
          ? ((g += a.substring(b + 1, l)), (b += l - b))
          : (g += h);
        return [g, b];
      },
      u = function (a, b) {
        a.timezone = "UTC";
        var e = b % 1;
        b -= e;
        var g = "";
        0 !== Math.abs(e) && (g = "" + Math.abs(e).map(0, 1, 0, 60));
        0 > b
          ? (a.timezone += "+" + Math.abs(b) + ("" !== g ? ":" + g : ""))
          : 0 < b && (a.timezone += -1 * b + ("" !== g ? ":" + g : ""));
        return a;
      };
    this.each(function () {
      if ("undefined" === typeof f || "object" === typeof f) {
        var a = performance.timeOrigin + performance.now();
        a = new Date(a);
        var b = f;
        b = b || {};
        b.timestamp = b.timestamp || "localsystime";
        b.langSet = b.langSet || "en";
        b.calendar = b.hasOwnProperty("calendar") ? b.calendar : !0;
        b.dateFormat =
          b.dateFormat || ("en" == b.langSet ? "l, F j, Y" : "l, j F Y");
        b.timeFormat =
          b.timeFormat || ("en" == b.langSet ? "h:i:s A" : "H:i:s");
        b.timezone = b.timezone || "localsystimezone";
        b.isDST = b.hasOwnProperty("isDST") ? b.isDST : a.isDST();
        b.rate = b.rate || 500;
        b = f = b;
        "string" !== typeof b.langSet && (b.langSet = "" + b.langSet);
        "string" === typeof b.calendar
          ? (b.calendar = "false" == b.calendar ? !1 : !0)
          : "boolean" !== typeof b.calendar && (b.calendar = !!b.calendar);
        "string" !== typeof b.dateFormat && (b.dateFormat = "" + b.dateFormat);
        "string" !== typeof b.timeFormat && (b.timeFormat = "" + b.dateFormat);
        "string" !== typeof b.timezone && (b.timezone = "" + b.timezone);
        "string" === typeof b.isDST
          ? (b.isDST = "true" == b.isDST ? !0 : !1)
          : "boolean" !== typeof b.isDST && (b.isDST = !!b.isDST);
        "number" !== typeof b.rate && (b.rate = parseInt(b.rate));
        f = b;
        f.tzOffset = a.getTimezoneOffset();
        b = f.tzOffset / 60;
        f.sysdiff = 0;
        if ("localsystime" != f.timestamp) {
          var e = f;
          2 < (a.getTime() + "").length - (e.timestamp + "").length
            ? ((a = f),
              (a.timestamp *= 1e3),
              (a.sysdiff = a.timestamp - (void 0).getTime() + 6e4 * a.tzOffset),
              (f = a))
            : ((f.sysdiff = f.timestamp - a.getTime()),
              "localsystimezone" == f.timezone && (f = u(f, b)));
        } else "localsystimezone" == f.timezone && (f = u(f, b));
        a = f;
        c(k).hasClass("jqclock jqclock-dark") ||
          c(k).addClass("jqclock jqclock-dark");
        c(k).is("[id]") || c(k).attr("id", v());
        c(k).data("clockoptions", a);
        !1 === d.hasOwnProperty(c(k).attr("id")) && p(c(k));
      } else if ("string" === typeof f)
        if (f in n) n[f](k);
        else
          console.error(
            "You are calling an undefined method on a jqClock instance"
          );
    });
    return this.initialize();
  };
  return $jscomp$this;
})(jQuery);
