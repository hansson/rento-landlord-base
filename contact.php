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
          <a class="navbar-brand" href="#">Rento.nu</a>
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
              <h2>Kontakt</h2>
              <div id="contact-info" style="word-wrap: break-word"></div>
          </div>
          <div id="staff-container" class="col-md-12">

          </div>
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
    <script>
      loadNavbar('navbar.json');
      $.get('api/info.php?contact=1',function(data){
        $('#contact-info').html(data);
      });

      $.get('api/contacts.php',function(data){
        if(data.length > 0) {
          var html = '<h2>Personal</h2>';
          for (var i = 0; i < data.length; i++) {
            html += '<div class="col-md-4 contact">';
            html += '<img src="img/contacts/' + data[i].imageName + '" class="img-responsive img-rounded img-contact" />';
            html +=  data[i].name + '<br />';
            html +=  data[i].position + '<br />';
            html +=  data[i].email + '<br />';
            html +=  data[i].phone + '<br />';
            html += '</div>';
          };
          $('#staff-container').html(html);
        } 
        
      });
    </script>

  </body>
</html>
