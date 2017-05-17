$(function () {
  console.log('on start')

  // checking country
  $('#check-country').click(function() {
    var countryChosen = $('#countries :selected').val();
    if (countryChosen == 1 || countryChosen == 2) {
      $('#education-block').fadeIn('slow');
    }
  });

  //no country
  $('#no-country').click(function() {
    $('#rumarried').fadeIn('slow');
  }); //end click
  // cheking education
  $('#check-edu').click(function() {
    var eduChosen = $('#education :selected').val();
    if (eduChosen == 1) {
      $('#job-block').fadeIn('slow');
    } else {
      $('#congrats').fadeIn('slow');
    }
  }); //end click

  //checking married
  $('#marry-yes').click(function() {
    $('#spouse-country').fadeIn('slow');
  }); // end click
  $('#marry-no').click(function() {
    $('#parents').fadeIn('slow');
  }); // end click

  //checking spouse country
  $('#check-country-spouse').click(function() {
    var countryChosen = $('#countries-spouse :selected').val();
    if (countryChosen == 1 || countryChosen == 2) {
      $('#education-block').fadeIn('slow');
    }
  });

  //no country spouse
  $('#no-country-spouse').click(function() {
    $('#parents').fadeIn('slow');
  });

  //check-parents
  $('#check-parents').click(function() {
    var parentsOne = $('#par-01').is(':checked');
    var parentsTwo = $('#par-02').is(':checked');
    if (parentsOne == true && parentsTwo == true) {
      $('#parents-yes').fadeIn('slow');
    } else {
      $('#nojob').fadeIn('slow');
    }
  });

  //checking parents country
  $('#check-country-parents').click(function() {
    var countryChosen = $('#countries-parents :selected').val();
    if (countryChosen == 1 || countryChosen == 2) {
      $('#education-block').fadeIn('slow');
    }
  });

  //no country parents
  $('#no-country-parents').click(function() {
    $('#nojob').fadeIn('slow');
  });

  // check job
  $('#no-job-button').click(function() {
    $('#nojob').fadeIn('slow');
  });

  $('#check-job').click(function() {
    var jobSelected = $('#job :selected').val();
    alert(jobSelected);
    if (jobSelected == 1 || jobSelected == 2) {
      $('#congrats').fadeIn('slow');
    }
  })
});
