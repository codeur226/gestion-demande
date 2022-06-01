/*
 *  Document   : formsWizard.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Wizard page
 */

var FormsWizard = function() {

    return {
        init: function() {
            /*
             *  Jquery Wizard, Check out more examples and documentation at http://www.thecodemine.org
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Progress Wizard */

            $.validator.addMethod('le', function (value, element, param) {
                return this.optional(element) || value.toString() < $(param).val().toString();
            }, 'Donnée invalide');

            $('#progress-wizard').formwizard({focusFirstInput: true, validationEnabled: true,
                
                validationOptions: {
                    errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                    errorElement: 'span',
                    errorPlacement: function(error, e) {
                        e.parents('.form-group > div').append(error);
                    },
                    highlight: function(e) {
                        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                        $(e).closest('.help-block').remove();
                    },
                    success: function(e) {
                        // You can use the following if you would like to highlight with green color the input after successful validation!
                        e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                        e.closest('.help-block').remove();
                    },
                    rules: {
                        nom: {
                            required: true,
                            minlength: 2
                        },
                        prenom: {
                            required: true,
                            minlength: 2
                        },
                        telephone: {
                            required: true,
                            minlength: 8
                        },
                        confirmationtelephone: {
                            required: true,
                            equalTo: '#telephone',
                            minlength: 8
                        },
                        lieunaissance: {
                            required: true,
                            minlength: 2
                        },

                        datenaissance: {
                            required: true,
                        },
                        datedebut: {
                            required: true,
                            le: '#datefin'
                        },
                        datefin: {
                            required: true,
                        },

                        diplome: {
                            required: true,
                        },
                    },
                    
                    messages: {
                        diplome: {
                            required: 'Veuillez joindre votre diplôme ou attestation',
                        },
                        datenaissance: {
                            required: 'Veuillez saisir votre date de naissance',
                        },
                        datedebut: {
                            required: 'Veuillez saisir la date de début souhaitée',
                            le: 'La date de fin de stage doit etre supérieure à la date de début de stage !',
                        },
                        datefin: {
                            required: 'Veuillez saisir la date de fin souhaitée',
                        },
                        nom: {
                            required: 'Veuillez saisir votre nom',
                            minlength: 'Votre nom doit comporter au moins 2 caractères'
                        },
                        prenom: {
                            required: 'Veuillez saisir votre prenom',
                            minlength: 'Votre prénom doit comporter au moins 2 caractères'
                        },
                        email: {
                            required: 'Veuillez saisir votre adresse E-mail valide',
                        },


                        telephone: {
                            required: 'Veuillez saisir votre de téléphone ',
                            minlength: 'Le numéro de téléphone doit comporter au moins 8 caractères'
                        },
                        confirmationtelephone: {
                            required: 'Confirmez votre numéro de téléphone svp',
                            minlength: 'Votre téléphone doit comporter au moins 8 caractères',
                            equalTo: 'Entrez le même numéro de téléphone svp'
                        },
                    }
                },
                disableUIStyles: true, inDuration: 0, outDuration: 0});

            // Get the progress bar and change its width when a step is shown
            var progressBar = $('#progress-bar-wizard');
            progressBar
                .css('width', '33%')
                .attr('aria-valuenow', '33');

            $("#progress-wizard").bind('step_shown', function(event, data){
		if (data.currentStep === 'progress-first') {
                    progressBar
                        .css('width', '33%')
                        .attr('aria-valuenow', '33')
                        .removeClass('progress-bar-warning progress-bar-success')
                        .addClass('progress-bar-danger');
                }
                else if (data.currentStep === 'progress-second') {
                    progressBar
                        .css('width', '66%')
                        .attr('aria-valuenow', '66')
                        .removeClass('progress-bar-danger progress-bar-success')
                        .addClass('progress-bar-warning');
                }
                else if (data.currentStep === 'progress-third') {
                    progressBar
                        .css('width', '100%')
                        .attr('aria-valuenow', '100')
                        .removeClass('progress-bar-danger progress-bar-warning')
                        .addClass('progress-bar-success');
                        
                }
                //
               
            });

            /* Initialize Basic Wizard */
            $('#basic-wizard').formwizard({disableUIStyles: true, inDuration: 0, outDuration: 0});

            /* Initialize Advanced Wizard with Validation */
            $('#advanced-wizard').formwizard({
                
                disableUIStyles: true,
                validationEnabled: true,
                validationOptions: {
                    errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                    errorElement: 'span',
                    errorPlacement: function(error, e) {
                        e.parents('.form-group > div').append(error);
                    },
                    highlight: function(e) {
                        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                        $(e).closest('.help-block').remove();
                    },
                    success: function(e) {
                        // You can use the following if you would like to highlight with green color the input after successful validation!
                        e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                        e.closest('.help-block').remove();
                    },
                    rules: {
                        nom: {
                            required: true,
                            minlength: 2
                        },
                        prenom: {
                            required: true,
                            minlength: 5
                        },
                        val_confirm_password: {
                            required: true,
                            equalTo: '#val_password'
                        },
                        val_email: {
                            required: true,
                            email: true
                        },
                        val_terms: {
                            required: true
                        }
                    },
                    messages: {
                        nom: {
                            required: 'Entrez votre nom svp',
                            minlength: 'Votre nom doit comporter au moins 2 caractères'
                        },
                        val_password: {
                            required: 'Please provide a password',
                            minlength: 'Your password must be at least 5 characters long'
                        },
                        val_confirm_password: {
                            required: 'Please provide a password',
                            minlength: 'Your password must be at least 5 characters long',
                            equalTo: 'Please enter the same password as above'
                        },
                        val_email: 'Please enter a valid email address',
                        val_terms: 'Please accept the terms to continue'
                    }
                },
                inDuration: 0,
                outDuration: 0
            });

            /* Initialize Clickable Wizard */
            var clickableWizard = $('#clickable-wizard');

            clickableWizard.formwizard({disableUIStyles: true, inDuration: 0, outDuration: 0});

            $('.clickable-steps a').on('click', function(){
                var gotostep = $(this).data('gotostep');

                clickableWizard.formwizard('show', gotostep);
                
            });

            $('[name="datefin"]').on('change blur keyup', function() {
                $('[name="datedebut"]').valid();
            });
        }
    };
}();

