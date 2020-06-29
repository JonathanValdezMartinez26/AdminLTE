<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilPegawai();
		tampilPosisi();
		tampilKota();
        llenarDespidoInjustificado();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilPegawai() {
		$.get('<?php echo base_url('Pegawai/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pegawai').html(data);
			refresh();
		});
	}

	var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPegawai", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pegawai').modal('show');
		})
	})

	$('#form-tambah-pegawai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pegawai").reset();
				$('#tambah-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pegawai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pegawai").reset();
				$('#update-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kota').modal('show');
		})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kota").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kota', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Posisi
	function tampilPosisi() {
		$.get('<?php echo base_url('Posisi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPosisi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-posisi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-posisi').modal('show');
		})
	})

	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posisi").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-posisi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-posisi").reset();
				$('#update-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

    ////////////////////////////////////////////////////////////////////////////////////
    function llenarDespidoInjustificado() {
        $.get('<?php echo base_url('DespidoInjustificado/llenar'); ?>',
         function(data) {
            MyTable.fnDestroy();
            $('#data-DespidoInjustificado').html(data);
            refresh();
        });
    }
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    function llenarDespidoInjustificadoC() {
        $.get('<?php echo base_url('DespidoInjustificado/llenarPorGrupo'); ?>', function(data) {
            MyTable.fnDestroy();
            $('#data-DespidoInjustificadoCalculadora').html(data);
            refresh();
        });
    }
    ////////////////////////////////////////////////////////////////////////////////////


    $(document).on("click", ".calculadora-despidoinjustificado", function() {
        var id = $(this).attr("data-id");

        $.ajax({
            method: "POST",
            //DespidoInjustificadfo es el nombre de la Carpeta en donde esta el modal
            //calculadora es el nombre del metodo que esta en el controlador DespidoInjustificado
            url: "<?php echo base_url('DespidoInjustificado/calculadora'); ?>",
            data: "id=" +id
        })
            .done(function(data) {
                $('#tempat-modal').html(data);
                $('#tabel-detail').dataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                //1.6 calculadora-despidoinjustificado es el nombre que ocupa en el echo show_my_modal del controlador como 2 parametro
                //llenarDespidoInjustificadoC();
                $('#calculadora-despidoinjustificado').modal('show');
                //llenarDespidoInjustificadoCalculadora();
            })
    })
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    $(document).on("click", ".excel-calculadora-despidoinjustificado", function() {
        var id = $(this).attr("data-id");

        $.ajax({
            method: "POST",
            //DespidoInjustificadfo es el nombre de la Carpeta en donde esta el modal
            //calculadora es el nombre del metodo que esta en el controlador DespidoInjustificado

            url: "<?php echo base_url('DespidoInjustificado/exportListaDI'); ?>",
            data: "id=" +id
        })
            .done(function(data) {
                $('#tempat-modal').html(data);
                $('#tabel-detail').dataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                //1.6 calculadora-despidoinjustificado es el nombre que ocupa en el echo show_my_modal del controlador como 2 parametro
                //  $('#excel-calculadora-despidoinjustificado').modal('show');
            })
    })
    ////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////Exportar a pdf
    $(document).on("click", ".exportarPdf", function() {
        var id = $(this).attr("data-id");

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('DespidoInjustificado/PDF'); ?>",
            data: "id=" +id
        })
            .done(function(data) {
                //$('#tempat-modal').html(data);
                //1.6 calculadora-despidoinjustificado es el nombre que ocupa en el echo show_my_modal del controlador como 2 parametro
                //  $('#excel-calculadora-despidoinjustificado').modal('show');

            })
    })
    ////////////////////////////////////////////////////////////////////////////////////


    $(document).on("click", ".calculadora-NuevaContratacion", function() {
        var id = $(this).attr("data-id");

        $.ajax({
            method: "POST",
            //DespidoInjustificadfo es el nombre de la Carpeta en donde esta el modal
            //calculadora es el nombre del metodo que esta en el controlador DespidoInjustificado
            url: "<?php echo base_url('NuevaContratacion/calculadora'); ?>",
            data: "id=" +id

        })
            .done(function(data) {
                $('#tempat-modal').html(data);
                $('#tabel-detail').dataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
                //1.6 calculadora-despidoinjustificado es el nombre que ocupa en el echo show_my_modal del controlador como 2 parametro
                $('#calculadora-NuevaContratacion').modal('show');
            })
    })
    //////////////////////////////////////////////////////7
    $(document).on("click", ".enviarId", function() {
    	alert("!!!Calculo Agregado!!!");
        
    })
    //////////////////////////////////////////////////////////////////////////////////// es dos
    var id_despidoinjustificado;
    $(document).on("click", ".confirmar-delete-despidoinjustificado", function() {
        id_despidoinjustificado = $(this).attr("data-id");
    })
    $(document).on("click", ".hapus-dataPegawai", function() {
        var id = id_despidoinjustificado;

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('DespidoInjustificado/eliminarGrupoDI'); ?>",
            data: "id=" +id
        })
            .done(function(data) {
                $('#Modal-confirmacion-eliminar-despido-injustificado').modal('hide');
                llenarDespidoInjustificado();
                $('.msg').html(data);
                effect_msg();
            })
    })
    /////////////////////////////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////////////////////////////
    var idCDI;
     $(document).on("click", ".actualizarCDI", function() {
        idCDI = $(this).attr("data-id");
     
    
    })

	//////////////////////////////////////////////////////////Agregar Grupo despido injustificado
	$(document).on('submit', '#form-insertarCDI', function(e){//////////formulario del modal CalculadoraDI
		var data = $(this).serialize();
         var id = idCDI;

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('DespidoInjustificado/insertarDIC'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);
			//tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-insertarCDI").reset();
                //$('#data-DespidoInjustificadoCalculadora').html(data);
				/*MyTable.fnDestroy();
               $('#data-DespidoInjustificadoCalculadora').html(data);
               refresh();*/
               
				//$('#calculadora-despidoinjustificado').modal('hide');
				//llenarDespidoInjustificadoC();
                 $.ajax({
                        method: "POST",
                        url: "<?php echo base_url('DespidoInjustificado/llenarPorGrupo'); ?>",
                        data: "id=" +idCDI
                        })
                        .done(function(data) {
                            //$('#tempat-modal').html(data);
                            //$('#update-pegawai').modal('show');
                            //MyTable.fnDestroy();
                            $('#data-DespidoInjustificadoCalculadora').html(data);
                            //refresh();
                            ///MyTable.fnDestroy();
            
                                            })
                        /////////////////////////mostrar mensaje
						       $.ajax({
						            method: "POST",
						            url: "<?php echo base_url('DespidoInjustificado/mostrarTotal'); ?>",
						            data: "id=" +idCDI
						        })
						            .done(function(data) {
						               $('#data-MensajesDI').html(data);
						              
						            })				
			}
		})
       
		e.preventDefault();
	});

    //////////////////////////////////////////////////////////Agregar Grupo despido injustificado
    $('#form-insertarDI').submit(function(e) {//////////formulario del modalAgregarDespidoInjustificado
        var data = $(this).serialize();

        $.ajax({
            method: 'POST',
            url: '<?php echo base_url('DespidoInjustificado/insertarDespidoInjustificado'); ?>',
            data: data
        })
            .done(function(data) {
                //$('#Modal-confirmacion-eliminar-despido-injustificado').modal('hide');
                //$('#form-insertarDI').modal('hide');
                //document.getElementById("form-insertarDI").hide();
                var out = jQuery.parseJSON(data);

                //tampilPosisi();
                if (out.status == 'form') {
                    $('.form-msg').html(out.msg);
                    effect_msg_form();
                } else {
                    document.getElementById("form-insertarDI").reset();
                    $('#Modal-DespidoInjustificado').modal('hide');
                    $('.msg').html(out.msg);
                    effect_msg();
                    llenarDespidoInjustificado();
                }
            })

        e.preventDefault();
    });
    ////////////////////////////////////////////////////////////////////////////////////////////




</script>