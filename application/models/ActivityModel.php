<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityModel extends CI_Model{
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

   /*
   * Adds the form data to the database. It returns the number of rows affected by the query.
   * @SuppressWarnings(camelCase)
   */
    public function addNewActivity($formfields) {

      $activityData = array();
      // Checks every form field. Append only those fields with input. This is done to make sure that the DB does not change NULL columns to 0
      foreach($formfields as $key => $value) {
       if($value != "") {
         $activityData[$key] = $value;
       }
      }
      // Add orgID using Session information
      $activityData['orgID'] = $this->session->userdata('orgID');
      // Add the timestamp (Time last edited)
      $activityData['timestamp'] = date('Y-m-d H:i:s');
      // Add the dateSubmitted.
      $activityData['dateSubmitted'] = date('Y-m-d H:i:s');
      $this->db->insert('activity', $activityData);
      // Get ID of row you just inserted
      $orgId['activityID'] = $this->db->insert_id();
      $this->db->insert('remark', $orgId);

     return ($this->db->affected_rows() != 1) ? false : true;
   }

   /**
    * Retreives all the activities by the org who is currently logged in
    * @return [type] [description]
    */
    public function getOrgActivities($orgID) {
      if($orgID != "" || $orgID != null) {

        $this->db->where('orgID', $orgID);
        $query = $this->db->get('activity');

        $activity = array();
        foreach ($query->result_array() as $row) {
          $remarks = $this->getActivityRemarksForTable($row['activityID']);
          // In case datePendedCSO is still null, provide a message instead
          $row['datePendedCSO'] = "Not yet provided.";
          if($remarks[0]['datePendedCSO'] != null) {
            $row['datePendedCSO'] = $remarks[0]['datePendedCSO'];
          }

          // In case status is still null. Defaults to pending.
          $row['status'] = "Pending";
          if($remarks[0]['status'] != null) {
            $row['status'] = $remarks[0]['status'];
          }

          $row['processType'] = $this->wordify($row['processType']);

          array_push($activity, $row);

        }
        return $activity;
      }

    }

    public function getActivityRemarksForTable($activityID) {
      $this->db->select('datePendedCSO, status ');
      $this->db->where('activityID', $activityID);
      $query = $this->db->get('remark');
      return $query->result_array();
    }

    public function getActivityData($pageID){
      // Store the org initials
      $orgInitials = $this->session->userdata('acronym');
      // Check if the page is created by the ORG.
      $this->db->select("a.*")
      ->from('organization as o, activity as a')
      ->where("o.acronym = '$orgInitials' AND a.activityID = $pageID AND o.orgID = a.orgID");

      $query = $this->db->get();
      $row = array();
      foreach ($query->row() as $key => $value) {
        $row[$key] = $value;
      }
      // Return false if page does not exist within an org
      return ($query->num_rows() != 1) ? false : $row;
    }

    function wordify($processType) {
      switch($processType) {
        case 'DP':
          return 'Direct Payment';
          break;
        case 'CA':
          return 'Cash Advance';
          break;
        case 'RM':
          return 'Reimbursement';
          break;
        case 'BT':
          return 'Book Transfer';
          break;
        case 'LQ':
          return 'Liquidation';
          break;
        case 'PCR':
          return 'Petty Cash Replenishment';
          break;
        case 'NE':
          return 'No Expense';
          break;
        case 'FRA':
          return 'Fund Raising Activity Report';
          break;
        case 'CP':
          return 'Change of Payee';
          break;
        case 'COC':
          return 'Cancellation of Check';
          break;
        case 'LEA':
          return 'List of Expenses alone';
          break;
      }
    }

}
