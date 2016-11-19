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
class FinController extends CI_Controller{

  /**
   * Index Page for this Controller.
   *
   * If the URI contains no data, this function will be executed.
   * The Controller will load the homepage if a session exists.
   */
  public function index(){
    redirect(site_url('login'));
  }

  /**
   * Loads the login page.
   * @return [type] [description]
   */
  public function login(){
    // Check if sesssion exists.
    if($this->checkSession()){
      redirect(site_url('org'));
    }
    $this->load->view('login');
  }
  /**
   * Log out the users
   */
  public function logout(){
    $data = array('logout' => 'logout');
    // Check if session exists.
    if($this->checkSession()){
      // If session exist, notify user that they logged out successfully
      $this->session->sess_destroy();
      $this->load->view('login', $data);
      return;
    }
    $this->load->view('login');
  }
  /**
   * Loads the CSO Admin Panel
   * @return [type] [description]
   */
  public function admin(){
    echo "Admin";
  }
  /**
   * Loads an Organization Dashboard
   * @param  string $name The Organization's name
   * @return [type]       [description]
   */
  public function org(){
    // Check if a Session exists
    if(!$this->checkSession()){
      redirect(site_url('login'));
    }

    // Check if org is CSO
    if($this->session->userdata('acronym') == 'CSO'){
      redirect(site_url('admin'));
    }
    echo $this->session->userdata('name');
  }

  /**
   * Checks if a Session Exists.
   * @return bool returns true if a session exists, otherwise False
   */
  public function checkSession(){
    if($this->session->has_userdata('email')){
      return true;
    }
    return false;
  }
  /**
   * Checks if the entered login credential is valid.
   * @return bool returns true if credentials is valid, otherwise, false;
   * @SuppressWarnings(camelCase)
   */
  public function verifyLogin(){
    $loginData['email'] = $this->input->post('email');
    $loginData['password'] = $this->input->post('password');

    // Check if email and password exists/!NULL.
    if($loginData['email'] == NULL && $loginData['password'] == NULL)
      redirect(site_url('login'));

    // Load Model and Check credentials
    $this->load->model('OrgModel');
    $resultData = $this->OrgModel->checkCredentials($loginData);

    // If credentials is true, create session and redirect to org dashboard.
    if($resultData){
      $this->session->set_userdata($resultData);
      redirect(site_url('org'));
    }

    // If credentials is false, redirect to login page.
    $this->session->set_flashdata('error_login', 'Invalid Credentials');
    redirect(site_url('login'));
  }

}
