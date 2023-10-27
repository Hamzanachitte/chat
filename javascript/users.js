const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");
Seen = document.querySelector(".details");

searchIcon.onclick = ()=>{
  
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);




// function markAsRead(message_id) {
//   // Make an AJAX request to the server to mark the message as read
//   // You'll need to implement this part on the server-side to update the message status in your database.

//   // For demonstration purposes, let's assume the request is successful:
//   var xhr = new XMLHttpRequest();
//   xhr.open("GET", "mark_message_as_read.php?msg_id=" + message_id, true);
//   xhr.send();

//   // Now, you can visually indicate that the message has been read (e.g., change its style).
//   var messageLink = event.currentTarget; // Get the clicked <a> element
//   messageLink.style.fontWeight = "normal"; // Change the font style to indicate "read"
// }