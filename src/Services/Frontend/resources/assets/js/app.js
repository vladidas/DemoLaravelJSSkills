require('bootstrap-scss');
require('font-awesome/scss/font-awesome.scss');

import $ from 'jquery';
import App from './components/App';
import Filter from './components/Filter';
import Languages from './components/Languages';

$(() => {
    (new App).init();
    (new Filter).init();
    (new Languages).init();
});
