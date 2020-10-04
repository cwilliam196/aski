<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

    function login(){
        return $this->session->userdata('admin_id');
    }

    function check_login($table, $field1, $field2){

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get_where();
        if ($query->num_rows() == 0 )  {
            return FALSE;
        } else {
            return $query->result();
        }

    }

    function get_table() {
		
		$this->db->select('*') 
		->from('product');
		$result = $this->db->get();
		return $result->result_array();
    }
    
    function countProduct(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->like('stock_awal');
        echo $this->db->count_all_results();
        // return $this->db->count_all('product');
    }

    function tampilBarang(){
        return $this->db->get('product');
    }

    function masukBarang(){
        $this->db->select('*') 
		->from('data_in');
		$result = $this->db->get();
		return $result->result_array();
        // return $this->db->get('data_in');
    }

    function countMasuk(){
        // $this->db->where('EmpID >=', 5);
        $this->db->select_sum('stock_in');
        $query = $this->db->get('data_in');
        // return $query;
        if($query->num_rows()>0)
        {
            return $query->row()->stock_in;
        }
        else
        {
            return 0;
        }
      
    }

    function keluarBarang(){
        $this->db->select('*') 
		->from('data_out');
		$result = $this->db->get();
		return $result->result_array();
        // return $this->db->get('data_out');
    }

    function countKeluar(){
        $this->db->select_sum('stock_out');
        $query = $this->db->get('data_out');
        // return $query;
        if($query->num_rows()>0)
        {
            return $query->row()->stock_out;
        }
        else
        {
            return 0;
        }
    }

    function report(){
        $this->db->select('*') 
		->from('report');
		$result = $this->db->get();
		return $result->result_array();
        // return $this->db->get('report');
    }

    function onlyReport(){
        return $this->db->get('report')->result();
    }

    function insertReport(){
        
        $dataReport = array(
            'kategori' => 1,
            'material_no' => 3,
            'job_no' => 1,
            'type' => "QB4MRR-GOUT21OR05",
            'part_no' => "MRR ASSY OUTER LHD 87910-BZB80-D1 RH",
            'quantity' => "karton",
            
            'stock_in' => $this->input->post('stock'),
            'stock_akhir' => $this->input->post('stock')
        );
        $result = $this->db->insert('report',$dataReport);
        return $result;
        // $this->db->insert('report', $result);
    }

    function dataIn(){
        
        $dataMasuk = array(
            'material_no' => 3,
            'job_no' => 1,
            'type' => "QB4MRR-GOUT21OR05",
            'part_no' => "MRR ASSY OUTER LHD 87910-BZB80-D1 RH",
            'quantity' => "box",

            'stock_in' => $this->input->post('stock')
        );

        $result = $this->db->insert('data_in', $dataMasuk);
        return $result;
    }

    function dataOut(){
        
        $dataReport = array(
            'material_no' => 3,
            'job_no' => 1,
            'type' => "QB4MRR-GOUT21OR05",
            'part_no' => "MRR ASSY OUTER LHD 87910-BZB80-D1 RH",
            'quantity' => "box",
            
            'stock_out' => $this->input->post('stock')
            // 'stock_akhir' => $this->input->post('stock')
        );
        
        $result = $this->db->insert('data_out',$dataReport);
        return $result;
        // $this->db->insert('report', $result);
    }
    
    function getReportData(){

        // $response = array();

        // //select record
        // $this->db->select('job_no, material_no, type, stock_awal, stock_in, stock_out, stock_akhir,created_at');
        // $q = $this->db->get('report');
        // $response = $q->result_array();

        // return $response;


    }
    
}
