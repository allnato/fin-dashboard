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

   /**
    * Creates a new Notification
    * @param  integer $notifType The notification type.
    * @param  string $typeID  Activity or Billing ID
    */
   public function createNewNotif($notifType, $typeID, $orgID){
    $notification['notifType'] = $notifType;
    $notification['typeID'] = $typeID;

    //  Get the organization ID
      $notification['orgID'] = $orgID;
    //  Get the Current Date;
      $notification['timedate'] = date('Y-m-d h:i:sa');
    //  Set the status to unseen
      $notification['status'] = 'unseen';

    $this->db->trans_start();
    $this->db->insert('notification', $notification);
    $this->db->trans_complete();

    return $this->db->trans_status();
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
