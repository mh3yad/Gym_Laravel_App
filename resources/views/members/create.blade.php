@extends('layouts.app')
<style>

    html {

        background: url("https://i.ibb.co/r5vdrjM/a.jpg") no-repeat center center;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: absolute;
        top:0px;
        left:0px;
        width: 100%;
        height: 100%;

    }

</style>

<div class="justify-content-start full-height content-wlecome ">
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class="w-50" action="{{isset($id) ? route('members.update',['member'=>$id]) : route('members.store')}}" method="post">
            @if(isset($id))
                @method('PUT')
            @endif
        @csrf

            <label class="text-success    "><h3>اسم العضو</h3></label>
            <input class="form-control " type="text" value="{{isset($id) ? $id->name : ""}}" name="name" placeholder="enter member name" required>
            <label class="text-success mt-5  "><h3>رقم الهاتف</h3></label>
            <input class="form-control"  min="0" maxlength="12" form-control type="number"  name="phone_num"  value="{{isset($id) ? $id->phone_num : ""}}" placeholder="enter phone member" required>
       @if(!isset($id))
                <label class="text-success mt-5 "><h3>يوم البداية</h3></label>
                <input class="form-control" min="1" max="30" type="number" placeholder="start day of month" required name="day" value="{{now()->day}}">
                <label class="text-success mt-5 "><h3>شهر البداية</h3></label>
                <input min="1" max="12" class="justify-content-center form-control" type="number" required placeholder="start  month" name="month" value="{{now()->month}}">
        @endif
        <br>
        <input class="mt-5 btn btn-success" type="submit" value="{{isset($id) ? 'تحديث' : 'اضافة'}}">
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
        $('.date').datepicker({
            format: 'mm-dd-yyyy'
        });
    </script>
</div>
@endsection
