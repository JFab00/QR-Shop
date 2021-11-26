<!DOCTYPE html>
<html>
<?php
    if(!isset($_COOKIE["person"]))
		header("Location:noSession.html");
	
    include('connect.php');
    $sql="SELECT * FROM negozio";
    $risultato=pg_exec($connessione,$sql)
    or die ("Errore lancio query");
    
?>
    <head>
        <title>Scanned</title>
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
            text-align:center;
            }

            .content h1{
                font-size:140px;
                text-transform:uppercase;
                text-align:center;
                color: #14ec00;
                text-shadow: 4px 3px 0 #7A7A7A;
            }

            .content img{
                width:100%;
                height:auto;
            }
            .content h2{
                font-size:130px;
                text-transform:uppercase;
                text-align:center;
                margin-top:0;
            }

            input[type=button]{
                width:150px;
                height:150px;
                background-color: #00adff;
                border:0;
                color:white;
                font-size:80px;
                transition:0.1s;
                font-weight:800;
            }
            input[type=button]:active{
                background-color:green;
                transition:0.1s;
            }

            input[type=number]{
                width:149px;
                height:149px;
                font-size:80px;
                border:1px solid black;
                text-align:center;
            }

            #prod{
                text-decoration: underline;
            }

            #submit{
                width:460px;
                height:150px;
                margin-top:30px;
                background-color:#14ec00;
                color:white;
                font-size:80px;
                border:0;
                font-weight:800;
            }

            #inv{
                display:none;
            }
            #price{
                font-size:80px;
            }
            #pprice{
                display:none;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>ESH</h1>
        </div>
        <div class="content">
            <p id="inv"><?php $prodotto = pg_query($connessione, "SELECT * FROM negozio WHERE codice ='".strtoupper($_GET['prodotto'])."'");$riga = pg_fetch_array($prodotto);echo $riga["quantita"];?></p>
            <img src="images/prodotti/<?php echo $riga["immagine"]; ?>">
            <?php
            //echo $_COOKIE["PERSON"];
				$fileName = "prodAcq ". $_COOKIE["person"].".txt";
                $prodotto = pg_query($connessione, "SELECT * FROM negozio WHERE codice ='".strtoupper($_GET['prodotto'])."'");
                $riga = pg_fetch_array($prodotto);
                if($riga["quantita"] != 0){
                    if(isset($_POST["submit"])){
                        /// ------------------------- AGGIUNGI PRODOTTI NEL FILE---------------------------
                
                        $qnt=$_REQUEST["numero"];
                        for($i = 0; $i<$qnt; $i++){
                            $prodotti = file_get_contents("sessions/".$fileName);
                            $prodotti .= $_GET["prodotto"]."\n";
                            file_put_contents("sessions/".$fileName, "");
                            file_put_contents("sessions/".$fileName, $prodotti);
                        }
                        /// -------------------------------------------------------------------------------
        
        
                        
                        $qnt = $riga["quantita"]-$qnt;
                        pg_exec("UPDATE negozio SET quantita = $qnt WHERE codice='".strtoupper($_GET['prodotto'])."'");// aggiorna le quantità sul database
                        echo "<h1>You've scanned the product: <span id='prod'>".$riga["descrizione"]."</span></h1>";

                    }
                }else
                    echo "<h1 style='color:red;'> The product is out of stock... </h1><style>#add{display:none;}</style>";
            ?>
            <span id="pprice"><?php echo $riga["prezzo"]?></span><p id="price"><?php echo $riga["prezzo"]?><span> &euro;</span></p>
            
            <form method="post" id="add">
                <h2>Quantity</h2>
                <input type="button" value="-" onClick="minus()">
                <input type="number" name="numero" id="num" value="1" min="1" readonly>
                <input type="button" value="+" onClick="plus()">
                <input type="submit" id="submit" name="submit" value="ADD">
            </form>
            <script>
                function minus(){
                    
                    var q = document.getElementById("num").value;
                    var pp = parseFloat(document.getElementById("pprice").innerHTML);
                    var p = parseFloat(document.getElementById("price").innerHTML);
                    if(q == 1)
                        return q;
                    document.getElementById("num").value = (q-1);
                    document.getElementById("price").innerHTML = (p-pp).toFixed(2)+ " &euro;";
                }
                function plus(){
                    var q = document.getElementById("num").value;
                    var qMax = document.getElementById("inv").innerHTML;
                    var pp = parseFloat(document.getElementById("pprice").innerHTML);
                    var p = parseFloat(document.getElementById("price").innerHTML);
                    console.log(typeof(p));
                    if(q == qMax)
                        return qMax;
                    document.getElementById("num").value = ++q;
                    document.getElementById("price").innerHTML = (p+pp).toFixed(2)+ " &euro;";
                }
            </script>
        </div>
    </body>
</html>