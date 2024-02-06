$(function () {

    $("html").on('click', function (e) {
        console.log()
        if ($(e.target).parents().hasClass('card') && $(e.target).hasClass('fa-edit')) {
            $('.edit-card').show(400)

            $('.edit-card')
                .parents('.card')
                .children('.edit-project-form').hide(400)

            $(e.target).parents('.edit-card').hide()

            $(e.target)
                .parents('.card')
                .children('.edit-project-form').show(400)

            $(e.target)
                .parents('.card')
                .children('.edit-project-form')
                .animate({
                    opacity: 1
                }, 400)
        } else if ($(e.target).parents().hasClass('edit-project-form')) {
            return
        } else {

            $('.edit-card').show(400)

            $('.edit-card')
                .parents('.card')
                .children('.edit-project-form').hide(400)
        }
    })


})