<?php
  
  $host = '127.0.0.1';
  $db   = 'mysql';
  $user = 'root';
  $pass = 'toor';
  $charset = 'utf8mb4';
  
  $options = [
      \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
      \PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  try {
       $pdo = new PDO($dsn, $user, $pass, $options);
  } catch (\PDOException $e) {
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

  $data = $pdo->query("SELECT `Host`, `User`, `Password`, `Grant_priv` FROM `user`")->fetchAll();

?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>PDO MySQL - Teste  de Conexão</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">PDO MySQL - Teste  de Conexão</h3>
        </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="col-md-10">
            <table class="table table-bordered">
            <thead class="thead-dark">
                <tr class="text-center"><th>Host</th><th>User</th><th>Password</th><th>Privileges</th></tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row):
                    echo '<tr class="text-center"><td>'.$row['Host'].'</td><td>'.$row['User'].'</td><td>'.$row['Password'].'</td><td>'.$row['Grant_priv'].'</td></tr>';
                endforeach;
                ?>
            </tbody>
            <table>
        </div>
      </div>
    </div>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/popper.js/dist/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>