export const displayErrors = (el, errors) => {
  clearErrors();
  for (const key in errors) {
    const escapedKey = key.replace(/\./g, "\\.").replace(/\[\]/g, ".$&");
    const input = $(`${el} [name="${escapedKey}"]`);
    console.log(input);
    const parent = input.parent();
    input.addClass("is-invalid");
    parent.find("span.invalid-feedback").text(errors[key][0]);
  }
};

export const clearErrors = () => {
  $("input.form-control").removeClass("is-invalid");
  $("select.form-control").removeClass("is-invalid");
  $("span.invalid-feedback").text("");
};
