<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="tycoon.css" />
    <link rel="stylesheet" type="text/css" href="tycoon_transition.css" />
    <title>Godya Tycoon</title>
  </head>
  <body>
    <div class="container">
      <h1>Tycoon Detail</h1>
    </div>

    <script>
      const openButton = document.querySelector("[data-open-modal]");
      const closeButton = document.querySelector("[data-close-modal]");
      const modal = document.querySelector("[data-modal]");

      openButton.addEventListener("click", () => {
        modal.showModal();
      });

      closeButton.addEventListener("click", () => {
        modal.close();
      });

      // Sample Data
      const tc_data = [
        {
          owner: "신이야최고",
          building: "스타디움",
          price: 2000,
        },
        {
          owner: "GM제우스",
          building: "아고라",
          price: 1000,
        },
        {
          owner: "Romaniz",
          building: "파르테노나스",
          price: 5000,
        },
      ];
    </script>
  </body>
</html>
