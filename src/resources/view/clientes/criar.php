<?php
define('STYLE_GLOBAL', "../src/assets/css/styles.css");
?>
<head><link rel="stylesheet" type="text/css" href="<?=STYLE_GLOBAL?>"></head>
<h4>Adicionar Clientes <a href="<?=URL_LISTAR_CLIENTE?>"><span class="badge bg-warning"><</span></a></h4>

<div class="form">
  <form id="form-criar" class="row g-3">
      <input type="hidden" name="action" value="create">
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="inputPassword4">
      </div>
      <div class="col-12">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="nome">
      </div>
      <div class="col-md-6">
        <label for="phone" class="form-label">Telefone</label>
        <input type="text" class="form-control" name="phone" id="phone">
      </div>
      <div class="col-md-4">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" name="city" id="city">
      </div>
      <div class="col-md-2">
        <label for="state" class="form-label">Estado</label>
        <input type="text" class="form-control" name="state" id="state">
      </div>
      
      <div class="col-12">
        <button type="submit" id="btn-adc" class="btn btn-primary">Adicionar</button>
      </div>
      <div id="msg" hidden class="align-items-center justify-content-between alert alert-success alert-dismissible fade show" role="alert">
        <div><b>Parabéns!!</b> Adicionado com sucesso.</div>
        <button type="button" class="btn btn-success" data-dismiss="alert" aria-label="Close">
          <a href="<?=URL_LISTAR_CLIENTE?>"><span class="badge bg-success" aria-hidden="true">< Listar Clientes</span></a>
        </button>
      </div>
  </form>
</div>

<script>
  $(document).ready(function () {
    $('#btn-adc').click(function (event) {
        event.preventDefault();
        
        $('#btn-adc').attr("disabled", true)
        // $('#loading').css("display", "inline-flex")
       
        $.ajax({
            url: "./src/services/ClientsServices.php",
            method: "post",
            data: $('#form-criar').serialize(),
            dataType: "text",
            success: function (response) {
                $('#msg').addClass('d-flex')
            },
        })
    });
  })
  
</script>