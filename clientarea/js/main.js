


//$(function() {
  //  $('.sidebarLink').click(function() {
    //    $('#pages').load(this.href);

        // it's important to return false from the click
        // handler in order to cancel the default action
        // of the link which is to redirect to the url and
        // execute the AJAX request
      //  return false;
    //});
//});
$( document ).ready(function() {
  var content_id =  "#"+window.location.href.replace(/^.*#/, "");
  var contentdiv = $(content_id).html();

      $('#slider').html(contentdiv);
     
});
$(function () {
  $(".clicky").click(function () {
      var content_id = $(this).attr('href');
      var contentdiv = $(content_id).html();
      $('#slider').html(contentdiv);
      //return false;
  });
});


