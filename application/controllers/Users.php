<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->user_model->get_user_by_email($email);

            if ($user && $password === $user['password']) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('questions');
            } else {
                $this->session->set_flashdata('login_failed', 'Invalid email or password');
                redirect('users/login');
            }
        }
    }

    public function register()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            $this->user_model->register($data);
            redirect('users/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('users/login');
    }
}
