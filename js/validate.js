
jQuery('document').ready(function(){

    // --User Registration Form Validations--

    jQuery.validator.addMethod("validname", function(value, element) {
        return /^[a-zA-Z ]+$/.test(value);
    }, 'Enter valid name');

    jQuery("#frm-register").validate({
        rules: {
            fullname:{
                required: true,
                minlength:2,
                validname:''
            } ,
            email: {
                required: true,
                email: true
            },
            username:{
                required: true,
                minlength:5,
                maxlength:20
            },

            password:{
                required: true,
                minlength: 8,
                maxlength:20
            },

            cpassword:{
                required: true,
                minlength: 8,
                maxlength:20,
                equalTo:'cpassword'
            },

            dob:{
                required: true
            }
        },
        messages: {
            fullname:{
                required: 'The Fullname field is required.',
                minlength: 'The Fullname field must contain a minimum of 2 characters.'
            },
            email: {
                required: 'The email field is required.',
                email: 'The email field must be valid.'
            },
            username:{
                required: 'The username field required.',
                minlength: 'The username field must contain a minimum of 5 characters',
                maxlength: 'The username field must contain a maximum of 20 characters'
            },
            password:{
                required: 'The Password field required.',
                minlength: 'The Password field must contain a minimum of 8 characters.',
                maxlength: 'The Password field must contain a maximum of 20 characters.'
            },
            cpassword:{
                required: 'The Password field required.',
                minlength: 'The Password field must contain a minimum of 8 characters.',
                maxlength: 'The Password field must contain a maximum of 20 characters.'
            },
            dob:{
                required: 'You must select a date.'
            }


        }
    });

    // --User Login Form Validations--
    jQuery("#frm-login").validate({
        rules: {
            username:{
                required: true,
                minlength:2,
                maxlength:20
            } ,
            password: {
                required: true,
                minlength:8,
                maxlength:20
            }
        },
        messages: {
            username:{
                required: 'The username field is required.',
                minlength: 'The username field must contain a minimum of 2 characters.',
                maxlength: 'The username field must contain a maximum of 20 characters.'
            },
            password: {
                required: 'The password field is required.',
                minlength: 'The password field must contain a minimum of 8 characters.',
                maxlength: 'The password field must contain a maximum of 20 characters.'
            }
        }
    });

    // --User Login Form Validations--
    jQuery("#frm-start-thread").validate({
        rules: {
            thread_heading:{
                required: true
            } ,
            language_tag: {
                required: true
            },
            textarea_thread: {
                required: true
            }
        },
        messages: {
            thread_heading:{
                required: 'The heading field is required.'
            },
            language_tag: {
                required: 'Please select a language.'
            },
            textarea_thread: {
                required: 'Please enter a description.'
            }
        }
    });

});
