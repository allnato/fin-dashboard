## Coding Standards
Since the CSO Finance Dashboard is built on-top of CodeIgniter 3, the **PHP scripting language** will be utilized. </br>
As a result, standard PHP practices and conventions will be followed.

### Function naming conventions
Considering CodeIgniter follows the MVC framework, the following functions naming conventions is followed for both contollers and models:
<br><br>

#### Loading view pages.

For functions that loads html pages, all function names must be in lowercase and the spaces is delimited by an underscore. <br>
An example can be seen below.
```
public function activity_page($orgInitials,$pageID) {
    // Redirect to login if session does not exists.
    $this->checkSession();
    // Load ActitivityModel.php
    $this->load->model('CSOmodel');

    ...

    $this->load->view('cso_activity_page', $activity);
  }
```

#### CRUD Functions
For functions that performs CRUD (Create, Retrieve, Update, and Delete functions), function names should follow Camel Case naming convention. An example can be seen below.

```
public function checkSession(){
    if($this->session->has_userdata('email')){
      return;
    }
    redirect(site_url('login'));
  }
```

#### Important Note
If a function both performs CURD and loading of html, **the loading of view naming convention is followed.**


## Creating Issues
