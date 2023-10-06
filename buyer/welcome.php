<?php

session_start();

include_once "../shared/connect.php";
$uname = $_SESSION['username'];
$passcheck = "select * from buyer where username='$uname'";
$mysqli_result = mysqli_query($conn, $passcheck);
$row = mysqli_fetch_assoc($mysqli_result);

$_SESSION['login'] = true;



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    :root {
      --border-color: #D7DBE3;
      font-family: -apple-system, BlinkMacSystemFont, 'Roboto', 'Open Sans', 'Helvetica Neue', sans-serif;
      --green: #0CD977;
      --red: #FF1C1C;
      --pink: #FF93DE;
      --purple: #5767ED;
      --yellow: #FFC61C;
      --rotation: 0deg;
    }

    body {
      overflow: hidden;
      width: 100%;
      height: 100%;
    }

    .wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;

    }

    .modal {
      width: 300px;
      margin: 0 auto;
      border: 1px solid var(--border-color);
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.16);
      background-color: #fff;
      border-radius: 0.25rem;
      padding: 2rem;
      z-index: 1;
    }

    .emoji {
      display: block;
      text-align: center;
      font-size: 5rem;
      line-height: 5rem;
      transform: scale(0.5);
      animation: scaleCup 2s infinite alternate;
    }

    @keyframes scaleCup {
      0% {
        transform: scale(0.6);
      }

      100% {
        transform: scale(1);
      }
    }

    h1 {
      text-align: center;
      font-size: 1em;
      margin-top: 20px;
      margin-bottom: 20px;
    }


    .modal-btn {
      display: block;
      margin: 0 -2rem -2rem -2rem;
      padding: 1rem 2rem;
      font-size: .75rem;
      text-transform: uppercase;
      text-align: center;
      color: black;
      font-weight: 600;
      border-radius: 0 0 .25rem .25rem;
      background-color: cadetblue;
      text-decoration: none;
    }

    @keyframes confettiRain {
      0% {
        opacity: 1;
        margin-top: -100vh;
        margin-left: -200px;
      }

      100% {
        opacity: 1;
        margin-top: 100vh;
        margin-left: 200px;
      }
    }

    .confetti {
      opacity: 0;
      position: absolute;
      width: 1rem;
      height: 1.5rem;
      transition: 500ms ease;
      animation: confettiRain 5s infinite;
    }

    #confetti-wrapper {
      overflow: hidden !important;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="modal">
      <span class="emoji round">🎉🎉</span>
      <h1>Welcome <?php echo $uname ?> to JSM Stores</h1>
      <a href="view_pro.php" class="modal-btn">Click to Continue</a>
    </div>
    <div id="confetti-wrapper"></div>
  </div>


  <script>
    for (i = 0; i < 100; i++) {
        // Random rotation
        var randomRotation = Math.floor(Math.random() * 360);
        // Random Scale
        var randomScale = Math.random() * 1;
        // Random width & height between 0 and viewport
        var randomWidth = Math.floor(Math.random() * Math.max(document.documentElement.clientWidth, window.innerWidth || 0));
        var randomHeight = Math.floor(Math.random() * Math.max(document.documentElement.clientHeight, window.innerHeight || 500));

        // Random animation-delay
        var randomAnimationDelay = Math.floor(Math.random() * 15);
        console.log(randomAnimationDelay);

        // Random colors
        var colors = ['#0CD977', '#FF1C1C', '#FF93DE', '#5767ED', '#FFC61C', '#8497B0']
        var randomColor = colors[Math.floor(Math.random() * colors.length)];

        // Create confetti piece
        var confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.top = randomHeight + 'px';
        confetti.style.right = randomWidth + 'px';
        confetti.style.backgroundColor = randomColor;
        // confetti.style.transform='scale(' + randomScale + ')';
        confetti.style.obacity = randomScale;
        confetti.style.transform = 'skew(15deg) rotate(' + randomRotation + 'deg)';
        confetti.style.animationDelay = randomAnimationDelay + 's';
        document.getElementById("confetti-wrapper").appendChild(confetti);
      }
  </script>
</body>

</html>