window.$ = window.jQuery = require('jquery');
var dt = require('datatables.net')();
require('bootstrap-sass');
require('jquery-ui');

$('#checkAll').click(function(e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});

$('.success_show').hide(2000);

$(document).ready(function() {
    /**
     * Add rows and remove rows
     */
    $('#addTask').click(function() {
        $('.task').append('<div class="allTask">' + $('.addRow').html() + '</div>');
    });

    $('#removeTask').click(function() {
        $('.task div.allTask:last-child').remove();
    });

    /**
    * Search table
    */
    $('#dataTables').DataTable();

    /**
     * Search Status Subject
     */
    $('.btn-filter-subject').on('click', function () {
        var target = $(this).data('target');
        if (target != 'all') {
            $('.table.subject-status tr').css('display', 'none');
            $('.table.subject-status tr[data-status="' + target + '"]').fadeIn('slow');
        } else {
            $('.table.subject-status tr').css('display', 'none').fadeIn('slow');
        }
    });

    /**
     * Search Status Course
     */
    $('.btn-filter-course').on('click', function () {
        var target = $(this).data('target');
        if (target != 'all') {
            $('.table.course-status tr').css('display', 'none');
            $('.table.course-status tr[data-status="' + target + '"]').fadeIn('slow');
        } else {
            $('.table.course-status tr').css('display', 'none').fadeIn('slow');
        }
    });
});
