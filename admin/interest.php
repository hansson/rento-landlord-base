
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
    <div class="modal fade" id="interestModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Intressenter</h4>
          </div>
          <div class="modal-body">
            <img id="loading-image" src="../img/ajax-loader.gif" class="center-image"  />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Stäng</button>
          </div>

        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/global.js"></script>

    <script src="../js/jquery-upload-file.js"></script>
    <script>
      function getInterest() {
        $.get('../api/interest.php', function(data) {
          var html = '';
          for (var i = data.length - 1; i >= 0; i--) {
            html += '<tr>';
            html += '<td>' + data[i].object +'</td>';
            html += '<td>' + data[i].address +'</td>';
            html += '<td>' + data[i].interestCount +'</td>';
            html += '<td><button id="show-' + i +'" name="update" class="btn btn-info" data-toggle="modal" data-target="#interestModal">Visa intressenter</button></td>';
            html += '</tr>';
          };

          $('#interest-table-body').html(html);

          $('[id^=show-]').on('click', function(event){
            $('#loading-image').css("display", "block");
            var index = event.target.id.split('-')[1];
            $.get('../api/interest.php?apartment=' + data[index].apartmentId, function(data) {
              $('#loading-image').css("display", "none");
            });
          });

        });
      }

      loadNavbar('admin-navbar.json');

      getInterest();

      $(document).ready(function() {

      });
    </script>

  </body>
</html>
