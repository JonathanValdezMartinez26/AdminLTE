<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once './assets/fpdf/fpdf.php';

class DespidoInjustificado extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_DespidoInjustificado');
	}

    public function index() {
        $data['userdata'] 	= $this->userdata;
        $id=1;
        $data['dataDespidoInjustificado'] = $this->M_DespidoInjustificado->select_by_user($id);

        $data['page'] 		= "DespidoInjustificado";
        $data['titulo'] 		= "Despido Injustificado";
        $data['descripcion'] 	= "Calculadora";
    ////en la linea de abajo modals/aqui va el nombre del modal que esta en home
        $data['modal_AgregarDespidoInjustificado'] = show_my_modal('modals/modal_AgregarDespidoInjustificado', 'Modal-DespidoInjustificado', $data);

        $this->template->views('DespidoInjustificado/home', $data);
    }
	//////////////////////////////////////////////////////////////////////////////
    public function llenar()
    {
        $data['dataDespidoInjustificado'] = $this->M_DespidoInjustificado->select_all();
        $this->load->view('DespidoInjustificado/list_data', $data);
    }
    /////////////////////////////////////////////////////////////////////////////
    public function llenarPorGrupo()
    {
        $data['userdata']   = $this->userdata;

        $id = trim($_POST['id']);
        $data['dataDespidoInjustificado'] = $this->M_DespidoInjustificado->select_by_grupo($id);
        $this->load->view('DespidoInjustificado/list_data_CalculadoraDI', $data);
    }
    /////////////////////////////////////////////////////////////////////////////
    public function calculadora() {
        $data['userdata'] 	= $this->userdata;

        $id = trim($_POST['id']);

        $data['DespidoInjustificado'] = $this->M_DespidoInjustificado->select_by_id($id);//sirve para poner en el titulo
        $data['dataDespidoInjustificado'] = $this->M_DespidoInjustificado->select_by_grupo($id);

        //calculadora-despidoinjustificado viene del ajax punto 1.6
        //modals/modal_CalculadoraDI es el nombre de la carpeta mas el nombre dle modal
        echo show_my_modal('modals/modal_CalculadoraDI', 'calculadora-despidoinjustificado', $data, 'lg');
        //$this->load->view('DespidoInjustificado/list_data_Calculadora', $data);
    }
    /////////////////////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////////////////////
    public function calculadoraExcelDI() {///////pARA MODAL DE EXPORTAR EXCEL POR GRUPO
        $data['userdata']   = $this->userdata;

        $id = trim($_POST['id']);
        $data['DespidoInjustificado'] = $this->M_DespidoInjustificado->select_by_id($id);//sirve para poner en el titulo
        $data['dataDespidoInjustificado'] = $this->M_DespidoInjustificado->select_by_grupo($id);

        //calculadora-despidoinjustificado viene del ajax punto 1.6
        //modals/modal_CalculadoraDI es el nombre de la carpeta mas el nombre dle modal
        echo show_my_modal('modals/modal_ExcelCalculadoraDI', 'excel-calculadora-despidoinjustificado', $data, 'lg');
    }
    /////////////////////////////////////////////////////////////////////////////
    public function insertarDespidoInjustificado()
    {
        $this->form_validation->set_rules('nombre_grupo', 'DespidoInjustificado', 'trim|required');///nombre del la caja de texto del modal
        /*$this->form_validation->set_rules('descripcion', 'Kota', 'trim|required');
        $this->form_validation->set_rules('fecha', 'Kota', 'trim|required');
        $this->form_validation->set_rules('id_usuario', 'Kota', 'trim|required');*/
        

        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_DespidoInjustificado->insert($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Grupo añadido', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Ocurrio un error al añadir', '20px');
            }

        }else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }
    /////////////////////////////////////////////////////////////////////////////
    public function insertarDIC()
    {
        $this->form_validation->set_rules('numero_trabajadores', 'DespidoInjustificado', 'trim|required');
        ///nombre del la caja de texto del modal
        /*$this->form_validation->set_rules('descripcion', 'DespidoInjustificado', 'trim|required');
        $this->form_validation->set_rules('fecha', 'Kota', 'trim|required');
        $this->form_validation->set_rules('id_usuario', 'Kota', 'trim|required');*/
        

        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_DespidoInjustificado->insertCalculadoraDI($data);

            if ($result >= 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Calculo agregado', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Ocurrio un error al añadir', '20px');
            }

        }else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }
    /////////////////////////////////////////////////////////////////////////////

    public function eliminarGrupoDI() {
        $id = $_POST['id'];
        $resultado = $this->M_DespidoInjustificado->delete($id);
        $resultado2 = $this->M_DespidoInjustificado->delete2($id);

        if ($resultado > 0 || $resultado2 > 0) {
            echo show_succ_msg('Datos eliminados', '20px');
        } else {
            echo show_err_msg('Los datos no se han eliminado', '20px');
        }
    }

    public function export() {
        error_reporting(E_ALL);
    
        include_once './assets/phpexcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->M_DespidoInjustificado->select_allParaExcel();

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 
        $rowCount = 2; 
        $rowCount2 = 1; 

        $objPHPExcel->getActiveSheet()->getStyle("A2:D2")->getFont()->setBold(true);
          for ($col = 'A'; $col != 'Z'; $col++) { 
        $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}

//////Centrar        
    $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    //////Bordes
        $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getBorders()->getAllBorders()->
        setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
    //////////////Para el titulo
        $objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true)->setName('Verdana')->setSize(14)->getColor()->setRGB('6F6F6F');

        //$this->excel->getActiveSheet()->setTitle('test worksheet');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount2, "Calculos para Despidos Injustificados");
        //$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "Nombre de Grupo");        
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Descripcíon");
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Fecha de Registro");

        //$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "ID Usuario");

        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Usuario");

        $rowCount++;

        foreach($data as $value){
            $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':M'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_grupo_despido_injustificado); 

           /* $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->nombre_grupo); 
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $value->descripcion_grupo);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->fecha_registro); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_usuario);   */          
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->nombre); 
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $value->descripcion);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->fecha); 
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->nombreAdmin);
            $rowCount++; 
        } 

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save('./assets/excel/Grupos Despido Injustificado.xlsx'); 

        $this->load->helper('download');
        force_download('./assets/excel/Grupos Despido Injustificado.xlsx', NULL);
    }

    public function exportByGroup() {
        error_reporting(E_ALL);
    
        include_once './assets/phpexcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        if (isset($_POST['Exportar'])){ 

            $id=$_POST['idDI'];
            $nombre=$_POST['nombreGrupo'];
        //$id="56";
        //$data = $this->M_DespidoInjustificado->select_all2();
        $data = $this->M_DespidoInjustificado->select_by_grupo($id);

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 
        $rowCount = 2; 
        $rowCount2 = 1; 
        $col=2;
    ///////Negritta
        $objPHPExcel->getActiveSheet()->getStyle("A2:O2")->getFont()->setBold(true);
          for ($col = 'A'; $col != 'Z'; $col++) { 
        $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}
    //////Centrar        
    $objPHPExcel->getActiveSheet()->getStyle('A2:M2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    //////Bordes
        $objPHPExcel->getActiveSheet()->getStyle('A2:M2')->getBorders()->getAllBorders()->
        setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
    //////////////Para el titulo
        $objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true)->setName('Verdana')->setSize(14)->getColor()->setRGB('6F6F6F');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount2, "Calculos para grupo ".$nombre);
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "# Trabajadores");
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Puesto");
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Departamento");
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Salario Diario");
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Fecha Inicio");
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Fecha Final");
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Dias Trabajados");
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Indemnizacion");
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "Aguinaldo");
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "Vacaciones");
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, "Prima Vacacional");
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, "Prima Antiguedad");
        $objPHPExcel->getActiveSheet()->getStyle('M'.$rowCount)->getFont()->setBold(true)->setSize(10)->getColor()->setRGB('37D122');
        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, "Total");
        $rowCount++;

        foreach($data as $value){
            //////Centrar        
    $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':M'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $value->numero_trabajadores);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->puesto); 
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->departamento);             
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->salario_diario);             
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->fecha_inicio);             
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->fecha_fin);             
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->dias_trabajados);             
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->indenmizacion_constitucional);             
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->aguinaldo);             
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->vacaciones);             
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $value->prima_vacacional);             
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $value->prima_antiguedad);
            $objPHPExcel->getActiveSheet()->getStyle('M'.$rowCount)->getFont()->setBold(true)->setSize(10)->getColor()->setRGB('37D122');             
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $value->total_registro);             
            $rowCount++; 
        } 

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save('./assets/excel/Despidos Injustificados grupo '.$nombre.'.xlsx'); 

        $this->load->helper('download');
        force_download('./assets/excel/Despidos Injustificados grupo '.$nombre.'.xlsx', NULL);
        }
    }

    public function exportListaDI() {
        error_reporting(E_ALL);
    
        include_once './assets/phpexcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $data = $this->M_DespidoInjustificado->select_by_grupo($id);

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 
        $rowCount = 1; 

        //$this->excel->getActiveSheet()->setTitle('test worksheet');
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nombre de Grupo");        
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Descripcíon");
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Fecha de Registro");
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "ID Usuario");
        $rowCount++;

        foreach($data as $value){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_grupo_despido_injustificado); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nombre_grupo); 
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCount, $value->descripcion_grupo);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->fecha_registro); 
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->id_usuario);             
            $rowCount++; 
        } 

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save('./assets/excel/Grupos Despido Injustificado.xlsx'); 

        $this->load->helper('download');
        force_download('./assets/excel/Grupos Despido Injustificado.xlsx', NULL);
    }
    ///////////////////////////////////////////////////////////////////////////////////////
    public function print_pdf()
    {
        $datos=$this->M_DespidoInjustificado->select_all();
        return $datos;
    }
    ////////////////////////////////////////////////////////////
    public function PDF()
    {
        $pdf = new PDF();
        if (isset($_POST['ExportarPdf'])){ 
            $id=$_POST['idDI'];
            $nombre=$_POST['nombreGrupo'];
            $data = $this->M_DespidoInjustificado->select_by_grupo($id);
        
        $pdf->AliasNbPages();
        $pdf->AddPage('L','A4','0');/////Para hacer horizontal la pagina
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,10,utf8_decode('Calculos para grupo '.$nombre),1,0,'C');
        //$pdf->Ln(20);
        
      ///////////////////////Cabecera  
        ////Cell(ancho,alto,text,bordes,?,alineacion,colorear,link)
       $pdf->SetY(30);
        $pdf->SetFont('Arial','B',7);
      $pdf->Cell(21,5,"# Trabajadores",1,'','C','','');
      $pdf->Cell(40,5,"Puesto",1,'','C','','');
      $pdf->Cell(40,5,"Departamento",1,'','C','','');
      $pdf->Cell(20,5,"Salario Diario",1,'','C','','');
      $pdf->Cell(16,5,"F. Inicio",1,'','C','','');
      $pdf->Cell(16,5,"F. Final",1,'','C','','');
      $pdf->Cell(20,5,"D. Trabajados",1,'','C','','');
      $pdf->Cell(21,5,"Indemnizacion",1,'','C','','');
      $pdf->Cell(15,5,"Aguinaldo",1,'','C','','');
      $pdf->Cell(17,5,"Vacaciones",1,'','C','','');
      $pdf->Cell(19,5,"P. Vacacional",1,'','C','','');
      $pdf->Cell(19,5,"P. Antiguedad",1,'','C','','');
      $pdf->Cell(13,5,"SubTotal",1,'','C','','');
      $pdf->Ln();
    ////////////////////////////////////
      foreach($data as $value){
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(21,5,$value->numero_trabajadores,1,'','C','','');
        $pdf->Cell(40,5,$value->puesto,1,'','C','','');
        $pdf->Cell(40,5,$value->departamento,1,'','C','','');
        $pdf->Cell(20,5,$value->salario_diario,1,'','C','','');
        $pdf->Cell(16,5,$value->fecha_inicio,1,'','C','','');
        $pdf->Cell(16,5,$value->fecha_fin,1,'','C','','');
        $pdf->Cell(20,5,$value->dias_trabajados,1,'','C','','');
        $pdf->Cell(21,5,$value->indenmizacion_constitucional,1,'','C','','');
        $pdf->Cell(15,5,$value->aguinaldo,1,'','C','','');
        $pdf->Cell(17,5,$value->vacaciones,1,'','C','','');
        $pdf->Cell(19,5,$value->prima_vacacional,1,'','C','','');
        $pdf->Cell(19,5,$value->prima_antiguedad,1,'','C','','');
        $pdf->Cell(13,5,$value->total_registro,1,'','C','','');
        $pdf->Ln();
      }
        $pdf->ln();
        $pdf->Output('I','Calculos '.$nombre.'.pdf',true);
        //////////
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////
}

class PDF extends FPDF
{
    function Header()
    {
        /*$this->SetFont('Arial','B',15);
        $this->Cell(0,10,utf8_decode('Este header se muestra en cada página generada'),1,0,'C');
        $this->Ln(20);*/
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Copyright © 2020 Erlan. All rights reserved.'),1,0,'C');
        $this->Cell(-15,10,utf8_decode('Página ') . $this->PageNo(),0,0,'C');
    }
    function TablaBasica($header)
   {
    //Cabecera
    foreach($header as $col)
    $this->Cell(40,7,$col,1);
    $this->Ln();
      $this->Cell(40,5,"hola",1);
      $this->Cell(40,5,"hola2",1);
      $this->Cell(40,5,"hola3",1);
      $this->Cell(40,5,"hola4",1);
      $this->Ln();
      $this->Cell(40,5,"linea ",1);
      $this->Cell(40,5,"linea 2",1);
      $this->Cell(40,5,"linea 3",1);
      $this->Cell(40,5,"linea 4",1);
   } 
}