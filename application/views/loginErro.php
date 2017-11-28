<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/estilo.css');?>">

    <script type="text/javascript" src="<?php echo base_url('assets/confirm2.js');?>"></script>

    <style type="text/css">
    
    body{

        background-image: url('<?php echo base_url("assets/bread.jpg");?>');

    }

</style>
</head>
<body>
    <div class="container" style="margin-top: 5%;">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">               
            <div class="panel panel-info" >
                <h4 align="center">GESTOR DE RECURSOS</h4>
                <div class="panel-heading">
                    <div class="panel-title">Iniciar sessão</div>
                    <div class="forgerPassword" style="float:right; font-size: 80%; position: relative; top:-10px"><a href="" data-toggle="modal" data-target="#Senha">Esqueceu sua senha?</a></div>
                </div>


                <small style="margin-left: 3%; color: red;">Email ou senha incorretos</small>
                

                <div style="padding-top:30px" class="panel-body" >

                    <form action="<?php echo base_url();?>cadastro/login" method="post" class="form-horizontal" role="form">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="EMAIL" required="">                                        
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="senha" placeholder="SENHA" required="">
                        </div>

                        <div style="margin-bottom: 25px">
                            <button class="btn btn-success" style="float: right;">Acessar</button>
                        </div>
                    </form>
                </div>
                <hr />
                <div>
                    <h4 class="logo">POWERED BY</h4> <h4 class="logo" style="margin-left: 0%; color: #0000CD; margin-left: 0.5%;">FLY SOFTWARES</h4>
                    </div
                </div>     
            </div>                     
        </div>
    </div>

    <!-- MODAL RECUPERAR SENHA -->

    <div id="Senha" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Redefinir senha</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url();?>cadastro/updateSenha" method="post" class="form-horizontal" role="form">
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" placeholder="EMAIL" name="email" id="EMAIL" required autofocus="">     
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="senha" placeholder="SENHA" required="" id="senha1">
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="confirmar_senha" placeholder="CONFIRMAR SENHA" required="" id="senha2">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" onclick="return validarSenha()" type="submit" style="float: right;">Redefinir</button>
            </div>
        </form>
    </div>
</body>
</html>