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
    $this->load->view('org_create_activity');
  }


  /**
   * Loads the org_activity_list so users can VIEW their activities.
   * @SuppressWarnings(camelCase)
   */
  public function activity_list(){
    // Redirect to login if session does not exists.
    $this->checkSession();
    $this->load->view('org_activity_list');
  }


  /**
   * Loads the activity_page so users can VIEW the specified acitvity.
   * @param  String $initials  Organization initials
   * @param  Integer $id       activity_page ID
   * @SuppressWarnings(camelCase)
   */


  public function activity_page($initials, $pageID){
    // Redirect to login if session does not exists.
    $this->checkSession();
    echo $initials;
    echo $pageID;
  }


  /**
   * Loads the org_profile so users can VIEW the info of their org
   * @SuppressWarnings(camelCase)
   */
  public function profile(){
    // Redirect to login if session does not exists.
    $this->checkSession();
    $this->load->view('org_profile');
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
