<?php
define('STYLE_GLOBAL', '../../src/assets/css/styles.css');
$data = $view['data']['data'];
?>
<head><link rel="stylesheet" type="text/css" href="<?=STYLE_GLOBAL?>"></head>
<h4>Deletar Cliente <a href="<?=URL_LISTAR_CLIENTE?>"><span class="badge bg-warning btn-block"><</span></a></h4>

<div id="alert-msg" class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Atenção</h4>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula ipsum, fringilla quis lorem ut, maximus aliquet mauris. Sed ultricies odio ut sapien fermentum porta. Aliquam quis arcu luctus, sodales dolor eget, semper nibh. Cras in eros sit amet mi commodo molestie non in lorem. Nam libero quam, aliquet ut dolor non, pharetra vestibulum purus.</p>
  <hr>
  <p class="mb-0">Tem certeza que quer deletar o usuário <b><?=$data['name']?></b></p>
  <button type="button" id="btn-deletar" class="col-md-12 btn btn-danger btn-lg btn-block">Deletar</button>
</div>
<div id="msg" hidden class="align-items-center justify-content-between alert alert-success alert-dismissible fade show" role="alert">
    <div><b>Feito!!</b> Deletado com sucesso.</div>
    <button type="button" class="btn btn-success" data-dismiss="alert" aria-label="Close">
      <a href="<?=URL_LISTAR_CLIENTE?>"><span class="badge bg-success" aria-hidden="true">< Listar Clientes</span></a>
    </button>
</div>

<script>
  $(document).ready(function () {
    $('#btn-deletar').click(function (event) {
        event.preventDefault();
        
        $('#btn-deletar').attr("disabled", false)
        // $('#loading').css("display", "inline-flex")
       
        $.ajax({
            url: "./src/services/ClientsServices.php",
            method: "post",
            data: {"action": "deletar", "id": <?=$data['id']?>},
            dataType: "text",
            success: function (response) {
                $('#alert-msg').hide()
                $('#msg').addClass('d-flex')

            },
        })
    });
  })
  
</script>