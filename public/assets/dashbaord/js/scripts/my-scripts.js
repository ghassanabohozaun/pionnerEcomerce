// reload

$("document").ready(function () {
    $('a[data-action="reload-form"]').on("click", function () {
        var block_ele = $(this).closest(".card");
        // Block Element
        block_ele.block({
            message:
                '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
            timeout: 1000, //unblock after 1 seconds
            overlayCSS: {
                backgroundColor: "#FFF",
                cursor: "wait",
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: "none",
            },
        });
        $("#myForm")[0].reset();
    });
});
