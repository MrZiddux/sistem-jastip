$(".modal").on("hidden.bs.modal", function () {
  $("input.form-control").removeClass("is-invalid");
  $("select.form-control").removeClass("is-invalid");
  $("span.invalid-feedback").text("");
  $(this).find("form")[0].reset();
});
