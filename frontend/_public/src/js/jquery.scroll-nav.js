(function($, window) {
  $window = $(window);

  $.plugin("swScrollNavigation", {
    defaults: {
      showPosition: 300,
      scrollCls: "scroll-nav",
      activeCls: "is--active"
    },
    init: function() {
      var me = this;
      me.applyDataAttributes();
      me.createElement();
      me.registerEvents();
    },

    createElement: function() {
      var me = this;
      me.$nav = me.$el.clone(true, true);
      me.$nav.addClass(me.opts.scrollCls).appendTo("body");
    },
    registerEvents: function() {
      var me = this;
      me._on($window, "scroll", $.proxy(me.onScroll, me));
    },
    onScroll: function() {
      var me = this;
      me.$nav.toggleClass(
        me.opts.activeCls,
        $window.scrollTop() >= me.opts.showPosition
      );
    },
    destroy: function() {
      var me = this;
      me.$nav.remove();
      me._destroy();
    }
  });

  window.StateManager.addPlugin(
    '*[data-scrollNav="true"]',
    "swScrollNavigation",
    ["m", "l", "xl"]
  );
})(jQuery, window);
