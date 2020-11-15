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

  $('.ladmin-datatable-base').each(function() {
    $(this).DataTable();
  });

  $('.permission-checkbox').on('click', function () {
    $(this).parent().find('li .permission-checkbox').prop('checked', $(this).is(':checked'));
    var sibs = false;
    $(this).closest('ul').children('li').each(function () {
        if ($('.permission-checkbox', this).is(':checked')) sibs = true;
    })
    $(this).parents('ul').prev().prop('checked', sibs);
  });

  $('.ladmin-notification-link').on('click', function(e) {
    e.preventDefault();
    const route = $(this).attr('href');
    const link = $(this).data('link');

    $.post(route, { _method : 'PUT' }, function() {
      window.location.href = link;
    }).catch(e => {
      if(e.response.status > 200) {
        alert(e.response.data.message);
      }
    });

  });

  $('[data-toggle="tooltip"]').tooltip();
});