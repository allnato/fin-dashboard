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
          array_push($activity, $row);
        }
        return $activity;
      }

    }

}
