<?php require_once("../conexao/conexao.php"); ?>
<?php 
session_start();

if(!isset($_SESSION["s_usuario"])){
    if(isset($_POST["loginSolicitado"])){
        $usuario=$_POST["usuario"];
        $senha=$_POST["senha"];
    
        
    
    
       $sql="SELECT * FROM clientes WHERE usuario='$usuario' AND senha='$senha';";
    
        $consultaAcesso=mysqli_query($conect,$sql);
        if(!$consultaAcesso){
    
            die("Falha na consulta ao banco");
        }
       
    
        $consultaLogin=mysqli_fetch_assoc($consultaAcesso);
    
      
        
        if(empty($consultaLogin)){
    
          
        $menssagem="Login sem sucesso";
      
        
    
        }else{
           session_start();
           $_SESSION["s_usuario"]=$consultaLogin["clienteID"];
           echo $_SESSION["s_usuario"];
           header("location:listagem.php");
    
     
     
    
    
        }
    
    
    }
}
else{
header("location:listagem.php");



}
  




?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/login.css" rel="stylesheet">
    </head>

    <body>
        <?php include"_incluir/topo.php";?>
        <main>  

        <div id="janela_login">
                

           
                <form action="login.php" method="POST"> 
                <h2>Tela de login</h2>
                <label for="">Usuario : </label>   
                <input type="text" name="usuario" id="usuario" placeholder="Usuario"> 
                <br><br>     
                 
                <label for="">Senha :</label>&nbsp;&nbsp;&nbsp;
                <input type="password" name="senha" id="senha" placeholder="senha"> 
                <br><br> 

                <input type="submit" value="Login" name="loginSolicitado"> 


                <?php 
                if(isset($menssagem)){?>

                 <p><?php echo $menssagem;?></p>

         
                <?php }
  
                
                ?>
            
            </form>




        </div>
            
            
        </main>

        <footer>
            <div id="footer_central">
                <p>ANDES &eacute; uma empresa fict&iacute;cia, usada para o curso PHP Integra&ccedil;&atilde;o com MySQL.</p>
            </div>
        </footer>
    </body>
</html>

<?php

    // Fechar conexao
    mysqli_close($conect);
  
?>