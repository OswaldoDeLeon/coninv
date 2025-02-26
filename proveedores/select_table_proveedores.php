<?php

                $query = "SELECT * FROM proveedores";
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()){
            ?>

            <tr>
                <!-- Pendiente para asignar variables -->
                <td><?php echo $row['id_proveedor']; ?></td>
                <td><?php echo $row['nombre_proveedor']; ?></td>
                <td><?php echo $row['telefono_proveedor']; ?></td>
                <td><?php echo $row['direccion_proveedor']; ?></td>
           
                <td>
                    <a href="proveedores/update_proveedor.php?id=<?php echo $row['id_proveedor']; ?>" class="btn btn-warning">Modificar</a>
                    <a href="proveedores/delete_proveedor.php?id=<?php echo $row['id_proveedor']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
          
            <?php } ?>










<div class="modal fade" id="update_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update_usuarios.php?id=<?php echo $id; ?>" method="POST">

                                        <div class="mb-3">
                                        <label for="name">Correo electrònico</label>
                                        <input type="email" name="email" class="form-control" require>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password">Contraseña</label>
                                        <input type="text" name="password" class="form-control" require>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone">Teléfono</label>
                                        <input type="number" name="phone" class="form-control" require>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                                </form>
    </div>
  </div>
</div>

            