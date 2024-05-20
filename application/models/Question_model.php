<?php
class Question_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_questions()
    {
        $query = $this->db->get('questions');
        return $query->result_array();
    }

    public function submit_question($data)
    {
        return $this->db->insert('questions', $data);
    }

    public function upvote_question($question_id)
    {
        $this->db->set('upvotes', 'upvotes+1', FALSE);
        $this->db->where('id', $question_id);
        return $this->db->update('questions');
    }

    public function downvote_question($question_id)
    {
        $this->db->set('downvotes', 'downvotes+1', FALSE);
        $this->db->where('id', $question_id);
        return $this->db->update('questions');
    }

    public function search_questions($query)
    {
        $this->db->like('question', $query);
        $query = $this->db->get('questions');
        return $query->result_array();
    }

    public function get_question_by_id($id)
    {
        $query = $this->db->get_where('questions', array('id' => $id));
        return $query->row_array();
    }
}
