@extends('layouts.scaffold')

@section('main')

<h1>Show user profile</h1>

<p>{{ link_to_route('userprofiles.index', 'Return to all user profiles') }}</p>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Key</th>
        <th>Value</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td>User Id</td>
        <td>{{ $uprofile['uid'] }}</td>
    </tr><tr>
        <td>Networks</td>
        <td><table class="table table-striped table-bordered">
                <tr><th>network id</th>
                    <th>network name</th>
                    <th>IP</th>
                    <th>status</th>
                </tr>
                @foreach ($uprofile->networks as $network)
                <tr>
                    <td>{{$network['nid']}}</td>
                    <td>{{$network['n_name']}}</td>
                    <td>{{$network['n_ip']}}</td>
                    <td>{{$network['n_status']}}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr><tr>
        <td>Host Names</td>
        <td><table class="table table-striped table-bordered">
                <tr><th>Host name</th>
                    <th>block?</th>
                </tr>
                @foreach ($uprofile['hosts'] as $host)
                <tr>
                    <td>{{$host['hostname']}}</td>
                    <td>{{$host['block']}}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr><tr>
        <td>{{ link_to_route('userprofiles.edit', 'Edit', array($uprofile->uid), array('class' => 'btn btn-info')) }}</td>
        <td>
            {{ Form::open(array('method' => 'DELETE', 'route' => array('userprofiles.destroy', $uprofile->uid))) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </td>
    </tr>
    </tbody>
</table>

@stop