<!DOCTYPE html>
<?php
    //  ---------------------------- CONTROLLO SESSIONE -----------------------------------
    if(!isset($_COOKIE["person"]))
        echo '"'.$_COOKIE["person"].'"';
    //header("Location:noSession.html");

    //  ---------------------------- POSTGRESQL -------------------------------------------
    include('connect.php');
    $sql="SELECT * FROM negozio";
    $risultato=pg_exec($connessione,$sql)
    or die ("Errore lancio query");
?>
<html>
    <head>
        <title>Prodotti</title>
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
                background-color:white;
                width:750px;
                margin:auto;
                margin-top:60px;
                padding:10px;
                font-family: monospace;
                font-weight: 800;
                text-align:center;
            }

            .content img{
                width:150px;
                height:auto;
                margin:auto;
                filter: grayscale(100%);
                margin-top:80px;
            }
            table{
                width:550px;
                margin:auto;
                margin-bottom:150px;
                font-size:20px;
            }

            th{
                padding-bottom:30px;
                text-align:left;
                text-transform:uppercase;
                border-bottom: 1px dashed black;
            }

            td{
                text-transform:uppercase;
                text-align:left;
                padding:10px 0;
            }

            #third{
                text-align:right;
            }

            #second{
                text-align:center;
            }


            #last td{
                border-top:1px dashed black;
            }
        </style>
    </head>
    <body>
    <div class="header">
        <h1>ESH</h1>
    </div>
    <div class="content">
        <img src="images/e.png">
        <h2>ESH srl.</h2>

        <?php
			$fileName = "prodAcq ". $_COOKIE["person"].".txt";
            $content = explode("\n",file_get_contents("sessions/".$fileName));
            unset($content[count($content)-1]);

            echo "<h2>".date("d/m/Y h:i:sa")."</h2><h2 style='margin-bottom:100px;'>Hai acquistato questi prodotti:</h2>";
            echo "<table><tr><th>Prodotto</th><th id='second'>Quantità</th><th id='third'>Prezzo</th></tr>";
            $contentCount= array_count_values($content);
            $totale = 0;
            foreach($contentCount as $element =>$number){
                $prodotto = pg_query($connessione, "SELECT * FROM negozio WHERE codice ='".strtoupper($element)."'");
                $riga = pg_fetch_array($prodotto);
                echo "<tr><td>".$riga["descrizione"]."</td><td id='second'>".$number."</td><td id='third'>";
                if($number >1){
                    echo $riga["prezzo"]*$number." &euro;</td></tr>";
                    $totale += $riga["prezzo"]*$number;
                }
                else{
                    echo $riga["prezzo"]." &euro;</td></tr>";
                    $totale += $riga["prezzo"];
                }
            }
            echo "<tr><td style='padding-top:30px'></td></tr><tr id='last'><td>Totale</td><td></td><td id='third'>".$totale." &euro;</td></tr></table>";
			unlink("sessions/".$fileName);	// cancello il file con i prodotti
			unset($_COOKIE["person"]);				// cancello il cookie
			setcookie("person","");					// -----------------


        ?>
        <h2 style="margin-top:100px;">For further questions send an e-mail to esh.qrshop@esh.com</h2>
        <h2 style="margin-bottom:150px;">(don't send any e-mail to this address, it doesn't exists)</h2>
    </div>
</body>
</html>
