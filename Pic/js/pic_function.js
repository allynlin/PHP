function showToast(data, style) {
    $("#toast_style").removeClass().addClass("alert d-flex align-items-center alert-" + style);
    // 修改 toast_icon 的图标，根据 aria-label 修改
    if (style === "success") {
        $("#toast_icon").attr("aria-label", "Success:");
        $("#toast_icon_use").attr("xlink:href", "#check-circle-fill");
    } else if (style === "danger") {
        $("#toast_icon").attr("aria-label", "Danger:");
        $("#toast_icon_use").attr("xlink:href", "#exclamation-triangle-fill");
    }
    $("#toast_text").text(data);
    $("#toast").fadeIn();
    setTimeout(function () {
        $("#toast").fadeOut();
    }, 2000);
}