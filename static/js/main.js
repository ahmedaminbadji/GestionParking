$(function(){
    $("#login_btn").click(function(){
        
        var username = $("#username").val();
        var password = $("#password").val();
        var sel1 = $("#sel1").val();
        
        $.post("login.php",{username: username,password: password,sel1: sel1})
            .done(function(data){
                if(data == "logged admin"){
                    window.alert("admin logged");
                }else if(data == "logged client"){
                    window.alert("client logged");

                }else{
                    $("#login_message").text("Invalid Username or password !");
                }
            });
    });
});