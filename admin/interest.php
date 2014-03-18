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
      <div class="modal-dialog" style="width: 1100px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Intressenter</h4>
          </div>
          <div class="modal-body">
            <img id="loading-image" src="../img/ajax-loader.gif" class="center-image"  />
            <table class="table no-border">
                <thead>
                  <tr>
                    <td>Namn och Personnummer</td>
                    <td>Adress</td>
                    <td>Kontakt</td>
                    <td>Arbete</td>
                    <td>Årsinkomst</td>
                    <td>Övrigt</td>
                  </tr>
                </thead>
                <tbody id="apartment-interest-table-body">
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Stäng</button>
          </div>

        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/global.js"></script>

    <script>
    var requestData;

      function reloadModal(event) {
       $('#loading-image').css("display", "block");
          var index = event.target.id.split('-')[1];
          $.get('../api/interest.php?apartment=' + requestData[index].apartmentId, function(apartmentData) {
            $('#loading-image').css("display", "none");
            html = '';
            for (var i = apartmentData.length - 1; i >= 0; i--) {
              html += '<tr>';
              html += '<td>' + apartmentData[i].name +'</td>';
              html += '<td>' + apartmentData[i].address +'</td>';
              html += '<td>' + apartmentData[i].phone +'</td>';
              html += '<td>' + apartmentData[i].company +'</td>';
              html += '<td>' + apartmentData[i].yearlyIncome +'</td>';
              html += '<td>';
              if(apartmentData[i].singleApplicant === 'Ja') {
                html += '<img src="../icons/user.png" alt="Ensamsökande" title="Ensamsökande"/>'
              } else {
                html += '<img src="../icons/group.png" alt="Har medsökande" title="Har medsökande"/>'
              }

              if(apartmentData[i].smoker === 'Ja') {
                html += '<img src="../icons/cigarette.png" alt="Rökare" title="Rökare" class="small-margin"/>'  
              }
              if(apartmentData[i].animals === 'Ja') {
                html += '<img src="../icons/dog.png" alt="Husdjur" title="Husdjur" class="small-margin"/>'
              }

              html += '</td>';
              html += '</tr>';
              html += '<tr>';
              html += '<td>' + apartmentData[i].socialSecurity +'</td>';
              html += '<td>' + apartmentData[i].postalNumber + ' ' + apartmentData[i].city + '</td>';
              html += '<td>' + apartmentData[i].email +'</td>';
              html += '<td>' + apartmentData[i].trade +'</td>';
              html += '<td></td>'
              html += '<td class="btn-td"><button id="remove-' + i +'" name="remove" class="btn btn-danger">Ta bort</button></td>';
              html += '</tr>';
              html += '<tr>';
              html += '<td colspan="6"><hr/></td>';
              html += '</tr>';
            };
            $('#apartment-interest-table-body').html(html);
            $('[id^=remove-]').on('click', function(removeEvent){
              var index = removeEvent.target.id.split('-')[1]
              $.post('../api/interest.php','id=' + apartmentData[index].id, function(data, status) {
                reloadModal(event);
              });
            });
          });
      }

      function getInterest() {
        $.get('../api/interest.php', function(data) {
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

        });
      }

      loadNavbar('admin-navbar.json');

      getInterest();

      $(document).ready(function() {

      });
    </script>

  </body>
</html>
