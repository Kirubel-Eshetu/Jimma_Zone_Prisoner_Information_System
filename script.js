document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.link');
  
    links.forEach(function(link) {
      link.addEventListener('click', function() {
        links.forEach(function(l) {
          l.classList.remove('clicked');
        });
        this.classList.add('clicked');
      });
    });
  });