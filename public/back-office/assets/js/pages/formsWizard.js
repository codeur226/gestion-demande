/*
 *  Document   : formsWizard.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Wizard page
 */

/* Add country flag to phone number field */

/*const phoneInputField = document.querySelector("#telephone");
const phoneInput = window.intlTelInput(phoneInputField, {utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",});*/

/* Initialize Masked Inputs */

$('#telephone').mask('99-99-99-99');
$('#whatsapp').mask('99-99-99-99');


var FormsWizard = function() {

    return {
        init: function() {
            /*
             *  Jquery Wizard, Check out more examples and documentation at http://www.thecodemine.org
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Progress Wizard */

            $.validator.addMethod('le', function (value, element, param) {
                //alert(value.toString());
                return this.optional(element) || value.toString() < $(param).val().toString();
            }, 'Donnée invalide');

            
            $.validator.addMethod('filesize', function (value, element, param) {
                //alert(element.files[0].size.toString());
                return this.optional(element) || (parseInt(element.files[0].size.toString()) < parseInt(param.toString()))
            }, 'Fichier invalide');

            function datenow(){
                var d = new Date();

                var month = d.getMonth()+1;
                var day = d.getDate();

                var output = d.getFullYear()  + '-' + 
                            ((''+month).length<2 ? '0' : '') + month + '-' +
                            ((''+day).length<2 ? '0' : '') + day;

                return output;
                
            }

            if (window.innerWidth > 800) {
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
                                minlength: 8,
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
                                min: datenow(),
                                le: '#datefin'
                            },
                            datefin: {
                                required: true,
                            },
    
                            cv: {
                                required: true,
                                filesize: 2000000,
                            },

                            diplome: {
                                required: true,
                                filesize: 2000000,
                            },

                            lettrerecommandation: {
                                filesize: 2000000,
                            },
                        },
                        
                        messages: {
                            cv: {
                                required: 'Veuillez joindre votre cv',
                                filesize: 'Veuillez entrer un fichier de taille inférieure à 2 Mo',
                            },

                            diplome: {
                                required: 'Veuillez joindre votre diplôme ou attestation',
                                filesize: 'Veuillez entrer un fichier de taille inférieure à 2 Mo',
                            },

                            lettrerecommandation: {
                                filesize: 'Veuillez entrer un fichier de taille inférieure à 2 Mo',
                            },

                            datenaissance: {
                                required: 'Veuillez saisir votre date de naissance',
                            },
                            datedebut: {
                                required: 'Veuillez saisir la date de début souhaitée',
                                min: "Veuillez entrer une date de début supérieure ou égale à la date d'aujourd'hui",
                                le: 'Veuillez entrer une période valide !',
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
                                minlength: 'Le numéro de téléphone doit comporter au moins 8 caractères',
                                format: 'Veuillez entrer un numéro de téléphone valide !'
                            },
                            confirmationtelephone: {
                                required: 'Confirmez votre numéro de téléphone svp',
                                minlength: 'Votre téléphone doit comporter au moins 8 caractères',
                                equalTo: 'Entrez le même numéro de téléphone svp'
                            },
                        }
                    },
                    disableUIStyles: true, inDuration: 0, outDuration: 0});
            }else{
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
                            
                            datedebutR: {
                                required: true,
                                min: datenow(),
                                le: '#datefinR'
                            },
                            datefinR: {
                                required: true,
                            },
    
                            cvR: {
                                required: true,
                                filesize: 2000000,
                            },

                            diplomeR: {
                                required: true,
                                filesize: 2000000,
                            },

                            lettrerecommandationR: {
                                filesize: 2000000,
                            },
                        },
                        
                        messages: {
                            cvR: {
                                required: 'Veuillez joindre votre cv',
                                filesize: 'Veuillez entrer un fichier de taille inférieure à 2 Mo',
                            },

                            diplomeR: {
                                required: 'Veuillez joindre votre diplôme ou attestation',
                                filesize: 'Veuillez entrer un fichier de taille inférieure à 2 Mo',
                            },

                            lettrerecommandationR: {
                                filesize: 'Veuillez entrer un fichier de taille inférieure à 2 Mo',
                            },
                            datenaissance: {
                                required: 'Veuillez saisir votre date de naissance',
                            },
                            datedebutR: {
                                required: 'Veuillez saisir la date de début souhaitée',
                                min: "Veuillez entrer une date de début supérieure ou égale à la date d'aujourd'hui",
                                le: 'Veuillez entrer une période valide !',
                            },
                            datefinR: {
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
                                minlength: 'Le numéro de téléphone doit comporter au moins 8 caractères',
                                format: 'Veuillez entrer un numéro de téléphone valide !'
                            },
                            confirmationtelephone: {
                                required: 'Confirmez votre numéro de téléphone svp',
                                minlength: 'Votre téléphone doit comporter au moins 8 caractères',
                                equalTo: 'Entrez le même numéro de téléphone svp'
                            },
                        }
                    },
                    disableUIStyles: true, inDuration: 0, outDuration: 0});
            }
            

            // Get the progress bar and change its width when a step is shown
            

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

            if (window.innerWidth > 800) {
                $('[name="datefin"]').on('change blur keyup', function() {
                    $('[name="datedebut"]').valid();
                });

                $('[name="telephone"]').on('change blur keyup', function() {
                    $('[name="telephone"]').valid();
                });
                
            }else{
                $('[name="datefinR"]').on('change blur keyup', function() {
                    $('[name="datedebutR"]').valid();
                });
            }
            
        }
    };
}();


function resume(){

    // resumé des informations 
    if(window.innerWidth > 800){
        var type =(document.getElementById("typestage").value)
    $('#nom_tab').text(document.getElementById("nom").value);
    $('#prenom_tab').text(document.getElementById("prenom").value);
    $('#tel_tab').text(document.getElementById("telephone").value);
    $('#mail_tab').text(document.getElementById("email").value);
    //$('#domaine_tab').text(document.getElementById("direction").id);

    //recuperer le libellé selectionner
    $('#type_tab').text(document.getElementById('typestage').options[document.getElementById('typestage').selectedIndex].text);
    $('#domaine_tab').text(document.getElementById('direction').options[document.getElementById('direction').selectedIndex].text);
    
    $('#specialite_tab').text(document.getElementById("specialite").value);


    $('#debut_tab').text(document.getElementById("datedebut").value);
    $('#fin_tab').text(document.getElementById("datefin").value);  
    }
    else{
    $('#nom_tabR').text(document.getElementById("nomR").value);
    $('#prenom_tabR').text(document.getElementById("prenomR").value);
    $('#tel_tabR').text(document.getElementById("telephoneR").value);
    $('#mail_tabR').text(document.getElementById("emailR").value);
    //$('#domaine_tab').text(document.getElementById("direction").id);

    //recuperer le libellé selectionner
    $('#type_tabR').text(document.getElementById('typestage').options[document.getElementById('typestage').selectedIndex].text);
    $('#domaine_tabR').text(document.getElementById('direction').options[document.getElementById('direction').selectedIndex].text);

    $('#specialite_tabR').text(document.getElementById("specialiteR").value);


    $('#debut_tabR').text(document.getElementById("datedebutR").value);
    $('#fin_tabR').text(document.getElementById("datefinR").value);  
    }   

    /*if(document.getElementById("nom").value!=null)
{
    $('#form-title').remove();
}*/
}

