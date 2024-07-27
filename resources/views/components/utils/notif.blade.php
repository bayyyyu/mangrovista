@foreach (['success', 'warning', 'danger'] as $status)
    @if (session($status))
        <div class="alert alert-{{ $status }} alert-dismissable custom-{{ $status }}-box">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong class="small-text"> {{ session($status) }}</strong>
        </div>
    @endif
@endforeach

<style>
    .small-text {
        font-size: 70%;
    }

    .alert {
        padding: 5px 15px;
        margin-bottom: 10px;
        transform-origin: top;
        transform: scaleY(0);
        transition: transform 0.5s ease;
    }

    .alert.active {
        transform: scaleY(1);
    }

    .custom-success-box,
    .custom-warning-box,
    .custom-danger-box {
        padding: 10px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.alert').each(function () {
            var $alert = $(this);
            $alert.addClass('active');
            setTimeout(function() {
                $alert.removeClass('active');
                setTimeout(function() {
                    $alert.alert('close');
                }, 500); // Duration of the scaleY animation
            }, 3000); // Time before auto close in milliseconds
        });
    });
</script>


{{-- <section>
    <div class="square_box box_three"></div>
    <div class="square_box box_four"></div>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <div
                    class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true"><a>
                                <i class="fa fa-times greencross"></i>
                            </a></span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon far fa-check-circle faa-tada animated"></i>
                    <strong class="font__weight-semibold">Well done!</strong> You successfullyread this important.
                </div>
            </div>

            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"
                    role="alert" data-brk-library="component__alert">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true">
                            <i class="fa fa-times blue-cross"></i>
                        </span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
                    <strong class="font__weight-semibold">Heads up!</strong> This alert needs your attention, but it's
                    not super important.
                </div>

            </div>

            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"
                    role="alert" data-brk-library="component__alert">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true">
                            <i class="fa fa-times warning"></i>
                        </span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
                    <strong class="font__weight-semibold">Warning!</strong> Better check yourself, you're not looking
                    too good.
                </div>
            </div>

            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"
                    role="alert" data-brk-library="component__alert">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true">
                            <i class="fa fa-times danger "></i>
                        </span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon far fa-times-circle faa-pulse animated"></i>
                    <strong class="font__weight-semibold">Oh snap!</strong> Change a few things up and try submitting
                    again.
                </div>
            </div>

            <div class="col-sm-12">
                <div class="alert fade alert-simple alert-primary alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"
                    role="alert" data-brk-library="component__alert">
                    <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span aria-hidden="true"><i class="fa fa-times alertprimary"></i></span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="start-icon fa fa-thumbs-up faa-bounce animated"></i>
                    <strong class="font__weight-semibold">Well done!</strong> You successfullyread this important.
                </div>

            </div>

        </div>
    </div>
</section>
<style>
    .alert>.start-icon {
        margin-right: 0;
        min-width: 20px;
        text-align: center;
    }

    .alert>.start-icon {
        margin-right: 5px;
    }

    .greencross {
        font-size: 18px;
        color: #25ff0b;
        text-shadow: none;
    }

    .alert-simple.alert-success {
        border: 1px solid rgba(36, 241, 6, 0.46);
        background-color: rgba(7, 149, 66, 0.12156862745098039);
        box-shadow: 0px 0px 2px #259c08;
        color: #0ad406;
      
        transition: 0.5s;
        cursor: pointer;
    }

    .alert-success:hover {
        background-color: rgba(7, 149, 66, 0.35);
        transition: 0.5s;
    }

    .alert-simple.alert-info {
        border: 1px solid rgba(6, 44, 241, 0.46);
        background-color: rgba(7, 73, 149, 0.12156862745098039);
        box-shadow: 0px 0px 2px #0396ff;
        color: #0396ff;
      
        transition: 0.5s;
        cursor: pointer;
    }

    .alert-info:hover {
        background-color: rgba(7, 73, 149, 0.35);
        transition: 0.5s;
    }

    .blue-cross {
        font-size: 18px;
        color: #0bd2ff;
        text-shadow: none;
    }

    .alert-simple.alert-warning {
        border: 1px solid rgba(241, 142, 6, 0.81);
        background-color: rgba(220, 128, 1, 0.16);
        box-shadow: 0px 0px 2px #ffb103;
        color: #ffb103;
      
        transition: 0.5s;
        cursor: pointer;
    }

    .alert-warning:hover {
        background-color: rgba(220, 128, 1, 0.33);
        transition: 0.5s;
    }

    .warning {
        font-size: 18px;
        color: #ffb40b;
        text-shadow: none;
    }

    .alert-simple.alert-danger {
        border: 1px solid rgba(241, 6, 6, 0.81);
        background-color: rgba(220, 17, 1, 0.16);
        box-shadow: 0px 0px 2px #ff0303;
        color: #ff0303;
      
        transition: 0.5s;
        cursor: pointer;
    }

    .alert-danger:hover {
        background-color: rgba(220, 17, 1, 0.33);
        transition: 0.5s;
    }

    .danger {
        font-size: 18px;
        color: #ff0303;
        text-shadow: none;
    }

    .alert-simple.alert-primary {
        border: 1px solid rgba(6, 241, 226, 0.81);
        background-color: rgba(1, 204, 220, 0.16);
        box-shadow: 0px 0px 2px #03fff5;
        color: #03d0ff;
      
        transition: 0.5s;
        cursor: pointer;
    }

    .alert-primary:hover {
        background-color: rgba(1, 204, 220, 0.33);
        transition: 0.5s;
    }

    .alertprimary {
        font-size: 18px;
        color: #03d0ff;
        text-shadow: none;
    }



    .alert:before {
        content: '';
        position: absolute;
        width: 0;
        height: calc(100% - 44px);
        border-left: 1px solid;
        border-right: 2px solid;
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
        left: 0;
        top: 50%;
        transform: translate(0, -50%);
        height: 20px;
    }

    .fa-times {
        -webkit-animation: blink-1 2s infinite both;
        animation: blink-1 2s infinite both;
    }


    /**
 * ----------------------------------------
 * animation blink-1
 * ----------------------------------------
 */
    @-webkit-keyframes blink-1 {

        0%,
        50%,
        100% {
            opacity: 1;
        }

        25%,
        75% {
            opacity: 0;
        }
    }

    @keyframes blink-1 {

        0%,
        50%,
        100% {
            opacity: 1;
        }

        25%,
        75% {
            opacity: 0;
        }
    }
</style> --}}
