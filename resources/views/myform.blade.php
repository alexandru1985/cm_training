<!DOCTYPE html>

<html>

    <head>

        <title>Laravel Ajax Validation Example</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    </head>

    <body>


        <div class="container">

            <h2>Laravel Ajax Validation</h2>


            <div class="alert alert-danger print-error-msg" style="display:none">

                <ul></ul>

            </div>


            <form name="myForm" action="/action_page.php"
                  id="myForm" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group" id="first_name_row">

                    <label>First Name:</label>

                    <input type="first_name" class="form-control" name="first_name" value="{{ old('email') }}">


                    <span class="help-block">
                        <strong id="first_name_error" class="test"></strong>
                    </span>


                </div>


                <div class="form-group" id="last_name_row">

                    <label>Last Name:</label>

                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                    <span class="help-block">
                        <strong id="last_name_error" class="test"></strong>
                    </span>
                </div>


                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="text" name="email" class="form-control" placeholder="Email">

                </div>


                <div class="form-group">

                    <strong>File:</strong>

                    <input type="file" id="userfile" name="userfile" class="files_update"/>

                </div>


                <div class="form-group">

                    <button class="btn btn-success btn-submit">Submit</button>

                </div>

            </form>

        </div>
        <div id="debug">
        </div>

        <script type="text/javascript">


$(document).ready(function () {

    $(".btn-submit").click(function (e) {



        var _token = $("input[name='_token']").val();

        var first_name = $("input[name='first_name']").val();

        var last_name = $("input[name='last_name']").val();

        var email = $("input[name='email']").val();

        var address = $("textarea[name='address']").val();
        e.preventDefault();

        $.ajax({

            url: "http://localhost/contact_manager/public/my-form",

            type: 'POST',

            data: {_token: _token, first_name: first_name, last_name: last_name},

            success: function (data) {


                if ($.isEmptyObject(data)) {
                    $(".test").empty();
                    $(".form-group").removeClass('has-error');
                    var form_data = new FormData($("#myForm"));
                    form_data.append('file_name', $('.files_update').prop('files')[0]);
                    form_data.append('_token', '{{csrf_token()}}');
                    //alert(form_data);

                    $.ajax({
                        url: "http://localhost/contact_manager/public/upload",
                        data: form_data,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function (result) {
                            // $("#debug").append(result);
                        }});

                } else {
//           console.log(data.error['first_name'].length);
//           console.log(data.error['last_name'].length);
                    if (data.first_name.length > 0) {
                        $("#first_name_error").empty();
                        $("#first_name_row").addClass('has-error');
                        $("#first_name_error").append(data['first_name']);

                    } else {

                        $("#first_name_error").empty();
                        $("#first_name_row").removeClass('has-error');

                    }
                    if (data.last_name.length > 0) {
                        $("#last_name_error").empty();
                        $("#last_name_row").addClass('has-error');
                        $("#last_name_error").append(data['last_name']);
                    } else {

                        $("#last_name_error").empty();
                        $("#last_name_row").removeClass('has-error');

                    }


                }

            }

        });


    });



});


        </script>


    </body>

</html>
