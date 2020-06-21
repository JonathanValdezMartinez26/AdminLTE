<?php
  foreach ($dataDespidoInjustificado as $DespidoInjustificado) {
    $id= $DespidoInjustificado->id_grupo_despido_injustificado;
    ?>
    <tr>
      <td style="max-width:30px;"><?php echo $DespidoInjustificado->nombre_grupo; ?></td>
      <td style="max-width:30px;"><?php echo $DespidoInjustificado->descripcion_grupo; ?></td>
        <td class="text-center" style="max-width:5px;">
            <button class="btn btn-warning calculadora-despidoinjustificado"  data-id="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>"><i class="fa fa-calculator"></i></button>
                        
        </td>
        <td style="max-width:20px;"><?php echo $DespidoInjustificado->fecha_registro; ?></td>
        
        <!--/////////Esto esta dentro del collspan de Exportar-->
        <td class="text-center" style="max-width:10px;">
          <form action="<?php echo base_url('DespidoInjustificado/exportByGroup');?>" method="post">
              <input type="hidden" name="idDI" id="idDI" value="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>">
              <input type="hidden" name="nombreGrupo" id="nombreGrupo" value="<?php echo $DespidoInjustificado->nombre_grupo; ?>">
            <button class="btn btn-success" type="submit" name="Exportar"><i class="fa fa-file-excel-o"></i></button>
            </form>
        </td>
        <td class="text-center" style="max-width:10px;">
          <form action="<?php echo base_url('DespidoInjustificado/PDF');?>" method="post">
            <input type="hidden" name="idDI" id="idDI" value="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>">
            <input type="hidden" name="nombreGrupo" id="nombreGrupo" value="<?php echo $DespidoInjustificado->nombre_grupo; ?>">
          <button class="btn btn-danger" type="submit" name="ExportarPdf"><i class="fa fa-file-pdf-o"></i></button>
        </form>
        </td>
        <!--//////////////////////////////-->

      <td class="text-center" style="min-width:15px;">
        <button class="btn btn-info detail-dataPosisi" data-id="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>"><i class="fa fa-pie-chart"></i> </button>        
        <!--<a href="<?php echo base_url('DespidoInjustificado/PDF'); ?>" target="_blank" id="imprimir_pdf" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>-->
        <button class="btn btn-danger confirmar-delete-despidoinjustificado" data-id="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>" data-toggle="modal" data-target="#Modal-confirmacion-eliminar-despido-injustificado"><i class="fa fa-trash"></i></button>

      </td>
    </tr>
    <?php
  }
?>