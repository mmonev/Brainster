$(document).ready(function(){ 

    $('.delete-btn').on('click', function(){
        let discussion_id = $(this).attr('data-id')
        $('.modal-div[data-id="'+discussion_id+'"]').show()
    });
    $('.hide-modal-btn').on('click', function(){
        let discussion_id = $(this).attr('data-id')
        $('.modal-div[data-id="'+discussion_id+'"]').hide()
    });


    
});