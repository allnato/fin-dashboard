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


    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activities['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $activities['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activities['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $activities['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($activities['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }
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
    if(!$activity['remarksData'] = $this->CSOmodel->getRemarksData($activity['activityData']['activityID'])){
      // Show 404 :-(
      show_404();
    }
    $activity['orgInitials'] = $orgInitials;

    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activity['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $activity['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activity['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $activity['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($activity['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
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

    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activities['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $activities['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activities['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $activities['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($activities['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }

    $this->load->view('cso_archive_list.php', $activities);
  }

  /**
   * [create_activity description]
   * @return [type] [description]
   * @SuppressWarnings(camelCase)
   */
  public function create_activity() {
    $this->checkSession();


    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activities['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $activities['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activities['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $activities['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($activities['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }


    $this->load->view('cso_create_activity.php', $activities);
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

    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activities['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $activities['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $activities['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $activities['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($activities['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }
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

    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $data['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $data['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $data['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $data['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($data['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }
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

    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $data['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $data['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $data['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $data['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($data['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }

    $this->load->view('cso_org_profile.php', $data);
  }

  public function newOrganization() {
    $this->load->model('CSOmodel');
    $orgData = $this->input->post(null, true);

    $updateResult = $this->CSOmodel->addOrganization($orgData);

    $this->session->set_flashdata('addOrganization', 'false');
    if($updateResult){
      $this->session->set_flashdata('addOrganization', 'true');
    }
    redirect(site_url('admin/org-list'));
  }

  public function deleteOrganization() {
    $this->load->model('CSOmodel');
    $orgData = $this->input->post(null, true);

    $this->CSOmodel->deleteOrganization($orgData);

    redirect(site_url('admin/org-list'));
  }

  public function edit_activity_details($orgInitials, $pageID ){
    $this->load->model('ActivityModel');
    $detailsData = $this->input->post(NULL, TRUE);

    $this->session->set_flashdata('editActivity', 'false');
    if($this->ActivityModel->updateActivityDetails($pageID, $detailsData)){
      $this->session->set_flashdata('editActivity', 'true');
    }

    redirect(site_url('admin/activity-page/'.$orgInitials."/".$pageID));

  }

  public function edit_activity_process($orgInitials, $pageID ){
    $this->load->model('ActivityModel');
    $detailsData = $this->input->post(NULL, TRUE);

    $this->session->set_flashdata('editActivity', 'false');
    if($this->ActivityModel->updateActivityProcess($pageID, $detailsData)){
      $this->session->set_flashdata('editActivity', 'true');
    }

    redirect(site_url('admin/activity-page/'.$orgInitials."/".$pageID));

  }

  public function remark_activity() {
    $this->load->model('CSOmodel');
    $remarkData = $this->input->post(NULL, true);
    $remarkData['status'] = 'Pending';

    $this->session->set_flashdata('remarkActivity', 'false');
    if($this->CSOmodel->updateRemarks($remarkData)){
      $this->session->set_flashdata('remarkActivity', 'true');

      $this->load->model('ActivityModel');
      $orgID = $this->ActivityModel->getOrgIdByActivityId($remarkData['activityID']);
      $this->load->model('NotifModel');
      $this->NotifModel->createNewNotif('org-activity remark',$remarkData['activityID'], $orgID);
    }

    redirect(site_url('admin/org-activity-list'));

  }

  public function approve_activity() {
    $this->load->model('CSOmodel');
    $approveData['activityID'] = $this->input->post('activityID', true);
    $approveData['status'] = $this->input->post('status', true);
    $orgAcronym = $this->input->post('acronym', true);

    $this->session->set_flashdata('updateActivity', 'false');
    if($this->CSOmodel->updateActivityStatus($approveData, $orgAcronym)){
      $this->session->set_flashdata('updateActivity', 'true');

      $this->load->model('OrgModel');
      $orgID = $this->OrgModel->getOrgIDbyInitial($orgAcronym);
      $this->load->model('NotifModel');
      $this->NotifModel->createNewNotif('org-activity approve',$approveData['activityID'], $orgID);
      $this->NotifModel->createNewNotif('exec-activity approve',$approveData['activityID'], $orgID);

    }

    redirect(site_url('admin/org-activity-list'));
  }

  public function decline_activity() {
    $this->load->model('CSOmodel');
    $orgAcronym = $this->input->post('acronym', true);
    $declineData['status'] = $this->input->post('status', true);
    $declineData['activityID'] = $this->input->post('activityID', true);
    $this->session->set_flashdata('updateActivity', 'false');
    if($this->CSOmodel->updateActivityStatus($declineData, $orgAcronym)){
      $this->session->set_flashdata('updateActivity', 'true');

      $this->load->model('OrgModel');
      $orgID = $this->OrgModel->getOrgIDbyInitial($orgAcronym);
      $this->load->model('NotifModel');
      $this->NotifModel->createNewNotif('org-activity decline',$declineData['activityID'], $orgID);
    }
    redirect(site_url('admin/org-activity-list'));
  }

  public function billing_list(){
    $this->load->model('BillingModel');

    $billingData['billingList'] = $this->BillingModel->getAllBillings();

    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $billingData['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $billingData['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $billingData['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $billingData['notifCount'] = $this->NotifModel->getExecCountNotification();
    }
    $this->load->model('OrgModel');
    foreach ($billingData['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }

    $this->load->view('cso_billing_list', $billingData);
  }

  public function new_billing(){
    $this->checkSession();

    $this->load->model('OrgModel');
    $orgData['initials'] = $this->OrgModel->getAllOrgInitials();

    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $orgData['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $orgData['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $orgData['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $orgData['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($orgData['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }
    $this->load->view('cso_create_bill', $orgData);
  }

  public function add_billing(){
    $this->checkSession();
    $billingData = $this->input->post(NULL, TRUE);
    $this->load->model('BillingModel');

    $this->session->set_flashdata('createBilling', 'false');
    $billingID = $this->BillingModel->createNewBilling($billingData);

    if($billingID){
      $this->session->set_flashdata('createBilling', 'true');
      // Create a notification
      $this->load->model('OrgModel');
      $orgID = $this->OrgModel->getOrgIDbyInitial($billingData['orgAcronym']);
      $this->load->model('NotifModel');
      $this->NotifModel->createNewNotif('org-billing create',$billingID, $orgID);
    }

    redirect(site_url('admin/new-billing'));
  }

  public function billing_page($orgInitials, $billingID){
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('BillingModel');
    // Check if page is created by the organization.
    if(!$billings['billingData'] = $this->BillingModel->getBillingData($billingID, $orgInitials)){
      // Show 404 :-(
      show_404();
    }

    $billings['orgInitials'] = $orgInitials;

    if($this->session->userdata('acronym') == 'CSO'){
      $this->load->model('NotifModel');
      // list of unseen notifications
      $billings['notifList'] = $this->NotifModel->getCSONotification();
      // number of unseen notifications
      $billings['notifCount'] = $this->NotifModel->getCSOcountNotification();
    } elseif ($this->session->userdata('acronym') == 'CSO-E') {
      $this->load->model('NotifModel');
      // list of unseen notifications
      $billings['notifList'] = $this->NotifModel->getExecNotification();
      // number of unseen notifications
      $billings['notifCount'] = $this->NotifModel->getExecCountNotification();
    }

    $this->load->model('OrgModel');
    foreach ($billings['notifList'] as &$row) {
      $row['orgID'] = $this->OrgModel->getInitialsbyOrgID($row['orgID']);
    }

    $this->load->view('cso_billing_page', $billings);
  }

  public function edit_billing($orgInitials, $billingID ){
    $this->load->model('BillingModel');
    $billingData = $this->input->post(NULL, TRUE);

    $this->session->set_flashdata('editBilling', 'false');
    if($this->BillingModel->updateBilling($billingID, $billingData)){
      $this->session->set_flashdata('editBilling', 'true');
    }

    redirect(site_url('admin/billing-page/'.$orgInitials."/".$billingID));

  }



}
