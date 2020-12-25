@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->

    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="container">


    </div>
    <div class="table-responsive table-bordered">
        <table class="table">
            <thead>
            <tr>
                <div class="col">
                    <th>االاسم</th>
                </div>
                <th>تاريخ الدفع</th>
                <th>تاريخ الانتهاء</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td scope="row">{{$id->name}}</td>
                <td>{{$id->startDate}}</td>
                <td>{{$id->endDate}} </td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="table-responsive table-bordered">
        <table class="table">
            <thead>
            <tr>
                <th>الحالة</th>
                <th>الشهور</th>
                <th>رقم الموبايل</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>@if((now()->diffInDays($id->endDate,false)) > 0)
                        باقي     {{now()->diffInDays($id->endDate,false)}} يوم
                    @else
                        تاخير   {{-1 * (now()->diffInDays($id->endDate,false))}} يوم
                    @endif
                </td>
                <td>{{$id->months}}</td>
                <td>{{$id->phone_num}}</td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="table-responsive table-bordered">
        <table class="table">
            <thead>
            <tr>
                <th>الحذف</th>
                <th>التعديل</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="d-flex">
                        <div class="col-sm">
                            <form method="POST" action="{{route('members.destroy',['member'=>$id->id])}}">
                                @method("DELETE")
                                @csrf

                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="">
                        <a href="/members/{{$id->id}}/edit">
                            <button type="button" class="btn btn-primary">تعديل</button>
                        </a>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
@endsection
@section('js')
    <!-- Internal Data tables -->
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
