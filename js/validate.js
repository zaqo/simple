// For Registration
function entry_check(){
  var pass = true,
      message = "";

   // INPUTS CHECK
  
  if ($('#password').val() != $('#cpassword').val()) {
    message += "Your passwords do not match" + "\n";
    pass = false;
  }

  // AJAX FOR emailaddress validation
  if (pass) {
    $.ajax({
      url : "ajax_verif.php",
      method : "POST",
      dataType: 'JSON',
      data : {
        name : $('#name').val(),
        email : $('#email').val(),
        password : $('#password').val(),
        cpassword : $('#cpassword').val()
      }
    }).done(function(res){
      if (res['status']) {
        // REGISTER OK - REDIRECT 
        window.location = "./login.html";
      } else {
        // REGISTER FAIL
        alert(res['message']);
      }
    });
  } else {
    alert("Too bad!");
  }
  return false;
}
// For Logging in
function is_user(){
  var flag = true,
      message = "";

   // INPUTS CHECK
  
  if ($('#password').val() == '') {
    message += "Your password should not be void" + "\n";
    flag = false;
  }

  // AJAX FOR emailaddress validation
  if (flag) {
    $.ajax({
      url : "ajax_login.php",
      method : "POST",
      dataType: 'JSON',
      data : {
        email : $('#email').val(),
        password : $('#password').val()
      }
    }).done(function(res){
      if (res['status']) {
        // User Ok - REDIRECT 
        window.location = "./success.php";
      } else {
        // User not identified
        alert(res['message']);
      }
    });
  } else {
    alert("Too bad!");
  }
  return false;
}