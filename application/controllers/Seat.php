<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat extends CI_Controller {

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
        $this->load->library('session');
        $this->load->database();

        $classId = $this->session->userdata("classId");

        $seatData = [];

        if($classId != ""){
            $query = $this->db->order_by('seatNo', 'ASC')->get_where("studentList", ["classId"=> $classId]);

            foreach($query->result() as $row){
                $seatData[] = ["stdNo" => $row->stdNo, "stdName" => $row->stdName];
            }
        }

        $data['seatData'] = $seatData;
        $data['classId'] = $classId;

        $this->load->view('header');
        $this->load->view('seat', $data);
        $this->load->view('footer');
    }

    public function save(){
        $this->load->library('session');
        $this->load->database();

        $classId = $this->session->userdata("classId");
        if($classId) {
            $something = $this->input->post('seatData', TRUE);

            $data = [];

            for($i=0;$i<count($something);$i++) {
                $this->db->update('studentList', array('seatNo' => $something[$i][0]), array('stdNo' => $something[$i][1]));
            }

            echo json_encode(["result" => 1]);
        } else {

        }
    }

    public function image(){
        $src = $this->input->post('src', TRUE);
        header('Content-Type: image/png');
        header('Content-Disposition: inline; filename="자리표.png"');
        header('Content-Length: '.count($src));
        echo $src;
    }
}