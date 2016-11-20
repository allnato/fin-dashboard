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

    $this->load->view('cso_activity_list.php');
  }

  public function activity_page() {

    $this->load->view('cso_activity_page.php');
  }

  public function archive_list() {

    $this->load->view('cso_archive_list.php');
  }

  public function create_activity() {

    $this->load->view('cso_create_activity.php');
  }

  public function org_activity_list() {

    $this->load->view('cso_org_activity_list.php');
  }

  public function org_list() {

    $this->load->view('cso_org_list.php');
  }


}
