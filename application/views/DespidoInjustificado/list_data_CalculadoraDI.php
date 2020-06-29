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
                                        