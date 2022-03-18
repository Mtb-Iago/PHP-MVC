<?php
define('STYLE_GLOBAL', './src/assets/css/styles.css');
?>


<h4>Listagem de Clientes <a href="<?=URL_CRIAR_CLIENTE?>"><span class="badge bg-primary">+</span></a></h4>
<head><link rel="stylesheet" type="text/css" href="<?=STYLE_GLOBAL?>"></head><table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($view['data']['dados'] as $key => $value) { ?>
        <tr>
          <th scope="row"><?=$value['id']?></th>
          <td><?=$value['name']?></td>
          <td><?=$value['phone']?></td>
          <td><?=$value['email']?></td>
          <td><?=$value['city']?></td>
          <td><?=$value['state']?></td>
          <td>
            <a href="<?=$view['data']['path'].'/editar/'.$value['id']?>" class="badge bg-info text-light">Editar</a>
            <a href="<?=$view['data']['path'].'/deletar/'.$value['id']?>" class="badge bg-danger text-light">Deletar</a>
          </td>
          
      </tr>
   <?php }?>
  </tbody>
</table>