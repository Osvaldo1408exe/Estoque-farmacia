<!DOCTYPE html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
            
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark" aria-label="Sixth navbar example">
        <div class="container-fluid">
          <a class="navbar-brand" href="inicio.php">Início</a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="navbar-collapse collapse" id="navbarsExample06" >
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">

              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="cadastrar.php">Cadastrar</a>
              </li>


              
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="itens.php">Itens</a>
              </li>


              <form method="post" action="../functions/auth/logoff.php">
                  <li class="nav-item">
                    <button class="nav-link">Sair</button>
                  </li>
              </form>
              
              


            </ul>
          </div>
        </div>
      </nav>
		
		
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
