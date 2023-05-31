<?php
session_start();
$_SESSION['nom_image'] ='RomeoEtJuliette1';
$_SESSION['id_jeu'] =8;
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
        <i>Read the following text : Romeo & Juliette, Act I Prologue</i>

        <p>
        Two households, both alike in dignity<br>
    In fair Verona, where we lay our scene<br>
    From ancient grudge break to new mutiny<br>
    Where civil blood makes civil hands unclean.<br>
    From forth the fatal loins of these two foes<br>
    A pair of star-crossed lovers take their life<br>
    Whose misadventured piteous overthrows<br>
    Do with their death bury their parents strife<br>
    The fearful passage of their death marked love<br>
    And the continuance of their parents' rage<br>
    Which but their childrens' end, nought could remove<br>
    Is now the two hour's traffic of our stage<br>
    The which if you with patient ears attend<br>
    What here shall miss, our toil shall strive to mend.</p>

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
