$(document).ready(function () {
    $('#select-loader').click(function (e) {
        $("button").prop('disabled', true);
        var duration = $("#duration").val();
        var option = $("#option").val();
        var color = $("#color").val();

        function checkProgress() {
            const progressValue = parseFloat($('#progress-bar').css('--progress-value'));

            if (progressValue === 100) {
                $('#progress-bar').hide();
                // You can perform any actions you need here.
            } else {
                // If it's not 100%, continue checking
                setTimeout(checkProgress, 100); // Poll every 100 milliseconds
            }
        }

        // Check if any field is empty
        if (!duration || !option || !color) {
            alert("Please fill in all fields");
        }

        switch (option) {
            case 'spinner':
                $('#spinner').css({
                    'display': 'block',
                    'color': $('#color').val()
                });
                setTimeout(() => {
                    $('#spinner').css('display', 'none');
                    $("button").prop('disabled', false);
                }, parseInt(duration));
                break;
            case 'header':
                $('#header').css({
                    'display': 'block',
                    'background-color': $('#color').val()
                });
                setTimeout(() => {
                    $('#header').css('display', 'none');
                    $("button").prop('disabled', false);
                }, parseInt(duration));
                break;
            case 'progress-bar':
                $('#progress-bar').css(
                    'display','block');
                const progressColor = `radial-gradient(closest-side, rgb(100, 0, 0) 79%, transparent 80% 100%),
                    conic-gradient(${color} calc(var(--progress-value) * 1%), white 0)`;

                $('#progress-bar').css('background', progressColor);

                checkProgress();
                break;
        }

        $("button").prop('disabled', false);
    });
});
