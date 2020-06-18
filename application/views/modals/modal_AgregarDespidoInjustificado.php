<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Agregar Grupo para Despido Injustificado</h3>

   <div class="row">
      <div class="col-sm-12">
                            
          <form id="form-insertarDI" method="POST">

              <div class="form-group form-group col-sm-12">
                  <label for="numero" align="center">Nombre  grupo</label>
                  <input type="text" class="form-control" placeholder="Nombre" name="nombre_grupo" aria-describedby="sizing-addon2">
              </div>

              <div class="form-group form-group col-sm-12">
                  <label for="puesto">Descripcion</label>
                  <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" aria-describedby="sizing-addon2">
              </div>

              <div class="form-group form-group col-sm-12">
                  <label for="departamento">Fecha de registro</label>
                  <input type="date" class="form-control" placeholder="Fecha registro" name="fecha" aria-describedby="sizing-addon2">
              </div>

              <div class="form-group form-group col-sm-12">
                  
                  <input type="hidden" class="form-control"  name="id_usuario" aria-describedby="sizing-addon2" value="<?php echo $userdata->id; ?>">
                  
              </div>

            <div class="form-group">
              <div class="col-md-12">
                  <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Enviar</button>
              </div>
            </div>
          </form>
      </div>
   </div>       

</div>