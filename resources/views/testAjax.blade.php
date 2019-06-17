<!DOCTYPE html>
<?php $id = 5; ?>
<html>

    <head>



        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            .loader {
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite; /* Safari */
                animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
    </head>

    <body>


        <div class="container">


            {{ csrf_field() }}

            <h2>Basic Table</h2>
            <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
            <button type="button" class="btn" onclick="test(<?php echo $id; ?>);">Change</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>Lastname</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button id="inactive1" type="button" class="btn btn-success test">Active</button></td>
                        <td><button id="inactive" type="button" class="btn btn-danger" onclick="myFunction(<?php echo $id; ?>)" data-toggle="modal" data-target="#myModal">Danger</button></td>
                    </tr>
                    <tr>
                        <td><button id="inactive2"  type="button" class="btn btn-success test">Active</button></td>
                        <td><button type="button" class="btn btn-danger" onclick="myFunction()">Danger</button></td>
                    </tr>
                    <tr>
                        <td><button id="inactive3"  type="button" class="btn btn-success test">Active</button></td>
                        <td><button type="button" class="btn btn-danger" onclick="myFunction()">Danger</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="modal fade" id="myModal" role="dialog">



                <div class="loader" style="margin: auto; position: absolute; top: 0; left: 0; bottom: 0; right: 0;"></div>


            </div>


        </div>

    </div>
    <div id="debug">
    </div>

    <script type="text/javascript">
        function myFunction(id) {
            $.ajax({
                url: "http://localhost/contact_manager/public/testAjaxPost/3",

                type: 'POST',

                data: {id: id},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (result) {
                    $("#debug").append(result);
                    $("#inactive").removeClass('btn-danger');
                    $("#inactive1").removeClass('btn-success');
                    $('#myModal').modal('hide');
                    $("#inactive").removeAttr("onclick");
                }}).done(function () {
//                    $("#inactive").removeClass('btn-danger');
//                    $("#inactive1").removeClass('btn-success');
            });
        }

        function removeClass() {
           var ids = [];  
            $('.test').each(function () {
                var str = this.id;
                var id = str.substring(8);
                ids.push(id);
                
            });
            ids.forEach(function(id){
                  $("#inactive"+id).removeClass('btn-success').html('Inactive');
            });
            
        }
                function test(id) {
            $.ajax({
                url: "http://localhost/contact_manager/public/testAjaxPost/3",

                type: 'POST',

                data: {id: id},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (result) {
                    $("#debug").append(result);
removeClass();
                }}).done(function () {
//                    $("#inactive").removeClass('btn-danger');
//                    $("#inactive1").removeClass('btn-success');
            });
        }




    </script>


</body>

</html>
