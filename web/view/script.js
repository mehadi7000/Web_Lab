

function checkName() {
  let name = document.getElementById("name").value;
  if (name === "" || name.length < 5) {
    document.getElementById("name_error").style.display = "inline";
    return false;
  } else {
    document.getElementById("name_error").style.display = "none"; 
    return true; 
  }
}

function checkEmail() {
  let inserted_email = document.getElementById("email").value;

  let email_pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!email_pattern.test(inserted_email) || inserted_email === "") {
    document.getElementById("email_error").style.display = "inline";
    return false;
  } else {
    document.getElementById("email_error").style.display = "none";
    return true;
  }
}

function checkPhone() {
  let phone = document.getElementById("phone").value;

  if (phone.length < 10 || isNaN(phone)) {
    document.getElementById("phone_error").style.display = "inline";
    return false;
  } else {
    document.getElementById("phone_error").style.display = "none";
    return true;
  }
}


function checkBCN() {
  let bcn = document.getElementById("BCN").value;

  if (bcn.length < 10 || isNaN(bcn)) {
    document.getElementById("bcn_error").style.display = "inline";
    return false;
  } else {
    document.getElementById("bcn_error").style.display = "none";
    return true;
  }
}


function checkBirthday() {
  let birthday = document.getElementById("birthday").value;

  if (birthday === "") {
    document.getElementById("birthday_error").style.display = "inline";
    return false;
  } else {
    document.getElementById("birthday_error").style.display = "none";
    return true;
  }
}
function checkEducation() {
  let running = document.getElementById("running").checked;
  let dropped = document.getElementById("dropped").checked;

  if (!running && !dropped) {
    document.getElementById("education_error").style.display = "inline";
    return false;
  } else {
    document.getElementById("education_error").style.display = "none";
    return true;
  }
}



function validateForm() {
  checkName();
  checkEmail();
  checkPhone();
  checkBCN();
  checkBirthday();
  checkEducation();
  if (
    checkName() == false ||checkEmail() == false ||checkPhone() == false ||checkBCN() == false ||checkBirthday() == false ||checkEducation() == false ) {
    return false;
  }
  return true;
}
