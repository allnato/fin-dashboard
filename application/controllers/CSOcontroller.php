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
class CSOController extends CI_Controller{

  /**
   * Index Page for this Controller.
   *
   * If the URI contains no data, this function will be executed.
   * The Controller will load the homepage if a session exists.
   */
  public function index(){
    redirect(site_url('admin/activity-list'));
  }
  /**
   * [activity_list description]
   * @return [type] [description]
   * @SuppressWarnings(camelCase)
   */
  public function activity_list() {
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('ActivityModel');
    // Retrieves an array of activities that belongs to the org with the provided orgID
    $activities['activityList'] = $this->ActivityModel->getOrgActivities($this->session->userdata('orgID'));
    $this->load->view('cso_activity_list.php', $activities);
  }

  /**
   * [activity_page description]
   * @return [type] [description]
   * @SuppressWarnings(camelCase)
   */
  public function activity_page($orgInitials,$pageID) {
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('CSOmodel');
    // Check if page is created by the organization.
    if(!$activity['activityData'] = $this->CSOmodel->getActivityData($pageID, $orgInitials)){
      // Show 404 :-(
      show_404();
    }

    $this->load->view('cso_activity_page', $activity);
  }

  /**
   * [archive_list description]
   * @return [type] [description]
   * @SuppressWarnings(camelCase)
   */
  public function archive_list() {
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('ActivityModel');
    // Retrieves all the activities of all orgs.
    $activities['activityList'] = $this->ActivityModel->getAllApproved();

    $this->load->view('cso_archive_list.php', $activities);
  }

  /**
   * [create_activity description]
   * @return [type] [description]
   * @SuppressWarnings(camelCase)
   */
  public function create_activity() {
    $this->checkSession();
    $this->load->view('cso_create_activity.php');
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
   // Set flashdata to true
    $this->session->set_flashdata('submitActivity', 'true');

    // Submit to model which is then inserted to the database. This function returns true row is affected.
    if(!$this->ActivityModel->addNewActivity($formfields)){
      $this->session->set_flashdata('submitActivity', 'false');
    }

    redirect(site_url('admin/activity-list'));
  }

  /**
   * [org_activity_list description]
   * @return [type] [description]
   * @SuppressWarnings(camelCase)
   */
  public function org_activity_list() {
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('ActivityModel');
    // Retrieves all the activities of all orgs.
    $activities['activityList'] = $this->ActivityModel->getAllActivities();

    $this->load->view('cso_org_activity_list.php', $activities);
  }

  /**
   * [org_list description]
   * @return [type] [description]
   * @SuppressWarnings(camelCase)
   */
  public function org_list() {
    $this->checkSession();
    $this->load->model('CSOmodel');
    $data = $this->CSOmodel->getAllOrgInitials();
    $this->load->view('cso_org_list.php', $data);
  }

  /**
   * [add_org description]
   * @SuppressWarnings(camelCase)
   */

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

  /**
   * [view_org description]
   * @param  [type] $orgInitials [description]
   * @return [type]              [description]
   * @SuppressWarnings(camelCase)
   */
  public function view_org($orgInitials){
    // Get and check if org exists via initials.
    $orgInitials = urldecode($orgInitials);
    $this->load->model('CSOmodel');
    $orgData;
    if(!$orgData = $this->CSOmodel->getOrgData($orgInitials)){
      show_404();
    }

    // Get Org Activities
    $this->load->model('ActivityModel');
    $this->load->model('FundModel');
    $this->load->model('OrgModel');
    $orgActivities = $this->ActivityModel->getOrgActivities($orgData['orgID']);
    $orgFundID = $this->OrgModel->getFundID($orgData['orgID']);
    $orgFundData = $this->FundModel->retrieveOrgTotalFunds($orgFundID[0]['fundID']);

    $data = array(
      'orgData' => $orgData,
      'orgActivities' => $orgActivities,
      'orgFundData' => $orgFundData,
    );

    $this->load->view('cso_org_profile.php', $data);
  }

  public function newOrganization() {
    $this->load->model('CSOmodel');
    $orgData = $this->input->post(null, true);

    $this->CSOModel->addOrganization($orgData);


    redirect(site_url('admin/activity-list'));
  }

  public function remark_activity() {
    $this->load->model('CSOmodel');

    $remarkData = $this->input->post(null, true);

  }

  public function approve_activity() {
    $this->load->model('CSOmodel');
    $approveData = $this->input->post(null, true);
    $this->CSOmodel->updateActivityStatus($approveData);
    redirect(site_url('admin/org-activity-list'));
  }

  public function decline_activity() {
    $this->load->model('CSOmodel');
    $declineData = $this->input->post(null, true);
    $this->CSOmodel->updateActivityStatus($declineData);
    redirect(site_url('admin/org-activity-list'));
  }



}
