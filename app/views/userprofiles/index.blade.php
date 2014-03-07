@extends('layouts.scaffold')

@section('main')

<h1>All profiles</h1>

<p>{{ link_to_route('userprofiles.create', 'Add new profile') }}</p>

@if (count($uprofiles))
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>uid</th>
        <th>networks</th>
        <th>host names</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($uprofiles as $uprofile)
    <tr>
        <td>{{{ $uprofile['uid']}}}</td>
        <td>{{{ count($uprofile['networks'])}}}</td>
        <td>{{{ count($uprofile['hosts'])}}}</td>

        <td>{{ link_to_route('userprofiles.edit', 'Edit', array($uprofile['uid']), array('class' => 'btn btn-info')) }}</td>
        <td>
            {{ Form::open(array('method' => 'DELETE', 'route' => array('userprofiles.destroy', $uprofile['uid']))) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
There are no user profiles
@endif

@stop