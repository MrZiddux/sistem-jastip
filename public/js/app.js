$(".modal").on("hidden.bs.modal", function () {
  $("input.form-control").removeClass("is-invalid");
  $("select.form-control").removeClass("is-invalid");
  $("span.invalid-feedback").text("");
  if ($(this).find("form").length > 0) {
    $(this).find("form")[0].reset();
  }
});
