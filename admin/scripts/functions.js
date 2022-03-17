function deleteConfirm(id) {
  if (confirm("Voulez vous vraiment supprimer ?")) {
    window.location.replace("/?id=" + id + "&action=delete");
  }
}

function deletePlanning(client_id, chambre_id, jour) {
  if (confirm("Voulez vous vraiment supprimer ?")) {
    window.location.replace("/client.php/?client_id="+client_id+"&action=delete&chambre_id="+chambre_id+"&jour="+jour);
  }
}

function search() {
  let li = document.getElementsByTagName("li");
  let filtre = document.getElementById("search").value.toUpperCase();
  for (let i = 1; i < li.length; i++) {
    let name = li[i]
      .getElementsByTagName("input")[0]
      .getAttribute("value")
      .toUpperCase();
    if (name.indexOf(filtre) == -1) {
      li[i].style.display = "none";
    } else {
      li[i].style.display = "";
    }
  }
}
