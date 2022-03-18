<?php
define('STYLE_GLOBAL', '../../src/assets/css/styles.css');
$data = $view['data']['data'];

?>
<head><link rel="stylesheet" type="text/css" href="<?=STYLE_GLOBAL?>"></head>
<h4>Editar Cliente <a href="<?=URL_LISTAR_CLIENTE?>"><span class="badge bg-warning"><</span></a></h4>

<div class="form">
  <form id="form-editar" class="row g-3">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <div class="col-md-6">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="<?=$data['email']?>" id="email">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Password</label>
      <input type="password" class="form-control" id="inputPassword4" disabled>
    </div>
    <div class="col-12">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="name" name="nome" value="<?=$data['name']?>">
    </div>
    <div class="col-md-6">
      <label for="phone" class="form-label">Telefone</label>
      <input type="text" class="form-control" name="phone" value="<?=$data['phone']?>" id="phone">
    </div>
    <div class="col-md-4">
      <label for="cidade" class="form-label">Cidade</label>
      <input type="text" class="form-control" name="city" value="<?=@$data['cidade']?>" id="city">
    </div>
    <div class="col-md-2">
      <label for="state" class="form-label">Estado</label>
      <input type="text" class="form-control" name="state" value="<?=@$data['state']?>"  id="state">
    </div>
    
    <div class="col-12">
      <button type="submit" id="btn-editar" class="btn btn-primary">Editar</button>
    </div>
    <div id="msg" hidden class="align-items-center justify-content-between alert alert-success alert-dismissible fade show" role="alert">
        <div><b>Parabéns!!</b> Editado com sucesso.</div>
        <button type="button" class="btn btn-success" data-dismiss="alert" aria-label="Close">
          <a href="<?=URL_LISTAR_CLIENTE?>"><span class="badge bg-success" aria-hidden="true">< Listar Clientes</span></a>
        </button>
    </div>
  </form>
</div>

<script>
  $(document).ready(function () {
    $('#btn-editar').click(function (event) {
        event.preventDefault();
        
        $('#btn-editar').attr("disabled", false)
        // $('#loading').css("display", "inline-flex")
       
        $.ajax({
            url: "./src/services/ClientsServices.php",
            method: "post",
            data: $('#form-editar').serialize(),
            dataType: "text",
            success: function (response) {
                //var res = JSON.parse(response)
                console.log(response)
                $('#msg').addClass('d-flex')

            },
        })
    });
  })
  
</script>