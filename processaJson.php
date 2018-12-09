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

    <title>CSV processado - Inserido no MongoDB</title>

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
        <?php

        // Iniciamos o "contador"
        list($usec, $sec) = explode(' ', microtime());
        $script_start = (float) $sec + (float) $usec;

        if(isset($_POST['arquivo'])) {

        }
        if(isset($_FILES['arquivo'])) {
            date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
            $nomeCompleto = $_FILES['arquivo']['name'];
            $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $lines = file($_FILES['arquivo']['tmp_name'], FILE_BINARY);

            $headers = array();
            $dataObjects = array();

            $datahora = new DateTime();    
            $dataAtual = $datahora->format('Y-m-d-H-i-s');

            $nomeArquivo = $dataAtual.'.json';

            echo '<div id="bloco"><h1>CSV processado</h1><a href="'.$nomeArquivo.'" download>Download JSON</a></p></div>';
            echo '<br><br><Br>';
            foreach ($lines as $index => $line) {
                if ($index === 0) {
                    # this is the header line
                    $headers = str_getcsv($line);
                } else {
                    $data = str_getcsv($line);
                    $obj = new stdClass();
                    foreach ($headers as $index => $header) {
                        $obj->$header = $data[$index];
                    }
                    $dataObjects[] = $obj;
                }
            }

            //Tranforma o array $dataObjects em JSON
            $dados_json = json_encode($dataObjects);
            // Cria o arquivo cadastro.json
            // O parâmetro "a" indica que o arquivo será aberto para escrita
            $fp = fopen($nomeArquivo, "a");
            // Escreve o conteúdo JSON no arquivo
            $escreve = fwrite($fp, $dados_json);
            // Fecha o arquivo
            fclose($fp);
            //Header("Location: arquivoConvertido.php");

            //String de Conexão
            $conn = new MongoClient('mongodb://127.0.0.1:27017'); 

            // Acessando o Banco  
            $db = $conn->Data;

            $nomeArquivoSemExt = strstr($_FILES['arquivo']['name'], '.', true); 
            echo $nomeCompleto;
            // Criando e acessando a coleção com o nome do arquivo sem extensão
            $collection = $db->$nomeArquivoSemExt;

            // Converte o JSON de volta a um array de strings
            $dataObjects = json_decode($dados_json); 
            // Percorre o array inserindo cada registro, um a um
            foreach ($dataObjects as $id => $item) { 
                $collection->insert($item);
            }
            
            echo ' inserido no MongoDB com sucesso<br><br>';
    
            // Terminamos o "contador" e exibimos
            list($usec, $sec) = explode(' ', microtime());
            $script_end = (float) $sec + (float) $usec;
            $elapsed_time = round($script_end - $script_start, 5);

            // Exibimos uma mensagem
            echo 'Tempo gasto no processamento: ', round($elapsed_time,2), ' segundos.';
            
            unset($_FILES);
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