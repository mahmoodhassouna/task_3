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
<ul id="display_error"></ul>
<div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
    <div class="col-xl-10  col-xxl-7">
<div class="pb-5" data-wizard-type="step-content">
    <form action="" id="form2" class="update_sponsor2"  method="post"
          autocomplete="on">
        @csrf
        <input type="hidden" name="id" value="{{$InstitutionSponsor->id}}" id="id">
        <div class="row">
            <div class="col-xl-5">
                <label for="inputName" class="control-label">الدولة</label>
                <select name="country_id" class="form-control SlectBox"
                >
                    @isset($countries)
                        @foreach($countries as $item)
                            <option @if($InstitutionSponsor->country_id = $item->id) selected @endif value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>




        </div>
        <div class="row">

            <div class="col">
                <label for="inputName" class="control-label">  الاسم</label>
                <input type="text" class="form-control form-control-lg"
                       name="name" value="{{$InstitutionSponsor->name}}"
                       required>
            </div>


        </div>
        <div class="row">

            <div class="col">
                <label for="inputName" class="control-label">  مسؤل الاتصال</label>
                <input type="text" class="form-control form-control-lg"
                       name="contact_person" value="{{$InstitutionSponsor->contact_person}}"
                       required>
            </div>


        </div>


        {{-- 3 --}}
        <div class="row">

            <div class="col">
                <label for="inputName" class="control-label">  العنوان</label>
                <input type="text" class="form-control form-control-lg"
                       name="address" value="{{$InstitutionSponsor->address}}"
                       required>
            </div>


        </div>


        <div class="row">

            <div class="col">
                <label for="inputName" class="control-label">1 الهاتف</label>
                <input type="text" class="form-control form-control-lg"
                       name="phone1" value="{{$InstitutionSponsor->phone}}"
                       required>
            </div>

            <div class="col">
                <label for="inputName" class="control-label">الهاتف 2</label>
                <input type="text" class="form-control form-control-lg"  name="phone2"
                       required value="{{$InstitutionSponsor->phone2}}">
            </div>



        </div>

        <div class="row">

            <div class="col">
                <label for="inputName" class="control-label">  البريد الالكتروني</label>
                <input type="email" class="form-control form-control-lg"
                       name="email" value="{{$InstitutionSponsor->email}}"
                       required>
            </div>


        </div>
        <div class="row">
            <div class="col"><br>
                <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4">تحديث</button>

            </div>
        </div>




    </form>
    <div class="row">
        <button value="{{$InstitutionSponsor->id}}" class="deleted btn btn-danger font-weight-bold text-uppercase px-9 py-4" >حذف الكفيل</button>

    </div>

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


            },
            submitHandler: function(form) {

                var formData = new FormData($('.update_sponsor2')[0]);
                var id = $('#id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    enctype: 'multipart/form-data',
                    url: "/sponsors/updateInstitution/"+id,
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
                                title: 'تم التحديث بنجاح',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#display_error').hide();

                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'فشلت عملية التحديث  ',
                                showConfirmButton: false,
                                timer: 1500
                            })

                        }

                    }
                });
            }
        });

        $(document).on('click', '.deleted', function (e) {
            e.preventDefault();
            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/sponsors/institutionsponsor/" + id,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        window.location.href = '/dashboard';

                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: response.msg,
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
