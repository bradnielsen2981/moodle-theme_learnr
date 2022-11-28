$('.blockpanelbutton').click(function () {
    var blockslideropen = localStorage.getItem('blockslideropen');

    if (blockslideropen == 1) {
        localStorage.setItem('blockslideropen', 0);
    } else {
        localStorage.setItem('blockslideropen', 1);
    }

});

if (localStorage.getItem('blockslideropen') == 1) {
    $('#blockslider').addClass('show');
}


//SUBMENU FUNCTIONALITY - Need to move into own function
$(document).ready(function () {

  //not sure how own choose the more menu items
  document.querySelectorAll('.navbar .dropdown-item').forEach(function(element){
    console.log("FOUND");
    element.addEventListener('mouseover', function (e) {
      console.log("MOUSEOVER");
        let nextEl = this.nextElementSibling;
        if(nextEl && nextEl.classList.contains('submenu')) {	
          // prevent opening link if link needs to open dropdown
          e.preventDefault();
          if(nextEl.style.display == 'block'){
            nextEl.style.display = 'none';
          } else {
            nextEl.style.display = 'block';
          }
        }
    });
  })

});