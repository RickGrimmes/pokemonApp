<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokemon App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
      body {
        background-image: url('https://i.redd.it/mnslf2y8hxab1.gif');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        height: 100vh;
        margin: 0;
      }

      .content {
        font-family: 'Press Start 2P', cursive;
        transition: color 0.3s ease;
      }


      .header {
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translateX(-50%);
        font-size: 150px; 
        color: yellow;
        text-shadow: 2px 2px 0px blue, -2px -2px 0px blue, 2px -2px 0px blue, -2px 2px 0px blue;
        letter-spacing: 5px;
      }

      .main-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1rem;
        color: white;
        text-shadow: 2px 2px 0px black, -2px -2px 0px black, 2px -2px 0px black, -2px 2px 0px black;
      }

      .main-text a {
        color: white;
        text-decoration: none;
        font-size: 1.5rem;
        text-shadow: 2px 2px 0px black, -2px -2px 0px black, 2px -2px 0px black, -2px 2px 0px black;
      }

    </style>
  </head>
  <body>
    <div class="content header">
        <h1>Pokémon</h1>
    </div>

    <div class="content main-text">
       <a href="{{route('registro')}}">Pulsar Para Continuar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
