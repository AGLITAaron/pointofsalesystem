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
