@extends('layouts.scaffold')

@section('main')

<h1>Create new user Profile</h1>

{{ Form::open(array('route' => 'userprofiles.store')) }}
    <ul>
        <li>
            {{ Form::label('uid', 'User id:', array('class'=>"label label-info")) }}
            {{ Form::input('number', 'uid') }}
        </li>

        <li><label class="label label-info">Networks:</label>
            <table class="table table-striped table-bordered">
                <tr><th>network id</th>
                    <th>network name</th>
                    <th>IP</th>
                    <th>status</th>
                </tr>
                @foreach (range(0,2) as $kk)
                <tr>
                    <td>{{ Form::input('number', 'nid[]') }}</td>
                    <td>{{ Form::text('n_name[]') }}</td>
                    <td>{{ Form::text('n_ip[]') }}</td>
                    <td>{{ Form::text('n_status[]') }}</td>
                </tr>
                @endforeach
            </table>
        </li>

        <li><label class="label label-info">Hosts:</label>
            <table class="table table-striped table-bordered">
                <tr><th>Host name</th>
                    <th>blocked?</th>
                </tr>
                @foreach (range(0,2) as $kk)
                <tr>
                    <td>{{ Form::text('hostname[]') }}</td>
                    <td>{{ Form::checkbox('block[]') }}</td>
                </tr>
                @endforeach
            </table>

        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


