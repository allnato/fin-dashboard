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

   /**
    * Gets all the data of an organization
    * @param string The initlas of the organization.
    * @return mixed - returns false if org does not exists, otherwise return the list of org data.
    */
   public function getOrgData($initials){

     $this->db->where('acronym', $initials);
     $query = $this->db->get('organization');

     $row = $query->row_array();
     // Return false if page does not exist within an org
     return ($query->num_rows() != 1) ? false : $row;
   }

   public function getActivityData($pageID, $orgInitials){
     // Check if the page is created by the ORG.
     $this->db->select("*")
     ->from('organization as o, activity as a')
     ->where("o.acronym = '$orgInitials' AND a.activityID = $pageID AND o.orgID = a.orgID");

     $query = $this->db->get();
     $row = $query->row_array();
     // Return false if page does not exist within an org
     return ($query->num_rows() != 1) ? false : $row;
   }

   public function getRemarksData($activityID) {
     $this->db->select("*")
     ->from('remark as o, activity as a')
     ->where("o.activityID = $activityID AND a.activityID = $activityID");

     $query = $this->db->get();
     $row = $query->row_array();
     // Return false if page does not exist within an org
     return ($query->num_rows() != 1) ? false : $row;
   }

   public function getAllOrgInitials(){
     $this->db->select('acronym');
     $this->db->order_by('acronym', 'ASC');
     $query = $this->db->get('organization');
     $row = $query->result_array();

     $data['initials'] = $row;

     return $data;

   }

   public function addOrganization($orgData) {

    $origDebug = $this->db->db_debug;

    $this->db->db_debug = FALSE;

    if(!$this->db->insert('organization', $orgData)){
     $this->db->db_debug = $origDebug;
     return false;
    }

    $this->db->db_debug = $origDebug;

    $orgID = $this->db->insert_id();

    $initial = array(
      'initBalance' => 0,
      'netChange' => 0,
      'fundID' => $orgID,
    );

    $fund = array(
      'fundID' => $orgID,
    );

    $this->db->where('orgID', $orgID);
    $this->db->update('organization', $fund);

    $this->db->insert('fund', $initial);
    // $this->db->where('fundID', $orgID);
    // $this->db->update('fund', $initial);

    return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function deleteOrganization($orgData) {

     $this->db->where('orgID', $orgData['orgID']);
     $this->db->delete('organization');

   }

   public function updateActivityStatus($activityData, $acronym) {
     array_filter($activityData, 'strlen');

     $this->db->where('activityID', $activityData['activityID']);
     $this->db->update('remark', $activityData);

     if($activityData['status'] != "Declined") {

       // Get FundID from Organization table
         $this->db->select('fundID');
         $this->db->where('acronym', $acronym);
         $query = $this->db->get('organization');
         $FundIDresult = $query->result();

         // Get budget from Activity table
         $this->db->select('budget');
         $this->db->where('activityID', $activityData['activityID']);
         $query2 = $this->db->get('activity');
         $Budgetresult = $query2->result();
         //  var_dump($FundIDresult[0]->fundID);
         // Get CurrentBalance from Fund table
         $this->db->select('netChange');
         $this->db->where('fundID', $FundIDresult[0]->fundID);
         $query3 = $this->db->get('fund');
         $NetChangeresult = $query3->result();

         $budget = $Budgetresult[0]->budget;

         // Check if the type of activity is Change of Payee or Cancellation of Checque

         $this->db->select('processType');
         $this->db->where('activityID', $activityData['activityID']);
         $query4 = $this->db->get('activity');
         $ProcessTyperesult = $query4->result();

         if($ProcessTyperesult[0]->processType == 'CP') {
           $budget = '70';
         }
         else if($ProcessTyperesult[0]->processType == 'COC') {
           $budget = '40';
         }

         else if($ProcessTyperesult[0]->processType == 'NE') {
           $budget = '0';
         }
         else if($ProcessTyperesult[0]->processType == 'FRA') {
           $this->db->select('actualRevenue');
           $this->db->where('activityID', $activityData['activityID']);
           $query2 = $this->db->get('activity');
           $Budgetresult = $query2->result();
           $budget = $Budgetresult[0]->actualRevenue;

         }
         // Perform arithmetic on currBalance and budget
         $newBalance['netChange'] = $budget + $NetChangeresult[0]->netChange;
         $newBalance['netChange'] = floatval($newBalance['netChange']);
         $this->db->where('fundID', $FundIDresult[0]->fundID);
         $this->db->update('fund', $newBalance);
     }


     return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function updateRemarks($remarkData) {

     $this->db->where('activityID', $remarkData['activityID']);
     $this->db->update('remark', $remarkData);

     return ($this->db->affected_rows() != 1) ? false : true;
   }

}
