
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
          <div class="col-md-4">
            <img src="img/houses.jpg" class="img-responsive img-rounded" style="margin-bottom: 2px" />
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#interest-modal">Anmäl intresse</button>
          </div>
          <div class="col-md-8">
           <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="width: 80px">Beskrivning</td>
                    <td id="summary"></td>
                  </tr>
                  <tr>
                    <td>Adress</td>
                    <td id="apartment-address"></td>
                  </tr>
                  <tr>
                    <td>Område</td>
                    <td id="area"></td>
                  </tr>
                  <tr>
                    <td>Ort</td>
                    <td id="apartment-city"></td>
                  </tr>
                  <tr>
                    <td>Hyra</td>
                    <td id="rent"></td>
                  </tr>
                  <tr>
                    <td>Storlek</td>
                    <td id="size"></td>
                  </tr>
                  <tr>
                    <td>Rum</td>
                    <td id="rooms"></td>
                  </tr>
                  <tr>
                    <td>Våning</td>
                    <td id="floor"></td>
                  </tr>
                  <tr>
                    <td>Hiss</td>
                    <td id="elevator"></td>
                  </tr>
                  <tr>
                    <td>Ledig från</td>
                    <td id="free-from"></td>
                  </tr>
                </tbody>
              </table>
          </div>
      </div>

      <div class="alert alert-info"><strong>Intresseanmälan skickad!</strong></div>

    </div> <!-- /container -->

    <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="interest-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Anmäl intresse</h4>
          </div>
          <div class="modal-body">

            <form id="form-interest" class="form-horizontal" action="api/interest.php" method="post">

              <label class="control-label" for="name">Namn</label>  
              <input id="name" name="name" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="social-security">Personnummer</label>  
              <input id="social-security" name="social-security" type="text" placeholder="" class="form-control input-md" required>

              <label class="control-label" for="address">Adress</label>  
              <input id="address" name="address" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="postal-number">Postnummer</label>  
              <input id="postal-number" name="postal-number" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="city">Ort</label>  
              <input id="city" name="city" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="phone">Telefon</label>  
              <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="email">Epost</label>  
              <input id="email" name="email" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="company">Arbetsgivare</label>  
              <input id="company" name="company" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="trade">Yrke</label>  
              <input id="trade" name="trade" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="yearly-income">Hushållets <b>totalla</b> årsinkomst</label>  
              <input id="yearly-income" name="yearly-income" type="text" placeholder="" class="form-control input-md">
                
              <label class="control-label" for="smoker">Rökare</label>
              <select id="smoker" name="smoker" class="form-control">
                <option value="Ja">Ja</option>
                <option value="Nej">Nej</option>
              </select>

              <label class="control-label" for="animals">Husdjur</label>
              <select id="animals" name="animals" class="form-control">
                <option value="Ja">Ja</option>
                <option value="Nej">Nej</option>
              </select>

              <label class="control-label" for="singleApplicant">Har medsökande</label>
              <select id="singleApplicant" name="singleApplicant" class="form-control">
                <option value="Nej">Ja</option>
                <option value="Ja">Nej</option>
              </select>

              <input id="apartment-id" name="apartment-id" type="hidden" placeholder="" class="form-control input-md">

            </form>

          </div>
          <div class="modal-footer">
            <button id="submit-update-form" type="button" class="btn btn-info" data-dismiss="modal">Skicka</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Avbryt</button>
          </div>

        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/global.js"></script>
    <script>
      function get(name){
         if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search)) {
            return decodeURIComponent(name[1]);
         }
      }

      function resetForm() {
        $('#name').val("");
        $('#social-security').val("");
        $('#address').val("");
        $('#postal-number').val("");
        $('#city').val("");
        $('#phone').val("");
        $('#email').val("");
        $('#company').val("");
        $('#trade').val("");
        $('#yearly-income').val("");
      }

      $('.alert').hide();

      loadNavbar('navbar.json');

      var id = get('id');

      $.get('api/apartments.php?id=' + id, function(data){
        $('#summary').html(data.summary);
        $('#apartment-address').html(data.address);
        $('#area').html(data.area);
        $('#apartment-city').html(data.city);
        $('#rent').html(data.rent);
        $('#size').html(data.size);
        $('#rooms').html(data.rooms);
        $('#floor').html(data.floor);
        $('#elevator').html(data.elevator);
        $('#free-from').html(data.freeFrom);
        $('#apartment-id').val(id);
      });

      $('form').on('submit', function(event){

          var link = $(this).attr('action');

          $('.alert').hide();

          $.post(link,$(this).serialize(), function(data, status) {
            $("#interest-modal").modal('hide');
            resetForm();
            $('.alert').show();
          });

          return false;

      });

      $('#submit-update-form').on('click', function(event){
        $('#form-interest').submit();
      });

    </script>
    
  </body>
</html>
