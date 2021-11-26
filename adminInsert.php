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
		<title>ADD</title>
		<link rel="icon" href="images/e.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                text-transform:emphasis;
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

            .content input[type="file"] {
                display: none;

            }

            .custom-file-upload{
                background-color:#00adff;
                border:none;
                color:white;
                font-weight: 1000;
                font-size: 20px;
                width:40%;
                margin-top:50px;
                margin:auto;
                transition: 0.2s;
                padding: 10px;
                display: block;
                cursor: pointer;
            }

		</style>
	</head>
	<body>
		<div class="header">
        	<h1>ESH</h1>
    	</div>
    	<div class="content">
    		<h2>Insert product into DB</h2>

            <?php
                if(isset($_POST["submit"])){
                    if(isset($_FILES['file'])){
                        if($_REQUEST["descrizione"] != "" && $_REQUEST["prezzo"] != "" && $_REQUEST["quantita"] != ""){
                            $ultimoCodice = pg_query($connessione, "SELECT * FROM negozio ORDER BY codice DESC");
                            $riga = pg_fetch_array($ultimoCodice);
							$bcodice = substr($riga["codice"],0,1); // la prima parte del codice, ovvero la lettera
                            $fcodice = (int)substr($riga["codice"],1);  // i numeri del codice
							if($fcodice == 999){    // se il numero e' uguale a 110
                                $bcodice++;     // incremento la lettera, cioe' se e' C diventera' D
                                $fcodice=0;
                            }
                            else if($fcodice < 999)
                                $fcodice++;

							$fcodice = str_pad($fcodice, 3, '0', STR_PAD_LEFT);
							$codice = $bcodice.$fcodice;
                            $descrizione = $_REQUEST["descrizione"];
                            $prezzo = floatval($_REQUEST["prezzo"]);
                            $quantita = (int)$_REQUEST["quantita"];
                            $imgName = str_replace(" ", "_", $_REQUEST["descrizione"]);
                            $qrName = "qr_".strtolower($imgName).".png";
                            
    
                            /// ------------- UPLOAD IMMAGINE ---------------------
                            $target_dir = "images/prodotti/";
                            $immagine = $target_dir.$imgName.".jpg";
                            //echo $immagine;
                            move_uploaded_file($_FILES["file"]["tmp_name"], $immagine);
    
                            /// ------------- INERIMENTO DB -----------------------
    
                            $imgName .= ".jpg";
                            pg_exec($connessione,"INSERT INTO negozio VALUES('$codice','$descrizione','$prezzo','$quantita','$imgName','$qrName')");
    
                            echo "<h3>the item $descrizione has been added in the database</h3>";
                        }
                        else
                            echo "<h3 style='color:red'>One of the fields was not completed</h3>";
                    }
                    else
                        echo "<h3 style='color:red;'>There was a problem...</h3>";
                    
                }

            ?>
    		<form method="post" autocomplete="off" enctype="multipart/form-data">
        		<input type="text" name="descrizione" value="" placeholder="description">
        		<input type="numeric" name="prezzo" min="0" value="" placeholder="price">
        		<input type="numeric" name="quantita" min="1" value="" placeholder="quantity" >
                <label for="file-upload" class="custom-file-upload" id="imgLabel">
        		  <span style="padding:0 20px">ADD PRODUCT IMAGE</span>
                </label>
                <input type="file" id="file-upload" name="file">
                <input type="submit" name="submit" value="ADD">
        	</form>
        	<script>
                $("#file-upload").change(function(){
                    var imgVal = $('#file-upload').val(); 
                    if(imgVal!='') 
                        $("#imgLabel").css("background-color","#009c09");
                    else
                        $("#imgLabel").css("background-color","red");
                });
            </script>
        	<a href="adminIndex.php">Back</a>
    	</div>
	</body>
</html>