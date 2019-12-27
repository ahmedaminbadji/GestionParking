$(function(){
    $("#login_btn").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
       
        $.post("login.php",{username: username,password: password})
            .done(function(data){
                if(data == "success"){
                    window.location = "home.php";
                }else{
                    $("#login_message").text("Invalid Username or password !");

                }
            });
    });
});