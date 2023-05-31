<?php
session_start();
$_SESSION['nom_image'] ='harrypotter';
$_SESSION['id_jeu'] =7;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 2 - Serious Language Game</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
      }

      .centrer {
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      h1 {
        text-align: center;
        font-size: 3rem;
        margin-top: 0;
      }

      h2 {
        font-size: 2rem;
        margin-top: 0;
      }

      i {
        font-size: 1.3rem;
        display: block;
        margin-bottom: 20px;
      }

      hr {
        margin: 40px 0;
        border: none;
        border-top: 1px solid #ccc;
      }

      img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        height: auto;
      }

      a {
        display: inline-block;
        margin-top: 20px;
        text-decoration: none;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        transition: all 0.3s ease;
      }

      a:hover {
        background-color: #000;
      }

      strong {
        display: inline-block;
        margin-top: 20px;
        text-decoration: none;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
      }
      strong:hover {
        background-color: #000;
        cursor: hand;
      }

      @media only screen and (max-width: 600px) {
        h1 {
          font-size: 2rem;
        }

        h2 {
          font-size: 1.5rem;
        }

        i {
          font-size: 1rem;
        }
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
  </head>

  <body>
    <div class="container">
      <header>
        <h1 class="centrer">Serious Language Game</h1>
      </header>

      <main>
        <h2>Activity 2</h2>
        <i>Read the following text : Harry Potter and The Sorcerer's Stone, Chapter 2 "The Vanishing Glass" </i>

        <p>
      	Nearly ten years had passed since the Dursleys had woken up to find their nephew on the front step, but Privet Drive had hardly changed at all. The sun rose on the same tidy front gardens and lit up the brass number four on the Dursleys' front door; it crept into their living room, which was almost exactly the same as it had been on the night when Mr. Dursley had seen that fateful news report about the owls. Only the photographs on the mantelpiece really showed how much time had passed. Ten years ago, there had been lots of pictures of what looked like a large pink beach ball wearing different-colored bonnets - but Dudley Dursley was no longer a baby, and now the photographs showed a large blond boy riding his first bicycle, on a carousel at the fair, playing a computer game with his father, being hugged and kissed by his mother. The room held no sign at all that another boy lived in the house, too.
      	<br><br>
		Yet Harry Potter was still there, asleep at the moment, but not for long. His Aunt Petunia was awake and it was her shrill voice that made the first noise of the day.
		<br><br>
		"Up! Get up! Now!"
		<br><br>
		Harry woke with a start. His aunt rapped on the door again.
		<br><br>
		"Up!" she screeched. Harry heard her walking toward the kitchen and then the sound of the frying pan being put on the stove. He rolled onto his back and tried to remember the dream he had been having. It had been a good one. There had been a flying motorcycle in it. He had a funny feeling he'd had the same dream before.
		<br><br>
		His aunt was back outside the door.
		<br><br>
		"Are you up yet?" she demanded.
		<br><br>
		"Nearly," said Harry.
		<br><br>
		"Well, get a move on, I want you to look after the bacon. And don't you dare let it burn, I want everything perfect on Duddy's birthday."
		<br><br>
		Harry groaned.
		<br><br>
		"What did you say?" his aunt snapped through the door.
		<br><br>
		"Nothing, nothing . . ."</p>

      </main>

      <hr>

      <script type="text/JavaScript" src="script.js"></script>

      <div id="espaceMicro">
      <strong id="startButton" style="background-color: limegreen;"><span class="boutons">START</span></strong>
      <strong id="stopButton" style="background-color: tomato;"><span class="boutons">STOP</span></strong>
      <span id="status"></span>

      <a href="menuBeau.html" style="margin-left: 90%;">NEXT</a>

      <footer>
        <p>© 2023 Serious Language Game. All rights reserved.</p>
      </footer>
    </div>
  </body>
</html>
