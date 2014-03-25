
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

        <form id="form-error-report" class="form-horizontal" action="api/error_report.php" method="post">

          <div class="col-md-3">

            <label class="control-label" for="name">Namn</label>  
            <input id="name" name="name" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="social-security">Personnummer</label>  
            <input id="social-security" name="social-security" type="text" placeholder="ÅÅMMDD-XXXX" class="form-control input-md">

            <label class="control-label" for="phone">Telefon</label>  
            <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="email">E-post</label>  
            <input id="email" name="email" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="address">Adress</label>  
            <input id="address" name="address" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="apartment-number">Lägenhetsnummer</label>  
            <input id="apartment-number" name="apartment-number" type="text" placeholder="" class="form-control input-md">

          </div>

          <div class="col-md-3">

            <label class="control-label" for="master-key-allowed">Huvudnyckel får användas</label>
            <select id="master-key-allowed" name="master-key-allowed" class="form-control">
              <option value="Ja">Ja</option>
              <option value="Nej">Nej</option>
            </select>

            <label class="control-label" for="summary">Beskrivning</label>
            <textarea class="form-control" id="summary" name="summary" style="height: 171px; resize: none;"></textarea>

          </div>

        </form>

        <div class="col-md-12"  style="margin-top: 5px">
          <button id="submit-error-report" name="submit-error-report" class="btn btn-success">Skicka</button>
          <hr>
          <div class="alert alert-info"><strong>Felanmälan skickad!</strong></div>
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
      function resetForm() {
        $('#name').val("");
        $('#social-security').val("");
        $('#address').val("");
        $('#phone').val("");
        $('#email').val("");
        $('#apartment-number').val("");
        $('#summary').val("");
      }

      function validateFields() {
        var validateState = true;
        if($('#name').val().trim() == "") {
          validateState = false;
          $('#name').addClass('has-error');
        }

        var pattern =/^([0-9]{6})-([0-9]{4})$/;
        if($('#social-security').val().trim() == "" || !pattern.test($('#social-security').val())) {
          validateState = false;
          $('#social-security').addClass('has-error');
          $('#social-security').val("");
        }

        if($('#address').val().trim() == "") {
          validateState = false;
          $('#address').addClass('has-error');
        }

        if($('#phone').val().trim() == "") {
          validateState = false;
          $('#phone').addClass('has-error');
        }

        if($('#email').val().trim() == "") {
          validateState = false;
          $('#email').addClass('has-error');
        }

        if($('#apartment-number').val().trim() == "") {
          validateState = false;
          $('#apartment-number').addClass('has-error');
        }

        if($('#summary').val().trim() == "") {
          validateState = false;
          $('#summary').addClass('has-error');
        }

        return validateState;
      }

      loadNavbar('navbar.json');
      $('.alert').hide();

      $('form').on('submit', function(event){

        var link = $(this).attr('action');
        $('input').removeClass('has-error');

        $('.alert').hide();
        if(validateFields()) {
          $.post(link,$(this).serialize(), function(data, status) {
            resetForm();
            $('.alert').show();
          });
        }

        return false;

      });

      $('#submit-error-report').on('click', function(event){
        $('#form-error-report').submit();
      });
    </script>

  </body>
</html>
