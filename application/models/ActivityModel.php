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
      $orgId['revisions'] = 0;
      $this->db->insert('remark', $orgId);

     return ($this->db->affected_rows() != 1) ? false : $orgId['activityID'];
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
          if($remarks['datePendedCSO'] != null && $remarks['datePendedCSO'] != "" && $remarks['datePendedCSO'] != "0000-00-00") {
            $row['datePendedCSO'] = $remarks['datePendedCSO'];
          }

          // In case status is still null. Defaults to pending.
          $row['status'] = "Pending";
          if($remarks['status'] != null) {
            $row['status'] = $remarks['status'];
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

      $row = $query->row_array();
      // Return false if page does not exist within an org
      return ($query->num_rows() != 1) ? false : $row;
    }

    public function getActivityData($pageID){
      // Store the org initials
      $orgInitials = $this->session->userdata('acronym');
      // Check if the page is created by the ORG.
      $this->db->select("a.*")
      ->from('organization as o, activity as a')
      ->where("o.acronym = '$orgInitials' AND a.activityID = $pageID AND o.orgID = a.orgID");

      $query = $this->db->get();
      $row = $query->row_array();
      // Return false if page does not exist within an org
      return ($query->num_rows() != 1) ? false : $row;
    }

    public function getActivityRemarks($pageID){
      $remarks = array();
      // Store the org initials
      $orgInitials = $this->session->userdata('acronym');
      // Check if the page is created by the ORG.
      $this->db->where('activityID', $pageID);

      // Query the DB
      $query = $this->db->get('remark');
      $row = $query->row_array();
      // Return false if page does not exist within an org
      return ($query->num_rows() != 1) ? false : $row;
    }

    public function getAllActivities() {
      $query = $this->db->get('activity');

      $activity = array();
      foreach ($query->result_array() as $row) {
        $remarks = $this->getActivityRemarksForTable($row['activityID']);
        // In case datePendedCSO is still null, provide a message instead
        if($remarks['datePendedCSO'] == null) {
          $row['datePendedCSO'] = "Not yet provided.";
        }
        else {
          $row['datePendedCSO'] = $remarks['datePendedCSO'];
        }
        // In case status is still null. Defaults to pending.
        if($remarks['status'] == null) {
            $row['status'] = "Pending";
        }
        else {
          $row['status'] = $remarks['status'];

        }

        if($row['PRSno'] == null) {
          $row['PRSno'] = "N/A";
        }
        else {
          $row['PRSno'] = $row['PRSno'];
        }

        $row['processType'] = $this->wordify($row['processType']);
        $acronym = $this->getOrgAcronym($row['orgID']);
        $row['acronym'] = $acronym['acronym'];
        if($row['status'] == 'Pending' || $row['status'] == 'Declined') {
            array_push($activity, $row);
        }


      }

      return $activity;
    }

    public function getAllApproved() {
        $query = $this->db->get('activity');

        $activity = array();
        foreach ($query->result_array() as $row) {
          $remarks = $this->getActivityRemarksForTable($row['activityID']);

          // In case datePendedCSO is still null, provide a message instead
          if($remarks['datePendedCSO'] == null) {
            $row['datePendedCSO'] = "Not yet provided.";
          }
          else {
            $row['datePendedCSO'] = $remarks['datePendedCSO'];
          }
          $row['status'] = $remarks['status'];
          if($row['PRSno'] == null) {
            $row['PRSno'] = "N/A";
          }
          else {
            $row['PRSno'] = $row['PRSno'];
          }

          $row['processType'] = $this->wordify($row['processType']);
          $acronym = $this->getOrgAcronym($row['orgID']);
          $row['acronym'] = $acronym['acronym'];

          if($row['status'] == 'Approved') {
              array_push($activity, $row);
          }


      }


      return $activity;
    }

    public function getOrgIdByActivityId($activityID){
      $this->db->select('orgID');
      $this->db->where('activityID', $activityID);

      $query = $this->db->get('activity');
      $result = $query->row();
      return $result->orgID;
    }

    public function updateActivityDetails($pageID, $data){
      $this->db->trans_start();
      $this->db->where('activityID', $pageID);
      $this->db->update('activity', $data);
      $this->db->trans_complete();

      return $this->db->trans_status();
    }

    public function updateActivityProcess($pageID, $data){
      $this->db->trans_start();
      $this->db->where('activityID', $pageID);
      $this->db->update('activity', $data);
      $this->db->trans_complete();

      return $this->db->trans_status();
    }

    function getOrgAcronym($orgID) {
      $this->db->select('acronym');
      $this->db->where('orgID', $orgID);
      $query = $this->db->get('organization');

      return $query->row_array();
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
