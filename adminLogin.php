<!DOCTYPE html>
<html>
    <head>
    	<title>LOGIN</title>
    	<link rel="icon" href="images/e.png">
    	<style>
    		@font-face{font-family: "Icons"; src: url("images/fontello.ttf")}

    		body{
    		    font-family: Calibri;
    		    padding:0;
    		    margin:0;
    		    background-color:#62cdff;
    		}

    		.header{
    		    background-color:#00adff;
    		    width:100%;
    		    height:100px;
    		    margin:0;
    		    text-align:center;
    		    box-shadow:0 1px 0 #00a1ec, 0 2px 0 #008bcc, 0 3px 0 #0080bb, 0 4px 0 #0078af, 0 5px 0 #0080bb, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15)
    		}
    		.header h1{
    		    margin:0;
    		    color:white;
    		    font-size:60px;
    		    padding-top:8px;
    		    color: #FFFFFF;
    		    text-shadow:0 1px 0 #00a1ec, 0 2px 0 #008bcc, 0 3px 0 #0080bb, 0 4px 0 #0078af, 0 5px 0 #0080bb, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
    		}

			.content{
			    background-color:white;
			    width:650px;
			    margin:auto;
			    margin-top:60px;
			    padding:50px;
			    font-family: Calibri;
			    font-weight: 800;
			    text-align:center;
			}

			.content h2{
				font-size: 50px;
				letter-spacing: 4px;
				margin-bottom: 10px;
				text-shadow: 2px 2px 0px #FFFFFF, 5px 4px 0px rgba(0,0,0,0.15);
			}

			.content input{
				width:50%;
				border:none;
				border-bottom:2px solid #00adff;
				padding: 10px;
				transition: 0.2s;
				margin-bottom: 10px;
			}

			.content input:focus{
				outline:none;
				border-bottom: 2px solid #00ce00;
				width:52%;
				transition: 0.2s;
			}

			.content input::placeholder{
				text-transform: uppercase;
				font-weight:800;
				text-align: center;
				transition: 0.2s;
			}

            .content input:focus::placeholder{
				font-size:16px;
				transition: 0.2s;
			}

			.content input[type="submit"]{
				background-color:#00adff;
				border:none;
				color:white;
				font-weight: 800;
				font-size: 20px;
				width:47%;
				margin-top:30px;
				transition: 0.2s;
			}

			.content input[type="submit"]:hover{
				width:48%;
				background-color: #0090d4;
				transition: 0.2s;
				box-shadow: 0 0 21px #bbbbbb;
			}

			.content h3{
				color:red;
				text-transform: uppercase;
				text-shadow: 2px 2px 0px #FFFFFF, 5px 4px 0px rgba(0,0,0,0.15);
				margin-top: 35px;
			}

			.content a{
				text-decoration:none;
				font-size:25px;
				text-transform:uppercase;
				text-align:center;
				font-weight:bold;
				font-style:italic;
				margin-top:10px;
				transition: 0.2s;
				display:block;
			}
			.content a:link{
				color: #00adff;
			}
			.content a:visited{
				color: #ff6adf;
			}
			.content a:hover{
				color: #00ffff;
				transition: 0.2s;
			}

        </style>
    </head>
    <body>
    	<div class="header">
        	<h1>ESH</h1>
    	</div>
    	<div class="content">
    		<h2>LOGIN</h2>
    		<?php

    			if(isset($_POST["submit"])){
    				if($_POST["username"] == "admin" && $_POST["pass"] == "root"){
    					header("Location:adminIndex.php");
						setcookie("On","true");
					}
    				else if($_POST["username"] != "admin" || $_POST["pass"] != "root")
    					echo "<h3>One of the inputs is wrong</h3>";
    			}

    		?>
    		<form method="post" autocomplete="off">
    			<input type="text" name="username" placeholder="administrator username">
    			<input type="password" name="pass" placeholder="administrator password">
    			<input type="submit" name="submit" value="GET IN">
    		</form>
        <a href="index.php">GO BACK</a>
    	</div>
    </body>
</html>
