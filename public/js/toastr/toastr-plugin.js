$(document).ready(function () {
    'use strict';

    /* Toastr */
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success('Di Aplikasi Gusem', 'Selamat Datang');
    }, 1300);
});

