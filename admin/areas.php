
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
          <button id="new-area" name="new-area" class="btn btn-success" style="margin-bottom: 20px" data-toggle="modal" data-target="#new-area-modal">Nytt område</button>

          <table class="table table-striped">
                <thead>
                  <tr>
                    <td>Namn</td>
                    <td>Beskrivning</td>
                    <td></td>
                  </tr>
                </thead>
                <tbody id="area-table-body">
                </tbody>
            </table>
        </div>
      </div>

      </div>


    </div> <!-- /container -->

    <!-- New Modal -->
    <div class="modal fade" id="new-area-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Lägg till område</h4>
          </div>
          <div class="modal-body" style="height: 530px">

            <form id="form-new" class="form-horizontal" action="../api/areas.php" method="post">

              <label class="control-label" for="name">Namn</label>  
              <input id="modal-new-name" name="name" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="description">Beskrivning</label>  
              <textarea id="modal-new-description" class="form-control"  name="description" style="height: 155px; resize: none;"></textarea>

              <input id="modal-new-image-name-1" name="image-name-1" type="hidden" placeholder="" class="form-control input-md">
              <input id="modal-new-image-name-2" name="image-name-2" type="hidden" placeholder="" class="form-control input-md">

            </form>
            <div>
            <div class="img-area-container">
              <img id="new-area-image-1" src="../img/no-area.jpg" class="img-responsive img-rounded img-area" />
              <div id="new-area-image-uploader-1">Ändra</div>
            </div>
            <div class="img-area-container">
              <img id="new-area-image-2" src="../img/no-area.jpg" class="img-responsive img-rounded img-area" />
              <div id="new-area-image-uploader-2">Ändra</div>
            </div>
            </div>

          </div>
          <div class="modal-footer">
            <button id="submit-new-form" type="button" class="btn btn-info" data-dismiss="modal">Spara</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Avbryt</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="update-area-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Ändra område</h4>
          </div>
          <div class="modal-body" style="height: 530px">

            <form id="form-update" class="form-horizontal" action="../api/areas.php" method="post">

              <label class="control-label" for="name">Namn</label>  
              <input id="modal-update-name" name="name" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="description">Beskrivning</label>  
              <textarea id="modal-update-description" class="form-control"  name="description" style="height: 155px; resize: none;"></textarea>

              <input id="modal-update-id" name="id" type="hidden" placeholder="" class="form-control input-md">
              <input id="modal-update-image-name-1" name="image-name-1" type="hidden" placeholder="" class="form-control input-md">
              <input id="modal-update-image-name-2" name="image-name-2" type="hidden" placeholder="" class="form-control input-md">

            </form>
            <div class="img-area-container">
              <img id="update-area-image-1" src="../img/no-area.jpg" class="img-responsive img-rounded img-area"/>
              <div id="update-area-image-uploader-1" >Ändra</div>
            </div>
            <div class="img-area-container">
              <img id="update-area-image-2" src="../img/no-area.jpg" class="img-responsive img-rounded img-area"/>
              <div id="update-area-image-uploader-2" >Ändra</div>
            </div>

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

    <script src="../js/jquery-upload-file.js"></script>
    <script>
      function getAreas() {
        $.get('../api/areas.php', function(data) {
          var html = '';
          for (var i = data.length - 1; i >= 0; i--) {
            html += '<tr>';
            html += '<td>' + data[i].name +'</td>';
            html += '<td>' + data[i].description +'</td>';
            html += '<td><button id="update-btn-' + i +'" name="update" class="btn btn-info" data-toggle="modal" data-target="#update-area-modal">Ändra</button> <button id="remove-' + i +'" name="remove" class="btn btn-danger">Ta bort</button></td>';
            html += '</tr>';
          };

          $('#area-table-body').html(html);

          $('[id^=update-btn-]').on('click', function(event){
            var index = event.target.id.split('-')[2];
            $('#modal-update-name').val(data[index].name);
            $('#modal-update-description').val(data[index].description);
            $('#modal-update-image-name-1').val(data[index].imageName1);
            $('#modal-update-image-name-2').val(data[index].imageName2);
            $('#modal-update-id').val(data[index].id);
          });

          $('[id^=remove-]').on('click', function(event){
            var index = event.target.id.split('-')[1]
            $.post('../api/areas.php','id=' + data[index].id, function(data, status) {
              getAreas();
            });
          });

        });
      }

      function resetNewAreaForm() {
        $('#modal-new-name').val("");
        $('#modal-new-description').val("");
        $('#modal-new-image-name-1').val("");
        $('#modal-new-image-name-2').val("");
        $('#update-area-image-1').attr("src","../img/no-area.jpg");
        $('#update-area-image-1').attr("src","../img/no-area.jpg");
      }

      loadNavbar('admin-navbar.json');

      getAreas();

      $(document).ready(function() {
        $("#update-area-image-uploader-1").uploadFile({
          url:"../api/images.php",
          fileName:"area-image",
          dragDrop: false,
          showDone: false,
          showStatusAfterSuccess: false,
          showError: false,
          uploadButtonClass: "area-upload-button",
          onSubmit: function(files) {
          },
          onSuccess: function(files,data,xhr){
            $('#update-area-modal').show();
            $('#modal-update-image-name-1').val(data[0]);
          },
          onError: function(files,status,errMsg) {
          }
        });

        $("#update-area-image-uploader-2").uploadFile({
          url:"../api/images.php",
          fileName:"area-image",
          dragDrop: false,
          showDone: false,
          showStatusAfterSuccess: false,
          showError: false,
          uploadButtonClass: "area-upload-button",
          onSubmit: function(files) {
          },
          onSuccess: function(files,data,xhr){
            $('#update-area-modal').show();
            $('#modal-update-image-name-2').val(data[0]);
          },
          onError: function(files,status,errMsg) {
          }
        });

        $("#new-area-image-uploader-1").uploadFile({
          url:"../api/images.php",
          fileName:"area-image",
          dragDrop: false,
          showDone: false,
          showStatusAfterSuccess: false,
          showError: false,
          uploadButtonClass: "area-upload-button",
          onSubmit: function(files) {
          },
          onSuccess: function(files,data,xhr){
            $('#new-area-modal').show();
            $('#modal-new-image-name-1').val(data[0]);
          },
          onError: function(files,status,errMsg) {
          }
        });

        $("#new-area-image-uploader-2").uploadFile({
          url:"../api/images.php",
          fileName:"area-image",
          dragDrop: false,
          showDone: false,
          showStatusAfterSuccess: false,
          showError: false,
          uploadButtonClass: "area-upload-button",
          onSubmit: function(files) {
          },
          onSuccess: function(files,data,xhr){
            $('#new-area-modal').show();
            $('#modal-new-image-name-2').val(data[0]);
          },
          onError: function(files,status,errMsg) {
          }
        });

        $('#submit-update-form').on('click', function(event){
          $('#form-update').submit();
        });

        $('#submit-new-form').on('click', function(event){
          $('#form-new').submit();
        });

        $('form').on('submit', function(event){

          var link = $(this).attr('action');

          $.post(link,$(this).serialize(),function(data, status) {
            $("#update-area-modal").modal('hide');
            $("#new-area-modal").modal('hide');
            resetNewAreaForm();
            getAreas();
          });

          return false;

        });

      });
    </script>

  </body>
</html>
