jQuery(document).ready(function ($) {
  jQuery(".news").hover(
    function () {
      jQuery(this).css({
        "background-size": "102%",
      });
      jQuery(this).find(".news-container").css("margin-bottom", "35");
    },
    function () {
      jQuery(this).css({
        "background-size": "100%",
      });
      jQuery(this).find(".news-container").css("margin-bottom", "30");
    }
  );
});
