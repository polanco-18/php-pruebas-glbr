
$(document).ready(function () {
document.getElementById("PasswordNew").addEventListener("keyup", testpassword2);
document.getElementById("PasswordNew2").addEventListener("keyup", testpassword2);

function testpassword2() {
  var PasswordNew = document.getElementById("PasswordNew");
  var PasswordNew2 = document.getElementById("PasswordNew2");
  if (PasswordNew.value == PasswordNew2.value)
    PasswordNew2.style.borderColor = "#2EFE2E";
  else
    PasswordNew2.style.borderColor = "red";
}
});