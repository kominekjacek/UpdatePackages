var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/* src/PNotifyDesktop.html generated by Svelte v2.6.3 */
(function (global, factory) {
  (typeof exports === "undefined" ? "undefined" : _typeof(exports)) === "object" && typeof module !== "undefined" ? module.exports = factory(require('./PNotify')) : typeof define === "function" && define.amd ? define('PNotifyDesktop', ["./PNotify"], factory) : global.PNotifyDesktop = factory(PNotify);
})(this, function (PNotify) {
  "use strict";

  PNotify = PNotify && PNotify.__esModule ? PNotify["default"] : PNotify;

  var permission = void 0;
  var Notification = window.Notification;

  var _notify = function notify(title, options, onclick, onclose) {
    // Memoize based on feature detection.
    if ('Notification' in window) {
      _notify = function notify(title, options, onclick, onclose) {
        var notice = new Notification(title, options);
        if ('NotificationEvent' in window) {
          notice.addEventListener('notificationclick', onclick);
          notice.addEventListener('close', onclose);
        } else if ('addEventListener' in notice) {
          notice.addEventListener('click', onclick);
          notice.addEventListener('close', onclose);
        } else {
          notice.onclick = onclick;
          notice.onclose = onclose;
        }
        return notice;
      };
    } else if ('mozNotification' in navigator) {
      _notify = function notify(title, options, onclick, onclose) {
        // Gecko < 22
        var notice = navigator.mozNotification.createNotification(title, options.body, options.icon).show();
        notice.onclick = onclick;
        notice.onclose = onclose;
        return notice;
      };
    } else if ('webkitNotifications' in window) {
      _notify = function notify(title, options, onclick, onclose) {
        var notice = window.webkitNotifications.createNotification(options.icon, title, options.body);
        notice.onclick = onclick;
        notice.onclose = onclose;
        return notice;
      };
    } else {
      _notify = function notify(title, options, onclick, onclose) {
        return null;
      };
    }
    return _notify(title, options, onclick, onclose);
  };

  function data() {
    return _extends({
      '_notice': null, // The PNotify notice.
      '_options': {} // The options for the notice.
    }, PNotify.modules.Desktop.defaults);
  };

  var methods = {
    initModule: function initModule(options) {
      var _this = this;

      this.set(options);

      var _get = this.get(),
          _notice = _get._notice;

      // Animation should always be 'none' for desktop notices, but remember
      // the old animation so it can be recovered.


      this.set({ '_oldAnimation': _notice.get().animation });
      _notice.on('state', function (_ref) {
        var changed = _ref.changed,
            current = _ref.current,
            previous = _ref.previous;

        if (changed.animation) {
          if (previous.animation === undefined || current.animation !== 'none' || previous.animation === 'none' && current.animation !== _this.get()._oldAnimation) {
            _this.set({ '_oldAnimation': current.animation });
          }
        }

        // This is necessary so desktop notices don't cause spacing problems
        // when positioning.
        if (changed._animatingClass) {
          if (!(current._animatingClass === '' || permission !== 0 && _this.get().fallback || !_this.get().desktop)) {
            _notice.set({ '_animatingClass': '' });
          }
        }
      });

      if (!this.get().desktop) {
        return;
      }

      permission = PNotify.modules.Desktop.checkPermission();
      if (permission !== 0) {
        // Keep the notice from opening if fallback is false.
        if (!this.get().fallback) {
          _notice.set({ 'autoDisplay': false });
        }
        return;
      }

      _notice.set({ 'animation': 'none' });
      _notice.addModuleClass('ui-pnotify-desktop-hide');

      this.genNotice();
    },
    update: function update() {
      var _get2 = this.get(),
          _notice = _get2._notice;

      if (permission !== 0 && this.get().fallback || !this.get().desktop) {
        _notice.set({ 'animation': this.get()._oldAnimation });
        _notice.removeModuleClass('ui-pnotify-desktop-hide');
        return;
      } else {
        _notice.set({ 'animation': 'none' });
        _notice.addModuleClass('ui-pnotify-desktop-hide');
      }
      this.genNotice();
    },
    beforeOpen: function beforeOpen() {
      if (this.get().desktop && permission !== 0) {
        PNotify.modules.Desktop.permission();
      }
      if (permission !== 0 && this.get().fallback || !this.get().desktop) {
        return;
      }

      var _get3 = this.get(),
          _desktop = _get3._desktop;

      if (_desktop && 'show' in _desktop) {
        this.get()._notice.set({ '_moduleIsNoticeOpen': true });
        _desktop.show();
      }
    },
    beforeClose: function beforeClose() {
      if (permission !== 0 && this.get().fallback || !this.get().desktop) {
        return;
      }

      var _get4 = this.get(),
          _desktop = _get4._desktop;

      if (_desktop && 'close' in _desktop) {
        _desktop.close();
        this.get()._notice.set({ '_moduleIsNoticeOpen': false });
      }
    },
    genNotice: function genNotice() {
      var _get5 = this.get(),
          _notice = _get5._notice,
          icon = _get5.icon;

      if (icon === null) {
        switch (_notice.get().type) {
          case 'error':
            this.set({ '_icon': 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3gQJATQg7e6HvQAAAB1pVFh0Q29tbWVudAAAAAAAQ3JlYXRlZCB3aXRoIEdJTVBkLmUHAAABr0lEQVRYw8WXu0oDQRSGv7hRSFYrLTTWKihaqUgUJO+gphBLL1jYpPSCVcAggpWthYhC7Ows9An0IbSPkMRCw8ZmFuI6yczs9cAPuzNz5v92brtrESxGARtokkCcAg2hk7jNl4G2R/m4zFPAiwTgWdRFHnmJuaulOAAaPQDqUZvv9DB3tR0lwIcGwHtU5uca5q4qYZvngJbHpAZ8CtU8dS1gLEyAisegBGTFKWiL65KnzVlY5uOSId6VtNuTtMupOu/TAHiQlNmSskHNXCOAGWBeUp7VhFoApoMAXAOWJoCszBJ9+ALY6vL0JiPgjsKmKUAaOOoBZwIAcNxlJLsCrAOTIQJMAWu62y4LOIqT7lGS96TIcYCMDkBZ46h1gB+PHI28ssq8X/G6DaqG8Piz2DrjVjGXbtSBy46F5QAHwJAizwZugKKscs7gSaqS/KpB/qxsFxwafhf6Odb/eblJi8BGwJdW26BtURxQpMU83hmaDQsNiPtvYMSwj3tgAqDgYzU7wJdHjo9+CgBvEW47lV5Tgj5DMtG0xIfESkIAF+522gdWxTzGEX3i9+6KpOMXF5UBt0NKJCAAAAAASUVORK5CYII=' });
            break;
          case 'success':
            this.set({ '_icon': 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3gQJATQPRj+65AAAAdBJREFUWMPtlzsvRFEQx3+7HmEjoiYKolVJJDRqnS8ggvVIVEQhCIUsEYJGCEH2E4h4FPREaLTbEo1IEJXHrmY2GTf33nPuY7ud5OTenTMz//89Z86ZWShLWf5LB3AOfACFiOMF2AkC3qOc88BXxFEAxlX8ftGdaNCEen8H6oFHYBR4FocwkpTngzzHgF01fwL0aYcp9fVtMW/rsMcWXWijK1Hexgye9smRT6CxaHgjytMYwccNSXqoja9FeVbiZS+OVaeDiUBLAPAJA/i2m5MXgRSQk7llC/DBMOBeBGqAe0eAjQhfvurH3EmgQk6EW6CVEHt+ZFo6J4EU8OoTcF35jhnAl2wSx20LFgyB1yyOWtY2c72ScMAAkPeZy6g4zUBdGAIAcyEq4Z7y7xbdTFgCACMBwPVJqVDHeNqvaplkH5i0sNuUwmaNkQxww20ZSOy7gFvX7SAk0i76jPQQlJoAwAEwq35ngfmwVatSdUMArZZ+K9JQ1Bp6iGqgSt7f/AIOqSzujLEn6AV+JG6zm4HuCZ+AJuAbWAQu5aIJu7JDck0ngDugC/j1c2qPqR13jpxuvWyS8liY/kQcean/lX6ACQ99DdAQYe+Lf0zylMUgf7qDKgzv284QAAAAAElFTkSuQmCC' });
            break;
          case 'info':
            this.set({ '_icon': 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3gQJATQ09zRTwAAAAdxJREFUWMPtl88rRFEUxz8zBolRCgsrpOym8TMSO2WplLKwUrKi/B0W7JSFmhVLNlhSlLKx8CtRGpEsJpofpZk3Nkc9b968e++8mdlw6vTeu/edc773nl/3wl+ngOH/zUAf0AN0AmEgB7wCD8AtcFMJoM3ADpAHLHk62RIwL8B0uQwHgXVRnDfkS2DSj/EW4K0Ew05eLMV4O/CuUJwEUvJUgdgwMd4IpBUKl13kVG6aL+ZjJ20DDQqQXy5jKYVMDBhVrb5f069LLrKfGnInqh040HRTvsTAHgei9oGQ7X0YaNNUNCdFKChgQvKtQ1vAkNvEahlSToez9oXad2BCA30ceHZxRxMQMShuvZLmv+hOA32/h+KUwS7MugVhqwb6Go+5nEEwht0ABDUEzyXdFsrQYwqMJjTbdxio9Qkg6QbgvkpnkLw0uQIAZ1UCYNkXawdw4qPCmVBcuADAMZCpAoCVYr3AKtYyHZSWauakjMx50TWwrzJw6lFARjQOt3se8jM6W9TloSCqIb9bRHbN5Fg+KkEZcow/Ak+KFBsD6h3jR8CUabAMlqn7xfxEbAdwWKLhhO3sGPCbOsNSvSyF0Z/5TaCuEleziLhmAOiWG1NWrmZXwIVU1A/+SZO+AcgLC4wt0zD3AAAAAElFTkSuQmCC' });
            break;
          case 'notice':
          default:
            this.set({ '_icon': 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3gQJATM4scOJLAAAAcxJREFUWMPtljtLA0EQx3+J0QRfnYqCiCA+MERBrIwgFtoFbMTOR61i5QcQBdEihZWNoEWwsNAvkMJeBLHRQtHC0iIP4utOmw2cx97d7l2SRgcGbufmv/Pf2dmdhb8uIR+YJqAPaBff30AeeAHuxLgqMgRkgS/AAEybGuLfEdBcycCTwKVYmY5mgO6gwdd8BLaqAST9Bs8EDG7VTd3gex4TbgEjwKjQOHDugZlRDb7sMZEJpCS4bYVMJOygsG1cB+wqHN0Gib1RYXFpLwL74nx7Sb3EFlXATQNjTgRagA3FbZIRiCliT5wITGgUaRACA0CPjMC4xtUcDUAgDAzLCCQ0MhALQCAE9MoIdGkQCJIBgE4ZgWiNMvDL10qgUMMMFGQEnjQmkLXbVg38s8y4qtFcTCAnHiJ5oKiJnSoHjVgIXAmHkGIl5yy+YcWruIy9dvqpupIDCfZWEXvh1gsWFVfxIbG9a3RbRwJnYiuqJYfAqxsBgBWFiQyJzfTAlIB1uzEicbwBFoBTl8lSwINoSuXKjrv4F4FBh61zlKUKvgn7/e5ZEngMEDgLdFSieHaAT42LpgTMVbqC24B54Bi4twV9E6cnDcw6PFj+RSo/l6rlSlldhx4AAAAASUVORK5CYII=' });
            break;
        }
      } else if (icon === false) {
        this.set({ '_icon': null });
      } else {
        this.set({ '_icon': icon });
      }

      var _get6 = this.get(),
          tag = _get6.tag;

      if (!this.get()._tag || tag !== null) {
        this.set({
          '_tag': tag === null ? 'PNotify-' + Math.round(Math.random() * 1000000) : tag
        });
      }

      var options = {
        body: this.get().text || _notice.get().text,
        tag: this.get()._tag
      };
      if (!_notice.get().hide) {
        options.requireInteraction = true;
      }
      if (this.get()._icon !== null) {
        options.icon = this.get()._icon;
      }
      Object.apply(options, this.get().options);

      var _desktop = _notify(this.get().title || _notice.get().title, options, function () {
        _notice.fire('click', { target: _desktop });
      }, function () {
        _notice.close();
      });

      _notice.set({ '_moduleIsNoticeOpen': true });
      this.set({ _desktop: _desktop });

      if (!('close' in _desktop) && 'cancel' in _desktop) {
        _desktop.close = function () {
          _desktop.cancel();
        };
      }
    }
  };

  function setup(Component) {
    Component.key = 'Desktop';

    Component.defaults = {
      // Display the notification as a desktop notification.
      desktop: false,
      // If desktop notifications are not supported or allowed, fall back to a regular notice.
      fallback: true,
      // The URL of the icon to display. If false, no icon will show. If null, a default icon will show.
      icon: null,
      // Using a tag lets you update an existing notice, or keep from duplicating notices between tabs.
      // If you leave tag null, one will be generated, facilitating the 'update' function.
      // see: http://www.w3.org/TR/notifications/#tags-example
      tag: null,
      // Optionally display a different title for the desktop.
      title: null,
      // Optionally display different text for the desktop.
      text: null,
      // Any additional options to be passed to the Notification constructor.
      options: {}
    };

    Component.init = function (notice) {
      return new Component({ target: document.body });
    };

    Component.permission = function () {
      if (typeof Notification !== 'undefined' && 'requestPermission' in Notification) {
        Notification.requestPermission();
      } else if ('webkitNotifications' in window) {
        window.webkitNotifications.requestPermission();
      }
    };

    Component.checkPermission = function () {
      if (typeof Notification !== 'undefined' && 'permission' in Notification) {
        return Notification.permission === 'granted' ? 0 : 1;
      } else if ('webkitNotifications' in window) {
        return window.webkitNotifications.checkPermission() == 0 ? 0 : 1; // eslint-disable-line eqeqeq
      } else {
        return 1;
      }
    };

    permission = Component.checkPermission();

    // Register the module with PNotify.
    PNotify.modules.Desktop = Component;
  };

  function add_css() {
    var style = createElement("style");
    style.id = 'svelte-xbgnx4-style';
    style.textContent = "[ui-pnotify].ui-pnotify-desktop-hide.ui-pnotify{left:-10000px !important;display:none !important}";
    appendNode(style, document.head);
  }

  function create_main_fragment(component, ctx) {

    return {
      c: noop,

      m: noop,

      p: noop,

      d: noop
    };
  }

  function PNotifyDesktop(options) {
    init(this, options);
    this._state = assign(data(), options.data);
    this._intro = true;

    if (!document.getElementById("svelte-xbgnx4-style")) add_css();

    this._fragment = create_main_fragment(this, this._state);

    if (options.target) {
      this._fragment.c();
      this._mount(options.target, options.anchor);
    }
  }

  assign(PNotifyDesktop.prototype, {
    destroy: destroy,
    get: get,
    fire: fire,
    on: on,
    set: set,
    _set: _set,
    _mount: _mount,
    _differs: _differs
  });
  assign(PNotifyDesktop.prototype, methods);

  PNotifyDesktop.prototype._recompute = noop;

  setup(PNotifyDesktop);

  function createElement(name) {
    return document.createElement(name);
  }

  function appendNode(node, target) {
    target.appendChild(node);
  }

  function noop() {}

  function init(component, options) {
    component._handlers = blankObject();
    component._bind = options._bind;

    component.options = options;
    component.root = options.root || component;
    component.store = component.root.store || options.store;
  }

  function assign(tar, src) {
    for (var k in src) {
      tar[k] = src[k];
    }return tar;
  }

  function destroy(detach) {
    this.destroy = noop;
    this.fire('destroy');
    this.set = noop;

    this._fragment.d(detach !== false);
    this._fragment = null;
    this._state = {};
  }

  function get() {
    return this._state;
  }

  function fire(eventName, data) {
    var handlers = eventName in this._handlers && this._handlers[eventName].slice();
    if (!handlers) return;

    for (var i = 0; i < handlers.length; i += 1) {
      var handler = handlers[i];

      if (!handler.__calling) {
        handler.__calling = true;
        handler.call(this, data);
        handler.__calling = false;
      }
    }
  }

  function on(eventName, handler) {
    var handlers = this._handlers[eventName] || (this._handlers[eventName] = []);
    handlers.push(handler);

    return {
      cancel: function cancel() {
        var index = handlers.indexOf(handler);
        if (~index) handlers.splice(index, 1);
      }
    };
  }

  function set(newState) {
    this._set(assign({}, newState));
    if (this.root._lock) return;
    this.root._lock = true;
    callAll(this.root._beforecreate);
    callAll(this.root._oncreate);
    callAll(this.root._aftercreate);
    this.root._lock = false;
  }

  function _set(newState) {
    var oldState = this._state,
        changed = {},
        dirty = false;

    for (var key in newState) {
      if (this._differs(newState[key], oldState[key])) changed[key] = dirty = true;
    }
    if (!dirty) return;

    this._state = assign(assign({}, oldState), newState);
    this._recompute(changed, this._state);
    if (this._bind) this._bind(changed, this._state);

    if (this._fragment) {
      this.fire("state", { changed: changed, current: this._state, previous: oldState });
      this._fragment.p(changed, this._state);
      this.fire("update", { changed: changed, current: this._state, previous: oldState });
    }
  }

  function _mount(target, anchor) {
    this._fragment[this._fragment.i ? 'i' : 'm'](target, anchor || null);
  }

  function _differs(a, b) {
    return a != a ? b == b : a !== b || a && (typeof a === "undefined" ? "undefined" : _typeof(a)) === 'object' || typeof a === 'function';
  }

  function blankObject() {
    return Object.create(null);
  }

  function callAll(fns) {
    while (fns && fns.length) {
      fns.shift()();
    }
  }

  return PNotifyDesktop;
});
//# sourceMappingURL=PNotifyDesktop.js.map