$.get( "navbar.json", function(data) {
  var split = window.location.pathname.split('/');
  var currentPage = split[split.length - 1];
  var html = "";
  for (var i = 0; i < data.pages.length; i++) {
    if(!data.pages[i].subPage) {
      if(currentPage === data.pages[i].link) { 
        html += '<li class="active"><a href="' + data.pages[i].link + '">' + data.pages[i].text + '</a></li>';
      } else {
        html += '<li><a href="' + data.pages[i].link + '">' + data.pages[i].text + '</a></li>';
      }
    } else {
      var subPageActive = false;
      for (var j = 0; j < data.pages[i].subPage.length; j++) {
        if(currentPage === data.pages[i].subPage[j].link) { 
          subPageActive = true;
        }
      };
      if(subPageActive) { 
        html += '<li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown">' + data.pages[i].text +'<b class="caret"></b></a><ul class="dropdown-menu">';
      } else { 
        html += '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">' + data.pages[i].text +'<b class="caret"></b></a><ul class="dropdown-menu">';
      }
      for (var j = 0; j < data.pages[i].subPage.length; j++) {
        html += '<li><a href="' + data.pages[i].subPage[j].link + '">' + data.pages[i].subPage[j].text + '</a></li>';
      };
      html += '</ul></li>';
    }     
  };

  $('.navbar-nav').html(html);
});