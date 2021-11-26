<!DOCTYPE html>
<?php
    if(!isset($_GET["pc"])){
	    header("Location:noSession.html");
    }
	setcookie("person", $_SERVER["REMOTE_ADDR"], time()+3600*24);
	$fileName = "prodAcq ". $_SERVER["REMOTE_ADDR"].".txt";
    file_put_contents("sessions/".$fileName, "");
?>

<html>
    <head>
        <title>Esh WebStore</title>
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
                height:240px;
                margin:0;
                text-align:center;
                box-shadow:0 1px 0 #00a1ec, 0 2px 0 #008bcc, 0 3px 0 #0080bb, 0 4px 0 #0078af, 0 5px 0 #0080bb, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15)
            }
            .header h1{
                margin:0;
                color:white;
                font-size:180px;
                padding-top:8px;
                color: #FFFFFF;
                text-shadow:0 1px 0 #00a1ec, 0 2px 0 #008bcc, 0 3px 0 #0080bb, 0 4px 0 #0078af, 0 5px 0 #0080bb, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);    
            }
            .content{
                max-width:900px;
                min-width:400px;
                height:800px;
                margin:auto;
                margin-top:80px;
            }

            .content h1{
                font-size:140px;
                text-transform:uppercase;
                text-align:center;
            }
        </style>
    </head>
    <body>
    <div class="header">
        <h1>ESH</h1>
    </div>
    <div class="content">
        <h1>Sei entrato nel negozio </h1>
    </div>
    </body>
</html>