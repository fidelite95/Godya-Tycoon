<?php
include("./brand.php");

session_start();

// $login_id = $_SESSION['id'];
// if (isset($_SESSION['id'])) {
//   $login_status = true;
// }

// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

// GET an index from the previous page
$idx = $_GET['idx'];

// GET a payment method from the previous page
$coin = $_POST['coin'];

// GET a payment method from the previous page
$level = $_POST['level'];

// Pass the variables to next page
$_SESSION['idx'] = $idx;
$_SESSION['coin'] = $coin;
?>

<!DOCTYPE html>
<html>

<head>
  <?php include("./head.php") ?>
  <title>TYCOON | <?php echo $land_code ?></title>
  <link rel="stylesheet" type="text/css" href="process.css" />
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
  <div class="rate_wrapper">

    <!-- Level 1 -->
    <ul class="cards_lv1">
      <li class="card_lv1">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv1">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv1">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv1">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
    </ul>

  </div>

  <script>
    // const cards_lv1 = document.querySelectorAll('.card_lv1');
    const cards = document.querySelectorAll('.card_lv1');

    let matched = 0;
    let cardOne, cardTwo;
    let disableDeck = false;

    function flipCard({
      target: clickedCard
    }) {
      if (cardOne !== clickedCard && !disableDeck) {
        clickedCard.classList.add('flip');
        if (!cardOne) {
          return (cardOne = clickedCard);
        }
        cardTwo = clickedCard;
        disableDeck = true;
        let cardOneImg = cardOne.querySelector('.back-view img').src,
          cardTwoImg = cardTwo.querySelector('.back-view img').src;
        matchCards(cardOneImg, cardTwoImg);
      }
    }

    function matchCards(img1, img2) {
      if (img1 === img2) {
        matched++;
        // Number of matched card pairs
        if (matched == 2) {
          setTimeout(() => {
            return finish();
          }, 1000);
        }
        // Number of matched card pairs
        cardOne.removeEventListener('click', flipCard);
        cardTwo.removeEventListener('click', flipCard);
        cardOne = cardTwo = '';
        return (disableDeck = false);
      }

      setTimeout(() => {
        cardOne.classList.add('shake');
        cardTwo.classList.add('shake');
      }, 400);

      setTimeout(() => {
        cardOne.classList.remove('shake', 'flip');
        cardTwo.classList.remove('shake', 'flip');
        cardOne = cardTwo = '';
        disableDeck = false;
      }, 1200);
    }

    function shuffleCard() {
      matched = 0;
      disableDeck = false;
      cardOne = cardTwo = '';
      // Cards' indexes
      let arr = [1, 2, 1, 2];
      // Cards' indexes
      arr.sort(() => (Math.random() > 0.5 ? 1 : -1));
      cards.forEach((card, i) => {
        card.classList.remove('flip');
        let imgTag = card.querySelector('.back-view img');
        imgTag.src = `./images/rating/build_card_${arr[i]}.png`;
        card.addEventListener('click', flipCard);
      });
    }

    function finish() {
      location.href = 'uranos_rate_ok.php';
    }

    shuffleCard();

    cards.forEach(card => {
      card.addEventListener('click', flipCard);
    });
  </script>
</body>

<?php
// }
?>

</html>