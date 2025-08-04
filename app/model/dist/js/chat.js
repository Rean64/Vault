const form = document.querySelector('.typing-area'),
inputField = form.querySelector('.message'),
inputFile = form.querySelector('.photo'),
sendBtn = form.querySelector('button'),
chatBox = document.querySelector('.chat-box');


let camera = document.querySelector('.send-photo');
let toggleBtn = document.querySelector('.video-icon-show');
let toggleBg = document.querySelector('.bg-icon-show');
let header= document.querySelector('.header');
let arrow= document.querySelector('.back-arrow');


camera.addEventListener('click', (e)=>{
    e.preventDefault()
    inputFile.classList.toggle('hide')
    inputField.classList.toggle('hide')
    inputField.value = ""; 
    inputFile.value = "";
})

toggleBtn.addEventListener('click', () => {
    toggleBtn.classList.toggle('active');
})

toggleBg.addEventListener('click', () => {
    toggleBg.classList.toggle('active');
    form.classList.toggle('active')
    camera.classList.toggle('active')
    header.classList.toggle('active')
    arrow.classList.toggle('active')
    chatBox.classList.toggle('bg')
})

form.onsubmit = (e) => {
  e.preventDefault();  
}

sendBtn.onclick = () => {
    // let's start Ajax
    scrollToBottom();
    let xhr = new XMLHttpRequest();  //creating XML object
    xhr.open("POST", "././control/insert-chat.php", true);
    xhr.onload = () => {
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          inputField.value = ""; //once message inserted into database then leave blank the input field
          inputFile.value = "";
        }
      }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); // sending the form data to php                                                      
}

setInterval(() => {
  // let's start Ajax
  let xhr = new XMLHttpRequest();  //creating XML object
  xhr.open("POST", "././control/get-chat.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        chatBox.innerHTML = data;
       if(!chatBox.classList.contains('active')){//if active class not contains in chatbox then scroll to bttom
        scrollToBottom();
       }
      }
    }
  }
  // we have to send the form data through ajax to php
  let formData = new FormData(form); //creating new formData object
  xhr.send(formData); // sending the form data to php  
}, 500);// this function will run frequently after 500ms

  chatBox.onmouseenter = () =>{
    window.scrollTo({
      top: 0,
      bahevior: 'smooth'
    });
    chatBox.classList.add('active');
  }

  chatBox.onmouseleave = () =>{
    window.scrollTo({
      bottom: 0,
      bahevior: 'smooth'
    });
    chatBox.classList.remove('active');
  }

  function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }

