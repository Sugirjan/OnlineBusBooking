
@include('header')

<div class="">
    <div class="container">
<h3>Add Route</h3>
<div>
    <form style="align-items: center ;"  class="form-group" action="/addroute" method="post">
        {{csrf_field()}}
        <div class="raw">
        <label for="routeid">Route ID</label>
        <input type="number" id="routeid" name="routeid" autofocus required>
        </div>

        <div class="row">
        <label for="place1">Place 1</label>
        <input type="text" id="p1" name="place1" onkeypress="return lettersOnly(event)" required>

        </div>

        <div class="row">
        <label for="place2">Place 2</label>
        <input type="text" id="p2" name="place2" onkeypress="return lettersOnly(event)" required>

        <div class="row">
        <input class="btn" type="submit" value="Submit">
        </div>
        </div>
    </form>


</div>
</div>
</div>

@include('footer')