<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifModel extends CI_Model{
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

   public function getLatestNotification($orgID){
    $this->db->where('orgID', $orgID);
    $this->db->where('status', 'unseen');
    $this->db->order_by('timedate', 'DESC');
    $this->db->limit(8);

    $query = $this->db->get('notification');

   $notifications = array();
   foreach ($query->result_array() as $row) {
    array_push($notifications, $row);
   }
   return $notifications;
   }

}
