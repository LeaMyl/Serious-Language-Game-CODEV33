<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serious Language Game</title>
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

      a {
        display: block;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        color: #333;
        margin-bottom: 20px;
        transition: all 0.3s ease;
      }

      a:hover {
        background-color: #f8f8f8;
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
  </head>

  <body>
    <div class="container">
      <header>
        <h1 class="centrer">Serious Language Game</h1>
      </header>

      <main>
        <h2>Activity 1 : Describe the image</h2>
        <i>Choose the image you would like to describe</i>

        <a href="1parc.php">Theme 1 : Child Park</a>
        <a href="1plage.php">Theme 2 : Plage</a>
        <a href="1foret.php">Theme 3 : Forest</a>
        <a href="1camping.php">Theme 4 : Camping</a>
        <a href="1parcAttraction.php">Theme 5 : Amusement Park</a>
        <a href="1fire.php">Theme 6 : Fire</a>
      </main>

      <hr>

      <footer>
        <p>© 2023 Serious Language Game. All rights reserved.</p>
      </footer>
    </div>
  </body>
</html>
