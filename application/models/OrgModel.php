<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrgModel extends CI_Model{
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

   public function addNewOrg($orgData) {

     $this->db->insert('organization', $orgData);
   }

   /**
    * Checks the login credential. If true create a Session.
    * @param  array $loginData {
    *      @args $loginData['email'] Contains the email
    *      @args $loginData['password'] Containes the password
    * }
    * @return mixed returns data of Org if credential is valid, otherwise, false.
    */
   public function checkCredentials($loginData){
     $result = $this->db->get_where('organization',$loginData);

     // If credentials is not found.
     if ($result->num_rows() != 1) {
       return false;
     }

     $row = $result->row();
     $orgData = array(
       'orgID' => $row->orgID,
       'name' => $row->name,
       'email' => $row->email,
       'acronym' => $row->acronym
     );
     return $orgData;
   }

   /**
    * Gets all the data of an organization
    * @param string The email of the organization.
    * @return [type] [description]
    */
   public function getOrgData($email){

   }

}
