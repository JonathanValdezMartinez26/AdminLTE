<div>
        <div class="msg" style="display:none;">
          <?php echo @$this->session->flashdata('msg'); ?>
        </div>
        <div class="box">
          <div class="box-header">
            <div class="col-md-6" style="padding: 0;">
                <button class="form-control btn btn-primary" data-toggle="modal" data-target="#Modal-DespidoInjustificado"><i class="fa fa-plus"></i> Agregar Nuevo Cálculo</button>
            </div>
            <div class="col-md-3">
        <a href="<?php echo base_url('DespidoInjustificado/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Exportar a Excel</a>
    </div>
          </div>
          <!-- /.box-header -->
        <div class="table-responsive">
          <div class="box-body">
            <table id="list-data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 130px;">Nombre Grupo</th>
                  <th style="width: 240px;">Descripción</th>
                  <th style="width: 80px; text-align: center;">Añadir Cálculos</th>
                  <th style="width: 50px;">Fecha</th>
                  <th style="width: 50px; text-align: center;">Exportar</th>                  
                  <th style="width: 100px; text-align: center;">Acciones</th>
                </tr>
              </thead>
              <tbody id="data-DespidoInjustificado">

              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>

<?php echo $modal_AgregarDespidoInjustificado; ?>


<div id="tempat-modal"></div>

<?php show_my_confirm('Modal-confirmacion-eliminar-despido-injustificado', 'hapus-dataPegawai', '!Está acción no se podrá deshacer¡', 'Si, deseo eliminar el grupo'); ?>

