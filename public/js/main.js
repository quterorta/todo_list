$(document).ready(function() {
    $(".delete-btn").click(function() {
        let title = $(this).data("title")
        var res = confirm('Вы действительно хотите удалить задание "' + title + '"?');
        if (!res) {
            return false;
        }
    });
});
