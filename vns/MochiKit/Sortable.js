/***
Copyright (c) 2005 Thomas Fuchs (http://script.aculo.us, http://mir.aculo.us)
    Mochi-ized By Thomas Herve (_firstname_@nimail.org)

See scriptaculous.js for full license.

***/

MochiKit.Base._deps('Sortable', ['Base', 'Iter', 'DOM', 'Position', 'DragAndDrop']);

MochiKit.Sortable.NAME = 'MochiKit.Sortable';
MochiKit.Sortable.VERSION = '1.4.2';

MochiKit.Sortable.__repr__ = function () {
    return '[' + this.NAME + ' ' + this.VERSION + ']';
};

MochiKit.Sortable.toString = function () {
    return this.__repr__();
};

MochiKit.Sortable.EXPORT = [
];

MochiKit.Sortable.EXPORT_OK = [
];

MochiKit.Base.update(MochiKit.Sortable, {
    /***

    Manage sortables. Mainly use the create function to add a sortable.

    ***/
    sortables: {},

    _findRootElement: function (element) {
        while (element.tagName.toUpperCase() != "BODY") {
            if (element.id && MochiKit.Sortable.sortables[element.id]) {
                return element;
            }
            element = element.parentNode;
        }
    },

    _createElementId: function(element) {
        if (element.id == null || element.id == "") {
            var d = MochiKit.DOM;
            var id;
            var count = 1;
            while (d.getElement(id = "sortable" + count) != null) {
                count += 1;
            }
            d.setNodeAttribute(element, "id", id);
        }
    },

    /** @id MochiKit.Sortable.options */
    options: function (element) {
        element = MochiKit.Sortable._findRootElement(MochiKit.DOM.getElement(element));
        if (!element) {
            return;
        }
        return MochiKit.Sortable.sortables[element.id];
    },

    /** @id MochiKit.Sortable.destroy */
    destroy: function (element){
        var s = MochiKit.Sortable.options(element);
        var b = MochiKit.Base;
        var d = MochiKit.DragAndDrop;

        if (s) {
            MochiKit.Signal.disconnect(s.startHandle);
            MochiKit.Signal.disconnect(s.endHandle);
            b.map(function (dr) {
                d.Droppables.remove(dr);
            }, s.droppables);
            b.map(function (dr) {
                dr.destroy();
            }, s.draggables);

            delete MochiKit.Sortable.sortables[s.element.id];
        }
    },

    /** @id MochiKit.Sortable.create */
    create: function (element, options) {
        element = MochiKit.DOM.getElement(element);
        var self = MochiKit.Sortable;
        self._createElementId(element);

        /** @id MochiKit.Sortable.options */
        options = MochiKit.Base.update({

            /** @id MochiKit.Sortable.element */
            element: element,

            /** @id MochiKit.Sortable.tag */
            tag: 'li',  // assumes li children, override with tag: 'tagname'

            /** @id MochiKit.Sortable.dropOnEmpty */
            dropOnEmpty: false,

            /** @id MochiKit.Sortable.tree */
            tree: false,

            /** @id MochiKit.Sortable.treeTag */
            treeTag: 'ul',

            /** @id MochiKit.Sortable.overlap */
            overlap: 'vertical',  // one of 'vertical', 'horizontal'

            /** @id MochiKit.Sortable.constraint */
            constraint: 'vertical',  // one of 'vertical', 'horizontal', false
            // also takes array of elements (or ids); or false

            /** @id MochiKit.Sortable.containment */
            containment: [element],

            /** @id MochiKit.Sortable.handle */
            handle: false,  // or a CSS class

            /** @id MochiKit.Sortable.only */
            only: false,

            /** @id MochiKit.Sortable.hoverclass */
            hoverclass: null,

            /** @id MochiKit.Sortable.ghosting */
            ghosting: false,

            /** @id MochiKit.Sortable.scroll */
            scroll: false,

            /** @id MochiKit.Sortable.scrollSensitivity */
            scrollSensitivity: 20,

            /** @id MochiKit.Sortable.scrollSpeed */
            scrollSpeed: 15,

            /** @id MochiKit.Sortable.format */
            format: /^[^_]*_(.*)$/,

            /** @id MochiKit.Sortable.onChange */
            onChange: MochiKit.Base.noop,

            /** @id MochiKit.Sortable.onUpdate */
     