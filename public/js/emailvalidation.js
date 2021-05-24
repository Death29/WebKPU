function validateEmail() 
{
	var email = document.getElementById("email").value;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(email.match(mailformat))
  	{
    	return true;
  	}
  	else
  	{
    	alert("E-mail Tidak Valid!");
    	return false;
    }
}