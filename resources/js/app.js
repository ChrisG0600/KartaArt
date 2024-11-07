import './bootstrap';

// For Mobile menu toggle User
$(document).ready(function() {
    $('#menu-btn').click(function() {
        var expanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !expanded);
        $('#mobile-menu').toggleClass('hidden');
    });
});

// For SideBar menu toggle Seller



// For Alert Message 
$(document).ready(function() {
    // Check if the success alert exists
    var $successAlert = $('#success-alert');
    if ($successAlert.length) {
        // Set a timeout to fade out the alert after 2 seconds
        setTimeout(function() {
            $successAlert.fadeOut(500, function() {
                $(this).remove(); // Remove the alert element from the DOM
            });
        }, 2000); // Show the alert for 2 seconds
    }
    // Check if the info alert exists
    var $infoAlert = $('#info-alert');
    if ($infoAlert.length) {
        // Set a timeout to fade out the alert after 2 seconds
        setTimeout(function() {
            $infoAlert.fadeOut(500, function() {
                $(this).remove(); // Remove the alert element from the DOM
            });
        }, 2000); // Show the alert for 2 seconds
    }
    // Check if the error alert exists
    var $errorAlert = $('#error-alert');
    if ($errorAlert.length) {
        // Set a timeout to fade out the alert after 2 seconds
        setTimeout(function() {
            $errorAlert.fadeOut(500, function() {
                $(this).remove(); // Remove the alert element from the DOM
            });
        }, 2000); // Show the alert for 2 seconds
    }
});

// User-Profile-AddressBtn

// $(document).ready(function () {
//     $('#addNewAddressBtn').click(function () {
//         $('#addressModal').removeClass('hidden').addClass('flex'); // Show modal
//         $('#addressModal .transform').removeClass('opacity-0 scale-95').addClass('opacity-100 scale-100'); // Apply transition
//         $('body').css('overflow', 'hidden'); // Prevent scrolling
//     });

//     $('#editAddressBtn').click(function () {
//         $('#editAddressModal').removeClass('hidden').addClass('flex'); // Show modal
//         $('#editAddressModal .transform').removeClass('opacity-0 scale-95').addClass('opacity-100 scale-100'); // Apply transition
//         $('body').css('overflow', 'hidden'); // Prevent scrolling
//     });

//     $('#closeModalBtn').click(function () {
//         $('#addressModal .transform').removeClass('opacity-100 scale-100').addClass('opacity-0 scale-95'); // Reverse transition
//         setTimeout(function () {
//             $('#addressModal').addClass('hidden').removeClass('flex'); // Hide modal after transition ends
//             $('body').css('overflow', 'auto'); // Enable scrolling again
//         }, 500); // Delay to allow the transition to complete
//     });

//     $('#closeEditModalBtn').click(function () {
//         $('#editAddressModal .transform').removeClass('opacity-100 scale-100').addClass('opacity-0 scale-95'); // Reverse transition
//         setTimeout(function () {
//             $('#editAddressModal').addClass('hidden').removeClass('flex'); // Hide modal after transition ends
//             $('body').css('overflow', 'auto'); // Enable scrolling again
//         }, 500); // Delay to allow the transition to complete
//     });
// });

// $(document).ready(function () {
//     // Function to show modal and apply transition
//     function showModal(modalId) {
//         $(modalId).removeClass('hidden').addClass('flex'); // Show modal
//         $(`${modalId} .transform`).removeClass('opacity-0 scale-95').addClass('opacity-100 scale-100'); // Apply transition
//         $('body').css('overflow', 'hidden'); // Prevent scrolling
//     }

//     // Function to hide modal and reverse transition
//     function closeModal(modalId) {
//         $(`${modalId} .transform`).removeClass('opacity-100 scale-100').addClass('opacity-0 scale-95'); // Reverse transition
//         setTimeout(function () {
//             $(modalId).addClass('hidden').removeClass('flex'); // Hide modal after transition ends
//             $('body').css('overflow', 'auto'); // Enable scrolling again
//         }, 500); // Delay to allow the transition to complete
//     }

//     // Event handler to show the address modal
//     $('#addNewAddressBtn').click(function () {
//         showModal('#addressModal');
//     });

//     // Event handler to show the edit address modal
//     $('.editAddressBtn').click(function () {
//         showModal('#editAddressModal');
//     });

//     // Event handler to close the address modal
//     $('#closeModalBtn').click(function () {
//         closeModal('#addressModal');
//     });

//     // Event handler to close the edit address modal
//     $('#closeEditModalBtn').click(function () {
//         closeModal('#editAddressModal');
//     });
// });
