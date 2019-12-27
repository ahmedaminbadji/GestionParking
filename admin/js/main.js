


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
  var a = window.location.href;
 
if(a.localeCompare(homeUrl) || a.localeCompare(homeUrl2) ){
var cid = "#dashboard";
$('#slider').html($(cid).html());
  var homeUrl = 'http://localhost/parkManager/admin/';
  var homeUrl2 = 'http://localhost/parkManager/admin/index.php';
  var content_id =  "#"+window.location.href.replace(/^.*#/, "");
  
    var contentdiv = $(content_id).html();

      $('#slider').html(contentdiv);

     
  }
      
    
});
$(function () {
  $(".clicky").click(function () {
      var content_id = $(this).attr('href');
      var contentdiv = $(content_id).html();
      $('#slider').html(contentdiv);
      //return false;
  });
});


