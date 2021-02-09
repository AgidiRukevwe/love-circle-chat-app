const friend_id = document.getElementById("friend_id");
const room_id = document.getElementById("room_id");
const message_input_form = document.querySelector(".input__form");
const message_input = document.querySelector("#message_input");

function loadDoc() {
  var xhttp = new XMLHttpRequest();

  xhttp;
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const rooms = JSON.parse(this.responseText);
      console.log(rooms);

      rooms.map((room) => {
        const li = document.createElement("LI");
        li.innerHTML = room.first_name;
        document.querySelector(".list").appendChild(li);
        li.setAttribute("tabindex", "-1");

        li.addEventListener("focus", () => {
          const interval = setInterval(() => {
            fetchMessages(room);
          }, 1000);

          //send friend Id and front id to fromt end
          friend_id.value = room.user_id;
          room_id.value = room.room_id;

          li.addEventListener("blur", () => {
            clearInterval(interval);
          });

          //get and send message and ids from the message input
          message_input.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
              e.preventDefault();
              if (e.target.value !== "" || " ") {
                fetchMessages(room);
                e.target.value = null;
                console.log(e.target.value);
              } else return false;

              // const friend_id = document.querySelector("#friend_id").value;
              // const room_id = document.querySelector("#room_id").value;
              // const form_data = new FormData();

              // form_data.append("friend", friend_id);
              // form_data.append("room", room_id);

              // const fetchMsg = async () => {
              //   await fetch("/chat-app/message.php", {
              //     method: "POST",
              //     mode: "same-origin",
              //     credentials: "same-origin",
              //     body: form_data,
              //   }).then((res) => {
              //     console.log(res.text());
              //   });
              // };
              // fetchMsg();
            }
          });
        });
      });
    }
  };

  xhttp.open("GET", "fetchData.php", true);
  xhttp.send();
}

loadDoc();

const fetchMessages = async (room) => {
  //get values from fron end
  const friend_id = document.querySelector("#friend_id").value;
  const room_id = document.querySelector("#room_id").value;
  const message_body = message_input.value;

  //create a new form
  const form_data = new FormData();

  //append values gotten from front ent to form
  form_data.append("friend", friend_id);
  form_data.append("room", room_id);
  form_data.append("message_body", message_body);

  //send form to backend and expect a response
  await fetch("/chat-app/message.php", {
    method: "POST",
    mode: "same-origin",
    credentials: "same-origin",
    body: form_data,
  }).then(async (res) => {
    const response = await res.text();

    const messages = await JSON.parse(response);

    console.log(messages);
    document.querySelector(".message_list").innerText = "";

    messages.map((message) => {
      const li = document.createElement("LI");
      const p = document.createElement("DIV");
      li.appendChild(p);
      p.innerText = message.message_body;
      if (message.sender_id === room.user_id) {
        p.classList.add("my_messages");
      } else {
        p.classList.add("friend_messages");
      }
      document.querySelector(".message_list").appendChild(li);
    });
  });
};
