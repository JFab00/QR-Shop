<!DOCTYPE html>
<html>
<?php
	include('adminCheck.php');
    include('connect.php');
    $sql="SELECT * FROM negozio";
    $risultato=pg_exec($connessione,$sql)
    or die ("Errore lancio query");
?>
	<head>
		<title>Modify</title>
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
				font-size: 40px;
				letter-spacing: 4px;
				margin-bottom: 50px;
				text-shadow: 2px 2px 0px #FFFFFF, 5px 4px 0px rgba(0,0,0,0.15);
				text-transform: uppercase;
			}

			.content select{
				width:54%;
				border:none;
				background-color: #00adff;
				padding: 10px;
				transition: 0.2s;
				margin-bottom: 10px;
				border: 1px solid transparent;
				font-weight: 800;
				color:white;
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
				width:53%;
				margin-top:10px;
				transition: 0.2s;
			}

			.content input[type="submit"]:hover{
				width:54%;
				background-color: #0090d4;
				transition: 0.2s;
				box-shadow: 0 0 21px #bbbbbb;
			}

			.content h3{
				color:#00ce00;
				text-transform: uppercase;
				text-shadow: 2px 2px 0px #FFFFFF, 5px 4px 0px rgba(0,0,0,0.15);
				margin-top: 35px;
			}

    		select{
    			text-transform: uppercase;
    		}

    		a{
                text-decoration:none;
                font-size:25px;
                text-transform:uppercase;
                text-align:center;
                font-weight:bold;
                font-style:italic;
                margin-top:10px;
                transition: 0.2s;
            }
            a:link{
               color: #00adff;
            }
            a:visited{
               color: #ff6adf;
            }
            a:hover{
               color: #00ffff;
               transition: 0.2s;
            }

            #del{
                font-family:Icons;
                font-weight: normal;
            }

            button{
                background-color:#ff7b7b;
                border:none;
                color:white;
                font-size: 20px;
                width:53%;
                padding: 10px;
                margin-top:30px;
                transition: 0.2s;
                font-weight: 800;
            }
            button:hover{
                background-color: red;
            }
		</style>
	</head>
	<body>
		<div class="header">
        	<h1>ESH</h1>
    	</div>
    	<div class="content">
    		<h2>Change product details</h2>
    		<form method="post">
    			<select name="selected">
    				<?php	
    					$righe=pg_numrows($risultato);
        		    	for ($i=0; $i < $righe; $i++)
        		    	{
        		    	    $riga = pg_fetch_array($risultato,$i);
							echo "<option value='".$riga["codice"]."'>".$riga["descrizione"]."</option>";
        		    	}    
        		    ?>
        		</select>
        		<input type="text" name="descrizione" value="" placeholder="description">
        		<input type="text" name="prezzo" value="" placeholder="price">
        		<input type="text" name="quantita" value="" placeholder="quantity">
                <button type="submit" name="delete"><span id="del"></span> DELETE</button>
        		<input type="submit" name="submit" value="CHANGE">
        	</form>
        	<?php
        		if(isset($_POST["submit"])){
        			$codice = $_REQUEST['selected'];

					$prodotto = pg_query($connessione, "SELECT * FROM negozio WHERE codice ='".$codice."'");
					$riga = pg_fetch_array($prodotto);

        			$descr = $_REQUEST["descrizione"];
        			$prezzo = $_REQUEST["prezzo"];
        			$quant = $_REQUEST["quantita"];

        			if($_REQUEST["descrizione"] == "")
        				$descr = $riga["descrizione"];
        			if($_REQUEST["prezzo"] == "")
        				$prezzo = $riga["prezzo"];
        			if($_REQUEST["quantita"] == "")
        				$quant = $riga["quantita"];
        			pg_exec("UPDATE negozio SET quantita = $quant, prezzo = $prezzo, descrizione = '".$descr."' WHERE codice='".strtoupper($_REQUEST["selected"])."'");// aggiorna le quantità sul database

        			echo "<h3>The product has been Updated!</h3>";
        			// libero memoria
        		    pg_freeresult($risultato);
        		    // fine connessione
        		    pg_close($connessione);
        		}
                else if(isset($_POST["delete"])){
                    $codice= $_REQUEST["selected"];
                    pg_exec("DELETE FROM negozio WHERE codice='".$codice."'");
                }
        	?>
        	<a href="adminIndex.php">Back</a>
    	</div>
	</body>
</html>