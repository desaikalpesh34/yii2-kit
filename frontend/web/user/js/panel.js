$(function () {

    $(document).ready(
        function () {
            if ($('#personal #profile-passport').val() == 'yes') {
                $('.mainblock').show();
                $('.passport').hide();
            } else if ($('#personal #profile-passport').val() == 'no') {
                $('#personal .sorry').show();
                // $('.passport').fadeOut();
                // $('.button.big').hide();
            }

            $('#profile-passport').change(function () {
                if ($(this).val() == 'yes') {
                    $('.mainblock').show();
                    $('.passport').fadeOut();
                } else {
                    $('.sorry').show();
                    // $('.passport').fadeOut();
                    // $('.button.big').hide();
                }
            })
        }
    );


    //do you have children
    $('#profile-has_children').change(function () {
        if ($(this).val() == 'yes') {
            $('.children_block').show();
        }
        else {
            $('.children_block').hide();
        }
    });

  //reset button on country
  $('#res').click(function() {
    location.reload();
  });


  $('#profile-marital_status').change(function () {
    if ($(this).val() == 'Married and my spouse IS a U.S. citizen or a U.S. Lawful Permanent Resident (LPR)' ||
        $(this).val() == 'Married and my spouse is NOT a U.S. citizen or a U.S. Lawful Permanent Resident (LPR)') {
      $('.married').show();
    }else {
      $('.married').hide();
    }
  });

  //eligibility
  //country of birth
  // $('.cant-find-user').on('click', function () {
  //   $('.mar-block').removeClass('inactive');
  //   $('.yourcountry').fadeOut();
  //   $('.city, .countr').hide();
  // });

  //wife cant find
  $('.cant-find-wife').on('click', function () {
    $('.parents, .father-born').removeClass('inactive');
    $('.mar-block').fadeOut();
    $('.city, .countr').hide();
  });

  //father born yes
  $('.father-yes').on('click', function () {
    $('.father-born').fadeOut();
    $('.mother-born').removeClass('inactive');
    //$('.father-born').addClass('inactive');
    $('.ui.form.error .error.message').css('display', 'none');
  });

  //father born no
  $('.father-no').on('click', function () {
    $('.father-born').fadeOut();
    $('.father-resident').removeClass('inactive');
    $('.ui.form.error .error.message').css('display', 'none');
  });

  //father resident yes
  $('.father-res-yes').on('click', function () {
    $('.father-resident').fadeOut();
    $('.mother-born').removeClass('inactive');
    $('.ui.form.error .error.message').css('display', 'none');
  });

  //father resident no
  $('.father-res-no').on('click', function () {
    $('.father-resident').fadeOut();
    $('.father-country').removeClass('inactive');
    $('.ui.form.error .error.message').css('display', 'none');
  });

  //father cant find
  $('.father-cant-find').on('click', function () {
    $('.mother-born').removeClass('inactive');
    $('.father-country').fadeOut();
    $('.city, .countr').hide();
  });

  //mother born yes
  $('.mother-yes').on('click', function () {
    $('.mother-born').hide();
    $('.sorry').removeClass('inactive');
    $('.ui.form.error .error.message').css('display', 'none');
  });

  //mother born no
    $('.mother-no').on('click', function () {
      $('.mother-born').fadeOut(); //check why it's not hiding
      $('.mother-resident').removeClass('inactive');
      $('.ui.form.error .error.message').css('display', 'none');
  });

  //mother resident yes
  $('.mother-res-yes').on('click', function () {
    $('.sorry').removeClass('inactive');
    $('.mother-resident').hide();
    $('.ui.form.error .error.message').css('display', 'none');
  });

  //mother resident no
  $('.mother-res-no').on('click', function () {
    $('.mother-country').removeClass('inactive');
    $('.mother-resident').hide();
    $('.ui.form.error .error.message').css('display', 'none');
  });

  //mother cant-find
  $('.mother-cant-find').on('click', function () {
    $('.mother-country').fadeOut();
    $('.sorry').removeClass('inactive');
    $('.city, .countr').hide();
  });

  //user choses county
  $('.user-country').on('click', function () {
    $('.city').removeClass('inactive');
    $('.ui.form.error .error.message').css('display', 'none');
  });

  //relative choses country
  $('.rel-country').on('click', function () {
    $('.countr').removeClass('inactive');
    $('.countr').show();
    $('.ui.form.error .error.message').css('display', 'none');
  });


    $('#profile-education').change(function () {
        if ($(this).val() == 'Primary school only' || $(this).val() == 'Some high school, no diploma') {
            $('.occupation').show();
        } else {
            $('.occupation').hide();
        }
    });


  //education and occupation
  $('.no_diploma').on('click', function() {
    $('.occupation').show();
  });

  $('.diploma').on('click', function() {
    $('.occupation, .sorry').hide();
  });

  $('.cantfind').on('click', function () {
    $('.occupation').hide();
    $('.sorry').show();
  });


  //validation goes on click
  $('.chk').on('click', function () {
    console.log('1')
  //validations
  //first name
  $('.ui.form')
  .form({
    fields: {
      fname: {
        identifier: 'first_name',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your First Name'
          }
        ]
      },
      lname: {
        identifier: 'last_name',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Last Name'
          }
        ]
      },
      month: {
        identifier: 'month',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Month of birth'
          }
        ]
      },
      day: {
        identifier: 'day',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Birthday'
          }
        ]
      },
      year: {
        identifier: 'year',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Year of Birth'
          }
        ]
      },
      mail: {
        identifier: 'email',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Email'
          }
        ]
      },
      address: {
        identifier: 'address',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Address'
          }
        ]
      },
      city: {
        identifier: 'city',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your City'
          }
        ]
      },
      state: {
        identifier: 'state',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your State/Districs/Province'
          }
        ]
      },
      country: {
        identifier: 'country',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Country'
          }
        ]
      },
      marital: {
        identifier: 'marital',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Marutal Status'
          }
        ]
      },
      gender: {
        identifier: 'gender',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter Your Child\'s gender'
          }
        ]
      },

    }
  });

  $('.ui.form')
  .form({
    fields: {
      education: {
        identifier: 'education_input',
        rules: [
          {
            type: 'empty',
            prompt: 'Please Make a Selection'
          }
        ]
      },
    }
  });



  if ($('.occupation').is(':visible')) {
    $('.ui.form')
    .form({
      fields: {
        education: {
          identifier: 'education_input',
          rules: [
            {
              type: 'empty',
              prompt: 'Please Make a Selection'
            }
          ]
        },
        occupation: {
          identifier: 'occupation_input',
          rules: [
            {
              type: 'empty',
              prompt: 'Please Make a Selection'
            }
          ]
        },
      }
    });
  }

