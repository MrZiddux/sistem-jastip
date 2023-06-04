import clientRequest from "./request.js";
import { clearErrors } from "./handle-error.js";
import showToast from "./toast.js";

$(function () {
  const createForm = $("#createForm");
  const editForm = $("#editForm");

  const submitButton = $("#submitButton");

  const totalPriceText = $("#totalPrice");
  const NORMAL_PRICE = 20000;
  const CUBIC_PRICE = 15000;

  function initializeCard(card) {
    const index = card.index();
    const lengthGroup = card.find(`#lengthGroup-${index + 1}`);
    const widthGroup = card.find(`#widthGroup-${index + 1}`);
    const heightGroup = card.find(`#heightGroup-${index + 1}`);
    const cubicWeightGroup = card.find(`#cubicWeightGroup-${index + 1}`);
    const pricingOption = card.find(`#pricingOption-${index + 1}`);
    let pricingOptionVal = pricingOption.val();
    const weight = card.find(`#weight-${index + 1}`);
    const length = card.find(`#length-${index + 1}`);
    const width = card.find(`#width-${index + 1}`);
    const height = card.find(`#height-${index + 1}`);
    const cubicWeight = card.find(`#cubicWeight-${index + 1}`);
    const pricePerPackage = card.find(`#price-${index + 1}`);

    const lengthCleave = new Cleave(length, {
      numeral: true,
      numeralPositiveOnly: true,
      numeralDecimalMark: ",",
      delimiter: ".",
    });

    const widthCleave = new Cleave(width, {
      numeral: true,
      numeralPositiveOnly: true,
      numeralDecimalMark: ",",
      delimiter: ".",
    });

    const heightCleave = new Cleave(height, {
      numeral: true,
      numeralPositiveOnly: true,
      numeralDecimalMark: ",",
      delimiter: ".",
    });

    const weightCleave = new Cleave(weight, {
      numeral: true,
      numeralPositiveOnly: true,
      numeralDecimalMark: ",",
      delimiter: ".",
    });

    const cubicWeightCleave = new Cleave(cubicWeight, {
      numeral: true,
      numeralPositiveOnly: true,
      numeralDecimalMark: ",",
      delimiter: ".",
    });

    checkPricingOption();
    pricingOption.on("change", function () {
      const pricingOptionCurrentValue = pricingOption.val();
      pricingOptionVal = pricingOptionCurrentValue;
      totalPriceText.text("0");
      pricePerPackage.val("0");
      checkPricingOption();
    });

    function checkPricingOption() {
      if (pricingOptionVal === "normal") {
        lengthGroup.hide();
        widthGroup.hide();
        heightGroup.hide();
        cubicWeightGroup.hide();
        length.val("0");
        width.val("0");
        height.val("0");
        cubicWeight.val("0");
        calculateNormalPrice();
      } else if (pricingOptionVal === "kubikasi") {
        lengthGroup.show();
        widthGroup.show();
        heightGroup.show();
        cubicWeightGroup.show();
      }
      calculateTotalPrice();
    }

    weight.on("keyup", function () {
      if (pricingOptionVal === "normal") {
        calculateNormalPrice();
        calculateTotalPrice();
      }
    });

    length.on("keyup", calculateCubicWeight);
    width.on("keyup", calculateCubicWeight);
    height.on("keyup", calculateCubicWeight);

    cubicWeight.on("change", function () {
      if (pricingOptionVal === "kubikasi") {
        calculateCubicPrice();
        calculateTotalPrice();
      }
    });

    function calculateCubicWeight() {
      const totalCubicWeight =
        (lengthCleave.getRawValue() *
          widthCleave.getRawValue() *
          heightCleave.getRawValue()) /
        4000;
      cubicWeightCleave.setRawValue(totalCubicWeight);

      if (pricingOptionVal === "kubikasi") {
        calculateCubicPrice();
        calculateTotalPrice();
      }
    }

    function calculateNormalPrice() {
      const totalNormalPrice = weightCleave.getRawValue() * NORMAL_PRICE;
      pricePerPackage.val(totalNormalPrice);
    }

    function calculateCubicPrice() {
      const totalCubicPrice = cubicWeightCleave.getRawValue() * CUBIC_PRICE;
      pricePerPackage.val(totalCubicPrice);
    }
  }

  const formatNumber = (number) => {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  };

  function calculateTotalPrice() {
    let total = 0;
    const cards = $(".card.package");
    cards.each(function () {
      const pricingOptionVal = $(this).find("select.pricing-option").val();
      const weightCleave = new Cleave($(this).find("input.weight"), {
        numeral: true,
        numeralPositiveOnly: true,
        numeralDecimalMark: ",",
        delimiter: ".",
      });
      const cubicWeightCleave = new Cleave($(this).find("input.cubic-weight"), {
        numeral: true,
        numeralPositiveOnly: true,
        numeralDecimalMark: ",",
        delimiter: ".",
      });
      if (pricingOptionVal === "normal") {
        total += weightCleave.getRawValue() * NORMAL_PRICE;
      } else if (pricingOptionVal === "kubikasi") {
        total += cubicWeightCleave.getRawValue() * CUBIC_PRICE;
      }
    });
    totalPriceText.text(formatNumber(total));
  }

  const cardsWrapper = $("#cardsWrapper");
  const addPackageButton = $("#addPackageButton");

  addPackageButton.on("click", function () {
    const newCard = $(".card.package").first().clone();
    const index = $(".card.package").length;
    const removeButtonEl = `<button type="button" class="btn text-danger removeButton"><i class="bi bi-x-lg"></i></button>`;
    newCard.find("input").val("");
    newCard.find("select").val("normal");
    newCard.find("input").each(function () {
      const id = $(this).attr("id");
      const newId = id.replace(/-\d+$/, `-${index + 1}`);
      $(this).attr("id", newId);

      const name = $(this).attr("name");
      const newName = name.replace(/\d+/, `${index + 1}`);
      $(this).attr("name", newName);
    });
    newCard.find("select").each(function () {
      const id = $(this).attr("id");
      const newId = id.replace(/-\d+$/, `-${index + 1}`);
      $(this).attr("id", newId);

      const name = $(this).attr("name");
      const newName = name.replace(/\d+/, `${index + 1}`);
      $(this).attr("name", newName);
    });
    newCard.find("label").each(function () {
      const forAttr = $(this).attr("for");
      const newForAttr = forAttr.replace(/-\d+$/, `-${index + 1}`);
      $(this).attr("for", newForAttr);
    });
    newCard.find(".group").each(function () {
      const id = $(this).attr("id");
      const newId = id.replace(/-\d+$/, `-${index + 1}`);
      $(this).attr("id", newId);
    });

    newCard.find(".card-header").append(removeButtonEl);

    cardsWrapper.append(newCard);
    initializeCard(newCard);
  });

  cardsWrapper.on("click", ".removeButton", function () {
    $(this).closest(".card.package").remove();
    calculateTotalPrice();
  });

  $("input").on("keydown", function (e) {
    if (e.which === 13) {
      e.preventDefault();
      // add input not readonly, disabled, hidden to canfocus
      const $canfocus = $(
        'input:not([readonly]):not([disabled]):not([type="hidden"]), select, [tabindex]:not([tabindex="-1"])'
      );
      const index = $canfocus.index(this) + 1;
      if (index >= $canfocus.length) $canfocus[0].focus();
      else $canfocus[index].focus();
    }
  });

  const cards = $(".card.package");
  cards.each(function () {
    initializeCard($(this));
  });

  function setLoading(isLoading) {
    if (isLoading) {
      submitButton.attr("disabled", true);
      submitButton.html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
      );
    } else {
      submitButton.attr("disabled", false);
      submitButton.html("Simpan");
    }
  }

  /**
   * CREATE JASTIP
   */
  createForm.on("submit", function (e) {
    e.preventDefault();
    const data = new FormData(this);
    const CREATE_URL = $(this).attr("action");
    setLoading(true);
    clientRequest(CREATE_URL, "post", data, (success, res) => {
      clearErrors();
      setLoading(false);
      if (success) {
        showToast(res.data.message);
        setTimeout(() => {
          window.location.href = res.data.redirect_uri;
        }, 3000);
      } else {
        if (res.status === 422) {
          showToast("Isi Data Dengan Benar");
        } else {
          showToast("Gagal Untuk Menambahkan Data");
        }
      }
    });
  });

  /**
   * EDIT JASTIP
   */
  editForm.on("submit", function (e) {
    e.preventDefault();
    const data = new FormData(this);
    data.set("_method", "PUT");
    const EDIT_URL = $(this).attr("action");
    setLoading(true);
    clientRequest(EDIT_URL, "post", data, (success, res) => {
      clearErrors();
      setLoading(false);
      if (success) {
        showToast(res.data.message);
        setTimeout(() => {
          window.location.href = res.data.redirect_uri;
        }, 3000);
      } else {
        if (res.status === 422) {
          showToast("Isi Data Dengan Benar");
        } else {
          showToast("Gagal Untuk Mengubah Data");
        }
      }
    });
  });
});
