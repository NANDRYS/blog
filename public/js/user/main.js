let main = document.querySelector(".container");

main.addEventListener("click", async (e) => {
    e.preventDefault();
    if (e.target.matches(".remove-favourites")) {
        const postId = e.target
            .closest("form")
            .querySelector('[name="post_id"]').value;
        const token = document.querySelector("[name='_token']").value;

        if (!token) {
            console.error("Invalid CSRF token");
            return;
        }

        console.log(token);

        const resp = await fetch("/", {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
                //  "X-Requested-With": "XMLHttpRequest",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id: postId }),
        });

        console.log(resp);

        const data = await resp.json();

        if (resp.status === 200) {
            console.log("Удаление успешно");
        } else {
            console.error("Ошибка удаления:", data.error);
        }
    }
});

//   const ID = e.target
//       .closest("form")
//       .querySelector('[name="post_id"]').value;

//   const token = document.querySelector('[name="_token"').value;

//   const resp = await fetch("/", {
//       method: "DELETE",
//       headers: {
//           "X-CSRF-TOKEN": token,
//           "Content-Type": "application/json",
//       },
//       body: JSON.stringify({ id: ID }),
//   });

//   console.log(resp);

//   if (RESP) {
//       const data = await asd.json();
//   }
