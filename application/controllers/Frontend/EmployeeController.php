<?php
defined('BASEPATH') or exit('No direct script access allowed');


class EmployeeController extends CI_Controller
{



    public function index()
    {
        $this->load->view('template/header');
        $this->load->model('EmployeeModel');
        $data['employee'] = $this->EmployeeModel->getEmployee();
        $this->load->view('frontend/employee', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $this->load->view('template/header');
        $this->load->view('frontend/create');
        $this->load->view('template/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run()) {
            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
            ];
            $this->load->model('EmployeeModel', 'emp');
            $this->emp->insertEmployee($data);
            redirect(base_url('employee'));
        } else {
            $this->create();
            // redirect(base_url())
        }
    }
}
