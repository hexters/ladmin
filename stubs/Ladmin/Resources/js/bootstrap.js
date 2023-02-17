import Ladmin from './helper/Ladmin'

window.Ladmin = Ladmin;
import _jQuery from 'jquery';
import axios from 'axios';
import 'bootstrap';
import 'datatables.net-bs5';
import '@fortawesome/fontawesome-free/js/all';

try {


    window.$ = window.jQuery = _jQuery;
    window.axios = axios;


} catch (error) { }

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';