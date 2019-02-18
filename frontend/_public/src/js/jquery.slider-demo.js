(function($) {
  $.overridePlugin("swProductSlider", {
    slide: function() {
      var me = this; /* scope instantie */
      me.customMethod();
      me.superclass.slide.apply(this, arguments);
    },

    customMethod: function() {
      var tick = new Date().toLocaleDateString();
      console.info("Slide" + tick);
    }
  });
})(jQuery);
