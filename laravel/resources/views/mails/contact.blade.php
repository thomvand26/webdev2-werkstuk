<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="../../assets/img/icons/foundation-favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width">
    <title>Contact Yousician - {{ $subject }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <style>
      * {
        font-family: 'Montserrat', sans-serif;
        box-sizing: border-box;
        color: #4b4a49;
      }

      a {
        color: #ffffff;
      }
      
      body {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 auto;
      }

      header {
        min-width: 200px;
        max-width: 600px;
        padding: 20px;
        margin: 100px auto 140px auto;
        width: 100%;
      }
      
      .logo {
        font-weight: 900;
        font-size: 60px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #6fc13e;
        width: 100%;
        text-align: center;
        margin: 0 auto;
      }
      
      .subheader {
        font-weight: 400;
        font-size: 18px;
        width: 100%;
        text-align: center;
        text-transform: initial;
      }
      
      main {
        min-width: 200px;
        max-width: 600px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        font-size: 14px;
        width: 100%;
        margin-bottom: 200px;
      }
      
      .sender {
        font-size: 18px;
        font-weight: bold;
        width: fit-content;
      }
      
      .contentBox {
        background-color: #f6f6f6;
        padding: 20px;
        height: fit-content;
        min-height: 100px;
        margin: 20px 0;
      }
      
      .sidenote {
        margin-left: auto;
        font-style: italic;
        width: fit-content;
        color: #6fc13e;
      }

      .buttonWebsite {
        display: block;
        background-color: #6fc13e;
        color: #ffffff;
        font-weight: bold;
        font-size: 18px;
        text-decoration: none;
        text-transform: uppercase;
        text-align: center;
        padding: 10px;
        border-radius: 100px;
        width: 200px;
      }

      .footer {
        min-width: 200px;
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
      }

      .spacer60 {
        height: 60px;
      }

      .spacer100 {
        height: 100px;
      }

      .spacer140 {
        height: 140px;
      }

      .spacer200 {
        height: 200px;
      }
    </style>
</head>

<body>
  <div class="spacer100"></div>

  <header class="logo">
    <div class="logo">Yousician</div>
    <div class="subheader">Thanks for contacting us!</div>
  </header>

  <div class="spacer140"></div>

  <main>
    <div class="sender">{{ $name }}:</div>
    <div class="contentBox">{{ $content }}</div>
    <div class="sidenote">- Sent from the website.</div>
    
    <div class="spacer60"></div>

    <a class="buttonWebsite" style="color: #ffffff; margin: 0 auto;" href="{{ route('home') }}">Website</a>
  </main>
  
  <div class="spacer200"></div>
  
  <table class="footer" style="background-color: #4b4a49;">
    <tbody>
      <tr><td class="spacer100"></td></tr>
      <tr><td class="logo">Yousician</td></tr>
      <tr><td class="spacer100"></td></tr>
    </tbody>
  </footer>

  <!-- prevent Gmail on iOS font size manipulation -->
  <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;">
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  </div>
</body>

</html>
