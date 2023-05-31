<?php
session_start();
$_SESSION['nom_image'] ='RomeoEtJuliette2';
$_SESSION['id_jeu'] =9;
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
        <i>Read the following text : Romeo & Juliette, Act II Scene 1 (balcony) </i>

        <p>
        Juliet :<br>
    O Romeo, Romeo, wherefore art thou Romeo ?<br>
    Deny thy father and refuse thy name ;<br>
    Or, if thou wilt not, be but sworn my love,<br>
    And I'll no longer be a Capulet.<br>
    <br>
    Romeo :<br>
    Shall I hear more, or shall I speak at this ?<br>
    <br>
    Juliet :<br>
    'Tis but thy name that is my enemy ;<br>
    Thou art thyself, though not a Montague.<br>
    What's Montague ? it is nor hand nor foot<br>
    No arm nor face, nor any other part<br>
    Belonging to a man. O, be some other name !<br>
    What's in a name ? that which we call a rose<br>
    By any other name would smell as sweet ;<br>
    So Romeo would, were he not Romeo call'd,<br>
    Retain that dear perfection which he owes<br>
    Without that title. Romeo, doff thy name,<br>
    And for thy name, which is no part of thee,<br>
    Take all myself.<br>
    <br>
    Romeo :<br>
    I take thee at thy word :<br>
    Call me but love, and I'll be new baptised ;<br>
    Henceforth I never will be Romeo.<br>
    <br>
    Juliet :<br>
    What man art thou, that, thus bescreen'd in night<br>
    So stumblest on my counsel ?<br>
    <br>
    Romeo :<br>
    By a name<br>
    I know not how to tell thee who I am :<br>
    My name, dear saint, is hateful to myself,<br>
    Because it is an enemy to thee ;<br>
    Had I it written, I would tear the word.<br>
    <br>
    Juliet :<br>
    My ears have not yet drunk a hundred words<br>
    Of thy tongue's uttering, yet I know the sound :<br>
    Art thou not Romeo, and a Montague ?<br>
    <br>
    Romeo :<br>
  Neither, fair maid, if either thee dislike</p>

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
