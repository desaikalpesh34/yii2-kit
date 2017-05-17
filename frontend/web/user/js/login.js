$(function () {

  $('.nologin').on('click', function () {
    $('.login-block').hide();
    $('.forgot-01').show();
});

$('.forgot-01-continue').on('click', function () {
  $('.forgot-01').hide();
  $('.forgot-02').show();
});

$('.forgot-02-continue').on('click', function () {
  $('.forgot-02').hide();
  $('.forgot-03').show();
});

/* $('.forgot-03-continue').on('click', function () {
  $('.forgot-03').hide();
  $('.forgot-04').show();
}); */

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

});
