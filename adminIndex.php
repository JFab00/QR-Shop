<!DOCTYPE html>
<html>
    <?php
    include('adminCheck.php');
    ?>
	<head>
		<title>Index</title>
		<link rel="icon" href="images/e.png">
		<style>
			@font-face{font-family: "Icons"; src: url("images/fontello.ttf")}
		
    		body{
    		    font-family: Calibri;
    		    padding:0;
    		    margin:0;
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
                width: 500px;
                text-align: center;
                margin:auto;
                margin-top: 100px;
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

            .title{
                width:400px;
                margin:auto;
            }

            .title img{
                width: 100px;
                height:100px;
                
            }

            .title h2{
                font-size: 50px;
                letter-spacing: 4px;
                margin: 0;
                margin-bottom: 60px;
                text-shadow: 2px 2px 0px #FFFFFF, 5px 4px 0px rgba(0,0,0,0.15);
                text-align: center;
                margin-top: -20px;
            }
		</style>
	</head>
	<body>
		<div class="header">
        	<h1>ESH</h1>
    	</div>
    	<div class="content">
            <div class="title">
                <img src="https://icons-for-free.com/iconfiles/png/512/human+person+user+icon-1320196276306824343.png">
                <h2>ADMIN THINGS</h2>
            </div>
			<a href="adminModify.php">Change product details</a>
			<a href="adminInsert.php">Add product in the database</a>
			<a href="index.php">Go back to the main page</a>
		</div>
	</body>
</html>