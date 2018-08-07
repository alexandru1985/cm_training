@include('layouts.partials.header')
<!-- navbar -->
@include('layouts.partials.navbar')

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?php
                $selected_group = Request::get('group_id');
                $listGroups = listGroups(Auth::user()->id);
                ?>
                <a href="{{ route('contacts.index') }}" class="list-group-item {{ empty($selected_group) ? 'active' : '' }}">All Contact <span class="badge">{{ collect($listGroups)->sum('total') }}</span></a>

                @foreach ($listGroups as $group)
                <a href="{{ route('contacts.index', ['group_id' => $group->id]) }}" class="list-group-item {{ $selected_group == $group->id ? 'active' : '' }}">{{ $group->name }} <span class="badge">{{ $group->total }}</span></a>
                @endforeach
            </div>
            {!! Form::open(['route' => 'contacts.index', 'method' => 'get']) !!}
            <?php
            $status_id = Request::get('status_id');
            ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="status_id[]" id="defaultCheck1" checked="<?php //if (in_array("1", $status_id)) { echo   $checked_type = ' checked = "checked" '; };  ?> " onchange="javascript: form.submit();">
                <label class="form-check-label" for="defaultCheck1">
                    Newest
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="2" name="status_id[]"id="defaultCheck2" checked="<?php //if (in_array("2", $status_id)) { echo   $checked_type = ' checked = "checked" '; };  ?> "onchange="javascript: form.submit();">
                <label class="form-check-label" for="defaultCheck2">
                    New
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="3" name="status_id[]" id="defaultCheck3" onchange="javascript: form.submit();">
                <label class="form-check-label" for="defaultCheck3">
                    Old
                </label>
            </div>
            {!! Form::close() !!}
        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
            @if (session('message'))
            <div class='alert alert-success'>
                {{ session('message') }}
            </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

@include('layouts.partials.footer')
