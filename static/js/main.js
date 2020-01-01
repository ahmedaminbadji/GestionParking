$(function(){
    $("#login_btn").click(function(){
        
        var username = $("#username").val();
        var password = $("#password").val();
        var sel1 = $("#sel1").val();
        
        $.post("login.php",{username: username,password: password,sel1: sel1})
            .done(function(data){
                if(data == "logged admin"){
                    window.alert("admin logged");
                    window.location.href = "/parkManager/admin/";
                }else if(data == "logged client"){
                    window.alert("client logged");
                    window.location.href = "/parkManager/clientarea/";

                }else{
                    $("#login_message").text("Invalid Username or password !");
                }
            });
    });
    $("#register_btn").click(function(){
        var usernameR = $("#usernameR").val();
        var passwordR = $("#passwordR").val();
        var name = $("#name").val();
        var fname = $("#fname").val();
        var email = $("#email").val();
        var phoneNumber = $("#phoneNumber").val();
      
       
        $.post("register.php",{usernameR: usernameR,passwordR: passwordR,name: name,fname: fname,email: email,phoneNumber: phoneNumber})
            .done(function(data){
                if(data == "done"){
                    window.location = "index.html";
                }else{
                    window.alert("error");
                }
            });
    });
    
});