//married validations
    $('.ui.form')
    .form({
      fields: {
        mar_status: {
          identifier: 'marital_status',
          rules: [
            {
              type: 'empty',
              prompt: 'Please Make a Selection'
            }
          ]
        },
      }
    });


    if ( $('.married').is(':visible') ) {
      $('.ui.form').form({
        fields: {
          spname: {
            identifier: 'spouse_first_name',
            rules: [
              {
                type: 'empty',
                prompt: 'Please enter Your Spouse\'s First Name'
              }
            ]
          },
          splname: {
            identifier: 'spouse_last_name',
            rules: [
              {
                type: 'empty',
                prompt: 'Please enter Your Spouse\'s Last Name'
              }
            ]
          },
          spmth: {
            identifier: 'spouse_month',
            rules: [
              {
                type: 'empty',
                prompt: 'Please enter Your Spouse\'s Month of Birth'
              }
            ]
          },
          spday: {
            identifier: 'spouse_day',
            rules: [
              {
                type: 'empty',
                prompt: 'Please enter Your Spouse\'s Birthday'
              }
            ]
          },
          spyear: {
            identifier: 'spouse_year',
            rules: [
              {
                type: 'empty',
                prompt: 'Please enter Your Spouse\'s year of Birth'
              }
            ]
          },
          spgender: {
            identifier: 'spouse_gender',
            rules: [
              {
                type: 'empty',
                prompt: 'Please enter Your Spouse\'s gender'
              }
            ]
          },
          spcountry: {
            identifier: 'spouse_country',
            rules: [
              {
                type: 'empty',
                prompt: 'Please enter Your Spouse\'s Country of Birth'
              }
            ]
          },
          spcity: {
            identifier: 'spouse_city',
            rules: [
              {
                type: 'empty',
                prompt: 'Please enter Your Spouse\'s City of Birth'
              }
            ]
          },
        }
      });
    }


  //children no-yes
  $('.ui.form')
  .form({
    fields: {
      children_if: {
        identifier: 'if_children',
        rules: [
          {
            type: 'empty',
            prompt: 'Please Make a Selection'
          }
        ]
      },
    }
  });

  //passport
  $('.ui.form')
  .form({
    fields: {
      passport: {
        identifier: 'if_passport',
        rules: [
          {
            type: 'empty',
            prompt: 'Please Make a Selection'
          }
        ]
      },
    }
  });


  });


  //eligibility validation
  $('#sc, #save_button').on('click', function() {
    if ( $('.father-born').is(':visible') ) {

      $('.ui.form')
      .form({
        fields: {
          father_born: {
            identifier: 'father_born',
            rules: [
              {
                type: 'empty',
                prompt: 'Please Make a Selection'
              }
            ]
          },
        }
      });

    } else if ( $('.father-resident').is(':visible') ) {


      $('.ui.form')
      .form({
        fields: {
          father_resident: {
            identifier: 'father_resident',
            rules: [
              {
                type: 'empty',
                prompt: 'Please Make a Selection'
              }
            ]
          },
        }
      });

    } else if ( $('.mother-born').is(':visible') ) {


      $('.ui.form')
      .form({
        fields: {
          mother_born: {
            identifier: 'mother_born',
            rules: [
              {
                type: 'empty',
                prompt: 'Please Make a Selection'
              }
            ]
          },
        }
      });

    } else if ( $('.mother-resident').is(':visible') ) {


      $('.ui.form')
      .form({
        fields: {
          mother_born: {
            identifier: 'mother_resident',
            rules: [
              {
                type: 'empty',
                prompt: 'Please Make a Selection'
              }
            ]
          },
        }
      });

    } else if ( $('.yourcountry').is(':visible') ) {


      $('.ui.form')
      .form({
        fields: {
          your_country: {
            identifier: 'your_country',
            rules: [
              {
                type: 'empty',
                prompt: 'Please Make a Selection'
              }
            ]
          },
        }
      });

    } else if ( $('.mar-block').is(':visible') ) {


      $('.ui.form')
      .form({
        fields: {
          spouse_country: {
            identifier: 'spouse_country',
            rules: [
              {
                type: 'empty',
                prompt: 'Please Make a Selection'
              }
            ]
          },
        }
      });

    }  else if ( $('.father-country').is(':visible') ) {


        $('.ui.form')
        .form({
          fields: {
            father_country: {
              identifier: 'father_country',
              rules: [
                {
                  type: 'empty',
                  prompt: 'Please Make a Selection'
                }
              ]
            },
          }
        });

    } else if ( $('.mother-country').is(':visible') ) {


        $('.ui.form')
        .form({
          fields: {
            mother_country: {
              identifier: 'mother_country',
              rules: [
                {
                  type: 'empty',
                  prompt: 'Please Make a Selection'
                }
              ]
            },
          }
        });

    }
  }); // end on







  //password change
  $('.ui.form')
    .form({
      fields: {
        oldpassword: {
          identifier: 'old_pass',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter your current password'
            }
          ]
        },
        newpassword: {
          identifier: 'new_pass',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a new password'
            },
            {
              type   : 'minLength[6]',
              prompt : 'Your new password must be at least 6 characters'
            }
          ]
        },
        confirmpassword: {
          identifier: 'confirm_pass',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please confirm new password'
            },
            {
              type   : 'match[new_pass]',
              prompt : 'Passwords do not match'
            }
          ]
        },
        newpasswordstr: {
          identifier: 'new_pass_startup',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a new password'
            },
            {
              type   : 'minLength[6]',
              prompt : 'Your new password must be at least 6 characters'
            }
          ]
        },
        confirmpasswordstr: {
          identifier: 'confirm_pass_startup',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please confirm new password'
            },
            {
              type   : 'match[new_pass]',
              prompt : 'Passwords do not match'
            }
          ]
        },
      }
    })
  ;


  //click on save and continue city and country
  $('#sc').on('click', function() {

  if ( $('#countr').is(':visible') ) {

    $('.ui.form').form({
        fields: {
          conutry: {
            identifier: 'cofb',
            rules: [
              {
                type   : 'empty',
                prompt : 'Please enter your Country of Birth'
              }
            ]
          },
          city: {
            identifier: 'ciofb',
            rules: [
              {
                type   : 'empty',
                prompt : 'Please enter your City of Birth'
              },
            ]
          },
  }

});

} else if ( $('#city').is(':visible') ) {
  console.log('city visible');
  $('.ui.form').form({
    fields: {
      city: {
        identifier: 'cityof',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter your City of Birth'
          }
        ]
      }
    }
  });
}


});

  //enable country button on edit
  $('.item').on('click', function() {
    $('#sc').removeClass('disabled');
  });


  $('#edit_city').on('click', function() {
    $('.ciofb').removeAttr('disabled');
  });


  //show modal on click
  $('#settings').on('click', function(event) {
    event.preventDefault();
    $('.ui.modal.modalcont')
    .modal('show');
  })

  // dropdow initialisation
  $('.ui.dropdown')
  .dropdown();

  $('.ui.checkbox').checkbox();

  $('.ui.modal.modalstartup')
  .modal('show');

}); //end ready
