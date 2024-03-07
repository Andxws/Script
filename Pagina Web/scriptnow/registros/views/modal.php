<!-- Modal -->

<form action="">
<div class="modal fade" id="eliminarpersona" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          Usted desea Eliminar el registro? <?php echo $va["nombre"]; ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $va['id'] ?>">
        <input type="hidden" name="m" value="eliminar">

        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="btnEliminar">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

</form>