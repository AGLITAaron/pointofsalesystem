{{-- Add customer script --}}
<script>
    $(document).ready(function() {

        $("#form-add-customer").validate({
            rules: {
                'customer-name': {
                    required: true
                },
                'gender': {
                    required: true
                },
                'permanent-address': {
                    required: true
                },
                'province': {
                    required: true
                },
                'municipality': {
                    required: true
                },
                'barangay': {
                    required: true
                },
            },
            messages: {
                'customer-name': {
                    required: "Customer name field is required"
                },
                'gender': {
                    required: "Gender is required"
                },
                'permanent-address': {
                    required: "Address  is required"
                },
                'province': {
                    required: "Province field is required"
                },
                'municipality': {
                    required: "Municipality field is required"
                },
                'barangay': {
                    required: "Barangay field is required"
                },
            }
        });

        $(document).on('submit', '#form-add-customer', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doAddCustomer(formData);

        });

        function doAddCustomer(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('add-customer-proc') }}",
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

{{-- Edit customer script --}}
<script>
    $(document).ready(function() {
        $('.edit-customer-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('edit-customer', ['id' => ':id']) }}";
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
                    $('.edit-customer-modal-content').html(res);

                    $("#form-edit-customer").validate({
                        rules: {
                            'customer-name': {
                                required: true
                            },
                            'gender': {
                                required: true
                            },
                            'permanent-address': {
                                required: true
                            },
                            'province': {
                                required: true
                            },
                            'municipality': {
                                required: true
                            },
                            'barangay': {
                                required: true
                            },
                        },
                        messages: {
                            'customer-name': {
                                required: "Customer name field is required"
                            },
                            'gender': {
                                required: "Gender field is required"
                            },
                            'permanent-address': {
                                required: "Permanent address field is required"
                            },
                            'province': {
                                required: "Province field is required"
                            },
                            'municipality': {
                                required: "Municipality field is required"
                            },
                            'barangay': {
                                required: "Barangay field is required"
                            },

                        }
                    });
                },
            });
        });

        // form submit to edit role
        $(document).on('submit', '#form-edit-customer', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doEditCustomer(formData);

        });

        // Ajax request to edit specific role
        function doEditCustomer(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('edit-customers-proc') }}",
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

{{-- Delete customer script --}}
<script>
    $(document).ready(function() {
        $('.delete-customer-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('delete-customers', ['id' => ':id']) }}";
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
                    $('.delete-customer-modal-content').html(res);
                },
            });
        });

        // form submit to edit role
        $(document).on('submit', '#form-delete-customer', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doDeleteCustomer(formData);

        });

        // Ajax request to edit specific role
        function doDeleteCustomer(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('delete-customers-proc') }}",
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
