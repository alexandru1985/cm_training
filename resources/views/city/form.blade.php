<div class="panel-body">
  <div class="form-horizontal">
    <div class="row">
      <div class="col-md-8">
          @if (count($errors))
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <div class="form-group">
          <label for="name" class="control-label col-md-3">Name</label>
          <div class="col-md-8">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>
        </div>

        <div class="form-group" id="add-new-group" style="display: none;">
          <div class="col-md-offset-3 col-md-8">
            <div class="input-group">
              <input type="text" name="new_group" id="new_group" class="form-control">
              <span class="input-group-btn">
                <a href="#" id="add-new-btn" class="btn btn-default">
                  <i class="glyphicon glyphicon-ok"></i>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="panel-footer">
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
           <button type="submit" class="btn btn-primary">{{ ! empty($city->id) ? "Update" : "Save"}}</button>
          <a href="#" class="btn btn-default">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</div>

@section('form-script')
    <script>
    $("#add-new-group").hide();
    $('#add-group-btn').click(function () {
      $("#add-new-group").slideToggle(function() {
        $('#new_group').focus();
      });
      return false;
    });

    $("#add-new-btn").click(function() {
        var newGroup = $("#new_group");
        var inputGroup = newGroup.closest('.input-group');

        $.ajax({
            url: "{{ route("groups.store") }}",
            method: 'post',
            data: {
                name: $("#new_group").val(),
                _token: $("input[name=_token]").val()
            },
            success: function(group) {
                if (group.id != null) {
                    inputGroup.removeClass('has-error');
                    inputGroup.next('.text-danger').remove();

                    var newOption = $('<option></option>')
                        .attr('value', group.id)
                        .attr('selected', true)
                        .text(group.name);
                        
                    $("select[name=group_id]")
                        .append( newOption );

                    newGroup.val("");
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON;
                var error = errors.name[0];
                if (error) {


                    inputGroup.next('.text-danger').remove();

                    inputGroup
                        .addClass('has-error')
                        .after('<p class="text-danger">' + error + '</p>');
                }
            }
        });
    });
    </script>
@endsection
