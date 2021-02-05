const friend_id = document.getElementById("friend_id");
const room_id = document.getElementById("room_id");

function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const rooms = JSON.parse(this.responseText);
      console.log(rooms);

      rooms.map((room) => {
        const li = document.createElement("LI");

        li.innerHTML = room.first_name;

        document.querySelector(".list").appendChild(li);

        li.addEventListener("click", () => {
          history.pushState({}, "", `?roomid=${room.room_id}`);
          friend_id.value = room.user_id;
          console.log(friend_id.value);
          room_id.value = room.room_id;
        });
      });
    }
  };

  xhttp.open("GET", "fetchData.php", true);
  xhttp.send();
}

// const fetchData = async () => {
//   await fetch("fetchData.php").then(async (res) => {
//     json = await res.json();
//     console.log(json);
//   });
// };
// fetchData();

// setInterval(loadDoc, 3000);
loadDoc();
