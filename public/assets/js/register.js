$(document).ready(function() {
    // Attach a click event handler to the login button
    $("#registerButton").click(function() {

        var $button = $(this); // Reference to the button element
        $button.prop("disabled", true); // Disable the button
        $button.html("Mohon Tunggu..."); // Change button text

        // Get the form data
        var formData = $("#registerForm").serialize();
        setTimeout(function() {
            // Simulate a 2-second delay, replace this with your actual login Ajax call
         

            const registerUrl = register;
            // Send the login request using Ajax
            $.ajax({
                type: "POST",
                url: registerUrl, // Replace with the actual login route
                data: formData,
                success: function(response) {

                    $button.prop("disabled", false); // Enable the button
                    $button.html("DAFTAR"); // Restore button text

                    Swal.fire({
                        title: 'Berhasil',
                        html: 'Akun berhasil dibuat..',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                        willClose: () => {
                            // Redirect to dashboard after the notification is closed
                            window.location.href = dashboardUrl; // Replace with your actual dashboard URL
                        }
                    });
                },
                error: function(xhr, status, error) {
                    $button.prop("disabled", false); // Enable the button
                    $button.html("DAFTAR"); // Restore button text

                    var errorResponse = xhr
                        .responseJSON; // Parse the JSON response

                    if (errorResponse && errorResponse.errors) {
                        var errorMessage = "";
                        $.each(errorResponse.errors, function(field, messages) {
                            errorMessage += "<p>" + messages.join(
                                "<br>") + "</p>";
                        });

                        Swal.fire({
                            title: 'Uppszz..',
                            html: errorMessage,
                            icon: 'error',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Akun tidak bisa dibuat, periksa kembali identitas',
                          })
                    }
                }
            });

        }, 1000); // 1 seconds delay
    });
});