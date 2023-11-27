/*$(document).ready(function () {
    $("#startLoading").on("click", function () {
        // Show loader
        $("#loader-container").show();

        // Simulate loading process
        simulateLoading();
    });

    function simulateLoading() {
        var progressBar = $("#progress-bar");

        // Simulate a loading process by updating the progress bar
        var progress = 0;
        var interval = setInterval(function () {
            progress += Math.random() * 10;

            // Update the progress bar
            progressBar.width(progress + "%").attr("aria-valuenow", progress);

            // Check if loading is complete
            if (progress >= 100) {
                clearInterval(interval);
                // Hide loader after loading is complete
                $("#loader-container").hide();
            }
        }, 500);
    }
});*/