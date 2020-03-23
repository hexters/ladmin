try {
  
  window.jQuery = require('jquery').default;
  window.Popper = require('popper.js').default;
  
  require('bootstrap');
  require('datatables.net-dt');
  require('@fortawesome/fontawesome-free/js/all');
  require('./ladmin');

} catch (error) {}
