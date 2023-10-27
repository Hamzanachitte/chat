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


$(document).ready(function() {
  
  
  
  
const detailLinks = document.querySelectorAll(".mesg");

detailLinks.forEach(link => {
    link.addEventListener("click", function(event) {
      alert("ff");
        event.preventDefault(); // Prevent the default behavior of following the link

        // Get the user_id from the data attribute
        const user_id = link.getAttribute("data-user-id");
console.log(user_id);
        // Send an AJAX request to the "php/mark-as-seen.php" script
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "mark-as-seen.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Database update was successful
                    // You can update the UI or display a message to the user
                    console.log(xhr.responseText);
                } else {
                    // Handle errors
                    console.error("Database update failed");
                }
            }
        };

        // Send the user_id in the request data
        const data = `user_id=${user_id}`;
        xhr.send(data);
    });
});

});