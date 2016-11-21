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
    * @return mixed - returns false if org does not exists
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

   public function getAllOrgInitials(){
     $this->db->select('acronym');
     $query = $this->db->get('organization');
     $row = $query->result_array();

     $data['initials'] = $row;

     return $data;

   }

   public function addOrganization($orgData) {


    $this->db->insert('organization', $orgData);
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

   public function updateActivityStatus($activityData) {

     $this->db->where('activityID', $activityData['activityID']);
     $this->db->update('remark', $activityData);

     return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function updateRemarks($remarkData) {
     $this->db->where('activityID', $remarkData['activityID']);
     $this->db->update('remark', $remarkData);

     return ($this->db->affected_rows() != 1) ? false : true;
   }

}
