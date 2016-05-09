@extends('master')

@section('content')
    
    <!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<style type="text/css">
/**
 * Override feedback icon position
 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 */
#eventForm .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

<form id="eventForm" method="post" class="form-horizontal">
    
             <div class="col-md-6">
                   <div class="form-group">
                         <label for="email">{{Lang::get('dictionary.email')}}</label> 
                         <div id="embeddingDatePicker"></div>  
                   </div>
              </div>

</form>

<script>
    $(document).ready(function() {
        $('#embeddingDatePicker')
            .datepicker({
                format: 'mm/dd/yyyy'
            })
            .on('changeDate', function(e) {
                // Set the value for the date input
                $("#selectedDate").val($("#embeddingDatePicker").datepicker('getFormattedDate'));

                // Revalidate it
                $('#eventForm').formValidation('revalidateField', 'selectedDate');
            });

        $('#eventForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The name is required'
                        }
                    }
                },
                selectedDate: {
                    // The hidden input will not be ignored
                    excluded: false,
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                        date: {
                            format: 'MM/DD/YYYY',
                            message: 'The date is not a valid'
                        }
                    }
                }
            }
        });
    });
</script>

@endsection


