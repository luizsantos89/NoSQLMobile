<?php

set_time_limit(0);
ini_set('memory_limit', '9192M');

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recupera dados nas Collections</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">

  </head>

  <body id="page-top">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark"  href="leCSV.php">Inserir CSV</a>
            <a class="p-2 text-dark"  href="leDOC.php">Inserir GridFS</a>
            <a class="p-2 text-dark"  href="recuperaDados.php">Collections</a>
            <a class="p-2 text-dark"  href="recuperaArquivo.php">GridFS</a>
            <a class="p-2 text-dark"  href="arquivoAnalise.php">Análise*</a>
        </nav>
    </div>
    
    <div id="container" style="min-height: 75%;">  
        <h1>Recupera dados das Collections em CSV</h1>
        
                <form action="recuperaDados.php" method="get">
                    Collections disponíveis: <select name="base">
                        <?php                       
                        
                            // Iniciamos o "contador"
                            list($usec, $sec) = explode(' ', microtime());
                            $script_start = (float) $sec + (float) $usec;
                            
                            //String de Conexão
                            $m = new MongoClient('mongodb://localhost:27017'); 

                            $bases = $m->listDBs();
                            
                            $count = 0;
                            
                            foreach ($bases as $base) {
                                foreach($base as $db) {
                                    ?>
                                        <option value="<?=$db['name']?>"><?=$db['name']?></option>
                                    <?php
                                    
                                }
                            }

                        ?>
                    </select>
                    <button type="submit">Filtrar</button>
                </form>
        
        <?php
            
            if(isset($_REQUEST['base'])) {
                $base = $_REQUEST['base'];
                $db = $m->selectDB($base);                
            } else {
                $db = $m->selectDB('Data'); 
            }
            
            $colecoes = $db->listCollections();

            echo '<table border=1>';
            
            echo '<tr><th>Collection</th><th>Registros</th><th>CSV da Collection</th>';
            
            foreach ($colecoes as $colecao) {
                $data = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
                $dataAtual = $data->format('Y-m-d-H-i-s');
                echo "<tr><td class=col-md-6>$colecao</td><td class=col-md-2>".$colecao->count()."</td>";
                $csvFileName = 'file-'.$dataAtual.'.csv';

                //Abre o CSV - w significa somente para escrita
                $fp = fopen($csvFileName, 'w');
                
                $jsonDecoded = $colecao->find();

                //Loop through the associative array.
                foreach($jsonDecoded as $row){
                    //Write the row to the CSV file.
                    fputcsv($fp, $row);
                }

                //Finally, close the file pointer.
                fclose($fp);

                echo '<td class=col-md-3><a href="'.$csvFileName.'">Download do arquivo</td></tr>';
            }
            
            echo '</table><br>';
    
            // Terminamos o "contador" e exibimos
            list($usec, $sec) = explode(' ', microtime());
            $script_end = (float) $sec + (float) $usec;
            $elapsed_time = round($script_end - $script_start, 5);

            // Exibimos uma mensagem
            echo 'Tempo gasto no processamento: ', round($elapsed_time,2), ' segundos.';
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