<script>
    $(document).ready(function() {
        $("#form-add-product-category").validate({
            rules: {
                'new-product-category': {
                    required: true
                },

            },
            messages: {
                'new-product-category': {
                    required: "Product category field is required"
                },
            }
        });

        // Creating new cut off
        $(document).on('submit', '#form-add-product-category', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doAddProductCategory(formData);

        });

        // function do add cut off sends form data
        function doAddProductCategory(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('create-product-category') }}",
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
        $('.product-category-edit-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('edit-product-category', ['id' => ':id']) }}";
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
                    $('.edit-product-category-modal-content').html(res);

                    $("#form-edit-product-category").validate({
                        rules: {
                            'edit-product-category': {
                                required: true
                            },
                        },
                        messages: {
                            'edit-product-category': {
                                required: "Product category field is required"
                            },
                        }
                    });
                },
            });
        });

        $(document).on('submit', '#form-edit-product-category', function(e) {
            e.preventDefault();

            if (!$(this).valid()) {
                return; // Block submit if form is invalid
            }

            const formData = $(this).serialize(); // Get form data
            doEditProductCategory(formData);
        });

        // function do edit cut off sends form data
        function doEditProductCategory(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('edit-product-category-proc') }}",
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
        $('.product-category-delete-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('delete-product-category', ['id' => ':id']) }}";
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
                    $('.delete-product-category-modal-content').html(res);
                },
            });
        });

        $(document).on('submit', '#form-delete-product-category', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data
            doDeleteProductCategory(formData);
        });

        // function do edit cut off sends form data
        function doDeleteProductCategory(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('delete-product-category-proc') }}",
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
