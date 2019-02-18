(function($) {
  $.plugin("helloWorld", {
    defaults: {
      message: "Hello world!"
    },

    init: function() {
      var me = this; //scope verwijzing

      me.applyDataAttributes();

      me._on(me.$el, "click", $.proxy(me.hello, me));
    },
    hello: function() {
      var me = this; //scope verwijzing
      console.info(me.opts.message);
    }
  });

  $(".shop-slogan").helloWorld();
})(jQuery);
