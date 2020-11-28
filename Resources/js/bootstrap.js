window._ = require('lodash');

try {
  
  window.$ = window.jQuery = require('jquery');
  window.Popper = require('popper.js').default;
  
  require('bootstrap');
  require('datatables.net-bs4');
  require('@fortawesome/fontawesome-free/js/all');

} catch (error) {}


$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});