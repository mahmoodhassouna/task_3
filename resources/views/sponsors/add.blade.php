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
                    <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    اضافة كفيل - شخصي</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    اضافة كفيل - مؤسسة  </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>





                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <ul id="display_error"></ul>
                <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                    <div class="col-xl-10  col-xxl-7">
                        <!--begin: Wizard Form-->


                        <div class="pb-5" data-wizard-type="step-content" >
                            <form class="add_sponsor" action="{{url('sponsors/storePersonalSponsor')}}" id="kt_form" method="post"
                                  autocomplete="off">
                                @csrf

                                <div class="row" >
                                    <div class="col">
                                        <label for="inputName" class="control-label" >اختر نوع بطاقة التعريف  <span style="color: #ec0c24">*</span></label>
                                    </div>
                                    <div class="col">
                                        <label  for="inputName" class="control-label"> جواز سفر</label>
                                        <input checked type="radio" value="جواز سفر"  name="id_type">

                                        <label for="inputName"  class="control-label"> هوية</label>
                                        <input type="radio" value="هوية" name="id_type">

                                    </div>

                                    <div class="col">
                                        <label>    رقم بطاقة التعريف  <span style="color: #ec0c24">*</span> </label>
                                        <input class="form-control fc-datepicker" name="id_number" placeholder=""
                                               type="text" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">الاسم  <span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control" id="fname" name="fname"
                                               required>
                                    </div>

                                    <div class="col">
                                        <label>اسم الاب <span style="color: #ec0c24">*</span></label>
                                        <input class="form-control fc-datepicker" id="mname" name="mname" placeholder=""
                                               type="text" value="" required>
                                    </div>

                                    <div class="col">
                                        <label>اسم الجد</label>
                                        <input class="form-control fc-datepicker" id="gname" name="gname" placeholder=""
                                               type="text" required>
                                    </div>

                                    <div class="col">
                                        <label>   اسم العائلة  <span style="color: #ec0c24">*</span></label>
                                        <input class="form-control fc-datepicker" id="lname" name="lname" placeholder=""
                                               type="text" required>
                                    </div>

                                </div>
                                {{-- 2 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label"> المحافظة <span style="color: #ec0c24">*</span></label>
                                        <select name="governorate_id" class="form-control SlectBox" >

                                            @isset($governorates)
                                                @foreach($governorates as $item)
                                            <option value="{{$item->id}}"> {{$item->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">المدينة<span style="color: #ec0c24">*</span></label>
                                        <select name="city_id" class="form-control SlectBox"
                                              >
                                            @isset($citys)
                                                @foreach($citys as $item)
                                                    <option value="{{$item->id}}"> {{$item->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">الحي<span style="color: #ec0c24">*</span></label>
                                        <select name="district_id" class="form-control SlectBox"
                                        >
                                        @isset($districts)
                                            @foreach($districts as $item)
                                                <option value="{{$item->id}}"> {{$item->name}}</option>
                                                @endforeach
                                                @endisset
                                        </select>
                                    </div>


                                </div>


                                {{-- 3 --}}
                                <div class="row">

                                    <div class="col">
                                        <label  class="control-label">  تفاصيل العنوان <span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control form-control-lg"
                                               name="address" id="address"
                                               required>
                                    </div>


                                </div>


                                <div class="row">

                                    <div class="col">
                                        <label  class="control-label"> الهاتف</label>
                                        <input type="text" class="form-control form-control-lg"
                                               name="telii_phone" id="telii_phone"
                                               >
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">    الجوال <span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control form-control-lg"  name="phone"
                                               id="phone"
                                               required>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">البريد <span style="color: #ec0c24">*</span></label>
                                        <input type="email" class="form-control form-control-lg"  name="email"
                                               id="email"
                                               required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">  الجنسية <span style="color: #ec0c24">*</span></label>
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
                                        <label for="inputName" class="control-label">  دولة الاقامة  <span style="color: #ec0c24">*</span></label>
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
                                <div class="col"><br>
                                    <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4">اضافة</button>

                                </div>
                            </div>


                            </form>
                        </div>
                        <div class="pb-5" data-wizard-type="step-content">
                            <form action="{{url('sponsors/storeInstitutionSponsor')}}" id="form2" class="add_sponsor2"  method="post"
                                  autocomplete="on">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-5">
                                        <label for="inputName" class="control-label">الدولة<span style="color: #ec0c24">*</span></label>
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
                                        <label for="inputName" class="control-label">  الاسم<span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control form-control-lg"
                                               name="name" id="name"
                                               required>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">  مسؤل الاتصال<span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control form-control-lg"
                                               name="contact_person" id="contact_person"
                                               required>
                                    </div>


                                </div>


                                {{-- 3 --}}
                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">  العنوان</label>
                                        <input type="text" class="form-control form-control-lg"
                                               name="address" id="address"
                                               required>
                                    </div>


                                </div>


                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">1 الهاتف<span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control form-control-lg"
                                               name="phone1"
                                               required>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">الهاتف 2<span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control form-control-lg"  name="phone2"
                                               required>
                                    </div>



                                </div>

                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">  البريد الالكتروني<span style="color: #ec0c24">*</span>   </label>
                                        <input type="email" class="form-control form-control-lg"
                                               name="email"
                                               required>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col"><br>
                                        <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4">اضافة</button>

                                    </div>
                                </div>




                            </form>

                        </div>





                    </div>

                </div>
            </div>
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
            },mname: {
                required: true,
                maxlength: 20,
            },gname: {
                maxlength: 20,
            },lname: {
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
            } ,
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
            },address: {
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
        },submitHandler: function(form) {


            var formData = new FormData($('.add_sponsor')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "/sponsors/storePersonalSponsor/",
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

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#kt_form').find('input').val('');
                        $('#display_error').hide();

                        window.location.reload();
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

        }

       });

    $("#form2").validate({
        rules: {
            country_id: {
                required: true,

            },
            name: {
                required: true,
                maxlength: 50,
            },
            contact_person: {
                required: true,
                maxlength: 50,
            },

            phone1: {
                required: true,
                digits: true,
                rangelength: [7, 10],

            },
            phone2: {
                required: true,
                digits: true,
                rangelength: [7, 10],

            }, address: {
                required: true,
                rangelength: [15, 70],

            },
            email: {
                required: true,
                email: true,
                maxlength: 50,
            },


        },
        messages: {

            country_id: {
                required: "يرجى ادخال الدولة",

            },
            contact_person: {
                required: "يرجى ادخال مسؤل الاتصال",
                maxlength: "مسؤل الاتصال اقل من 50 حرف"
            },
            name: {
                required: "يرجى ادخال الاسم",
                maxlength: "الاسم اقل من 50 حرف"
            },

            phone1: {
                required: "يرجى رقم الجوال",
                digits: "يجب ادخال رقم جوال صالح",
                rangelength: "يرجى التاكد من صيغة رقم الجوال",
            },
            phone2: {
                required: "يرجى رقم الجوال",
                digits: "يجب ادخال رقم جوال صالح",
                rangelength: "يرجى التاكد من صيغة رقم الجوال",
            },
            address: {
                required: "يرجى العنوان",
                rangelength: "يرجى ادخال عنوان لايقل عن 15 حرف ولا يزيد عن 50",
            },
            email: {
                required: "يرجى ادخال الايميل",
                email: "صيغة الايميل غير صحيحة",
                maxlength: "الايميل اقل من 50 حرف"
            },


        },submitHandler: function(form) {


            var formData = new FormData($('.add_sponsor2')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "/sponsors/storeInstitutionSponsor/",
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

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#form2').find('input').val('');
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

        }

       });
    });
</script>

</body>
</html>
