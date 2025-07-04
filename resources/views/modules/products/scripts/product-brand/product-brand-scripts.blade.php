<script>
    $(document).ready(function() {
        $("#form-add-product-brand").validate({
            rules: {
                'new-product-brand': {
                    required: true
                },

            },
            messages: {
                'new-product-brand': {
                    required: "Product brand field is required"
                },
            }
        });

        // Creating new cut off
        $(document).on('submit', '#form-add-product-brand', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doAddProductBrand(formData);

        });

        // function do add cut off sends form data
        function doAddProductBrand(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('create-product-brand') }}",
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

<script>
    $(document).ready(function() {
        // For cut off edit modal
        $('.product-brand-edit-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('edit-product-brand', ['id' => ':id']) }}";
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
                    console.log(res)
                    $('.edit-product-brand-modal-content').html(res);

                    $("#form-edit-product-brand").validate({
                        rules: {
                            'edit-product-brand': {
                                required: true
                            },
                        },
                        messages: {
                            'edit-product-brand': {
                                required: "Product brand field is required"
                            },
                        }
                    });
                },
            });
        });

        $(document).on('submit', '#form-edit-product-brand', function(e) {
            e.preventDefault();

            if (!$(this).valid()) {
                return; // Block submit if form is invalid
            }

            const formData = $(this).serialize(); // Get form data
            doEditProductBrand(formData);
        });

        // function do edit cut off sends form data
        function doEditProductBrand(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('edit-product-brand-proc') }}",
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

<script>
    $(document).ready(function() {
        // For cut off edit modal
        $('.product-brand-delete-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('delete-product-brand', ['id' => ':id']) }}";
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
                    console.log(res)
                    $('.delete-product-brand-modal-content').html(res);
                },
            });
        });

        $(document).on('submit', '#form-delete-product-brand', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data
            doDeleteProductBrand(formData);
        });

        // function do edit cut off sends form data
        function doDeleteProductBrand(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('delete-product-brand-proc') }}",
                data: formData,
                dataType: "json",
                success: function(res) {
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
