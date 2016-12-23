<?php //include'header.php';?>
@include('header')
<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="#">Home</a> / Register</span>
        <h2>Register</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="spacer ">
        <div class="row register">
            <form action="/register" method="post">
                <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">


                    {{csrf_field()}}
                    <input type="text" class="form-control" placeholder="Company Name" name="form_name" onkeypress="return lettersOnly(event)" required>
                    <input type="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Enter Email" name="form_email" required>
                    <input type="password" class="form-control" placeholder="Password" name="form_pass1" required>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="form_pass2" required>

                    <button type="submit" class="btn btn-success" name="Submit">Register</button>



                </div>
            </form>

        </div>
    </div>
</div>
<script>
    function lettersOnly()
    {
        var charCode = event.keyCode;

        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8 ||charCode == 32 ||charCode == 13)

            return true;
        else
            return false;
    }
    function noletters()
    {
        var charcode=event.keyCode;
        if (charcode<0 )
            return true;
        else
            return false;
    }




</script>

@include('footer')
<?php //include'footer.php';?>

