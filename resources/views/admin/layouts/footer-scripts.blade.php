@include('sweetalert::alert')
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Poppins font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<!-- font-awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{URL::asset('admin/assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Sticky js -->
<script src="{{URL::asset('admin/assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('admin/assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('admin/assets/plugins/side-menu/sidemenu.js')}}"></script>

<!--sweetalert2 js -->
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

<script type="text/javascript">

    function ajaxRequest(method, url, data) {

        // showing loading
        $('.loader-container').removeClass('hidden');

        var deferred = $.Deferred();

        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(response) {
                deferred.resolve(response);

                // remove loading
                $('.loader-container').addClass('hidden');
            },
            error: function(xhr, status, error) {
                deferred.reject(xhr, status, error);

                // remove loading
                $('.loader-container').addClass('hidden');
            }
        });

        return deferred.promise();
    }

    function swalAlert(title, text = '', status) {

        if(status == 1) {
            swal(title, text , 'success');
        } else if(status == 2) {
            swal(title, text , 'warning');
        } else {
            swal(title, text , 'error');
        }

    }

    function swalWithConfirm(confirmFunction) {

        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((isConfirmed) => {
            if (isConfirmed) {
                confirmFunction();
            } else {
                console.log('Not Confirmed');
            }
        });

    }


    $(document).ready(function() {



    });
</script>
@yield('js')
