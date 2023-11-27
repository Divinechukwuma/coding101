$(document).ready(function (){
    $('#select-loader').click(function (e) {
        e.preventDefault()
     function updateProgress(value){
        $('#progressbar').text(value + '%');
        $('#progressbar').stop().animate({
            width:value + '%'
        },500,function(){
             
        })
     }



        $("button").prop('disabled',true)
        var duration = $("#duration").val();
        var option = $("#option").val();
        var color = $("#color").val();

        // Check if any field is empty
        if (!duration || !option || !color) {
            alert("Please fill in all fields");
        }
        switch (option) {
            case 'spinner':
               $('#spinner').css({'display':'block',
             'color':$('#color').val()
            })
            setTimeout(() => {
                $('#spinner').css('display','none')
                $("button").prop('disabled',false)
            }, parseInt(duration));
                break;
                case'header':
                $('#header').css({'display':'block',
             'background-color':$('#color').val()
            })
            setTimeout(() => {
                $('#header').css('display','none')
                $("button").prop('disabled',false)
            }, parseInt(duration));
                break;
                case 'progress':
                    $('#progress').css({'display': 'block',
                    'background-color':$('#color').val()
        })
        break;
        }
    });
});