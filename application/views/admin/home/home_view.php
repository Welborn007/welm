<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Welborn Machado Admin</title>
        <link href="<?PHP echo base_url(); ?>css/admin/bootstrap.css" rel="stylesheet"/>
        <link href="<?PHP echo base_url(); ?>css/admin/AdminLTE.css" rel="stylesheet"/>
        <link type="text/css" href="<?PHP echo base_url(); ?>css/admin/styles.css" rel="stylesheet" />
        
    </head>
    <body>
        <div class="wrapper-out">
            <div class="container">
                <div class="row">
                    <div class="headername text-center ">My Admin </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-box login_form_div">
                            <form class="form-login" id="loginform" role="form" onsubmit="return userlogin();">
                                <h2 class="form-signin-heading">
                                    <p class="logo text-center">Login</p>
                                </h2>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="idemailid" name="idemailid" value="" placeholder="Email Id">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="idpassword" name="idpassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div id="Login_Div" style=" color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block btn-blue" value="Sign In" />
                                    </div>
                                </div>
                                <!--<p class="form-group text-center">
                                    <a href="#" target="_self" class="text-grey register_div_show">Signup</a> / 
                                    <a href="#" target="_self" class="text-grey forgot_div_show">Forgot Password</a>
                                    
                                </p>-->
                            </form>
                        </div>  
                        
                        <div class="form-box forgot_form_div" style="display:none;">
                            <form class="form-login" id="forgotform" role="form" onsubmit="return userforgot();">
                                <h2 class="form-signin-heading">
                                    <p class="logo text-center">Forgot Password</p>
                                </h2>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="forgotemailid" name="forgotemailid" value="" placeholder="Email Id">
                                    </div> 
                                </div> 
                                <div id="forgotDiv" style=" color: red;"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block btn-blue" value="Sign In" />
                                    </div>
                                </div>
                                <p class="form-group text-center">
                                    <a href="#" target="_self" class="text-grey register_div_show">Click here to Signup</a>
                                </p>
                            </form>
                        </div>
                        
                        <div class="form-box register_form_show" style="display:none;">
                            <form class="form-signin" role="form" onsubmit="return register();">
                                <h2 class="form-signin-heading">
                                    <p class="logo text-center">Sign Up
                                    </p>
                                </h2>
                                <div class="form-group">
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="mobile" id="mobile" class="form-control " placeholder="Mobile"  maxlength="10"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="email"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control " placeholder="password"/>
                                </div>
                                
                                <div class="form-group">
                                    <div id="registerdiv" style=" color: red;"></div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Create an Account"/>
                                </div>
                                <div class="form-group text-center">
                                    <a href="#" target="_self" class="login_div_show">Click here to Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </body>   
</html>

<script type="text/javascript" src="<?PHP echo base_url(); ?>js/jquery_1.js"></script>
<script type="text/javascript" src="<?PHP echo base_url(); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?PHP echo base_url(); ?>js/welbornvalidation.js" ></script>
<script type="text/javascript">
    window.onload = function () { Clear(); }
    function Clear() {           
        var Backlen=history.length;
        if (Backlen > 0) history.go(-Backlen);
    }
</script>
<script type="text/javascript">
    if(window.history.forward(1) != null)
    window.history.forward(1);
 </script>
