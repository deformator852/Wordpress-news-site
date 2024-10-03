jQuery(document).ready(function ($) {
  jQuery(".news").hover(
    function () {
      jQuery(this).css({
        "background-size": "102%",
      });
    },
    function () {
      jQuery(this).css({
        "background-size": "100%",
      });
    }
  );
});
