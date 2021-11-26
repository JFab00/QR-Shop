<!DOCTYPE html>
<?php
    include('connect.php');
    $sql="SELECT * FROM negozio ORDER BY prezzo,codice";   /// ORDER BY non funziona..
    $risultato=pg_exec($connessione,$sql)
    or die ("Errore lancio query");
    include('images/qr/qrProd.php');
?>
<html>
    <head>
        <title>Prodotti</title>
        <link rel="icon" href="images/e.png">
        <style>
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
            #prodotti img{
                width:200px;
                height:auto;
            }

            .product{
                width: 450px;
                height:112.5px;
                border:1px solid black;
                padding:0;
                display:flex;
                float:left;
                margin-left: 10px;
                margin-bottom:10px;
                transition:0.8s;
                background-color:white;
            }



            .product-qr{
                width:112.5px;
                height:112.5px;
                border-right:1px solid black;
                transition:0.8s;
            }

            .product-qr img{
                width:112.5px;
                height:auto;
                transition:0.8s;
            }

            .product-image{
                border-right:1px solid black;
            }

            .product-image img{
                min-width:140px;
                max-width:140px;
                height:112.5px;
                transition:0.8s;
            }


            .product2{
                width:195.5px;
                text-align:center;
                background-color:white;
                transition:0.8s;
            }


            .product2 p{
                margin:0;
            }
            .product-description{
                width:196.5px;
                padding: 19.1px 0;
                border-bottom:1px solid black;
                transition:0.8s;
            }



            .product-price{
                float:left;
                width:97.75px;
                padding: 18px 0;
                border-right:1px solid black;
                transition:0.8s;
            }



            .product-qnt{
                float:left;
                width:96.75px;
                padding: 19.1px 0;
            }



            .content{
                margin:auto;
                width:1400px;
                margin-top:60px;
            }

            .fine{
                width:400px;
                margin:auto;
                text-align:center;
                margin-bottom:120px;
				        margin-left:30px;
				        float:left;
            }

            .fine img{
                margin-top:30px;
            }

            .fine p{
                font-size:35px;
                font-weight:800;
                text-transform:uppercase;
                margin:5px 0;
            }

            .fine a{
                text-decoration:none;
                font-size:25px;
                text-transform:uppercase;
                text-transform:emphasis;
                text-align:center;
                font-weight:bold;
                font-style:italic;
                margin-top:10px;
                transition: 0.2s;
            }
            .fine a:link{
               color: #00adff;
            }
            .fine a:visited{
               color: #ff6adf;
            }
            .fine a:hover{
               color: #00ffff;
               transition: 0.2s;
            }

			.row{
				display:table;
				clear: both;
				margin:auto;
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
        <?php

            $righe=pg_numrows($risultato);
            for ($i=0; $i < $righe; $i++)
            {
                $riga = pg_fetch_array($risultato,$i);
                echo "<div class='product'><div class='product-qr'><img src='images/qr/".$riga["qr"]."'></div><div class='product-image'><img src='images/prodotti/".$riga["immagine"]."'></div><div class='product2'><div class='product-description'><p>".$riga["descrizione"]."</p></div><div class='product-price'><p>".$riga["prezzo"]."&euro;</p></div><div class='product-qnt'><p>".$riga["quantita"]."</p></div></div></div>";
            }
            pg_freeresult($risultato);
            pg_close($connessione);
        ?>
    </div>
	<div class="row">
	<div class="fine">
            <a href="http://sfarina1.alwaysdata.net/qrcodelab/"><img src="images/ad.png" style="width:250px;"></a>
    </div>
    <div class="fine">
            <img src="qr_final.png">
            <p>Scan this to finish your shopping.</p>
            <a href="index.php">Go to the main Page</a>
    </div>
	<div class="fine">
            <a href="http://sfarina1.alwaysdata.net/qrcodelab/"><img src="images/ad.png" style="width:250px;"></a>
    </div>
	</div>
  <div class="footer">
      <p>Admin? Then <a href="adminLogin.php">click here</a>.</p>
  </div>
</body>
</html>
