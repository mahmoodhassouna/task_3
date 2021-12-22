<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="Wizard examples" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="{{asset('assets/css/pages/wizard/wizard-3.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <style>
        label.error {
            color: red!important;
        }
        .error {
            color: #F00;

        }
    </style>
</head>
<body id="kt_body" class="header-fixed subheader-enabled page-loading" style="background: #FFFFFF">
<div style="padding: 0px 0px 0px -100px" id="kt_content">
    <div class="card card-custom">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                <!--begin: Wizard Nav-->
                <div class="wizard-nav">
                    <div class="wizard-steps px-6 py-6 px-lg-10 py-lg-3">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                     كفيل - شخصي</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                     كفيل - مؤسسة  </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>





                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <ul id="display_error"></ul>
                <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                    <div class="col-xl-4  col-xxl-7">
                        <!--begin: Wizard Form-->


                        <div class="pb-5" data-wizard-type="step-content" >
                            <form class="search_sponsor1" action="" id="kt_form" method="post"
                                  autocomplete="on">
                                @csrf


                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">رقم بطاقة التعريف </label>
                                        <input type="text" class="form-control" id="id_number" name="id_number"
                                               required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">المحافظة</label>
                                        <select name="governorate_id" class="form-control SlectBox" >

                                            @isset($governorates)
                                                @foreach($governorates as $item)
                                                    <option value="{{$item->id}}"> {{$item->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">المدينة</label>
                                        <select name="city_id" class="form-control SlectBox"
                                        >
                                            @isset($citys)
                                                @foreach($citys as $item)
                                                    <option value="{{$item->id}}"> {{$item->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>




                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">الجنسية</label>
                                        <select name="nationalitie_id" class="form-control SlectBox"
                                        >
                                            @isset($nationalities)
                                                @foreach($nationalities as $item)
                                                    <option value="{{$item->id}}"> {{$item->name}}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">دولة الاقامة</label>
                                        <select name="countrie_residence_id" class="form-control SlectBox"
                                        >
                                            @isset($countrieresidence)
                                                @foreach($countrieresidence as $item)
                                                    <option value="{{$item->id}}"> {{$item->name}}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                    </div>



                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">الاسم </label>
                                        <input type="text" class="form-control" id="inputName" name="name"
                                        >
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col"><br>
                                     <center> <button class="search1 btn btn-success font-weight-bold text-uppercase px-9 py-4"> بحث </button></center>

                                    </div>
                                </div>


                            </form>
                        </div>
                        <div class="pb-5" data-wizard-type="step-content">
                            <form action="" id="form2" class="search_sponsor2"  method="post"
                                  autocomplete="on">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">الدولة</label>
                                        <select name="country_id" class="form-control SlectBox"
                                        >
                                            @isset($countries)
                                                @foreach($countries as $item)
                                                    <option value="{{$item->id}}"> {{$item->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">  الاسم</label>
                                        <input type="text" class="form-control" id="inputName" name="name"
                                               >
                                    </div>


                                </div>

                                    <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label"> الهاتف</label>
                                        <input type="text" class="form-control form-control-lg"
                                               name="phone"
                                               >
                                    </div>




                                </div>

                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">  البريد الالكتروني</label>
                                        <input type="email" class="form-control form-control-lg"
                                               name="email"
                                               >
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col"><br>
                                       <center><button class="search2 btn btn-success font-weight-bold text-uppercase px-9 py-4">بحث</button></center>
                                    </div>
                                </div>




                            </form>

                        </div>





                    </div>

                </div>
            </div>
                              <h2 style="padding:0px 630px">نتائج البحث</h2>
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
                   <tr>
                       <td>
                     --  لا يوجد نتائج بحث --
                       </td></tr>

                </tbody>
            </table>
        </div>
        <!--end: Wizard-->
    </div>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js?v=7.0.4')}}"></script>

<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('assets/js/pages/custom/wizard/wizard-3.js?v=7.0.4')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        $("#kt_form").validate({
            rules: {
                id_number: {
                    required: true,
                    digits: true,
                    rangelength: [9, 9],

                },
                id_type: {
                    required: true,

                },
                fname: {
                    required: true,
                    maxlength: 20,
                }, mname: {
                    required: true,
                    maxlength: 20,
                }, gname: {
                    maxlength: 20,
                }, lname: {
                    required: true,
                    maxlength: 20,
                },
                governorate_id: {
                    required: true,

                },
                city_id: {
                    required: true,
                },
                district_id: {
                    required: true,
                },
                nationalitie_id: {
                    required: true,
                },
                countrie_residence_id: {
                    required: true,
                },
                phone: {
                    required: true,
                    digits: true,
                    rangelength: [7, 10],

                }, address: {
                    required: true,
                    rangelength: [15, 70],

                },
                email: {
                    required: true,
                    email: true
                },

                telii_phone: {
                    digits: true,
                    rangelength: [7, 9],
                }
            },
            messages: {
                id_number: {
                    rangelength: "رقم التعريف غير صالح ",
                    required: "رقم التعريف مطلوب",
                    digits: "يرجى ادخال ارقام فقط"
                },
                id_type: {
                    required: "يرجى ادخال نوع رقم التعريف",

                },
                fname: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 20 حرف"
                },
                mname: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 20 حرف"
                },
                lname: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 20 حرف"
                }, gname: {

                    maxlength: "الاسم اقل من 20 حرف"
                },
                governorate_id: {
                    required: "يرجى اختيار المحافظة",
                },
                city_id: {
                    required: "يرجى اختيار المدينة",
                },
                district_id: {
                    required: "يرجى اختيار الحي",
                },
                nationalitie_id: {
                    required: "يرجى اختيار الجنسية",
                },
                countrie_residence_id: {
                    required: "يرجى اختيار دولة الاقامة",
                },
                phone: {
                    required: "يرجى رقم الجوال",
                    digits: "يجب ادخال رقم جوال صالح",
                    rangelength: "يرجى التاكد من صيغة رقم الجوال",
                }, address: {
                    required: "يرجى العنوان",
                    rangelength: "يرجى ادخال عنوان لايقل عن 15 حرف ولا يزيد عن 70",
                },
                email: {
                    required: "يرجى ادخال الايميل",
                    email: "صيغة الايميل غير صحيحة",
                },

                telli_phone: {
                    digits: "يجب ادخال رقم تليفون صالح",
                    rangelength: "يرجى التاكد من صيغة رقم التليفون",
                }
            }
        });
        $(document).on('click', '.search1', function (e) {
            e.preventDefault();

                var formData = new FormData($('.search_sponsor1')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "/sponsors/searchPersonalSponsor",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 200) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        }
                        else if(data.status == 400){
                            $('tbody').html("");
                            $.each(data.data ,function (key ,item) {
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
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }


                });

            });

        $(document).on('click', '.search2', function (e) {
            e.preventDefault();

            var formData = new FormData($('.search_sponsor2')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "/sponsors/searchInstitutionSponsor",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == 200) {
                        $('#display_error').html("");
                        $('#display_error').addClass('alert alert-danger');
                        $.each(data.errors, function (key, err_value) {
                            $('#display_error').append('<li >' + err_value + '</li>');
                        });
                    }
                    else if(data.status == 400){
                        $('tbody').html("");
                        $.each(data.data ,function (key ,item) {
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
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#kt_form').find('input').val('');
                        $('#display_error').hide();
                    }else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }


            });

        });

    });
</script>

</body>
</html>
