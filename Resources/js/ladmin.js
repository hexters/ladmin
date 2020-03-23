window.dt = require('datatables.net').default;

/**
 * Button togle sidebar
 */
const content = document.querySelector('.ladmin-container');
const btnToggle = document.querySelector('.ladmin-sidebar-toggle');

if(window.localStorage.getItem('side_bar_class')) {
  content.className = window.localStorage.getItem('side_bar_class');
}

btnToggle.addEventListener('click', function () {
  let classes = content.className.split(' ');
  if(classes.indexOf('ladmin-container-full') === -1) {
    content.className = 'ladmin-container ladmin-container-full';
    save_position('ladmin-container ladmin-container-full');
  } else {
    content.className = 'ladmin-container';
    save_position('ladmin-container');
  }
});

if(window.innerWidth <= 575.98) {
  save_position('ladmin-container ladmin-container-full');
  content.className = 'ladmin-container ladmin-container-full';
}

window.addEventListener('resize', function () {
  if(window.innerWidth <= 575.98) {
    save_position('ladmin-container ladmin-container-full');
    content.className = 'ladmin-container ladmin-container-full';
  }
});

function save_position(className) {
  window.localStorage.setItem('side_bar_class', className);
}

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
});

/**
 * Jquery Section
 */
$(function() {
  $('.ladmin-datatables').each(function() {
    let options = $(this).data('options');
    $(this).DataTable({
      language: {
        search: '',
        searchPlaceholder: 'Search...'
      },
      bLengthChange: false,
      iDisplayLength: 50,
      ...options
    });
  });
});

setTimeout(() => {
  document.querySelectorAll('.dt-bootstrap4').forEach(el => {
    let row = el.querySelectorAll('.row')[0];
    row.querySelectorAll('div')[0].remove();
  });
}, 500);