/*<script type="text/javascript">
                        var div = document.getElementById('advanced-first');
                        var resp1 = document.getElementById('non_resp');
                        var resp2 = document.getElementById('resp');
                            if(window.innerWidth > 800){
                                div.appendChild(resp2);
                            }
                            else{
                                div.appendChild(resp1);
                            }
                            </script>*/

function resume(){
    // resumé des informations 
    if(window.innerWidth > 800){
        var type =(document.getElementById("typestage").value)
    $('#nom_tab').text(document.getElementById("nom").value);
    $('#prenom_tab').text(document.getElementById("prenom").value);
    $('#tel_tab').text(document.getElementById("telephone").value);
    $('#mail_tab').text(document.getElementById("email").value);
   //$('#domaine_tab').text(document.getElementById("direction").id);
//    recuperer le libellé selectionner
$('#type_tab').text(document.getElementById('typestage').options[document.getElementById('typestage').selectedIndex].text);
$('#domaine_tab').text(document.getElementById('direction').options[document.getElementById('direction').selectedIndex].text);


    $('#debut_tab').text(document.getElementById("datedebut").value);
    $('#fin_tab').text(document.getElementById("datefin").value);  
    }
    else{
    $('#nom_tabR').text(document.getElementById("nomR").value);
    $('#prenom_tabR').text(document.getElementById("prenomR").value);
    $('#tel_tabR').text(document.getElementById("telephoneR").value);
    $('#mail_tabR').text(document.getElementById("emailR").value);
   //$('#domaine_tab').text(document.getElementById("direction").id);
//    recuperer le libellé selectionner
$('#type_tabR').text(document.getElementById('typestage').options[document.getElementById('typestage').selectedIndex].text);
$('#domaine_tabR').text(document.getElementById('direction').options[document.getElementById('direction').selectedIndex].text);


    $('#debut_tabR').text(document.getElementById("datedebutR").value);
    $('#fin_tabR').text(document.getElementById("datefinR").value);  
    }
    
    
}
