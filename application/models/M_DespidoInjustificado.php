<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DespidoInjustificado extends CI_Model {

	public function select_all() {
		$sql = "SELECT * FROM grupo_despido_injustificado";
		$data = $this->db->query($sql);
		return $data->result();
	}
    public function select_allParaExcel() {
        //$sql = "SELECT * FROM grupo_despido_injustificado";

        $sql="SELECT grupo_despido_injustificado.nombre_grupo AS nombre, grupo_despido_injustificado.descripcion_grupo AS descripcion, grupo_despido_injustificado.fecha_registro AS fecha, admin.nama AS nombreAdmin FROM grupo_despido_injustificado, admin WHERE grupo_despido_injustificado.id_usuario=admin.id";

        $data = $this->db->query($sql);
        return $data->result();
    }

    public function select_all2() {
        $sql = "SELECT * FROM despido_injustificado";
        $data = $this->db->query($sql);
        return $data->result();
    }
	///////////////////////////////////////////////////////////////////////////////////////////
    public function select_by_id($id) {
        $sql = "select * from grupo_despido_injustificado where id_grupo_despido_injustificado = '{$id}'";
        $data = $this->db->query($sql);
        return $data->row();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////
    public function select_by_grupo($id) {
        $sql = "select * from despido_injustificado where id_grupo_despido_injustificado = '{$id}'";
        $data = $this->db->query($sql);
        return $data->result();
    }
    /////////////////////////////////////////////////////////////////////////////
    public function insert($data) {
        /*$sql = "call Agregar_despido_injustificado('1','" .$data['numero_trabajadores'] ."','" .$data['puesto'] ."','" .$data['departamento'] ."','" .$data['salario_diario'] ."','" .$data['fecha_inicio'] ."','" .$data['fecha_fin'] ."')";*/

    $sql = "INSERT INTO grupo_despido_injustificado VALUES('','" .$data['nombre_grupo'] ."','" .$data['descripcion'] ."','" .$data['fecha'] ."','" .$data['id_usuario'] ."')";

        //$sql = "INSERT INTO test VALUES('','" .$data['nombre_grupo'] ."','" .$data['descripcion'] ."')";
        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    ////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
    public function insertCalculadoraDI($data) {
        //$sql = "call Agregar_despido_injustificado('83','2','aaa','Mantenemiento','200','2020-01-01','2020-07-01');";

        $sql = "call Agregar_despido_injustificado('".$data['id_grupo_despido_injustificado'] ."','" .$data['numero_trabajadores'] ."','" .$data['puesto'] ."','" .$data['departamento'] ."','" .$data['salario_diario'] ."','" .$data['fecha_inicio'] ."','" .$data['fecha_fin'] ."');";

        //$sql = "INSERT INTO test VALUES('','" .$data['numero_trabajadores'] ."')";

        /*$sql = "INSERT INTO test VALUES('','" .$data['numero_trabajadores'] ."','" .$data['puesto'] ."','" .$data['departamento'] ."','" .$data['salario_diario'] ."','" .$data['fecha_inicio'] ."','" .$data['fecha_fin'] ."')";*/
        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    ////////////////////////////////////////////////////////////////////////////
    public function delete($id) {
        //$sql="DELETE FROM grupo_despido_injustificado WHERE id_grupo_despido_injustificado='".$id."'";

        /*$sql="DELETE despido_injustificado,grupo_despido_injustificado FROM despido_injustificado INNER JOIN grupo_despido_injustificado ON grupo_despido_injustificado.id_grupo_despido_injustificado = despido_injustificado.id_grupo_despido_injustificado WHERE grupo_despido_injustificado.id_grupo_despido_injustificado='".$id."'"; */

        $sql="DELETE from despido_injustificado where id_grupo_despido_injustificado='".$id."'";

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function delete2($id) {
        //$sql="DELETE FROM grupo_despido_injustificado WHERE id_grupo_despido_injustificado='".$id."'";
        /*$sql="DELETE despido_injustificado,grupo_despido_injustificado FROM despido_injustificado INNER JOIN grupo_despido_injustificado ON grupo_despido_injustificado.id_grupo_despido_injustificado = despido_injustificado.id_grupo_despido_injustificado WHERE grupo_despido_injustificado.id_grupo_despido_injustificado='".$id."'"; */

        $sql="DELETE from grupo_despido_injustificado where id_grupo_despido_injustificado='".$id."'";
        
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    

}