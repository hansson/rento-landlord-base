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
                    <td>Objekt</td>
                    <td>Adress</td>
                    <td>Intressenter</td>
                    <td></td>
                  </tr>
                </thead>
                <tbody id="interest-table-body">
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

            <form id="form-update" class="form-horizontal" action="../api/apartments.php" method="post">

              <label class="control-label" for="name">Namn</label>  
              <input id="modal-name" name="name" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="social-security">Personnummer</label>  
              <input id="modal-social-security" name="social-security" type="text" placeholder="" class="form-control input-md" required>

              <label class="control-label" for="address">Adress</label>  
              <input id="modal-address" name="address" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="phone">Telefon</label>  
              <input id="modal-phone" name="phone" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="email">Email</label>  
              <input id="modal-email" name="email" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="apartment-number">Lägenhetsnummer</label>  
              <input id="modal-apartment-number" name="apartment-number" type="text" placeholder="" class="form-control input-md">
                
              <label class="control-label" for="master-key-allowed">Huvudnyckel får användas</label>
              <select id="modal-master-key-allowed" name="master-key-allowed" class="form-control">
                <option value="Ja">Ja</option>
                <option value="Nej">Nej</option>
              </select>
              
              <label class="control-label" for="summary">Beskrivning</label>
              <textarea id="modal-summary" class="form-control"  name="summary" style="height: 155px; resize: none;"></textarea>

              <input id="modal-id" name="id" type="hidden" placeholder="" class="form-control input-md">

            </form>

            <div id="modal-fileuploader" >Ladda upp bild</div>
            <div class="alert alert-info"><strong>Bild uppladdad!</strong></div>
            <div class="alert alert-error"><strong>Ops! Något gick snett!</strong></div>

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
          requestData = data;
          for (var i = data.length - 1; i >= 0; i--) {
            html += '<tr>';
            html += '<td>' + data[i].object +'</td>';
            html += '<td>' + data[i].address +'</td>';
            html += '<td>' + data[i].interestCount +'</td>';
            html += '<td><button id="show-' + i +'" name="show" class="btn btn-info" data-toggle="modal" data-target="#interestModal">Visa intressenter</button></td>';
            html += '</tr>';
          };

          $('#interest-table-body').html(html);

          $('[id^=show-]').on('click', reloadModal);

          $('[id^=show-]').on('click', function(event){
            var index = event.target.id.split('-')[1];
            $('#modal-name').val(data[index].name);
            $('#modal-social-security').val(data[index].socialSecurity);
            $('#modal-address').val(data[index].address);
            $('#modal-phone').val(data[index].phone);
            $('#modal-email').val(data[index].email);
            $('#modal-apartment-number').val(data[index].apartmentNumber);
            $('#modal-master-key-allowed').val(data[index].masterKeyAllowed);
            $('#modal-summary').val(data[index].summary);
            $('#modal-id').val(data[index].id);
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
