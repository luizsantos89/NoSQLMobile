<?php

set_time_limit(0);
ini_set('memory_limit', '9192M');

?>

<html>
    
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Home</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="leCSV.php">Inserir CSV</a></li>
                    <li><a href="leDOC.php">Inserir GridFS</a></li>
                    <li><a href="recuperaDados.php">Collections</a></li>
                    <li><a href="recuperaArquivo.php">GridFS</a></li>
                </ul>
            </div>
        </nav>
        <div id="container" style="min-height: 75%;"> 
            <?php
                // Iniciamos o "contador"
                list($usec, $sec) = explode(' ', microtime());
                $script_start = (float) $sec + (float) $usec;


                if(isset($_REQUEST["json"])) {
                    //An example JSON string.
                    $jsonString = $_REQUEST["json"];

                    //Decode the JSON and convert it into an associative array.
                    $jsonDecoded = json_decode($jsonString, true);


                    echo '<div id="bloco"><a href="index.php">Voltar ao início</a></div>';


                    //Give our CSV file a name.
                    $data = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
                    $dataAtual = $data->format('Y-m-d-H-i-s');
                    //$dataAtual = $data->format('Y-m-d H:i:s');
                    $csvFileName = 'file-'.$dataAtual.'.csv';

                    //echo $csvFileName;
                    //Open file pointer.
                    $fp = fopen($csvFileName, 'w');

                    //Loop through the associative array.
                    foreach($jsonDecoded as $row){
                        //Write the row to the CSV file.
                        fputcsv($fp, $row);
                    }

                    //Finally, close the file pointer.
                    fclose($fp);
    
                    // Terminamos o "contador" e exibimos
                    list($usec, $sec) = explode(' ', microtime());
                    $script_end = (float) $sec + (float) $usec;
                    $elapsed_time = round($script_end - $script_start, 5);

                    // Exibimos uma mensagem
                    echo 'Tempo gasto no processamento: ', round($elapsed_time,2), ' segundos.';
                    unset($_FILES);
                } else {
                    header("Location: index.php");
                }
            ?>
    </div>
    
    <footer>
      <div class="container">
        <p>Protótipo desenvolvido para o Projeto de Pesquisa e Extensão: Manutenção de Documentos utilizando Banco de Dados NoSQL.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="mailto:eoliveira@gmail.com">Evaldo Oliveira</a>
          </li>
          <li class="list-inline-item">
            <a href="mailto:luiz.santos89@yahoo.com.br">Luiz Santos</a>
          </li>
        </ul>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="jquery/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

  </body>

</html>