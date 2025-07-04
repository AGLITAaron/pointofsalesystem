<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#form-add-role").validate({
            rules: {
                'role': {
                    required: true
                },
            },
            messages: {
                'role': {
                    required: "Role field is required"
                },
            }
        });

        $(document).on('submit', '#form-add-role', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doAddRole(formData);

        });

        function doAddRole(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('add-role-proc') }}",
                data: formData,
                dataType: "json",
                success: function(res) {
                    console.log(res)
                    if (res.status === 'success') {
                        Swal.fire({
                            text: res.message,
                            icon: 'success'
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            text: res.message,
                            icon: 'warning'
                        });
                    }
                }
            });
        }

        // Call edit role modal base on unique id
        $('.role-edit-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('edit-role', ['id' => ':id']) }}";
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

        // form submit to edit role
        $(document).on('submit', '#form-edit-role', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doEditRole(formData);

        });

        // Ajax request to edit specific role
        function doEditRole(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('edit-role-proc') }}",
                data: formData,
                dataType: "json",
                success: function(res) {
                    console.log(res)
                    if (res.status === 'success') {
                        Swal.fire({
                            text: res.message,
                            icon: 'success'
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            text: res.message,
                            icon: 'warning'
                        });
                    }
                }
            });
        }

        // Call delete role modal base on unique id
        $('.role-delete-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('delete-role', ['id' => ':id']) }}";
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
                    $('.delete-modal-content').html(res);
                },
            });
        });

        // form submit to delete role
        $(document).on('submit', '#form-delete-role', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doDeleteRole(formData);

        });

        // Ajax request to delete specific role
        function doDeleteRole(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('delete-role-proc') }}",
                data: formData,
                dataType: "json",
                success: function(res) {
                    console.log(res)
                    if (res.status === 'success') {
                        Swal.fire({
                            text: res.message,
                            icon: 'success'
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            text: res.message,
                            icon: 'warning'
                        });
                    }
                }
            });
        }

    });
</script>
