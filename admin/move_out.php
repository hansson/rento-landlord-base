
<!DOCTYPE html>
<html lang="sv">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Tobias Hansson">

    <title>Hyresvärd - Rento.nu</title>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/rento.css" rel="stylesheet">
    <link href="../css/jquery-upload-file.css" rel="stylesheet">

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
          <a class="navbar-brand" href="index.php">Rento.nu </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="row">
          <div class="col-md-12">
            <h3>Avflytt</h3>
            <textarea id="move_out-info" name="info" class="std-textarea"></textarea>
            <button id="submit-info" name="submit-info" class="btn btn-success" style="margin-top: 10px">Spara</button>
            <div class="alert alert-info"><strong>Text uppdaterad!</strong></div>
          </div>
      </div>
    </div> <!-- /container -->

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/global.js"></script>

    <script type="text/javascript" src="../js/nicEdit.js"></script>
    <script>
      $('.alert').hide();

      bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      $.get('../api/info.php?move_out=1',function(data){
        nicEditors.findEditor("move_out-info").setContent(data);
      });

      loadNavbar('admin-navbar.json');

      $(document).ready(function() {
        $('#submit-info').on('click', function(event){
          $.post('../api/info.php','move_out=' + nicEditors.findEditor("move_out-info").getContent(), function(data, status) {
              $('.alert').show();
          });
        });

      });
    </script>

  </body>
</html>
