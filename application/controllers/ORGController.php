<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Main Controller of CSO Finance Dashboard.
 *
 * @author Gonzales, Eldes
 * @author Nato, Allendale
 * @author Sanchez, Mark
 * @author Sotalbo, Faith
 */
class OrgController extends CI_Controller{

  /**
   * Index Page for this Controller.
   *
   * If the URI contains no data, this function will be executed.
   * The Controller will load the homepage if a session exists.
   */
  public function index(){
    redirect(site_url('org/new-activity'));
  }


  /**
   * Loads the org_create_activity so users can CREATE an activity.
   * @SuppressWarnings(camelCase)
   */
  public function new_activity(){
    // Redirect to login if session does not exists.
    $this->checkSession();

    $this->load->model('NotifModel');
    // list of unseen notifications
    $activities['notifList'] = $this->NotifModel->getLatestNotification($this->session->userdata('orgID'));
    // number of unseen notifications
    $activities['notifCount'] = $this->NotifModel->getUnseenNotificationCount($this->session->userdata('orgID'));
    $this->load->view('org_create_activity', $activities);
  }


  /**
   * Submits the form data through this function and redirect to activity_list when done.
   * @SuppressWarnings(camelCase)
   */
   public function submit_activity(){
    // Load ActivityModel
     $this->load->model('ActivityModel');
    // Get formfields from $POST
     $formfields = $this->input->post(NULL, true);
    // Set flashdata to false
     $this->session->set_flashdata('submitActivity', 'false');
     $activityID = $this->ActivityModel->addNewActivity($formfields);
     if($activityID){
       $this->session->set_flashdata('submitActivity', 'true');

       // Create a notification to CSO if process is CA or DP
       if($formfields['processType'] == 'CA' || $formfields['processType'] == 'DP'){
         $orgID = $this->session->userdata('orgID');
         $this->load->model('NotifModel');
         $this->NotifModel->createNewNotif('cso-activity create',$activityID, $orgID);
       }
     }

     redirect(site_url('org/activity-list'));
   }


  /**
   * Loads the org_activity_list so users can VIEW their activities.
   * @SuppressWarnings(camelCase)
   */
  public function activity_list(){
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('ActivityModel');
    // Retrieves an array of activities that belongs to the org with the provided orgID
    $activities['activityList'] = $this->ActivityModel->getOrgActivities($this->session->userdata('orgID'));

    $this->load->model('NotifModel');
    // list of unseen notifications
    $activities['notifList'] = $this->NotifModel->getLatestNotification($this->session->userdata('orgID'));
    // number of unseen notifications
    $activities['notifCount'] = $this->NotifModel->getUnseenNotificationCount($this->session->userdata('orgID'));

    $this->load->view('org_activity_list', $activities);
  }


  /**
   * Loads the activity_page so users can VIEW the specified acitvity.
   * @param  String $initials  Organization initials
   * @param  Integer $id       activity_page ID
   * @SuppressWarnings(camelCase)
   */
  public function activity_page($pageID){
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('ActivityModel');
    // Check if page is created by the organization.
    if(!$activity['activityData'] = $this->ActivityModel->getActivityData($pageID)){
      // Show 404 :-(
      show_404();
    }

    if(!$activity['activityRemarks'] = $this->ActivityModel->getActivityRemarks($pageID)){
      // Show 404 :-(
      show_404();
    }

    $this->load->model('NotifModel');
    // list of unseen notifications
    $activity['notifList'] = $this->NotifModel->getLatestNotification($this->session->userdata('orgID'));
    // number of unseen notifications
    $activity['notifCount'] = $this->NotifModel->getUnseenNotificationCount($this->session->userdata('orgID'));

    $this->load->view('org_activity_page', $activity);
  }


  /**
   * Loads the org_profile so users can VIEW the info of their org
   * @SuppressWarnings(camelCase)
   */
  public function profile(){
    // Redirect to login if session does not exists.
    $this->checkSession();
    $orgID = $this->session->userdata('orgID');
    // Load the model
    $this->load->model('ActivityModel');
    $this->load->model('FundModel');
    $this->load->model('OrgModel');
    $activities['activityList'] = $this->ActivityModel->getOrgActivities($orgID);
    $orgFundID = $this->OrgModel->getFundID($orgID);
    $activities['orgFundData'] = $this->FundModel->retrieveOrgTotalFunds($orgFundID[0]['fundID']);

    $this->load->model('NotifModel');
    // list of unseen notifications
    $activities['notifList'] = $this->NotifModel->getLatestNotification($this->session->userdata('orgID'));
    // number of unseen notifications
    $activities['notifCount'] = $this->NotifModel->getUnseenNotificationCount($this->session->userdata('orgID'));

    $this->load->view('org_profile', $activities);
  }

  /**
   * Checks if a Session Exists.
   * @return bool returns true if a session exists, otherwise False
   */
  public function checkSession(){
    if($this->session->has_userdata('email')){
      return;
    }
    redirect(site_url('login'));
  }

  public function billing_list(){
    // Redirect to login if session does not exists.
    $this->checkSession();
    $orgID = $this->session->userdata('orgID');
    $this->load->model('BillingModel');

    $billingData['billingList'] = $this->BillingModel->getOrgBillings($orgID);
    $this->load->model('NotifModel');
    // list of unseen notifications
    $billingData['notifList'] = $this->NotifModel->getLatestNotification($this->session->userdata('orgID'));
    // number of unseen notifications
    $billingData['notifCount'] = $this->NotifModel->getUnseenNotificationCount($this->session->userdata('orgID'));

    $this->load->view('org_billing_list', $billingData);
  }

  public function billing_page($billingID){
    // Redirect to login if session does not exists.
    $this->checkSession();
    $orgInitials = $this->session->userdata('acronym');

    $this->load->model('BillingModel');
    if(!$billings['billingData'] = $this->BillingModel->getBillingData($billingID, $orgInitials)){
      // Show 404 :-(
      show_404();
    }

    $billings['orgInitials'] = $orgInitials;

    $this->load->model('NotifModel');
    // list of unseen notifications
    $billings['notifList'] = $this->NotifModel->getLatestNotification($this->session->userdata('orgID'));
    // number of unseen notifications
    $billings['notifCount'] = $this->NotifModel->getUnseenNotificationCount($this->session->userdata('orgID'));
    $this->load->view('org_billing_page', $billings);
  }

}
