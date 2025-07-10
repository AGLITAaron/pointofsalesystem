{{-- Add employee script --}}
<script>
    $(document).ready(function() {

        $("#form-add-employee").validate({
            rules: {
                'name': {
                    required: true
                },
                'contact-number': {
                    required: true
                },
                'gender': {
                    required: true
                },
                'salary': {
                    required: true
                },
                'complete-address': {
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
                'name': {
                    required: "Name field is required"
                },
                'contact-number': {
                    required: "Contact number is required"
                },
                'gender': {
                    required: "Gender  is required"
                },
                'salary': {
                    required: "Salary  is required"
                },
                'complete-address': {
                    required: "Complete address field is required"
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

        $(document).on('submit', '#form-add-employee', function(e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Get form data

            doAddEmployee(formData);

        });

        function doAddEmployee(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('add-employees-proc') }}",
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
        $('.edit-employee-btn').click(function() {
            const id = $(this).attr('data-item-id');
            var route = "{{ route('edit-employees', ['id' => ':id']) }}";
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
                    $('.edit-employee-content').html(res);

                    $("#form-edit-employee").validate({
                        rules: {
                            'contact-number': {
                                required: true
                            },
                            'gender': {
                                required: true
                            },
                            'salary': {
                                required: true
                            },
                            'complete-address': {
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
                            'contact-number': {
                                required: "Contact number field is required"
                            },
                            'gender': {
                                required: "Gender field is required"
                            },
                            'salary': {
                                required: "Salary field is required"
                            },
                            'complete-address': {
                                required: "Complete address field is required"
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

        $(document).on('submit', '#form-edit-employee', function(e) {
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
                url: "{{ route('edit-employees-proc') }}",
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
    const input = document.getElementById("contact-number");

    input.addEventListener("input", function() {
        // Remove non-digits
        let value = this.value.replace(/\D/g, '');

        // Enforce starting with 9
        if (value && value[0] !== '9') {
            value = '';
        }

        // Limit to 10 digits
        this.value = value.slice(0, 10);
    });
</script>
