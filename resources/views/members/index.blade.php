<style>
    body:before {
        content: "";
        display: block;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -10;
        /*background-color: #005c9a;*/
        background: url("https://explainfast.com/wp-content/uploads/2020/06/deadlift-1000-667.jpg") no-repeat center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

</style>
@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')

    @if (session()->has('update'))
        <div class="alert alert-primary">
            {{session()->get('update')}}
        </div>
     @elseif(session()->has('destroy'))
        <div class="alert alert-danger">
            {{session()->get('destroy')}}
        </div>
    @elseif(session()->has('add'))
        <div class="alert alert-success">
            {{session()->get('add')}}
        </div>
    @elseif(session()->has('successRenew'))
        <div class="alert alert-info">
            {{session()->get('successRenew')}}
        </div>
    @endif


    <div class="row">

        <div class="d-flex pl-4 mt-5">
            <div class="pr-4">
            <form class="text-right" action="{{route('members.create')}}" method="get">
                <button class="btn-sm btn-success mx-2"> اضافة مشترك</button>
            </form>
            </div>
{{--                <div class="float-left"><a href="{{route('users.index')}}"><button class="btn-sm btn-primary">المستخدمين</button></a></div>--}}
            <div class="pr-4">
                <a href="http://gym-al-batal.herokuapp.com/pdf2">
                    <button class="btn-sm btn-dark mx-2">PDF تحميل البيانات ك </button>
                </a>
            </div>
            <form action="{{route('money.index')}}" method="get">
            <button class="btn-sm btn-danger">احصائيات</button>
            </form>
        </div>
        <div>
        <br>
        <br>
        </div>

        <div class="table-responsive table-bordered">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="اكتب اسم للبحث" title="Type in a name">
            <br>
            <table  class="table" id="myTable">
                <thead>
                <tr>
                    <th class="border-bottom-0">الاسم</th>
                    <th class="border-bottom-0">الحالة</th>
                    <th class="border-bottom-0">التجديد</th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                <tbody>
                <tr>
                    <td><a href="/members/{{$member->id}}"  > <button class="btn btn-secondary ">{{$member->name}}</button></a></td>
                    <dd> <td style="color: #ffffff" >@if((now()->diffInDays($member->endDate,false)) > 0)
                                <span style="color: #006577">   باقي   </span> <span class=" badge badge-primary"> {{now()->diffInDays($member->endDate,false)}}</span>  <span style="color: #000000">يوم</span>
                            @else
                             <span class="text-danger">   متاخر   </span><span class=" badge badge-primary">{{-1 * (now()->diffInDays($member->endDate,false))}}</span> <span style="color: #000000">يوم</span>
                            @endif
                        </td>
                    </dd>
                    <td class="text-success text-primary">

                        @if(now()->diffInDays($member->endDate,false)  <=  0  )
                            <form method="post" action="members/{{$member->id}}/renew" >
                                @csrf
                                <button class="btn btn-primary"   type="submit">تجديد</button>
                            </form>
                        @else

                        @endif
                    </td>


                </tr>

                </tbody>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>


</div>
        <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
