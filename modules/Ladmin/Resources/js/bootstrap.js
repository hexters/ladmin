window.Ladmin = require('./helper/Ladmin').default;

try {

    window.$ = window.jQuery = require('jquery');
    window.axios = require('axios');
    require('bootstrap');
    require('datatables.net-bs5')();
    require('@fortawesome/fontawesome-free/js/all');
    
} catch (error) { }

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';