<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputStudent extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('header');
        $this->load->view('inputstudent');
        $this->load->view('footer');
    }

    public function upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['max_size']	= '100';

        $this->load->database();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->library('excel');
            $objPHPExcel = PHPExcel_IOFactory::load($data['upload_data']['full_path']);

            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

            $studentData = [];

            $classId = $this->input->post('classid');

            $query = $this->db->delete('studentList', array('classId' => $classId));
            /*
             * if (!$query->num_rows() > 0) {
        die("There are no posts in the database.");
    }
             */

            foreach($sheetData as $dt){
                var_dump($dt);
                if(!is_numeric($dt['A'])) continue;
                $studentData[] = ["classId" => $classId, "stdNo" => $dt['A'], "stdName" => $dt['B']];
            }

            $this->db->insert_batch("studentList", $studentData);
        }
    }

    public function load(){
        $this->load->database();
        $this->load->library('session');
        $classId = $this->input->post('classId');

        $query = $this->db->get_where("studentList", ["classId"=> $classId]);

        if($query->num_rows() > 0) {
            $this->session->set_userdata('classId', $classId);
            echo json_encode(["result" => 1]);
        } else {
            echo json_encode(["result" => 0]);
        }
    }
}
