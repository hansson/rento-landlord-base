
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

        <form id="create-form" class="form-horizontal" action="../api/apartments.php" method="post">

          <div class="col-md-3">

            <label class="control-label" for="object">Objekt</label>  
            <input id="object" name="object" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="address">Adress</label>  
            <input id="address" name="address" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="city">Ort</label>  
            <input id="city" name="city" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="area">Område</label>  
            <input id="area" name="area" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="floor">Våning</label>  
            <input id="floor" name="floor" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="elevator">Hiss</label>
            <select id="elevator" name="elevator" class="form-control">
              <option value="Ja">Ja</option>
              <option value="Nej">Nej</option>
            </select>

            <label class="control-label" for="free-from">Ledig från</label>  
            <input id="free-from" name="free-from" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="save"></label>
          </div>

          <div class="col-md-3">
            <label class="control-label" for="rent">Hyra</label>  
            <input id="rent" name="rent" type="text" placeholder="" class="form-control input-md">           
         
            <label class="control-label" for="size">Storlek</label>  
            <input id="size" name="size" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="rooms">Rum</label>  
            <input id="rooms" name="rooms" type="text" placeholder="" class="form-control input-md">

            <label class="control-label" for="summary">Beskrivning</label>
            <textarea class="form-control" id="summary" name="summary" style="height: 171px; resize: none;"></textarea>

            <div id="fileuploader">Ladda upp bild</div>
            <input id="image-name" name="image-name" type="hidden" placeholder="" class="form-control input-md">

          </div>

          <div class="col-md-3">
            <p style="margin-top: 22px">Fält kan läggas till eller tas bort beroende på just ert behov.</p>
          </div>

          <div class="col-md-12"  style="margin-top: 5px">
            <div class="alert alert-info"><strong>Bild uppladdad!</strong></div>
            <div class="alert alert-error"><strong>Ops! Något gick snett!</strong></div>
            <button id="save" name="save" class="btn btn-success">Spara</button>
            <hr>
          </div>



        </form>

        <div class="row">
          <div class="col-md-12">
          <table class="table table-striped">
                <thead>
                  <tr>
                    <td>Objekt</td>
                    <td>Adress</td>
                    <td>Hyra</td>
                    <td>Storlek</td>
                    <td>Rum</td>
                    <td>Ledig från</td>
                    <td></td>
                  </tr>
                </thead>
                <tbody id="apartment-table-body">
                </tbody>
            </table>
        </div>
      </div>

      </div>


    </div> <!-- /container -->

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Ändra lägenhet</h4>
          </div>
          <div class="modal-body">

            <form id="form-update" class="form-horizontal" action="../api/apartments.php" method="post">

              <label class="control-label" for="object">Objekt</label>  
              <input id="modal-object" name="object" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="address">Adress</label>  
              <input id="modal-address" name="address" type="text" placeholder="" class="form-control input-md" required>

              <label class="control-label" for="city">Ort</label>  
              <input id="modal-city" name="city" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="area">Område</label>  
              <input id="modal-area" name="area" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="floor">Våning</label>  
              <input id="modal-floor" name="floor" type="text" placeholder="" class="form-control input-md">
                
              <label class="control-label" for="elevator">Hiss</label>
              <select id="modal-elevator" name="elevator" class="form-control">
                <option value="Ja">Ja</option>
                <option value="Nej">Nej</option>
              </select>

              <label class="control-label" for="free-from">Inflytt</label>  
              <input id="modal-free-from" name="free-from" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="rent">Hyra</label>  
              <input id="modal-rent" name="rent" type="text" placeholder="" class="form-control input-md">           
           
              <label class="control-label" for="size">Storlek</label>  
              <input id="modal-size" name="size" type="text" placeholder="" class="form-control input-md">

              <label class="control-label" for="rooms">Rum</label>  
              <input id="modal-rooms" name="rooms" type="text" placeholder="" class="form-control input-md">
              
              <label class="control-label" for="summary">Beskrivning</label>
              <textarea id="modal-summary" class="form-control"  name="summary" style="height: 155px; resize: none;"></textarea>

              <input id="modal-id" name="id" type="hidden" placeholder="" class="form-control input-md">
              <input id="modal-image-name" name="image-name" type="hidden" placeholder="" class="form-control input-md">

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

    <script src="../js/jquery-upload-file.js"></script>
    <script>
      function getApartments() {
        $.get('../api/apartments.php', function(data) {
          var html = '';
          for (var i = data.length - 1; i >= 0; i--) {
            html += '<tr>';
            html += '<td>' + data[i].object +'</td>';
            html += '<td>' + data[i].address +'</td>';
            html += '<td>' + data[i].rent +'</td>';
            html += '<td>' + data[i].size +'</td>';
            html += '<td>' + data[i].rooms +'</td>';
            html += '<td>' + data[i].freeFrom +'</td>';
            html += '<td><button id="update-' + i +'" name="update" class="btn btn-info" data-toggle="modal" data-target="#updateModal">Ändra</button> <button id="remove-' + i +'" name="remove" class="btn btn-danger">Ta bort</button></td>';
            html += '</tr>';
          };

          $('#apartment-table-body').html(html);

          $('[id^=update-]').on('click', function(event){
            var index = event.target.id.split('-')[1];
            $('#modal-object').val(data[index].object);
            $('#modal-address').val(data[index].address);
            $('#modal-rent').val(data[index].rent);
            $('#modal-size').val(data[index].size);
            $('#modal-rooms').val(data[index].rooms);
            $('#modal-floor').val(data[index].floor);
            $('#modal-elevator').val(data[index].elevator);
            $('#modal-city').val(data[index].city);
            $('#modal-area').val(data[index].area);
            $('#modal-free-from').val(data[index].freeFrom);
            $('#modal-summary').val(data[index].summary);
            $('#modal-id').val(data[index].id);
            $('#modal-image-name').val(data[index].imageName);
          });

          $('[id^=remove-]').on('click', function(event){
            var index = event.target.id.split('-')[1]
            $.post('../api/apartments.php','id=' + data[index].id, function(data, status) {
              getApartments();
            });
          });

        });
      }

      function resetForm() {
        $('#object').val("");
        $('#address').val("");
        $('#rent').val("");
        $('#size').val("");
        $('#rooms').val("");
        $('#floor').val("");
        $('#elevator').val("");
        $('#city').val("");
        $('#area').val("");
        $('#free-from').val("");
        $('#summary').val("");
      }

      loadNavbar('admin-navbar.json');

      getApartments();

      $('.alert').hide();

      $(document).ready(function() {
        $("#modal-fileuploader").uploadFile({
          url:"../api/images.php",
          fileName:"apartment-image",
          dragDrop: false,
          showDone: false,
          showStatusAfterSuccess: false,
          showError: false,
          onSubmit: function(files) {
            $('.alert').hide();
          },
          onSuccess: function(files,data,xhr){
            $('.modal-body .alert-info').show();
            $('#modal-image-name').val(data[0]);
          },
          onError: function(files,status,errMsg) {
            $('.modal-body .alert-error').show();
          }
        });

        $("#fileuploader").uploadFile({
          url:"../api/images.php",
          fileName:"apartment-image",
          dragDrop: false,
          showDone: false,
          showStatusAfterSuccess: false,
          showError: false,
          onSubmit: function(files) {
            $('.alert').hide();
          },
          onSuccess: function(files,data,xhr){
            $('.alert-info').show();
            $('#image-name').val(data[0]);
          },
          onError: function(files,status,errMsg) {
            $('.alert-error').show();
          }
        });

        $('#submit-update-form').on('click', function(event){
          $('#form-update').submit();
        });

        $('form').on('submit', function(event){

          var link = $(this).attr('action');

          $('.alert').hide();

          $.post(link,$(this).serialize(),function(data, status) {
            $("#updateModal").modal('hide');
            resetForm();
            getApartments();
          });

          return false;

        });

      });
    </script>

  </body>
</html>
