const loginBtnVisi = document.getElementById("login-password-btn");
const loginPassword = document.getElementById("login-password");

let passBool = false;
const HelperLoginVisiBtn = () => {
  if (passBool) {
    loginPassword.setAttribute("type", "password");
    loginBtnVisi.classList.remove('fa-eye-slash')
    loginBtnVisi.classList.add('fa-eye')
    passBool = false;
  } else {
    loginPassword.setAttribute("type", "text");
    loginBtnVisi.classList.remove('fa-eye')
    loginBtnVisi.classList.add('fa-eye-slash')

    passBool = true;
  }
};

loginBtnVisi.addEventListener("click", HelperLoginVisiBtn);
