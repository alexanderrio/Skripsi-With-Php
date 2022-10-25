<?php
	include_once('connection.php');
	session_start();
	$con = createConnection();
	
	if(isset($_GET['id'])){
		session_destroy();
	}

	if(isset($_POST['login'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE username = '".$username."' AND password = MD5('".$password."')";
		 $result = mysqli_query($con, $sql);
		 $data = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result) > 0){
			$_SESSION['id'] = $data['id'];
			header("location: peti.php");
            ECHO "data Sukses diambil";
			
			}
		}
		
	
	

?>
<html>
    <head>

        <style type="text/css">
            body {
                background: #eee !important;	
            }

            .wrapper {	
                margin-top: 80px;
            }

            .form-signin {
            max-width: 380px;
            padding: 15px 35px 45px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid rgba(0,0,0,0.1);  
            }
            .form-signin-heading{
                margin-bottom: 30px;
                }

                
                .checkbox{
                    display:block;
                }
                .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                }

                input[type="text"] {
                margin-bottom: -1px;
                }

                input[type="password"] {
                margin-bottom: 20px;
                }
                button{
                    width: 100%
                }

        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        
    </head>

    <body>
        <div class="wrapper">
            <form method="POST" class="form-signin">       
            <h2 class="form-signin-heading">Login Admin</h2>
            <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
            <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
            </label>
            <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>   
            </form>
        </div>
    </body>
</html>
