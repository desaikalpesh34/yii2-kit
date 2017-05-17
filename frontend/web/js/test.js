$(function() {

  //passport no
  $('.passport-no').on('click', function () {
    $('.destroy').hide('fast');
    $('.sorry-message').show('slow');
    $('.reset').hide();
  });

  //passport yes
  $('.passport-yes').on('click', function () {
    $('.test-country').show();
    $('.passport-no').addClass('disabled');
    $('.passport-yes').addClass('disabled');
    $('h1.pass').addClass('dim-text');
    $('.passport').hide();
  });

  //cant find country
  $('.cant-find').on('click', function (event) {
    event.preventDefault();
    $('.your-country').addClass('disabled');
    $('.test-01').addClass('dim-text');
    $('.cf-01').addClass('dim-text');
    $('.cf-01 a').addClass('dim-text-a');
    $('.married').fadeIn('slow');
    $('.step-01-button').addClass('disabled'); //disable button if cant find country
    $('.yourcountry').hide();
  }); //end on

  //spouse yes
  $('.married-yes').on('click', function () {
    console.log('d');
    $('.spouse-country').fadeIn('slow');
    $('.married-yes').addClass('disabled');
    $('.are-you-married').addClass('dim-text');
    $('.married-no').addClass('disabled');
    $('.married').hide();
  });

  //spouse no
  $('.married-no').on('click', function () {
    $('.father-born').fadeIn('slow');
    $('.married-yes').addClass('disabled');
    $('.are-you-married').addClass('dim-text');
    $('.married-no').addClass('disabled');
    $('.married').hide();
  });

  //spouse cant find country
  $('.spouse-cant-find').on('click', function (event) {
    event.preventDefault();
    $('.spouse-country-selector').addClass('disabled');
    $('.test-02').addClass('dim-text');
    $('.father-born').fadeIn('slow');
    $('.step-01-button').addClass('disabled'); //disable button if cant find country
    $('.spouse-country').hide();
  });

  //father born yes
  $('.father-yes').on('click', function () {
    $('.father-yes').addClass('disabled');
    $('.father-born').addClass('dim-text');
    $('.father-no').addClass('disabled');
    $('.mother-born').fadeIn('slow');
    $('.father-born').hide();
  });

  //mother born yes
  $('.mother-yes').on('click', function () {
    $('.destroy').hide('fast');
    $('.sorry-message').show('slow');
    $('.reset').hide();
    $('.mother-born').hide();
  });

  //father born no
  $('.father-no').on('click', function () {
    $('.father-yes').addClass('disabled');
    $('.father-born').addClass('dim-text');
    $('.father-no').addClass('disabled');
    $('.father-resident').fadeIn('slow');
    $('.father-born').hide();
  });

  //father resident yes
  $('.father-res-yes').on('click', function () {
    $('.father-res-yes').addClass('disabled');
    $('.father-resident').addClass('dim-text');
    $('.father-res-no').addClass('disabled');
    $('.mother-born').fadeIn('slow');
    $('.father-resident').hide();
  });

  //father resident no
  $('.father-res-no').on('click', function () {
    console.log('d');
    $('.father-country').fadeIn('slow');
    $('.father-res-yes').addClass('disabled');
    $('.father-resident').addClass('dim-text');
    $('.father-res-no').addClass('disabled');
    $('.father-resident').hide();
  });

  //father cant find
  $('.father-cant-find').on('click', function (event) {
    event.preventDefault();
    $('.father-country-selector').addClass('disabled');
    $('.father-country').addClass('dim-text');
    $('.test-03').addClass('dim-text');
    $('.mother-born').fadeIn('slow');
    $('.step-01-button').addClass('disabled'); //disable button if cant find country
    $('.father-country').hide();
  });

  //mother born no
  $('.mother-no').on('click', function () {
    $('.mother-yes').addClass('disabled');
    $('.mother-born').addClass('dim-text');
    $('.mother-no').addClass('disabled');
    $('.mother-resident').fadeIn('slow');
    $('.mother-born').hide();
  });

  //mother resident yes
  $('.mother-res-yes').on('click', function () {
    $('.destroy').hide('fast');
    $('.sorry-message').show('slow');
    console.log('reset');
    $('.reset').hide();
    $('.mother-resident').hide();
    });

  //mother resident no
  $('.mother-res-no').on('click', function () {
    console.log('d');
    $('.mother-country').fadeIn('slow');
    $('.mother-res-yes').addClass('disabled');
    $('.mother-resident').addClass('dim-text');
    $('.mother-res-no').addClass('disabled');
    $('.mother-resident').hide();
  });

  //mother cant-find
  $('.mother-cant-find').on('click', function (event) {
    event.preventDefault();
    $('.step-01-button').addClass('disabled'); //disable button if cant find country
    $('.destroy').hide('fast');
    $('.sorry-message').show('slow');
    $('.reset').hide();
  });

  //click on country
  $('.item').on('click', function () {
    $('.step-01-button').removeClass('disabled');
  }); // end on



  //step 1 finish
  $('.step-01-button').on('click', function () {
    $('.destroy').hide('fast');
    $('.s1').addClass('circle-finish');
    $('.destroy-education').addClass('active');
    $('.step-01-finish').addClass('active');
    $('.s1').html('1').removeClass('of');
    $('.s2').html('<span class="of-num">2</span> of <span class="of-num">2</span>').addClass('of');
    $('.line-01').addClass('finish-line');

  }); //end on

  //step 2 - education

  //if no education
  $('.noed').on('click', function () {
    $('.work-check').addClass('active');
    $('.step-02-button').addClass('disabled');
  })

  //if no work
  $('.occupation-cant-find').on('click', function () {
    $('.education-block ').addClass('inactive');
    $('.destroy').hide('fast');
    $('.step-01-finish').hide('fast');
    $('.sorry-message').show('slow');
    $('.reset').hide();
  });

  //if there is education or job
  $('.school, .college, .job').on('click', function () {
    $('.step-02-button').removeClass('disabled');
  }); //end on

  //if chose education after no education
  $('.school, .college').on('click', function () {
    $('.work-check').removeClass('active');
  }); //end on

  //step 2 finish
  $('.step-02-button').on('click', function () {
    $('.destroy-education').hide('fast');
    $('.s2').addClass('circle-finish');
    $('.step-02-finish').addClass('active');

    $('.s2').html('2').removeClass('of');
    $('.s3').html('<span class="of-num">3</span> of <span class="of-num">3</span>').addClass('of');

    $('.register-block').addClass('active');
    $('.line-02').addClass('finish-line');
    $('.reset').hide();
  }); //end on

  $('.occupation-cant-find').on('click', function(event) {
    event.preventDefault();
    location.href = '#eligible';
  })


  // step 3 - register
  //$('#reg').on('click', function () {
  //  $('.register').hide('fast');
  //  $('.step-03-finish').addClass('active');
  //  $('.s3').addClass('circle-finish');
  //  $('.s3').html('3').removeClass('of');

  //})


  //RESET

  $('.reset').on('click', function () {
    console.log('heya');

    var pagebody = ' ';
    var template_url = 'http://usaimmigrations.org/wp-content/themes/naked-wp/test.html';
    location.href = '#eligible';
    $('.eligible').html( pagebody );
    $('.eligible').load( template_url );




  });



}); //end ready
