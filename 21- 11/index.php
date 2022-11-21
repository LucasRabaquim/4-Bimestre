<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Projeto</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <link rel="stylesheet icon" href=""/>
        <?php include 'conexao.php';?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <form name="frmpesquisa" method="get" action="">
            <div class="row">
                <div class='col'>
                    <label class="form-label">Cargo</label>
                    <select class="form-select" name="sltcargo">
                        <option selected value="">Selecione</option>
                        <?php
                            $consulta = $cn->query("select cargo from tbl_empregos group by cargo");
                            while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value='".$exibe['cargo']."'>".$exibe['cargo']."</option>";
                            } 
                            ?>
                    </select>
                </div>
                <div class='col'>
                    <label for="exampleInputEmail1" class="form-label">Area</label>
                    <select class="form-select" name="sltarea">
                        <option selected value="">Selecione</option>
                        <?php
                            $consulta = $cn->query("select area from tbl_empregos group by area");
                            while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
                              echo "<option value='".$exibe['area']."'>".$exibe['area']."</option>";
                            } 
                            ?>
                    </select>
                </div>
                <br><br>
                <br><br>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
        <br>
        <div class="row">
            <?php 
                $verificar = fn($campo) => isset($_GET[$campo]) && $_GET[$campo] != null;
                
                if($verificar('sltcargo') && $verificar('sltarea')){
                
                  $cargo = $_GET['sltcargo'];
                  $area = $_GET['sltarea'];
                  $consulta = $cn->query("select * from tbl_empregos where Cargo = '$cargo' and Area = '$area'");
                  $campos = ['Registro','Nome','Cargo','Area','Salario','Status'];
                
                  echo "<table class='table'> <thead> <tr>";
                
                  foreach($campos as &$nome)
                    echo"<th scope='col'>$nome</th>";
                
                  echo "<th scope='col'>Alterar</th> <th scope='col'>Excluir</th> </tr> </thead>";
                  while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    foreach($campos as &$nome)
                      echo "<th>".$exibe[$nome]."</th>";
                    
                    echo "<th>  <a href='alterar.php?cd_alt=$exibe[Registro]'><img style='width:35px; height:auto;' src='https://www.d-velop.de/wp-content/uploads/sites/10/2020/09/icon-digital-signieren-lila.png'></a></th>";
                    echo "<th><a href='excluir.php?cd_excluir=$exibe[Registro]'><img style='width:35px; height:auto;' src='https://images.vexels.com/media/users/3/153297/isolated/preview/b394f1c0280879beb70bc51813fe1f41---cone-de-tra--o-colorido-de-lixeira-by-vexels.png'></a></th>";
                    echo "</tr>";
                  }
                  echo "</table>";
                }
                ?>
        </div>
    </body>
</html>
<style>
    body{flex-direction:column;}
</style>