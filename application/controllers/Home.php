<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    
     
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session', 'form_validation', 'upload');
        //Do your magic here
    }

    public function index()
    {
        $data = array(
            'product' => $this->admin->get_table(),
            'masukBarang' => $this->admin->masukBarang(),
            'countMasuk' => $this->admin->countMasuk(),
            'keluarBarang' => $this->admin->keluarBarang(),
            'countKeluar' => $this->admin->countKeluar(),
            'report' => $this->admin->report()
			
        );
        
        
         if($this->admin->login())
        {

            $this->load->view("home",$data);

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
    }

    public function logout()
        {
            $this->session->sess_destroy();
            redirect('login');
        }

    public function listBarang(){
        $data = array(
            'product' => $this->admin->get_table()
        );
        
        $this->load->view('listBarang',$data);
    }

    public function barangMasuk(){
        $data = array(
            'masukBarang' => $this->admin->masukBarang()
        );

        $this->load->view('barangMasuk', $data);
    }

    public function barangKeluar(){
        $data = array(
            'barangKeluar' => $this->admin->keluarBarang()
        );
        $this->load->view('barangKeluar', $data);
    }

    public function report(){
        $data = array(
            'report' => $this->admin->report()
        );
        $this->load->view('report', $data);
    }

    public function dataKanban(){
     
        $this->load->view('dataKanban');
    }

    public function dataBarang(){

        $data = array(
            'product' => $this->admin->get_table()
            
			
        );

        $this->load->view('dataBarang',$data);
    }




    public function update_stock() {
        
        $data = array(
            'job_no' => 1,
			// 'stock_awal' => $this->input->post('stock')
        );
        // $this->db->insert('report', $dataReport);
        // $this->admin->dataIn();
		$this->db->update('product', $data);
        $this->db->where('job_no', $this->input->post('jobNo'));
        
        $barangMasuk = $this->admin->dataIn();
        echo json_encode($barangMasuk);
        $report = $this->admin->insertReport();
        echo json_encode($report);
    }

    public function delete_stock(){
        $data = array(
            'job_no' => 1,
            'stock_awal'=> $this->input->post('stock')
        );

        $this->db->update('product',$data);
        $this->db->where('job_no', $this->input->post('jobNo'));
        $report = $this->admin->dataOut();
        echo json_encode($report);

    }
    
    
    public function get_table() {
		$data['data'] = $this->admin->get_table()->result();
		$data['draw'] = 1;
		$data['recordsTotal'] = $this->admin->get_table()->num_rows();
		$data['filteredTotal'] = $this->admin->get_table()->num_rows();
		echo json_encode($data, JSON_PRETTY_PRINT);
    }
    
    // export csv 
    public function exportCSV(){
        //pemanggilan data third partynya atau library dari pihak ke 3 
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        //pemanggilan class
        $csv = new PHPExcel();

        //setting awal file excel
        $csv->getProperties()->setCreator('william')
                            ->setLastModifiedBy('Aski')
                            ->setTitle("Report ASKI")
                            ->setSubject("Barang")
                            ->setDescription("Laporan Report Semua Barang")
                            ->setKeywords("Data Report");

        // header tabke baris 1 
        $csv->setActiveSheetIndex(0)->setCellValue('A1','NO');
        $csv->setActiveSheetIndex(0)->setCellValue('B1','Job No');
        $csv->setActiveSheetIndex(0)->setCellValue('C1','Part No');
        $csv->setActiveSheetIndex(0)->setCellValue('D1','Type');
        $csv->setActiveSheetIndex(0)->setCellValue('E1','Stock Awal');
        $csv->setActiveSheetIndex(0)->setCellValue('F1','Stock In');
        $csv->setActiveSheetIndex(0)->setCellValue('G1','Stock Out');
        $csv->setActiveSheetIndex(0)->setCellValue('H1','Stock Akhir');
        $csv->setActiveSheetIndex(0)->setCellValue('I1','Tanggal');
        // $csv->setActiveSheetIndex(0)->setCellValue('J1','Keterangan');

        $report = $this->admin->onlyReport();
        
        //input data dari database ke excelnya
        $no = 1;
        $numrow = 2;
        foreach ($report as $r) {
            // if ($r->kategori == "1") {
            //     echo "Barang Masuk";
            // }else if($r->kategori == "2"){
            //     echo "Barang Keluar";
            // }
            
            $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $r->job_no);
            $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $r->part_no);
            $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $r->type);
            $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $r->stock_awal);
            $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $r->stock_in);
            $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $r->stock_out);
            $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $r->stock_akhir);
            $csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $r->created_at);
            // $csv->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $r->kategori);
            $no++;
            $numrow++;
        }

        //set kertas jadi landscape
        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        //set Judul file excel
        $csv->getActiveSheet(0)->setTitle('Report Data');
        $csv->setActiveSheetIndex(0);

        //proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Report.csv"');

        $write = new PHPExcel_Writer_CSV($csv);
        $write->save('php://output');

    }
    

    


}
