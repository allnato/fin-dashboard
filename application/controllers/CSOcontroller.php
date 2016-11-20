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

  public function activity_list() {
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('ActivityModel');
    // Retrieves an array of activities that belongs to the org with the provided orgID
    $activities['activityList'] = $this->ActivityModel->getOrgActivities($this->session->userdata('orgID'));
    $this->load->view('cso_activity_list.php', $activities);
  }

  public function activity_page() {

    $this->load->view('cso_activity_page.php');
  }

  public function archive_list() {
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('ActivityModel');
    // Retrieves all the activities of all orgs.
    $activities['activityList'] = $this->ActivityModel->getAllApproved();

    $this->load->view('cso_archive_list.php', $activities);
  }

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

  public function org_activity_list() {
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('ActivityModel');
    // Retrieves all the activities of all orgs.
    $activities['activityList'] = $this->ActivityModel->getAllActivities();

    $this->load->view('cso_org_activity_list.php', $activities);


  }

  public function org_list() {
    $this->checkSession();
    $this->load->view('cso_org_list.php');
  }

  public function add_org() {
    $orgData = $this->input->post(null, true);

    redirect(site_url('admin/org-list'));
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



}
