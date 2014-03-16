
<!DOCTYPE html>
<html lang="sv">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Tobias Hansson">

    <title>Hyresvärd - Rento.nu</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/rento.css" rel="stylesheet">
    <link href="css/jquery-upload-file.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Rento.nu </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="row">

      <div class="col-md-12">
        <h2>Felanmälan</h2>
      </div>

        <form id="create-form" class="form-horizontal" action="api/error_report.php" method="post">

          <div class="col-md-3">

            <label class="control-label" for="name">Namn</label>  
            <input id="name" name="name" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="social-security">Personnummer</label>  
            <input id="social-security" name="social-security" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="phone">Telefon</label>  
            <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="email">Epost</label>  
            <input id="email" name="email" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="address">Adress</label>  
            <input id="address" name="address" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="apartment-number">Lägenhetsnummer</label>  
            <input id="apartment-number" name="apartment-number" type="text" placeholder="" class="form-control input-md">

          </div>

          <div class="col-md-3">

            <label class="control-label" for="master-key">Huvudnyckel får användas</label>
            <select id="master-key" name="master-key" class="form-control">
              <option value="Ja">Ja</option>
              <option value="Nej">Nej</option>
            </select>

            <label class="control-label" for="summary">Beskrivning</label>
            <textarea class="form-control" id="summary" name="summary" style="height: 171px; resize: none;"></textarea>

          </div>

          <div class="col-md-12"  style="margin-top: 5px">
            <button id="save" name="save" class="btn btn-success">Skicka</button>
            <hr>
            <div class="alert alert-info"><strong>Felanmälan skickad!</strong></div>
          </div>



        </form>

      </div>


    </div> <!-- /container -->

    <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/global.js"></script>

    <script src="js/jquery-upload-file.js"></script>

    <script>
      loadNavbar('navbar.json');
    </script>

  </body>
</html>
