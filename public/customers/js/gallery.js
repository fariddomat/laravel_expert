$(document).ready(function () {
  $("body").on("click", ".change-status", function (event) {
    var that = $(this);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    event.preventDefault();
    var notyObject = new Noty({
      text: "Confirm Change Status",
      type: "warning",
      killer: true,
      buttons: [
        Noty.button("Yes", "btn btn-success me-2", function () {
          notyObject.close();
          that.prop("disabled", true);
          $.ajax({
            url: that.data("link"),
            type: "POST",
            data: { _token: CSRF_TOKEN },
            dataType: "JSON",
            success: function (data) {
              that.html(data.message);
              that.prop("disabled", false);
              alert("Status Changed");
            },
          });
        }),

        Noty.button("No", "btn btn-primary me-2", function () {
          notyObject.close();
        }),
      ],
    });

    notyObject.show();
  });
  //delete
  $("tbody").on("click", ".delete", function (e) {
    var that = $(this);
    e.preventDefault();
    var n = new Noty({
      text: "Confirm Delete",
      type: "warning",
      killer: true,
      buttons: [
        Noty.button("Yes", "btn btn-success me-2", function () {
          that.closest("form").submit();
        }),

        Noty.button("No", "btn btn-primary me-2", function () {
          n.close();
        }),
      ],
    });

    n.show();
  }); //end of delete
});
