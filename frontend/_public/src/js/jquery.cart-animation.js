(function($, window) {
  $.overridePlugin("swAddArticle", {
    sendSerializedForm: function() {
      var me = this;
      me.opts.showModal = false;

      me.superclass.sendSerializedForm.apply(this, arguments);
    }
  });

  $.subscribe("plugin/swAddArticle/onAddArticle", function(event, plugin) {
    var $cartbn = $(".entry--cart");

    $cartbn.addClass("rumble");

    window.setTimeout(function() {
      $cartbn.removeClass("rumble");
    }, 3000);
  });
})(jQuery, window);
