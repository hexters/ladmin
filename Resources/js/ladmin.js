/**
 * Button togle sidebar
 */
const sidebar = document.querySelector('.ladmin-sidebar');
const btnToggleSidebar = document.querySelector('.ladmin-sidebar-toggle');
const sidebarDisplay = window.localStorage.getItem('ladmin_sidebar_visible');
if(sidebarDisplay) {
  sidebar.style.display = sidebarDisplay;
}

function saveSidebar (display) {
  window.localStorage.setItem('ladmin_sidebar_visible', display);
}

btnToggleSidebar.addEventListener('click', function() {
  if(sidebar.style.display === 'none') {
    saveSidebar('block');
    sidebar.style.display = 'block';
  } else {
    saveSidebar('none');
    sidebar.style.display = 'none';
  }
});

window.addEventListener('resize', function(el) {
  if(el.target.innerWidth <= 575.98) {
    saveSidebar('none');
    sidebar.style.display = 'none';
  };
});

let menus = document.querySelectorAll('.ladmin-sidebar ul li');
menus.forEach(el => {
  if(el.querySelector('ul')) {
    let span = document.createElement('span');
    span.className = 'caret float-right mt-2';
    let a = el.querySelector('a');
    if(!a.querySelector('.badge')) {
      a.appendChild(span);
    }
  }

  let a = el.querySelector('a');
  a.addEventListener('click', function() {
    let classList = el.classList.value;
    let classes = classList.split(' ');
    if((classes).indexOf('show') === -1) {
      el.className = classes.join(' ') + ' show';
    } else {
      let classesNew = classes.filter(item => {
        return item !== 'show';
      })
      el.className = classesNew.join(' ');
    }
  })
})
