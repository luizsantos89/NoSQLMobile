<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inserir arquivo no GridFS</title>

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
            <a class="p-2 text-dark"  href="recuperaArquivo.php">Análise*</a>
        </nav>
    </div>
    
    <div id="container" style="min-height: 75%;">   
        <form method="post" action="processaFile.php" enctype="multipart/form-data" class="md-form">
            <table>
                <tr>
                    <td colspan="2"><h2 class="h2">Inserir arquivos com GridFS</h2></td>
                </tr>
                <tr>
                    <td><span>Escolha o arquivo: </span></td>
                    <td><input type="file" name="arquivo"></td>
                </tr>
                
                <tr colspan="2">
                    <td><button class="btn-success" type="submit">Enviar</button></td>
                </tr>
            </table>
        </form>  
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