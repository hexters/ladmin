window.Ladmin = require('./helper/Ladmin').default;

try {

    window.$ = window.jQuery = require('jquery');
    window.axios = require('axios');
    require('bootstrap');
    require('datatables.net-bs5')();
    
} catch (error) { }

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';