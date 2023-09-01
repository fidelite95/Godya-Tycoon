<?php
include("./brand.php");

session_start();

$login_id = $_SESSION['id'];
if (isset($_SESSION['id'])) {
  $login_status = true;
}

// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

// POST an index from the previous page
$idx = $_POST['idx'];

// POST a payment method from the previous page
$coin = $_POST['coin'];
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
  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal_content">
      <p>승급을 완료하시겠습니까?</p>
      <button class="btn btn-effect" id="btnSuccess"><span>완료하기</span></button>
    </div>
  </div>

  <div class="rate_wrapper">

    <form>
      <input type="hidden" name="idx" id="idx" value="<?= $idx; ?>">
      <input type="hidden" name="coin" id="coin" value="<?= $coin; ?>">
    </form>

    <!-- Level 4 -->
    <ul class="cards_lv4">
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
        <div class="view front-view">
          <img src="./images/rating/que_icon.svg" alt="icon">
        </div>
        <div class="view back-view">
          <img src="./images/rating/build_card_1.png" alt="card-img">
        </div>
      </li>
      <li class="card_lv4">
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
    const cards = document.querySelectorAll('.card_lv4');

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
        if (matched == 12) {
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
      let arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
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
      modal.style.display = "block";
    }

    const modal = document.getElementById("myModal");
    const btnSuccess = document.getElementById("btnSuccess");

    function success(idx, coin) {
      location.href = "uranos_rate_ok.php?idx=" + idx + "&coin=" + coin;
    }

    btnSuccess.addEventListener("click", () => {
      let idx = document.getElementById('idx').value;
      let coin = document.getElementById('coin').value;
      success(idx, coin);
    })

    window.addEventListener("click", () => {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    })

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