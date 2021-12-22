<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="Wizard examples" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="assets/css/pages/wizard/wizard-3.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/global/plugins.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <style>
        label.error {
            color: red!important;
        }
        .error {
            color: #F00;

        }
    </style>

</head>
<body id="kt_body" class="header-fixed subheader-enabled page-loading" style="background: #FFFFFF" >

<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h2 class="card-label">  الكفلاء  </h2>
        </div>
<div>
    <a href="{{route('create_sponsors')}}" class="btn btn-success font-weight-bold text-uppercase px-9 py-4">اضافة كفيل</a>
    <a href="{{route('search_sponsors')}}" class="btn btn-success font-weight-bold text-uppercase px-9 py-4">بحث في الكفلاء</a>
</div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>اسم الكفيل</th>
                <th> رقم الكفيل</th>
                <th> نوع الكفيل</th>
                <th> تاريخ التسجيل </th>
                <th>المستخدم المسؤل</th>
                <th>العنوان</th>
                <th>رقم الجوال</th>
                <th> الايميل</th>
                <th>الاجراءت</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
</body>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/plugins/global/plugins.bundle.js?v=7.0.4"></script>

<script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4"></script>
<script src="assets/js/scripts.bundle.js?v=7.0.4"></script>
<script src="assets/js/pages/custom/wizard/wizard-3.js?v=7.0.4"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>

    $(document).ready(function () {

        all_sponsors();
        function all_sponsors(){
            $.ajax({
                type:"GET",
                url:"{{route('all_sponsors')}}",
                dataType:"json",
                success: function (response) {
                    $('tbody').html("");
                    $.each(response.data ,function (key ,item) {
                        $('tbody').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.name+'</td>\
                                       <td>'+item.sponsor_number+'</td>\
                                       <td>'+(item.sponsor_type == 'Personal' ? 'شخصي' : 'مؤسسة')+'</td>\
                                       <td>'+item.entry_date+'</td>\
                                       <td>'+item.user_id+'</td>\
                                       <td>'+item.address+'</td>\
                                       <td>'+item.phone+'</td>\
                                       <td>'+item.email+'</td>\
                                       <td ><a class="edit_employe btn btn-outline-primary" href="'+(item.sponsor_type == 'Personal' ? '{{url('sponsors/editPersonalSponsor/')}}/'+item.id+'' : '{{url('sponsors/editInstitutionSponsor/')}}/'+item.id+'')+'" >ادارة الكفيل</a> </td>\
                                          </tr>');

                    });
                }
            });
        }

    });



</script>

</body>
</html>
