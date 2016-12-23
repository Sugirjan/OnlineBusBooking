@extends('forms')

@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<h3>Add New Town</h3>
<div>

    <form action="/addnewtown" method="post">
        {{csrf_field()}}

        <label for="townid">Town ID</label>
        <input type="number" min="1" id="townid" name="townid" required>

        <label for="tname">Town Name</label>
        <input type="text" id="company" name="town"  onkeypress="return lettersOnly(event)" required>

        <input type="submit" name="Submit" value="Submit">
        <input type="submit" name="Cancel" onclick="window.location.replace('/admin')" value="Cancel And Go Back">
    </form>


</div>

