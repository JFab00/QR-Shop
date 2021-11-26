<html>
<head>
    <title>ESH WebStore</title>
    <link rel="icon" href="images/e.png">
    <meta charset="UTF-8">
    <style>
        @font-face{font-family: "Icons"; src: url("images/fontello.ttf")}

        body{
            font-family: Calibri;
            padding:0;
            margin:0;
        }
        #tab{
            border:1px solid black;
            border-collapse:collapse;
            max-width:1000px;
        }

        #tab td{
            border:1px solid black;
            text-align:center;
            padding:15px;
        }
        #tab th{
            padding:15px;
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
            width:600px;
            margin:auto;
            margin-top:60px;
            margin-bottom:30px;
            display:grid;
            text-align:justify;
        }

        .content img{
            margin:auto;
        }

        #cart{
            font-family:Icons;
            font-weight:normal;
            font-style:normal;
        }

        .content a{
            text-decoration:none;
            font-size:45px;
            text-transform:uppercase;
            text-transform:emphasis;
            text-align:center;
            font-weight:bold;
            font-style:italic;
            margin-top:10px;
        }
        .content a:link{
            color: #00adff;
            transition: 0.2s;
        }
        .content a:visited{
            color: #00c5c5;
        }
        .content a:hover{
            color: #56c9ff;
            transition: 0.2s;
        }

        .content h3,h2{
            margin-bottom:1px;
        }

        .footer{
        background-color: #00adff;
        text-align: center;
        font-size:30px;
        color:white;
        padding: 10px;
        }

        .footer p{
        margin: 0;
        text-shadow:0 1px 0 #00a1ec, 0 2px 0 #008bcc, 0 3px 0 #0080bb, 0 4px 0 #0078af, 0 5px 0 #0080bb, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
        }

        .footer a{
            text-decoration:none;
            text-transform:uppercase;
            text-align:center;
            font-weight:bold;
            font-style:italic;
        }

        .footer a:link{
            color: #00adff;
            transition: 0.2s;
        }
        .footer a:visited{
            color: #00c5c5;
        }
        .footer a:hover{
            color: #56c9ff;
            transition: 0.2s;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>ESH</h1>
    </div>
    <div class="content">
        <?php include('qr.php'); ?>
        <a href="prodotti.php"><span id="cart"></span> Go to the Market</a>
        <h2>FAQ</h2>
        <h3>What am I supposed to do so I can buy the stuff I want?</h3>
        <p>In order to enter in the shop and buy the items you're looking for, first of all you'll have to scan the QR code above using your smartphone. The QR code will bring you to a link/website. After that just click the link, on your computer, that's under the qr code and it will bring you to the products list.</p>
        <h3>What am I supposed to do after I have scanned the products I want to buy?</h3>
        <p>After you've scanned all the products you want to buy, then all you have to do is to scan the QR code that can be found at the bottom of the products list</p>
        <h4 style="text-align:center;">For further questions send an e-mail to esh.qrshop@esh.com <br>(don't send any e-mail to this address, it doesn't exists)</h4>
    </div>
    <div class="footer">
        <p>Admin? Then <a href="adminLogin.php">click here</a>.</p>
    </div>
</body>
</html>
