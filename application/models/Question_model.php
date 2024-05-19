<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Question_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function submit_question($data)
    {
        return $this->db->insert('questions', $data);
    }

    public function get_questions()
    {
        $query = $this->db->get('questions');
        return $query->result_array();
    }

    public function get_question_by_id($question_id)
    {
        $query = $this->db->get_where('questions', array('id' => $question_id));
        return $query->row_array();
    }

    public function upvote_question($question_id)
    {
        $this->db->set('upvotes', 'upvotes+1', FALSE);
        $this->db->where('id', $question_id);
        $this->db->update('questions');
    }

    public function downvote_question($question_id)
    {
        $this->db->set('downvotes', 'downvotes+1', FALSE);
        $this->db->where('id', $question_id);
        $this->db->update('questions');
    }
}
