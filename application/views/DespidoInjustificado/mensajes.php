  										<?php foreach ($dataDespidoInjustificado1 as $DespidoInjustificado1) {
                                        $total=$DespidoInjustificado1->total;
                                    }
                                     foreach ($dataDespidoInjustificado2 as $DespidoInjustificado2) {
                                        $totalDias=$DespidoInjustificado2->dias;
                                    }?>
                                <div class="alert alert-info">
                                    <h5><p align="right"> EL TOTAL DE DIAS TRABAJADOS ES: <?php echo $totalDias?>  &nbsp;&nbsp;&nbsp;&nbsp; El TOTAL DEL GRUPO ES: <?php                                    
                                    echo $total;
                                        ?>
                                    </p></h5>
                                    </div>