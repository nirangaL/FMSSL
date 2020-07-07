<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FMSSL IS</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/custom/css/login.css')?>">
	

	<!-- jQuery 3 -->
	<script src=" <?php echo base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js')?>"></script>
</head>
<body style=" background-image: url('<?php echo base_url("assets/images/back.jpg")?>');">

<div class="box" >
		<h2>Login</h2>
		<!-- <form autocomplete="off"> -->
			<div class="inputBox">
				<input type="text" id="username" name="username" required="" autocomplete="off">
				<label for="">Username</label>
			</div>
			<div class="inputBox">
				<input type="password" id="password" name="password" required="" autocomplete="off">
				<label for="">Password</label>
			</div>
			<button class="btn-submit" onclick="checkUser();"> Sign in </button>
			<div class="error-div">
               <span id="errorMsg"></span>
            </div>
		<!-- </form> -->
	</div>
</body>


<script>


    $('input').keypress(function () {
            $(this).css('border','') ;
            $('#errorMsg').text('');
    });

    function checkUser() {
        var userName = $('#username').val();
        var password = $('#password').val();

        if(checkLoginForm()){
            $.ajax({
                url: '<?php echo base_url("login/checkUser")?>',
                type: "POST",
                data: ({
                    userName:userName,
                    password:password
                }),
                success: function (data) {
                    if (data == "ok") {
                        window.location.replace("<?php echo base_url('dashboard')?>");
                    } else if(data == "notOk") {
                        $('#errorMsg').text('Entered credentials are incorrect! ');
                    } else if(data == "block"){
                        $('#errorMsg').text('Account is Disabled!');
                    }else{
                        window.location.replace(data);
                    }
                }
            });
        }

    }

     function  checkLoginForm() {
         var userName = $('#username').val();
         var password = $('#password').val();

         if(userName == ''){
             $('#username').css('border','1px #eb3b5a solid');
             if(password == '') {
                 $('#password').css('border', '1px #eb3b5a solid');
                 $('#errorMsg').text('Please enter user name And Password');
                 return false;
             }
             $('#errorLogin').text('Please enter userName');
             return false;
         }else if(password == '') {
             $('#password').css('border', '1px #eb3b5a solid');
             $('#errorMsg').text('please enter Password');
         }else{
           return true;
         }

    }
</script>
</html>