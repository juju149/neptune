function deleteConfirm(id) {
  if (confirm("Voulez vous vraiment supprimer ?")) {
    window.location.replace("/?id=" + id + "&action=delete");
  }
}

function alertMessage(text) {
  alert(text)
}

function search() {
  let li = document.getElementsByTagName("li");
  let filtre = document.getElementById("search").value.toUpperCase();
  console.log(li);
  for (let i = 1; i < li.length; i++) {
    let name = li[i].getElementsByTagName("input")[0].getAttribute("value").toUpperCase();
    if(name.indexOf(filtre) == -1)
    {
      li[i].style.display = "none";
    }else{
      li[i].style.display = "";
    }
    
  }
}
