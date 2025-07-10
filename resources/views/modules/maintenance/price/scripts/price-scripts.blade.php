<script>
    $(document).ready(function() {

        $("#form-add-price").validate({
            rules: {
                'weight': {
                    required: true
                },
                'price': {
                    required: true
                },
            },
            messages: {
                'weight': {
                    required: "Weight is required"
                },
                'price': {
                    required: "Weight is required"
                },
            }
        });

        $(document).on('submit', '#form-add-price', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doAddPrice(formData);

        });

        function doAddPrice(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('add-price-proc') }}",
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
        $('.price-edit-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('edit-price', ['id' => ':id']) }}";
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
                    $('.edit-price-modal-content').html(res);

                    $("#form-edit-price").validate({
                        rules: {
                            'weight': {
                                required: true
                            },
                            'price': {
                                required: true
                            },
                        },
                        messages: {
                            'weight': {
                                required: "Weight field is required"
                            },
                            'price': {
                                required: "Price field is required"
                            },

                        }
                    });
                },
            });
        });

        $(document).on('submit', '#form-edit-price', function(e) {
            e.preventDefault();

            if (!$(this).valid()) {
                return; // Block submit if form is invalid
            }

            const formData = $(this).serialize(); // Get form data
            doEditPrice(formData);
        });
        // function do edit cut off sends form data
        function doEditPrice(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('edit-price-proc') }}",
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
        $('.price-delete-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('delete-price', ['id' => ':id']) }}";
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
                    $('.delete-price-modal-content').html(res);
                },
            });
        });

        $(document).on('submit', '#form-delete-price', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data
            doDeletePrice(formData);
        });

        // function do edit cut off sends form data
        function doDeletePrice(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('delete-price-proc') }}",
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
