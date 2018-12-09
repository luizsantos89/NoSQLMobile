<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manutenção de Documentos - Principal</title>

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
        <h3>Metodologia</h3>
        <p>Devido a necessidade de explorar o compartilhamento e integração de dados em documentos, 
            o projeto iniciou-se a partir de estudos para criação de serviços web em PHP visando a 
            manipulação de documentos em banco de dados NoSQL acessando o banco de dados MongoDB. 
            Para a aplicação da proposta foi desenvolvido um protótipo utilizando a técnica de 
            webview para construção de interface, a fim de facilitar o acesso tanto em smartphones 
            quanto em ambiente desktop por meio de browsers. 
        </p>
        <h3>Resultados e Discussão</h3>
        <p>O projeto de pesquisa em questão produziu este protótipo de aplicação que se encontra 
            em fase de testes. Atualmente, é possível armazenar e extrair informações tanto em 
            smartphones quanto em ambiente desktop, a partir de documentos no formato .CSV. 
            Os testes foram feitos em documentos com 100.000 linhas apresentando boa performance do 
            serviço web para manipulação deste tipo de documento. Além disso, é possível realizar 
            upload e download de documentos no formato binário.
        </p>
        <h3>Considerações Finais</h3>
        <p>O projeto ainda se encontra em fase de implementação, pois é necessário ainda o armazenamento 
            não somente de documentos, mas também dos dados que descrevem os documentos, visando melhorar 
            a pesquisa para recuperação destes. Finalmente, espera-se evoluir a manipulação de dados de 
            documentos no formato binário, e a aplicação das técnicas de testes de desempenho na manipulação 
            dos dados propostos.
        </p>


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