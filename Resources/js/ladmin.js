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
  if(! content.classList.contains('ladmin-container-full') ) {
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
    el.classList.toggle('show');
  })
});

/**
 * Menu active detection
 */
  let ladminSidebar = document.querySelector('.ladmin-sidebar');
  let activeMenus = ladminSidebar.querySelector('li.active');
  
  setActiveMenu = (menu) => {
    let parent = menu.parentNode;
    
    if(parent.classList.contains('ladmin-sidebar')) {
      return;
    }

    if(parent.nodeName === 'LI') {
      parent.classList.add('show');
    }

    setActiveMenu(parent);
    
  }

  if(activeMenus) {
    setActiveMenu(activeMenus);
  }

  /**
   * Datatables render
   */
  let ladmiDatatables = document.querySelectorAll('.ladmin-datatables');
  ladmiDatatables.forEach((el) => {
    let options = el.getAttribute('data-options');
    options = JSON.parse(options);
    $(el).DataTable({
      language: {
        search: '',
        searchPlaceholder: 'Search...'
      },
      ...options
    });
  });

  
/**
 * Jquery Section
 */
$(function() {
  
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

window.sidebarMenu = function(val) {
  const content = document.querySelector('.ladmin-container');
  if(val === 'show') {
    content.classList.remove('ladmin-container-full');
  } else if(val === 'hide') {
    content.classList.add('ladmin-container-full');
  }
}