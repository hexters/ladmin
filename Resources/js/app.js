try {
  
  window.jQuery = require('jquery').default;
  window.Popper = require('popper.js').default;
  require('bootstrap');
  require('@fortawesome/fontawesome-free/js/all');
  require('./ladmin');

} catch (error) {}