@extends('layouts.scaffold')

@section('main')


<h1>Edit User Profile</h1>
{{ Form::model($uprofile, array('method' => 'PATCH', 'route' => array('userprofiles.update', $uprofile['uid']))) }}
    <ul>
        <li>
            <h2>User ID: <span class="bg-primary">{{$uprofile->uid}}</span></h2>

        </li>

        <li><h2>Networks:</h2>
            <table class="table table-striped table-bordered">
                <tr><th>network id</th>
                    <th>network name</th>
                    <th>IP</th>
                    <th>status</th>
                </tr>
                @foreach (range(0,2) as $kk)
                <tr>
                    <td>{{ Form::input('number', 'nid[]', $uprofile->networks[$kk]['nid'] ) }}</td>
                    <td>{{ Form::text('n_name[]', $uprofile->networks[$kk]['nid'] ) }}</td>
                    <td>{{ Form::text('n_ip[]', $uprofile->networks[$kk]['nid'] ) }}</td>
                    <td>{{ Form::text('n_status[]', $uprofile->networks[$kk]['nid'] ) }}</td>
                </tr>
                @endforeach
            </table>
        </li>

        <li><h2>Hosts:</h2>
            <table class="table table-striped table-bordered">
                <tr><th>Host name</th>
                    <th>blocked?</th>
                </tr>
                @foreach (range(0,2) as $kk)
                <tr>
                    <td>{{ Form::text('hostname[]', $uprofile->hosts[$kk]['hostname'] ) }}</td>
                    <td>{{ Form::checkbox("block[$kk]", $uprofile->hosts[$kk]['block'], $uprofile->hosts[$kk]['block']=="on") }}</td>
                </tr>
                @endforeach
            </table>

        </li>


        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('userprofiles.show', 'Cancel', $uprofile->uid, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop