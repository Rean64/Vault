const searchBar = document.querySelector('.users .search input'),
searchBtn = document.querySelector('.users .search button'),
usersList = document.querySelector('.users .users-list');

let toggleBg = document.querySelector('.bg-icon-show');
let header= document.querySelector('.wrapper');
let users= document.querySelector('.users');


toggleBg.addEventListener('click', () => {
  toggleBg.classList.toggle('active');
  header.classList.toggle('active')
  users.classList.toggle('active')
})


searchBtn.onclick = () => {
  searchBar.classList.toggle('active');
  searchBar.focus();
  searchBtn.classList.toggle('active');
  searchBar.value = "";
}

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if(searchTerm != ""){ 
    searchBar.classList.add('active');
  }else{
    searchBar.classList.remove('active');
  }
   // let's start Ajax
  let xhr = new XMLHttpRequest();  //creating XML object
   xhr.open("POST", "././control/search.php", true);
   xhr.onload = () => {
     if(xhr.readyState === XMLHttpRequest.DONE){
       if(xhr.status === 200){
         let data = xhr.response;
         usersList.innerHTML = data;
       }
     }
   }
   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhr.send("searchTerm=" + searchTerm)
}

setInterval(() => {
   // let's start Ajax
   let xhr = new XMLHttpRequest();  //creating XML object
   xhr.open("GET", "././control/users.php", true);
   xhr.onload = () => {
     if(xhr.readyState === XMLHttpRequest.DONE){
       if(xhr.status === 200){
         let data = xhr.response;
         if(!searchBar.classList.contains("active")){//if active active not contans in the search bar add this data
            usersList.innerHTML = data;
            console.log(data);
         }
       }
     }
   }
   xhr.send()
}, 500);// this function will run frequently after 500ms

