<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login | PharmTrades</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="#" alt="logo" style="width:250px;">
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="txtUsername" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="txtPassword" placeholder="Password">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="adminWindow();">SIGN IN</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- endinject -->
  <script>
function adminWindow()
{
  if($("#txtUsername").val()==""){
    alert("Enter Username");
    $("#txtUsername").focus();
  }
  else if($("#txtPassword").val()==""){
    alert("Enter Password");
    $("#txtPassword").focus();
  }
  else{
      $.ajax({
          type:"POST",
          url:"apiCheckLogin.php",
          data:{username:$("#txtUsername").val(),password:$("#txtPassword").val()},
          success:function(response){
            if($.trim(response)=="success"){
              window.open('admin-dashboard.php','_self');
              $("#txtUsername").val("");
              $("#txtPassword").val("");
            }
			else if ($.trim(response)=="blocked"){
				alert("Your account is blocked, please contact master admin");
				$("#txtPassword").val("");
				$("#txtPassword").focus();
			}
            else{
              alert("Invalid Username/Password");
              $("#txtUsername").val("");
              $("#txtPassword").val("");
              $("#txtUsername").focus();
            }
          }
      });
  }
}
</script> 
</body>

</html>
