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

   public function retrieveTotalFunds(){
     // Retrieve funds of orgs
   }

}
