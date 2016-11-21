<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSOmodel extends CI_Model{
  /**
   * CRUD for the Organization Table.
   *
   * @author Gonzales, Eldes
   * @author Nato, Allendale
   * @author Sanchez, Mark
   * @author Sotalbo, Faith
   */

   public function __construct(){
     parent::__construct();
     $this->load->database();
   }

   public function retrieveOrgTotalFunds($orgID){
     // Retrieve funds of orgs
     $this->db->where('orgID', $orgiD);
     $query = $this->db->get('fund');

     if($query->num_rows() == 1) {
       return $query->result_array();
     }
     else {
       return false;
     }

   }

}
