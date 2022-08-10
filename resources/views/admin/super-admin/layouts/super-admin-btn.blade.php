@if(Session::has('is_stealth_login') && Session::get('is_stealth_login') == 1)
<button type="submit" class="btn btn-success btn-sm" id="super-admin-login-btn">Go Back To Super Admin</button>

<form action="/superadmin-login-id" method="POST" id="super_admin_login_form" hidden>
    @csrf
    <input type="hidden" name="user_id" value="{{ Session::get('super_admin_id') }}" id="super_admin_id">
    <button type="submit">save</button>
</form>
@endif

@push('scripts')
<script>
    $(document).ready(function() {
        $('#super-admin-login-btn').on('click', function () {
            $('#super_admin_login_form').submit();
        });
    });
//     $(document).ready(function(){
//     $("#dop_show").on('click', function () {
//         $(this).addClass("activated");
//     });
// });


</script>
<script>
// $(document).ready(function(){
//   $("#dop_show").click(function(){
//     $(this).show();
//   });
// });
</script>
@endpush