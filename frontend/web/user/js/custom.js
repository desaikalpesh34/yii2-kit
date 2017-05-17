$(document).ready(function () {
    // reset from input
    $("input[name='Profile[current_country]']").keypress(function () {
        $("#country-dropdown.ui.fluid.search.selection.dropdown").dropdown('set value', '');
        $("#country-dropdown.ui.fluid.search.selection.dropdown").dropdown('set text', 'Select Country');
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('save defaults');
        $("#country-dropdown.ui.fluid.search.selection.dropdown").dropdown('restore defaults');
    });

    $("input[name='Profile[mailing_country]']").keypress(function () {
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('set value', '');
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('set text', 'Select Country');
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('save defaults');
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('restore defaults');
    });

    $("input[name='Person[country_of_birth]']").keypress(function () {
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('set value', '');
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('set text', 'Select Country');
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('save defaults');
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('restore defaults');
    });

    // reset from dropdown
    $("input[name='Profile[mailing-country-foo]']").on('change', function () {
        $("input[name='Profile[mailing_country]']").val('');
    });

    $("input[name='Profile[country-foo]']").on('change', function () {
        $("input[name='Profile[current_country]']").val('');
    });

    $("input[name='Person[country-foo]']").on('change', function () {
        $("input[name='Person[country_of_birth]']").val('');
    });


    var text = $("#country-dropdown.ui.fluid.search.selection.dropdown").dropdown('get text');
    if (text != 'Select Country') {
        $("#country-dropdown.ui.fluid.search.selection.dropdown").dropdown('set value', text);
    }

    text = $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('get text');
    if (text != 'Select Country') {
        $("#mailing-country-dropdown.ui.fluid.search.selection.dropdown").dropdown('set value', text);
    }
});