<script>
    $(document).ready(function() {

        // CSRF Token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#form-edit-user").validate({
            rules: {
                'first-name': {
                    required: true
                },
                'middle-name': {
                    required: true
                },
                'last-name': {
                    required: true
                }
            },
            messages: {
                'first-name': {
                    required: "Firstname field is required"
                },
                'middle-name': {
                    required: "Middlename field is required"
                },
                'last-name': {
                    required: "Lastname field is required"
                },

            }
        });

        $('.user-edit-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('editUser', ['id' => ':id']) }}";
            var url = route.replace(':id', id);

            $.ajax({
                method: "GET",
                url: url,
                beforeSend: function() {
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").fadeOut("slow");
                },
                success: function(res) {
                    $('.edit-modal-content').html(res);
                },
            });
        });

    });
</script>
