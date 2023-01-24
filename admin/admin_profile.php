<?php 
include('../vendor/autoload.php');
//use Helpers\Auth;
use App\OnlineShopping\Database\Company;
use App\OnlineShopping\Database\Country;
use App\OnlineShopping\Database\FavouriteMusic;
use App\OnlineShopping\Database\FavouriteMovie;
use App\OnlineShopping\Database\Language;
//$db = new Company();
//$companies = $db->companyOption();
//  echo $companies;
 //die();
//$auth = Auth::check();
?>
<?php
include('layouts/head.php');

?>

<!-- css link -->
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/selects/select2.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/pickadate/pickadate.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/toggle/switchery.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/pickers/daterange/daterange.css">

<!-- END: Vendor CSS-->


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-detached-left-sidebar   fixed-navbar" data-open="click"
 data-menu="vertical-menu-modern" data-col="content-detached-left-sidebar">

 <!-- BEGIN: Header-->
 <?php include('layouts/header.php'); ?>
 <!-- END: Header-->


 <!-- BEGIN: Main Menu-->

 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
   <?php include('layouts/sidebar.php'); ?>
  </div>
 </div>

 <!-- END: Main Menu-->
 <div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
   <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
     <h3 class="content-header-title mb-0 d-inline-block">Account setting</h3>
     <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">Pages</a>
        </li>
        <li class="breadcrumb-item active">Account setting
        </li>
       </ol>
      </div>
     </div>
    </div>

    <div class="content-header-right col-md-6 col-12">
     <div class="btn-group float-md-right">
      <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">Action</button>
      <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i>
        Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a
        class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
       <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i>
        Settings</a>
      </div>
     </div>
    </div>
   </div>
   <div class="content-body">

    <!-- session alert -->
    <?php if(isset($_GET['success_password_update'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> Account update successfully.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
     <strong>Updated Your Password</strong>
    </div>
    <?php endif; ?>
    <?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Error!</strong> Account update failed.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <?php endif; ?>
    <!-- session alert end -->

    <!-- account setting page start -->
    <section id="page-account-settings">
     <div class="row">
      <!-- left menu section -->
      <div class="col-md-3 mb-2 mb-md-0">
       <ul class="nav nav-pills flex-column mt-md-0 mt-1">
        <li class="nav-item">
         <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general"
          aria-expanded="true">
          <i class="ft-globe mr-50"></i>
          General
         </a>
        </li>
        <li class="nav-item">
         <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password"
          aria-expanded="false">
          <i class="ft-lock mr-50"></i>
          Change Password
         </a>
        </li>
        <li class="nav-item">
         <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill" href="#account-vertical-info"
          aria-expanded="false">
          <i class="ft-info mr-50"></i>
          Info
         </a>
        </li>
        <li class="nav-item">
         <a class="nav-link d-flex" id="account-pill-social" data-toggle="pill" href="#account-vertical-social"
          aria-expanded="false">
          <i class="ft-camera mr-50"></i>
          Social links
         </a>
        </li>
        <li class="nav-item">
         <a class="nav-link d-flex" id="account-pill-connections" data-toggle="pill"
          href="#account-vertical-connections" aria-expanded="false">
          <i class="ft-feather mr-50"></i>
          Connections
         </a>
        </li>
        <li class="nav-item">
         <a class="nav-link d-flex" id="account-pill-notifications" data-toggle="pill"
          href="#account-vertical-notifications" aria-expanded="false">
          <i class="ft-message-square mr-50"></i>
          Notifications
         </a>
        </li>
       </ul>
      </div>
      <!-- right content section -->
      <div class="col-md-9">
       <div class="card">
        <div class="card-content">
         <div class="card-body">
          <div class="tab-content">
           <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
            aria-labelledby="account-pill-general" aria-expanded="true">
            <div class="media">
             <a href="javascript: void(0);">
              <img src="../_actions/profile/<?= $auth->profile_img?>" alt="profile image" height="64" width="64">
             </a>
             <form action="../_actions/profile_update.php" method="post" enctype="multipart/form-data">
              <div class="media-body mt-75">
               <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Choose
                 new
                 photo</label>
                <input type="file" id="account-upload" name="profile_img" hidden>
                <button type="submit" class="btn btn-sm btn-secondary ml-50">Upload New Profile</button>
               </div>
               <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                 size of
                 800kB</small></p>
              </div>
             </form>
            </div>
            <hr>
            <form novalidate method="post" action="../_actions/user_update.php">
             <div class="row">
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-username">Username</label>
                 <input type="text" class="form-control" name="user_name" id="account-username" placeholder="Username"
                  value="<?= $auth->user_name;?>" required
                  data-validation-required-message="This username field is required">
                </div>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-name">Public Name</label>
                 <input type="text" name="public_name" class="form-control" id="account-name" placeholder="Name"
                  value="<?= $auth->public_name;?>" required
                  data-validation-required-message="This name field is required">
                </div>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-e-mail">E-mail</label>
                 <input type="email" name="email" class="form-control" id="account-e-mail" placeholder="Email"
                  value="<?= $auth->email;?>" required data-validation-required-message="This email field is required">
                </div>
               </div>
              </div>
              <div class="col-12">
               <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
                </button>
                <p class="mb-0">
                 Your email is not confirmed. Please check your inbox.
                </p>
                <a href="javascript: void(0);">Resend confirmation</a>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="accountSelect">Company</label>
                <select name="company" class="form-control" id="accountSelect">
                 <?php 
                  $companies = Company::companyOption();
                  foreach($companies as $key => $company):                  
                  ?>
                 <!-- option and selected old data -->
                 <option value="<?= $company?>" <?= $company == $auth->company ? 'selected' : ''?>>
                  <?= $company ?>
                  <?php endforeach;?>
                </select>
               </div>
              </div>
              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
               <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                changes</button>
               <button type="reset" class="btn btn-light">Cancel</button>
              </div>
             </div>
            </form>
           </div>

           <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
            aria-labelledby="account-pill-password" aria-expanded="false">
            <form novalidate method="post" action="../_actions/update_password.php">
             <div class="row">
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-old-password">Current Password</label>
                 <input type="password" class="form-control" id="account-old-password" required
                  placeholder="Current Password" data-validation-required-message="This old password field is required">
                </div>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-new-password">New Password</label>
                 <input type="password" name="password" id="account-new-password" class="form-control"
                  placeholder="New Password" required data-validation-required-message="The password field is required"
                  minlength="6">
                </div>
               </div>
              </div>
              <!-- <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-retype-new-password">Retype New
                  Password</label>
                 <input type="password" name="con-password" class="form-control" required
                  id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password"
                  data-validation-required-message="The Confirm password field is required" minlength="6">
                </div>
               </div>
              </div> -->
              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
               <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                changes</button>
               <button type="reset" class="btn btn-light">Cancel</button>
              </div>
             </div>
            </form>
           </div>

           <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info"
            aria-expanded="false">
            <form novalidate action="../_actions/user_info_update.php" method="post">
             <div class="row">
              <div class="col-12">
               <div class="form-group">
                <label for="accountTextarea">Bio</label>
                <textarea name="bio" class="form-control" id="accountTextarea" rows="3"
                 placeholder="Your Bio data here..."><?= $auth->bio ?></textarea>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-birth-date">Birth date</label>
                 <input name="birth_date" type="text" class="form-control birthdate-picker" required
                  placeholder="Birth date <?= $auth->birth_date ?>" id="account-birth-date"
                  data-validation-required-message="This birthdate field is required" value="1980-01-01">
                </div>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="accountSelect">Country</label>
                <select name="country" class="form-control" id="accountSelect">
                 <?php 
                  $countries = Country::CountryOptions();
                  foreach($countries as $key => $country):
                  ?>
                 <!-- option and selected old data -->
                 <option value="<?= $country?>" <?= $country == $auth->country ? 'selected' : ''?>>
                  <?= $country ?>
                 </option>
                 <?php endforeach;?>
                </select>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="languageselect2">Languages</label>
                <select name="language[]" class="form-control" id="languageselect2" multiple="multiple">
                 <?php 
                    $languages = Language::LanguagesOptions();
                    foreach($languages as $key => $language):
                    ?>
                 <!-- option multiple select value -->
                 <option value="<?= $language?> ">
                  <?= $language ?>
                 </option>
                 <?php endforeach;?>
                </select>
                <p>Your Language is : <span class="badge badge-lg badge-pill badge-light-secondary mt-1">
                  <?= $auth->language?>
                  <i class="feather icon-plus"></i>
                 </span> </p>

               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-phone">Phone</label>
                 <input name="phone" type="text" class="form-control" id="account-phone" required
                  placeholder="<?= $auth->phone ?>" value="<?= $auth->phone ?>"
                  data-validation-required-message="This phone number field is required">
                </div>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="account-website">Website</label>
                <input name="website" type="text" class="form-control" id="account-website"
                 placeholder="Website address : <?= $auth->website?>">
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="musicselect2">Favourite Music</label>
                <select name="fav_music[]" class="form-control" id="musicselect2" multiple="multiple">
                 <?php 
                  $musics = FavouriteMusic::FavouriteMusicOptions();
                  foreach($musics as $key => $music):
                  ?>
                 <option value="<?= $music ?>">
                  <?= $music ?>
                 </option>
                 <?php endforeach;?>
                </select>
                <p>Your Favourite Music is :
                 <span class="badge badge-lg badge-pill badge-light-secondary mt-1">
                  <?= $auth->fav_music?>
                  <i class="feather icon-plus"></i>
                 </span>
                </p>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="moviesselect2">Favourite movies</label>
                <select name="fav_movie[]" class="form-control" id="moviesselect2" multiple="multiple">
                 <?php 
                $movies = FavouriteMovie::FavouriteMovieOptions();
                foreach($movies as $key => $movie):
                ?>
                 <!-- option and selected old data -->
                 <option value="<?= $movie; ?>"><?= $movie; ?>
                 </option>
                 <?php endforeach;?>
                </select>
                <!--  span with badge button -->
                <p>Your Favourite Movies are : <span class="badge badge-lg badge-pill badge-light-secondary mt-1">
                  <?= $auth->fav_movie?>
                  <i class="feather icon-plus"></i>
                 </span> </p>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
               </div>
              </div>
              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
               <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                changes</button>
               <button type="reset" class="btn btn-light">Cancel</button>
              </div>
             </div>
            </form>
           </div>
           <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
            aria-labelledby="account-pill-social" aria-expanded="false">
            <form>
             <div class="row">
              <div class="col-12">
               <div class="form-group">
                <label for="account-twitter">Twitter</label>
                <input type="text" id="account-twitter" class="form-control" placeholder="Add link"
                 value="https://www.twitter.com">
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="account-facebook">Facebook</label>
                <input type="text" id="account-facebook" class="form-control" placeholder="Add link">
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="account-google">Google+</label>
                <input type="text" id="account-google" class="form-control" placeholder="Add link">
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="account-linkedin">LinkedIn</label>
                <input type="text" id="account-linkedin" class="form-control" placeholder="Add link"
                 value="https://www.linkedin.com">
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="account-instagram">Instagram</label>
                <input type="text" id="account-instagram" class="form-control" placeholder="Add link">
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="account-quora">Quora</label>
                <input type="text" id="account-quora" class="form-control" placeholder="Add link">
               </div>
              </div>
              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
               <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                changes</button>
               <button type="reset" class="btn btn-light">Cancel</button>
              </div>
             </div>
            </form>
           </div>
           <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
            aria-labelledby="account-pill-connections" aria-expanded="false">
            <div class="row">
             <div class="col-12 mb-3">
              <a href="javascript: void(0);" class="btn btn-info">Connect to
               <strong>Twitter</strong></a>
             </div>
             <div class="col-12 mb-3">
              <button class=" btn btn-sm btn-secondary float-right">edit</button>
              <h6>You are connected to facebook.</h6>
              <span>Johndoe@gmail.com</span>
             </div>
             <div class="col-12 mb-3">
              <a href="javascript: void(0);" class="btn btn-danger">Connect to
               <strong>Google</strong>
              </a>
             </div>
             <div class="col-12 mb-2">
              <button class=" btn btn-sm btn-secondary float-right">edit</button>
              <h6>You are connected to Instagram.</h6>
              <span>Johndoe@gmail.com</span>
             </div>
             <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
              <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
               changes</button>
              <button type="reset" class="btn btn-light">Cancel</button>
             </div>
            </div>
           </div>
           <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel"
            aria-labelledby="account-pill-notifications" aria-expanded="false">
            <div class="row">
             <h6 class="ml-1 mb-2">Activity</h6>
             <div class="col-12">
              <div class="form-group">
               <input type="checkbox" class="switchery" data-size="sm" checked id="accountSwitch1">
               <label class="ml-50" for="accountSwitch1">Email me when someone comments
                onmy
                article</label>
              </div>
             </div>
             <div class="col-12">
              <div class="form-group">
               <input type="checkbox" class="switchery" data-size="sm" checked id="accountSwitch2">
               <label for="accountSwitch2" class="ml-50">Email me when someone answers on
                my
                form</label>
              </div>
             </div>
             <div class="col-12">
              <div class="form-group">
               <input type="checkbox" class="switchery" data-size="sm" id="accountSwitch3">
               <label for="accountSwitch3" class="ml-50">Email me hen someone follows
                me</label>
              </div>
             </div>
             <h6 class="ml-1 my-2">Application</h6>
             <div class="col-12">
              <div class="form-group">
               <input type="checkbox" class="switchery" data-size="sm" checked id="accountSwitch4">
               <label for="accountSwitch4" class="ml-50">News and announcements</label>
              </div>
             </div>
             <div class="col-12">
              <div class="form-group">
               <input type="checkbox" class="switchery" data-size="sm" id="accountSwitch5">
               <label for="accountSwitch5" class="ml-50">Weekly product updates</label>
              </div>
             </div>
             <div class="col-12">
              <div class="form-group">
               <input type="checkbox" class="switchery" data-size="sm" checked id="accountSwitch6">
               <label for="accountSwitch6" class="ml-50">Weekly blog digest</label>
              </div>
             </div>
             <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
              <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
               changes</button>
              <button type="reset" class="btn btn-light">Cancel</button>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>
    <!-- account setting page end -->
   </div>
  </div>
 </div>
 <!-- BEGIN: Content-->

 <!-- END: Content-->
 <div></div>
 <div class="sidenav-overlay"></div>
 <div class="drag-target"></div>

 <!-- BEGIN: Footer-->
 <?php include('layouts/footer.php'); ?>

 <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
 <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
 <script src="app-assets/vendors/js/pickers/pickadate/picker.js"></script>
 <script src="app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
 <script src="app-assets/vendors/js/forms/toggle/switchery.min.js"></script>
 <script src="app-assets/js/scripts/pages/account-setting.js"></script>

 <?php 
 /*
<!-- HTML form for updating the user's account -->
<form id="update-form" action="update.php" method="post">
  <!-- form fields go here -->
  <input type="submit" value="Update">
</form>

<!-- progress bar -->
<div id="progress-bar">
  <div id="progress"></div>
</div>

<!-- JavaScript to update the progress bar -->
<script>
  // get the form and progress bar elements
  var form = document.getElementById('update-form');
  var progress = document.getElementById('progress');

  // submit the form using the XMLHttpRequest object
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onprogress = function() {
      // update the progress bar as the request progresses
      progress.style.width = Math.ceil(xhr.loaded / xhr.total) * 100 + '%';
    };

    xhr.onload = function() {
      if (xhr.status === 200) {
        // form submission was successful
      } else {
        // form submission failed
      }
    };

    xhr.send(new FormData(form));
  });
</script>

$string = 'red,green,blue';
$array = explode(',', $string);

print_r($array);

 */
 ?>