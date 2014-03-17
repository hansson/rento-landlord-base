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

        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <td>Namn</td>
                    <td>Adress</td>
                    <td>Lägenhetsnummer</td>
                    <td>Telefon</td>
                    <td></td>
                  </tr>
                </thead>
                <tbody id="error-report-table-body">
                </tbody>
            </table>
        </div>
      </div>

      </div>


    </div> <!-- /container -->

    <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="show-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Felanmälan</h4>
          </div>
          <div class="modal-body">

              <h5>Namn</h5>  
              <p id="modal-name"></p>

              <h5>Personnummer</h5>  
              <p id="modal-social-security"></p>

              <h5>Adress</h5>  
              <p id="modal-address"></p>

              <h5>Telefon</h5>  
              <p id="modal-phone"></p>

              <h5>Email</h5>  
              <p id="modal-email"></p>

              <h5>Lägenhetsnummer</h5>  
              <p id="modal-apartment-number"></p>
                
              <h5>Huvudnyckel får användas</h5>
              <p id="modal-master-key-allowed"></p>
              
              
              <h5 class="control-label" for="summary">Beskrivning</h5>
              <textarea id="modal-summary" class="form-control"  name="summary" style="height: 155px; resize: none;"></textarea>

              <input id="modal-id" name="id" type="hidden" placeholder="" class="form-control input-md">

          </div>
          <div class="modal-footer">
            <button id="submit-update-form" type="button" class="btn btn-info" data-dismiss="modal">Spara</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Avbryt</button>
          </div>

        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/global.js"></script>

    <script>

      function getErrorReports() {
        $.get('../api/error_report.php', function(data) {
          var html = '';
          for (var i = data.length - 1; i >= 0; i--) {
            html += '<tr>';
            html += '<td>' + data[i].name +'</td>';
            html += '<td>' + data[i].address +'</td>';
            html += '<td>' + data[i].apartmentNumber +'</td>';
            html += '<td>' + data[i].phone +'</td>';
            html += '<td><button id="show-' + i +'" name="show" class="btn btn-info" data-toggle="modal" data-target="#show-modal">Visa felanmälan</button></td>';
            html += '</tr>';
          };

          $('#error-report-table-body').html(html);

          $('[id^=show-]').on('click', function(event){
            var index = event.target.id.split('-')[1];
            $('#modal-name').html(data[index].name);
            $('#modal-social-security').html(data[index].socialSecurity);
            $('#modal-address').html(data[index].address);
            $('#modal-phone').html(data[index].phone);
            $('#modal-email').html(data[index].email);
            $('#modal-apartment-number').html(data[index].apartmentNumber);
            $('#modal-master-key-allowed').html(data[index].masterKeyAllowed);
            $('#modal-summary').html(data[index].summary);
            $('#modal-id').html(data[index].id);
          });

        });
      }

      loadNavbar('admin-navbar.json');

      getErrorReports();

      $(document).ready(function() {

      });
    </script>

  </body>
</html>
