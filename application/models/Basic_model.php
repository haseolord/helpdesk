<?php
class Basic_model extends CI_Model {
	function get_count($table) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get()->num_rows();
    }


    function select_where_in($table, $kolom, $array){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where_in($kolom, $array);
        return $this->db->get();
    }

    function select_all($table) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $data = $this->db->get();
        return $data->result();
    }

    function select_where($table, $column, $where) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $where);
        $data = $this->db->get();
        return $data;
    }

    function select_where_not($table, $column, $where, $column_not, $where_not) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $where);
        $this->db->where_not_in($column_not, $where_not);
        $data = $this->db->get();
        return $data;
    }

    function select_where_array($table, $where) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $data = $this->db->get();
        return $data;
    }

    function select_where_array_in($table, $where, $column, $data) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->where_in($column, $data);
        $data = $this->db->get();
        return $data;
    }

    function select_where_array_not_in($table, $where, $column, $data) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->where_not_in($column, $data);
        $data = $this->db->get();
        return $data;
    }



    function select_where_array_in2($table, $where,$table2,$where2, $column, $data) {
       $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->where_in($table2,$where2);


        $this->db->where_in($column, $data);
        $data = $this->db->get();
        return $data;
    }

    function select_where_array_order($table, $where, $order) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order);
        $data = $this->db->get();
        return $data;
    }

    function select_where_array_limit($table, $where, $limit) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get($table, $limit);
        return $data->result();
    }

    function select_where_order($table, $column, $where, $order_by, $order) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $where);
        $this->db->order_by($order_by, $order);
        $data = $this->db->get();
        return $data;
    }

    function select_where_order_all($table, $column, $where, $order_by) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $where);
        $this->db->order_by($order_by);
        $data = $this->db->get();
        return $data;
    }

    function insert_all($table, $data) {
        $this->load->database('default', TRUE);
        if (!$this->db->insert($table, $data))
            return FALSE;
        $data["id"] = $this->db->insert_id();
        return (object) $data;
    }

    function insert_all_batch($table, $data) {
        $this->load->database('default', TRUE);
        if (!$this->db->insert_batch($table, $data))
            return FALSE;
        $data["id"] = $this->db->insert_id();
        return (object) $data;
    }

    function update($table, $data, $column, $where) {
        $this->load->database('default', TRUE);
        $this->db->where($column, $where);
        return $this->db->update($table, $data);
    }

    function update_where_in($table, $data, $column, $where) {
        $this->load->database('default', TRUE);
        $this->db->where_in($column, $where);
        return $this->db->update($table, $data);
    }

    function update_all($table, $data) {
        $this->load->database('default', TRUE);
        return $this->db->update($table, $data);
    }

    function update_where_array($table, $data, $where) {
        $this->load->database('default', TRUE);
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete($table, $column, $where) {
        $this->load->database('default', TRUE);
        $this->db->where($column, $where);
        return $this->db->delete($table);
    }

    function delete_where_array($table, $where) {
        $this->load->database('default', TRUE);
        $this->db->where($where);
        return $this->db->delete($table);
    }

    function select_all_limit($table, $limit) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get($table, $limit);
        return $data->result();
    }

    function count($table) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    function select_all_order($table, $order_by, $order) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, $order);
        $data = $this->db->get();
        return $data->result();
    }

    function select_all_order_limit($table, $order_by, $order, $limit) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        //$this->db->from($table);
        $this->db->order_by($order_by, $order);
        $data = $this->db->get($table, $limit);
        return $data->result();
    }

    function select_where_double($table, $column1, $where1, $column2, $where2) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column1, $where1);
        $this->db->where($column2, $where2);
        $data = $this->db->get();
        return $data;
    }

    function select_where_double_order($table, $column, $where, $column2, $where2, $order_by, $order) {
        $this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $where);
        $this->db->where($column2, $where2);
        $this->db->order_by($order_by, $order);
        $data = $this->db->get();
        return $data;
    }

    
}
