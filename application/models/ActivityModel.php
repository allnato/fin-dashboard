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
    $activtyData['orgID'] = $this->session->userdata('orgID');
    // Add the timestamp
    $activityData['timestamp'] = date('Y-m-d H:i:s');
    // Add the dateSubmitted. It returns a string with the format <Day of the week>,<Month><Day>, <Year> e.g (Saturday, November 29, 2016)
    $activityData['dateSubmitted'] = date('l, F j, Y');
    $this->db->insert('activity', $activityData);

     return $this->db->affected_rows() > 0;
   }

}
