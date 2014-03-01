
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
              <h2>Lediga lägenheter</h2>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <td>Adress</td>
                    <td>Hyra</td>
                    <td>Storlek</td>
                    <td>Rum</td>
                    <td>Våning</td>
                    <td>Hiss</td>
                    <td>Ledig från</td>
                  </tr>
                </thead>
                <tbody id="apartments-table-body">
                </tbody>
              </table>
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
      $.get('api/apartments.php', function(data){
        var html = '';
        for (var i = data.length - 1; i >= 0; i--) {
          html += '<tr data="' + data[i].id +'">';
          html += '<td>' + data[i].address + '</td>';
          html += '<td>' + data[i].rent + '</td>';
          html += '<td>' + data[i].size + '</td>';
          html += '<td>' + data[i].rooms + '</td>';
          html += '<td>' + data[i].floor + '</td>';
          html += '<td>' + data[i].elevator + '</td>';
          html += '<td>' + data[i].freeFrom + '</td>';
          html += '</tr>';
        };
        $('#apartments-table-body').html(html);

        $('tr').on('click', function(event){
          window.location.href = 'apartment.php?id=' + $(this).attr('data');
        });
      });
    </script>
    
  </body>
</html>
