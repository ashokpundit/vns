/***

MochiKit.Signal 1.4.2

See <http://mochikit.com/> for documentation, downloads, license, etc.

(c) 2006 Jonathan Gardner, Beau Hartshorne, Bob Ippolito.  All rights Reserved.

***/

MochiKit.Base._deps('Signal', ['Base', 'DOM', 'Style']);

MochiKit.Signal.NAME = 'MochiKit.Signal';
MochiKit.Signal.VERSION = '1.4.2';

MochiKit.Signal._observers = [];

/** @id MochiKit.Signal.Event */
MochiKit.Signal.Event = function (src, e) {
    this._event = e || window.event;
    this._src = src;
};

MochiKit.Base.update(MochiKit.Signal.Event.prototype, {

    __repr__: function () {
        var repr = MochiKit.Base.repr;
        var str = '{event(): ' + repr(this.event()) +
            ', src(): ' + repr(this.src()) +
            ', type(): ' + repr(this.type()) +
            ', target(): ' + repr(this.target());

        if (this.type() &&
            this.type().indexOf('key') === 0 ||
            this.type().indexOf('mouse') === 0 ||
            this.type().indexOf('click') != -1 ||
            this.type() == 'contextmenu') {
            str += ', modifier(): ' + '{alt: ' + repr(this.modifier().alt) +
            ', ctrl: ' + repr(this.modifier().ctrl) +
            ', meta: ' + repr(this.modifier().meta) +
            ', shift: ' + repr(this.modifier().shift) +
            ', any: ' + repr(this.modifier().any) + '}';
        }

        if (this.type() && this.type().indexOf('key') === 0) {
            str += ', key(): {code: ' + repr(this.key().code) +
                ', string: ' + repr(this.key().string) + '}';
        }

        if (this.type() && (
            this.type().indexOf('mouse') === 0 ||
            this.type().indexOf('click') != -1 ||
            this.type() == 'contextmenu')) {

            str += ', mouse(): {page: ' + repr(this.mouse().page) +
                ', client: ' + repr(this.mouse().client);

            if (this.type() != 'mousemove' && this.type() != 'mousewheel') {
                str += ', button: {left: ' + repr(this.mouse().button.left) +
                    ', middle: ' + repr(this.mouse().button.middle) +
                    ', right: ' + repr(this.mouse().button.right) + '}';
            }
            if (this.type() == 'mousewheel') {
                str += ', wheel: ' + repr(this.mouse().wheel);
            }
            str += '}';
        }
        if (this.type() == 'mouseover' || this.type() == 'mouseout' || 
            this.type() == 'mouseenter' || this.type() == 'mouseleave') {
            str += ', relatedTarget(): ' + repr(this.relatedTarget());
        }
        str += '}';
        return str;
    },

     /** @id MochiKit.Signal.Event.prototype.toString */
    toString: function () {
        return this.__repr__();
    },

    /** @id MochiKit.Signal.Event.prototype.src */
    src: function () {
        return this._src;
    },

    /** @id MochiKit.Signal.Event.prototype.event  */
    event: function () {
        return this._event;
    },

    /** @id MochiKit.Signal.Event.prototype.type */
    type: function () {
        if (this._event.type === "DOMMouseScroll") {
            return "mousewheel";
        } else {
            return this._event.type || undefined;
        }
    },

    /** @id MochiKit.Signal.Event.prototype.target */
    target: function () {
        return this._event.target || this._event.srcElement;
    },

    _relatedTarget: null,
    /** @id MochiKit.Signal.Event.prototype.relatedTarget */
    relatedTarget: function () {
        if (this._relatedTarget !== null) {
            return this._relatedTarget;
        }

        var elem = null;
        if (this.type() == 'mouseover' || this.type() == 'mouseenter') {
            elem = (this._event.relatedTarget ||
                this._event.fromElement);
        } else if (this.type() == 'mouseout' || this.type() == 'mouseleave') {
            elem = (this._event.relatedTarget ||
                this._event.toElement);
        }
        try {
            if (elem !== null && elem.nodeType !== null) {
                this._relatedTarget = elem;
                return elem;
            }
        } catch (ignore) {
            // Firefox 3 throws a permission denied error when accessing
            // any property on XUL elements (e.g. scrollbars)...
        }