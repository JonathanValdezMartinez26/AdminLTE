
<div class="col-md-12 well ">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 style="display:block; text-align:center;"><i class="fa fa-calculator"></i> Calculadora para Despido Injustificado </h3>

    <div class="box box-body">
        <div id="app">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Agregar Nuevo Cálculo</h4>
                            <div class="msg" style="display:none;">
                                    <?php echo @$this->session->flashdata('msg'); ?>
                                    </div>
                            <form id="form-insertarCDI" method="POST">

                                    <div class="form-group col-sm-3">
                                        <!--<input type="text" name="idDI" id="idDI" name="id_grupo_despido_injustificado" value="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>">-->

                                        <input type="hidden" class="form-control"  name="id_grupo_despido_injustificado" value="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>">

                                        <label for="numero">Número de Trabajadores*</label>
                                        <input type="number" class="form-control" placeholder="Numero" name="numero_trabajadores" aria-describedby="sizing-addon2" >
                                    </div>
                                   <div class="form-group col-sm-3">
                                        <label for="puesto">Puesto*</label>
                                        <input type="text" class="form-control" placeholder="Puesto" name="puesto" aria-describedby="sizing-addon2">
                                    </div>

                                <div class="form-group col-sm-3">
                                    <label for="departamento">Departamento*</label>
                                    <input type="text" class="form-control" placeholder="Departamento" name="departamento" aria-describedby="sizing-addon2">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="salario">Salario Diario*</label>
                                    <input type="number" class="form-control" placeholder="Salario" name="salario_diario" aria-describedby="sizing-addon2">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="fecha_inicio">Fecha Inicio*</label>
                                    <input type="date" class="form-control" placeholder="Fecha Inicio" name="fecha_inicio" aria-describedby="sizing-addon2">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="fecha_fin">Fecha Fin*</label>
                                    <input type="date" class="form-control" placeholder="Fecha Fin" name="fecha_fin" aria-describedby="sizing-addon2">
                                </div>

                                <div class="form-group col-sm-3">

                                <br>
                                        <button type="submit" class="btn btn-success actualizarCDI" data-id="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>"> <i class="glyphicon glyphicon-ok"></i> Enviar</button>


                                </div>
                            </form>
                            <label id="id" class="invisible"><?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?></label>
                        </div>



                        
                            <form action="<?php echo base_url('DespidoInjustificado/exportByGroup');?>" method="post" id="ExcelDI">
                            
                                <label id="id" class="invisible"><?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?></label>
                            <input type="hidden" name="idDI" id="idDI" value="<?php echo $DespidoInjustificado->id_grupo_despido_injustificado; ?>">
                            <input type="hidden" name="nombreGrupo" id="nombreGrupo" value="<?php echo $DespidoInjustificado->nombre_grupo; ?>">

                            <div class="box-body">
                                <h4>Cálculos en el Grupo</h4>
                                <div class="alert alert-info">
                                    <p>Añada todos los cálculos que pertenezcan al grupo para visualizar el total.</p>
                                    

                                </div>
                                <button type="submit" name="Exportar" value="Exportar Excel" class="btn btn-success">Exportar a Excel</button>
                            </div>
                          <div class="box-body">
                            </form>
                                <div class="table-responsive">
                                    <table id="tabel-detail" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 100px;"># Empleados</th>
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
                                    <tbody id="data-DespidoInjustificadoCalculadora">
                                        
                                           
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
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
