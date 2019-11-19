<header>

    <?php 
    require_once ("../conexao/conexao.php");
    
    
    if(isset($_SESSION["s_usuario"])){
        $user=$_SESSION["s_usuario"];

        $sql="SELECT nomecompleto ";
        $sql.="FROM clientes ";
        $sql.="WHERE clienteID = {$user} ";

        $consultaNome = enviaQuery($sql);
      

        $nome=$consultaNome["nomecompleto"];
       



    }
    else{

        $nome="faça seu login.";
  

    }
    
    
    ?>

    <div id="header_saudacao">
     <h5> <?php echo"Bem vindo, $nome ! ";?><a href="sair.php">Sair</a></h5>

    </div>
<?php 



?>





    <div id="header_central">
        <img src="assets/logo_andes.gif">
        <img src="assets/text_bnwcoffee.gif">

    </div>
</header>