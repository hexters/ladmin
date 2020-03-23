window._ = require('lodash');

try {
  
  window.$ = window.jQuery = require('jquery');
  window.Popper = require('popper.js').default;
  
  require('bootstrap');
  require('datatables.net-dt');
  require('@fortawesome/fontawesome-free/js/all');
  require('./ladmin');

} catch (error) {}
