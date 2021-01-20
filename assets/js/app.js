/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../styles/app.scss';
import '../styles/whoIAm.scss';
import '../styles/fitness.scss';
import '../styles/walking.scss';
import '../styles/home.scss';
import '../styles/barNav.scss';
import '../styles/footer.scss';
import '../styles/adminWalking.scss';
import '../styles/contact.scss';
import '../styles/homeCo.scss';
import '../styles/adminOpinion.scss';
import '../styles/admin.scss';
import '../styles/tariff.scss';
import '../styles/profile.scss';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', () => {
    const calendarEl = document.getElementById('calendar');

    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin],
        initialView: 'dayGridWeek',
        locale: 'fr',
        timeZone: 'Europe/Paris',
        headerToolbar: {
            start: 'prev next today',
            center: 'title',
            end: 'dayGridWeek dayGridMonth',
        },
    })
    calendar.render();
});

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(() => {
    $('[data-toggle="popover"]').popover();
});
// eslint-disable-next-line func-names
$('input[type=file]').change(function () {
    const fieldVal = $(this).val();
    if (fieldVal !== undefined || fieldVal !== '') {
        $(this).next('.custom-file-label').text(fieldVal);
    }
});
