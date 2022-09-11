 <!-- BEGIN: Vendor JS-->
 <script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
    
<script src="{{ asset('backend/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

<script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/js/core/app.js') }}"></script>

<script src="{{ asset('backend/js/scripts/pages/auth-login.js') }}"></script>
<script src="{{ asset('backend/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ asset('backend/js/scripts/extensions/ext-component-toastr.js') }}"></script>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
<script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

    </script>