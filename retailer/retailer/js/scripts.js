$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable("#productsTable")) {
      $("#productsTable").DataTable({
        order: [[5, "desc"]],
      });
    }
  
    // View Modal Script using event delegation
    $(document).on("click", ".viewBtn", function () {
      var name = $(this).data("name");
      var description = $(this).data("description");
      var category = $(this).data("category");
      var condition = $(this).data("condition");
      var quantity = $(this).data("quantity");
      var status = $(this).data("status");
      var price = $(this).data("price");
      var currency = $(this).data("currency");
      var image = $(this).data("image");
  
      $("#view_name").text(name);
      $("#view_description").text(description);
      $("#view_category").text(category);
      $("#view_condition").text(condition);
      $("#view_quantity").text(quantity);
      $("#view_status").text(status);
      $("#view_price").text(price);
      $("#view_currency").text(currency);
  
      $("#view_image img").attr("src", image);
  
      if (image) {
        $("#view_image img").attr("src", image);
      } else {
        $("#view_image").html("No image available");
      }
  
      $("#viewItemModal").modal("show");
    });
  
    // Edit Modal Script using event delegation
    $(document).on("click", ".editBtn", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var description = $(this).data("description");
        var category = $(this).data("category");
        var condition = $(this).data("condition");
        var quantity = $(this).data("quantity");
        var status = $(this).data("status");
        var price = $(this).data("price");
        var currency = $(this).data("currency");
  
        $("#edit_id").val(id);
        $("#edit_name").val(name);
        $("#edit_description").val(description);
        $("#edit_category").val(category);
        $("#edit_condition").val(condition);
        $("#edit_quantity").val(quantity);
        $("#edit_status").val(status);
        $("#edit_price").val(price);
        $("#edit_currency").val(currency);
  
        $("#editItemModal").modal("show");
    });
  
    // Delete Modal Script using event delegation
    $(document).on("click", ".deleteBtn", function () {
        var id = $(this).data("id");
        $("#delete_id").val(id);
        $("#deleteItemModal").modal("show");
    });
});
