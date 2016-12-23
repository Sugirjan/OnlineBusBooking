<form  class="form-horizontal form-group col-lg-6" style="background-color: #0076a3" action="/end" method="post">{{csrf_field()}}\
    {{--<div class="spacer ">--}}
        {{--<div class="row register">--}}
    {{--<div class="spacer" style="background-color: #007ead ; border-style: groove">\--}}
    {{--<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">--}}
    <div class="col-lg-6">
        <div class="col-lg-6">
                <div class="container-fluid">
                        <div class="row">
                        <label for="fname">First Name</label>\
                        <input type="text "  id="owner"  name="fname" style="border-style: hidden" onkeypress="return lettersOnly(event)" autofocus required>\
                        </div>

                    <div class="row">
                        <label for="number">Contact Number</label>\
                        <input type="number" id="arrival" name="number" size="10" required >\
                    </div>
                    <div class="row">
                        <label for="amount">Amount</label>\
                        < input name="amount" value='+datas["next"][4]*(datas["bookedSeats"].length)+' >\
                    </div>
                <div class="row">
                        <input type="submit">\
                    </div>\
                </div>\
    </div>
    </div>
            {{--</div>\--}}

    {{--<input type="hidden"  name="schedule_id" value='+datas["next"][5]+' >\--}}
    {{--<input  type="hidden" name="depar" value='+datas["next"][0]+'  >\--}}
    {{--<input  name="arriv" type="hidden" value='+datas["next"][1]+'  >\--}}
    {{--<input  name="bus_id" type="hidden" value='+datas["next"][3]+' >\--}}
    {{--<input  name="dates" type="hidden" value='+datas["next"][2]+' >\--}}
    {{--<<div class="col-lg-offset-1" >--}}
    {{--<input   name="seats" style="background-color: transparent"  value='+JSON.stringify(datas["bookedSeats"])+'>\--}}
    {{--</div>--}}
        {{--<div class="col-md-1">\--}}

{{--</div>\--}}
</form>'

{{--<form  class = "form-group form-horizontal" style="background-color: #d9d9d9" action="/end" method="post">{{csrf_field()}}\--}}
    {{--<div class="container-fluid">\--}}
        {{--<div  style="background-color: #007ead" border-style: groove">\--}}
        {{--<div class = col-md-12>\--}}
            {{--<div class="col-md-5">\--}}
                {{--\--}}
                {{--<div class="row ">\--}}
                    {{--<div class="col-md-10">\--}}
                        {{--<label for="fname">First Name</label>\--}}
                        {{--<input type="text " class="col-md-offset-1" id="owner"  name="fname" style="" onkeypress="return lettersOnly(event)" autofocus required>\--}}
                    {{--</div>\--}}
                {{--</div style="background-color: #2483F7">\--}}
                {{--<div class="row">\--}}
                    {{--<div class="col-lg-10">\--}}
                        {{--<label for="number">Contact Number</label>\--}}
                        {{--<input type="number" id="arrival" name="number" size="10" required >\--}}
                    {{--</div>\--}}
                {{--</div>\--}}
                {{--<div class="row">\--}}
                    {{--<div class= col-lg-10>\--}}
                        {{--<label for="amount">Amount</label>\--}}
                        {{--<input class="col-md-offset-2" name="amount" value='+datas["next"][4]*(datas["bookedSeats"].length)+' >\--}}
                    {{--</div>\--}}
                {{--</div>\--}}
            {{--</div>\--}}
        {{--</div>\--}}
    {{--</div>\--}}
    {{--<input type="hidden"  name="schedule_id" value='+datas["next"][5]+' >\--}}
    {{--<input  type="hidden" name="depar" value='+datas["next"][0]+'  >\--}}
    {{--<input  name="arriv" type="hidden" value='+datas["next"][1]+'  >\--}}
    {{--<input  name="bus_id" type="hidden" value='+datas["next"][3]+' >\--}}
    {{--<input  name="dates" type="hidden" value='+datas["next"][2]+' >\--}}
    {{--<input   name="seats"  style = style="background-color: transparent" value='+JSON.stringify(datas["bookedSeats"])+'>\--}}
    {{--<div class="col-md-1">\--}}
        {{--<button class = "btn btn-primary col-lg-offset-2" style="background-color: #980303" type="submit">Submit</button>\--}}
    {{--</div>\--}}
    {{--</div>\--}}
    {{--</div>\--}}
{{--</form>'--}}