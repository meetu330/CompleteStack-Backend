<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Content_model extends CI_Model
{
    public $table_name;
    public $table_alias;
    public $primary_key;
    public $primary_alias;
    public $grid_fields;
    public $join_tables;
    public $extra_cond;
    public $groupby_cond;
    public $orderby_cond;
    public $unique_type;
    public $unique_fields;
    public $switchto_fields;
    public $default_filters;
    public $search_config;
    public $relation_modules;
    public $deletion_modules;
    public $print_rec;
    public $multi_lingual;
    public $physical_data_remove;
    public $listing_data;
    public $rec_per_page;
    public $message;

    var $table                      = 'image_content';
    
    public function __construct()
    {
        parent::__construct();
    }
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function get_by_all_image()
    {   
        $this->db->from($this->table);
        $this->db->order_by('iCompletestackId','desc');
        $query=$this->db->get();
        $data = $query->result();
        return $data;
    }
    public function get_by_id($iCompletestackId)
    { 
        $this->db->from($this->table);
        $this->db->where('iCompletestackId',$iCompletestackId);
        $query=$this->db->get();
        $data = $query->row();
        return $data;
    }
    public function get_by_single_image()
    { 
        $this->db->from($this->table);
        $this->db->order_by('iCompletestackId','desc');
        $this->db->where('eStatus','Active');
         $this->db->limit(1);
        $query=$this->db->get();
        $data = $query->row();
        return $data;
    }

    

    public function delete_by_id($iCompletestackId)
    {
        $this->db->where('iCompletestackId', $iCompletestackId);
        $this->db->delete($this->table);
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
  
      
}
