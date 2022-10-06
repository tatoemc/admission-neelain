@extends('layouts.master')
@section('css')
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    بيانات  الطالب
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    بيانات الطالب </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
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

    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                          
                        </div>
                    </div><br>
                    <div  class="table-responsive " id="print">
                        <table class="table mg-b-0 text-md-nowrap" >
                            <thead>
                               <th colspan="2"> <h3>بيانات الطالب رقم : #</h3> </th>
                            </thead>
                            <tbody >
                                <tr>
                                    <td>الرقم الجامعي</td>
                                    <td>{{ $student->frmno }}</td>
                                </tr>
                                <tr>
                                    <td>الاسم الاول</td>
                                    <td>{{ $student->N1 }}</td>
                                </tr>
                                <tr>
                                    <td>الاسم الثاني</td>
                                    <td>{{ $student->N2 }} </td>
                                </tr>
                                <tr>
                                    <td>الاسم الثالث </td>
                                    <td>{{ $student->N3 }}</td>
                                </tr>

                                <tr>
                                    <td>الاسم الرابع</td>
                                    <td>{{ $student->N4 }}</td>
                                </tr>
                                <tr>
                                    <td>  الكلية </td>
                                    <td>{{ $student->faculty }}</td>
                                </tr>
                                <tr>
                                    <td> نوع القبول </td>
                                    <td>{{ $student->admission_type }}</td>
                                </tr>

                                <tr>
                                    <td> نوع الدراسة</td>
                                    <td>{{ $student->study_type }}</td>
                                </tr>
                                <tr>
                                    <td>المدرسة الثانوية</td>
                                    <td>{{ $student->SCHS }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-primary  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i class="mdi mdi-printer ml-1"></i>طباعة</button>
                                            
                                    </td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div> 
                    
                </div>
                 
                <!-- /div -->
            </div>

        </div>
        <!-- /row -->


    @endsection
    @section('js')
        <!-- Internal Select2 js-->
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <!-- Internal Jquery.mCustomScrollbar js-->
        <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <!-- Internal Input tags js-->
        <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
        <!--- Tabs JS-->
        <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
        <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
        <!--Internal  Clipboard js-->
        <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
        <!-- Internal Prism js-->
        <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

        <script type="text/javascript">
        
            function printDiv() {
                var printContents = document.getElementById('print').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }
    
        </script>

@endsection