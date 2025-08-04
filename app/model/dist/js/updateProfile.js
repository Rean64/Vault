const form = document.querySelector('.signup form'),
continueBtn = form.querySelector('.button input'),
errorText = form.querySelector('.error-text'),
successText = form.querySelector('.success-text');

let fileInput = document.querySelector('#upload');

form.onsubmit = (e) => {
  e.preventDefault();
}


function file(){
  fileInput.setAttribute('accept', 'image/*');
  fileInput.click();
}


continueBtn.onclick = () => {
  // let's start Ajax
  let xhr = new XMLHttpRequest();  //creating XML object
  xhr.open("POST", "././control/updateProfile.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if(data === "Account Updated"){
          successText.textContent = data;
          successText.classList.add('active')
          successText.style.display = "block";
        }else{
          errorText.textContent = data;
          errorText.classList.add('active')
          errorText.style.display = "block";
        }
      }
    }
  }
  // we have to send the form data through ajax to php
  let formData = new FormData(form); //creating new formData object
  xhr.send(formData); // sending the form data to php

  run()
  function run(){
    console.log('yess inside');
    if(successText.classList.contains('active')){
      console.log('yess');
      setTimeout(() => {
       window.Location.href = 'user.php'
      }, 3000);
    }else{
      setTimeout(() => {
        errorText.remove();
      }, 3000);
    }
    }
}