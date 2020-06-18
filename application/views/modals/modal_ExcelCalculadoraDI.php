 <div class="col-md-12 well ">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 style="display:block; text-align:center;"><i class="fa fa-calculator"></i> Exportar a Excel Calculos del grupo <?php echo $DespidoInjustificado->nombre_grupo; ?> </h3>

    <div class="box box-body">
        <div id="app">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <form action="<?php echo base_url('DespidoInjustificado/exportByGroup');?>" method="post">
                        <div class="col-sm-12">
                            
                            <label id="id" class="invisible"><?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?></label>
                            <input type="hidden" name="idDI" id="idDI" value="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>">
                            <input type="hidden" name="nombreGrupo" id="nombreGrupo" value="<?php echo $DespidoInjustificado->nombre_grupo; ?>">
                        </div>

                            <div class="alert alert-info">
                                <p>Resultados de los cálculos que pertenecen al grupo <?php echo $DespidoInjustificado->nombre_grupo; ?></p>
                            </div>

                                <button type="submit" name="Exportar" value="Exportar Excel" class="btn btn-success">Exportar a Excel</button>
                            
                            </form>

                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="tabel-detail" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 100px;"># Empleados</i></th>
                                            <th>Puesto</th>
                                            <th style="width: 90px; text-align: center;">Departamento </th>
                                            <th style="width: 50px;">Salario Diario</th>
                                            <th style="text-align: center;">Fecha Inicial</th>
                                            <th style="text-align: center;">Fecha Termino</th>
                                            <th style="text-align: center;">Días Trabajados</th>
                                            <th style="text-align: center;">Indenmizacion Constitucional</th>
                                            <th style="text-align: center;">Aguinaldo</th>
                                            <th style="text-align: center;">Vacaciones</th>
                                            <th style="text-align: center;">Prima Vacacional</th>
                                            <th style="text-align: center;">Prima Antiguedad</th>
                                            <th style="text-align: center;">SubTotal</th>
                                            <th style="text-align: center;">...</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($dataDespidoInjustificado as $DespidoInjustificado) {
                                            ?>
                                            <tr>
                                                <td style="width: 60px;"><?php echo $DespidoInjustificado->numero_trabajadores; ?></td>
                                                <td style="width: 120px;"><?php echo $DespidoInjustificado->puesto; ?></td>
                                                <td style="width: 170px;"><?php echo $DespidoInjustificado->departamento; ?></td>
                                                <td style="width: 60px;"><?php echo $DespidoInjustificado->salario_diario; ?></td>
                                                <td style="width: 120px;"><?php echo $DespidoInjustificado->fecha_inicio; ?></td>
                                                <td style="width: 120px;"><?php echo $DespidoInjustificado->fecha_fin; ?></td>
                                                <td style="width: 120px;"><?php echo $DespidoInjustificado->dias_trabajados; ?></td>
                                                <td style="width: 60px;"><?php echo $DespidoInjustificado->indenmizacion_constitucional; ?></td>
                                                <td style="width: 60px;"><?php echo $DespidoInjustificado->aguinaldo; ?></td>
                                                <td style="width: 60px;"><?php echo $DespidoInjustificado->vacaciones; ?></td>
                                                <td style="width: 60px;"><?php echo $DespidoInjustificado->prima_vacacional; ?></td>
                                                <td style="width: 60px;"><?php echo $DespidoInjustificado->prima_antiguedad; ?></td>
                                                <td style="width: 100px;"><?php echo $DespidoInjustificado->total_registro; ?></td>
                                                <td class="text-center" style="min-width:50px;">
                                                    <button class="btn btn-danger detail-dataPosisi" data-id="<?php echo $DespidoInjustificado->id_registro_despido_injustificado; ?>"><i class="glyphicon glyphicon-delete">X</i></button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
