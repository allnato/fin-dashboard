<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FundModel extends CI_Model{
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

   public function retrieveOrgTotalFunds($fundID){
     // Retrieve funds of orgs
     $this->db->where('fundID', $fundID);
     $query = $this->db->get('fund');
     $data = $query->result_array();

     $data[0]['initBalance'] = number_format(floatval($data[0]['initBalance']), 2, '.', ',');
     $data[0]['netChange'] = number_format(floatval($data[0]['netChange']), 2, '.', ',');
     $data[0]['currBalance'] = number_format(floatval($data[0]['currBalance']), 2, '.', ',');

     if($query->num_rows() == 1) {
       return $data;
     }
     else {
       return false;
     }

   }

   public function addTotalFund($fundData) {
     $this->db->where('orgID', $fundData['orgID']);
     $this->db->replace('fund', $fundData);

     return ($this->db->affected_rows() != 1) ? false : true;

   }

   public function deductCurrBalance() {
     // Every approved liquidation should deduct org balance
   }

}
