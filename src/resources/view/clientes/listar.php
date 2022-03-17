<h4>Listagem de Clientes <a href="<?=$view['data']['path'].'/criar'?>"><span class="badge bg-primary">+</span></a></h4>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($view['data']['dados'] as $key => $value) { ?>
        <tr>
          <th scope="row"><?=$value['id']?></th>
          <td><?=$value['first_name']?></td>
          <td><?=$value['phone']?></td>
          <td><?=$value['email']?></td>

          <td>
            <a href="<?=$view['data']['path'].'/editar/'.$value['id']?>" class="badge bg-info text-light">Editar</a>
            <a href="<?=$view['data']['path'].'/deletar/'.$value['id']?>" class="badge bg-danger text-light">Deletar</a>
          </td>
          
      </tr>
   <?php }?>
  </tbody>
</table>