<script type="text/javascript">
     
    function userforgot(){
    var hasError=0;
    var forgotemailid= $('#forgotemailid').val(); 
    
    if (jQuery.trim(forgotemailid) == '') {
        showError("Please enter email id!", "forgotemailid");
        hasError = 1;
        return false;
    }else{    
        changeError("forgotemailid");
    }
    if(hasError==1){
        return false;
        }else{
        var datastring = $("#forgotform").serialize();
        $.ajax({
            url: "<?php echo base_url(); ?>admin/home/userPorgotPassword",
            type: 'POST',
            data: datastring,
            success: function(msg) {
                $('#forgotDiv').html(msg); 
               }
           });
       return false;
       }
    }
     
    function userlogin(){
        var hasError=0;
        var idemailid= $('#idemailid').val();
        var idpassword= $('#idpassword').val(); 
        if (jQuery.trim(idemailid) == '') {
            showError("Please enter User Name!", "idemailid");
            hasError = 1;
            return false;
        }else{    
            changeError("idemailid");
        }

        if (jQuery.trim(idpassword) == '') {
            showError("Please enter password!", "idpassword");
            hasError = 1;
            return false;
        }else{    
            changeError("idpassword");
        }
        if(hasError==1){
            return false;
        }else{
        var datastring = $("#loginform").serialize();
        $.ajax({
            url: "<?php echo base_url(); ?>admin/home/userLogin",
            type: 'POST',
            data: datastring,
            success: function(msg) {
                if(msg == '1'){
                    window.location="<?php echo base_url(); ?>admin/dashboard";
                }else{
                    $('#Login_Div').html(msg);   
                }

               }
           });
       return false;
       }
    }
    
    function register() {
        var firstname   = $('#firstname').val();
        var lastname    = $('#lastname').val();
        var email       = $('#email').val();
        var password    = $('#password').val();
        var mobile      = $('#mobile').val();
        var usertype_id = $('#usertype_id').val();
        var hasError    = 0;
        
        if (jQuery.trim(firstname) == '') {
            showError("Please enter name!", "firstname");
            hasError = 1;
            return false;
        } else {
            changeError("firstname");
        }
        if (jQuery.trim(mobile) == '') {
            showError("Please enter mobile!", "mobile");
            hasError = 1;
            return false;
        } else {
            var datamobilestring = "mobile=" + mobile;
            $.ajax({
                url: "<?php echo base_url(); ?>admin/home/check_mobile_duplicate",
                type: 'POST',
                data: datamobilestring,
                success: function(msg) {
                    if(msg == '0'){ 
                        showError("Mobile No already used!", "mobile");
                        hasError = 1;
                        return false;
                    } else {
                       changeError("mobile");
                    }
                }
            });
            changeError("mobile");
        }
        
        if (jQuery.trim(email) == '') {
            showError("Please enter email id!", "email");
            hasError = 1;
            return false;
        } else {
            var email = $("#email").val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email)) {
                $('#email').html("Invalid ID!");
                $("#email").css({"border": "1px solid red"});           
                $("#email").focus();           
                return false;
            } else {    
                $("#email").css({"border": ""});   
                var datastring = "email=" + email;                
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/home/check_email_duplicate",
                    type: 'POST',
                    data: datastring,
                    success: function(msg) {
                        
                        if(msg == '0'){ 
                            showError("Email id already used!", "email");
                            hasError = 1;
                            return false;
                        } else {
                            changeError("email");
                        }
                    }
                });
            }
            changeError("email");
        }
       
        if (jQuery.trim(password) == '') {
            showError("Please enter password!", "password");
            hasError = 1;
            return false;
        } else {
            changeError("password");
        }
       if (jQuery.trim(usertype_id) == '') {
            showError("Please user type!", "usertype_id");
            hasError = 1;
            return false;
        } else {
            changeError("usertype_id");
        }
        if(hasError == 1){
            return false;
        }else{            
            var datastring = 'firstname=' + $('#firstname').val() + '&lastname=' + $('#lastname').val() + '&email=' + $('#email').val() + '&password=' + $('#password').val() + '&mobile=' + mobile+ '&usertype_id=' + usertype_id;
            $.ajax({
                url: "<?php echo base_url(); ?>admin/home/createAccount",
                type: 'POST',
                data: datastring,
                success: function (msg) {
                    if (msg == '1') {
                        window.location = "<?php echo base_url(); ?>admin/dashboard";
                    } else {
                        $('#registerdiv').html(msg);
                    }
                }
            });
            return false;
        }        
    }
    $(document).ready(function () {         
        $('.register_div_show').click(function () {
            $('.register_form_show').show();
            $('.login_form_div').hide();
            $('.forgot_form_div').hide();
        });
        $('.login_div_show').click(function () {
            $('.register_form_show').hide();
            $('.login_form_div').show();
            $('.forgot_form_div').hide();
        });
        $('.forgot_div_show').click(function () {
            $('.register_form_show').hide();
            $('.login_form_div').hide();
            $('.forgot_form_div').show();
        });
    });
</script>