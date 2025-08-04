// var url = this.location.href;
// $('a').on('click', function(e){
//   e.preventDefault();
//   console.log(url);
//   $('a.current').removeClass('current')
//   $(this).addClass('current')

//   $('section').remove();
//   $('.wrapper').load(url + ' .wrapper').hide().fadeIn('slow')
// })


const form = document.querySelector('.signup form'),
continueBtn = form.querySelector('.button input'),
errorText = form.querySelector('.error-text');

form.onsubmit = (e) => {
  e.preventDefault();
}

continueBtn.onclick = () => {
  // let's start Ajax
  let xhr = new XMLHttpRequest();  //creating XML object
  xhr.open("POST", "././control/signup.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if(data === "success"){
          location.href = "users.php";
        }else{
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  }
  // we have to send the form data through ajax to php
  let formData = new FormData(form); //creating new formData object
  xhr.send(formData); // sending the form data to php
}