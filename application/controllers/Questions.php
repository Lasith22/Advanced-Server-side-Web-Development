<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Questions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['questions'] = $this->question_model->get_questions();
        $this->load->view('templates/header');
        $this->load->view('questions/index', $data);
        $this->load->view('templates/footer');
    }

    public function submit()
    {
        $this->form_validation->set_rules('question', 'Question', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $question = $this->input->post('question');
            $tags = $this->input->post('tags');

            $data = array(
                'question' => $question,
                'tags' => $tags
            );

            if ($this->question_model->submit_question($data)) {
                $this->session->set_flashdata('question_submitted', 'Your question has been submitted');
                redirect('questions');
            } else {
                $this->session->set_flashdata('submission_failed', 'Question submission failed, please try again');
                $this->index();
            }
        }
    }

    public function upvote($question_id)
    {
        $this->question_model->upvote_question($question_id);
        echo json_encode(array('status' => 'success'));
    }

    public function downvote($question_id)
    {
        $this->question_model->downvote_question($question_id);
        echo json_encode(array('status' => 'success'));
    }

    public function search()
    {
        $search_query = $this->input->get('query');
        $questions = $this->question_model->search_questions($search_query);

        header('Content-Type: application/json');
        echo json_encode($questions);
    }
}
