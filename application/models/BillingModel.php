<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BillingModel extends CI_Model{
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

   public function getAllBillings(){
     $query = $this->db->get('billing');

     $billings = array();
     foreach ($query->result_array() as $row) {
      array_push($billings, $row);
     }
     return $billings;
   }

   public function getBillingData($billingID, $orgInitials){
     // Check if the page is created by the ORG.
     $this->db->select("*")
     ->from('billing')
     ->where("orgAcronym = '$orgInitials' AND billingID = $billingID");

     $query = $this->db->get();
     $row = $query->row_array();
     // Return false if page does not exist within an org
     return ($query->num_rows() != 1) ? false : $row;
   }

   public function updateBilling($billingID, $billingData){
     $this->db->trans_start();
     $this->db->where('billingID', $billingID);
     $this->db->update('billing', $billingData);
     $this->db->trans_complete();

     return $this->db->trans_status();
   }
}
