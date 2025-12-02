$(document).ready(() => {

  // move focus to first text box
  $("#code").focus();

  $("#add_product_form").submit((event) => {
    let isValid = true;
    //code validation
    const code = $("#code").val();
    if (code == "") {
      $("#code").next().text("This field is required.");
      isValid = false;
    } else if (code.length < 3) {
      $("#code").next().text("Must be 3 or more characters.");
      isValid = false;
    } else if (code.length > 10) {
      $("#code").next().text("Must be 10 or less characters. ");
      isValid = false;
    } else {
      $("#code").next().text("");
    }
    //name validation
    const name = $("#name").val();
    if (name == "") {
      $("#name").next().text("This field is required.");
      isValid = false;
    } else if (name.length < 10) {
      $("#name").next().text("Must be 10 or more characters.");
      isValid = false;
    } else if (name.length > 100) {
      $("#name").next().text("Must be less than 100 characters. ");
      isValid = false;
    } else {
      $("#name").next().text("");
    }

    //description validation
    const description = $("#description").val();
    if (description == "") {
      $("#description").next().text("This field is required.");
      isValid = false;
    } else if (description.length < 10) {
      $("#description").next().text("Must be 10 or more characters.");
      isValid = false;
    } else if (description.length > 255) {
      $("#description").next().text("Must be less than 255 characters. ");
      isValid = false;
    } else {
      $("#description").next().text("");
    }
    //brand name validation
    const brand_name = $("#on_sale").val();
    if (brand_name == "") {
      $("#on_sale").next().text("This field is required.");
      isValid = false;
    } else if (brand_name.length < 10) {
      $("#on_sale").next().text("Must be 6 or more characters.");
      isValid = false;
    } else if (brand_name.length > 100) {
      $("#on_sale").next().text("Must be 12 or less characters. ");
      isValid = false;
    } else {
      $("#on_sale").next().text("");
    }
    //price validation
    const price_new = $("#price").val();
    const price = parseFloat(price_new, 2);
    if (price_new == "") {
      $("#price").next().text("This field is required.");
      isValid = false;
    } else if (price <= 0) {
      $("#price").next().text("Must be more than 0.");
      isValid = false;
    } else if (price > 100000) {
      $("#price").next().text("Must be less than 100000. ");
      isValid = false;
    } else {
      $("#price").next().text("");
    }


    // prevents submittions if any entries are invalid
    if (isValid == false) {
      event.preventDefault();
    }
    //handleS click event on the reset form button
    $("#reset_button").click(() => {
      //clear all text boxes
      $("#code").val("");
      $("#name").val("");
      $("#description").val("");
      $("#brand_name").val("");
      $("#price").val("");
      //reset span elements
      $("#code").next().text("*");
      $("#name").next().text("*");
      $("#description").next().text("*");
      $("#brand_name").next().text("*");
      $("#price").next().text("*");
      $("#code").focus();
    })

  });

});