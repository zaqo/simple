// For Registration
function entry_check(){
  var pass = true,
      message = "";

   // INPUTS CHECK
  
  if ($('#password').val() != $('#cpassword').val()) {
    message += "Your passwords do not match" + "\n";
    pass = false;
  }

  // AJAX FOR email address validation
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
		
        window.location.replace("login.php");
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
