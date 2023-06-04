import clientRequest from "./request.js";
import showToast from "./toast.js";

$(function () {
  const deleteForm = $("#deleteForm");
  const deleteModal = $("#deleteModal");
  /**
   * GET JASTIP
   */
  const table = $("#jastipTable");
  const dataTableSetup = {
    serverSide: true,
    ajax: DATA_URL,
    columns: [
      {
        sClass: "text-center",
        data: "DT_RowIndex",
        name: "id",
      },
      {
        data: "name",
      },
      {
        data: "recipient_status.status.name",
      },
      { data: "action", orderable: false, searchable: false },
    ],
  };

  const drawTable = (dataTableData) => {
    table.DataTable(dataTableData);
  };

  drawTable(dataTableSetup);

  const formatNumber = (number) => {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  };

  table.on("click", ".btn-detail", function () {
    const url = $(this).data("uri");
    const totalWeightElement = $("#totalWeight");
    const totalCubicWeightElement = $("#totalCubicWeight");
    const totalPriceElement = $("#totalPrice");
    $.get(url, function ({ name, packages }) {
      $("#detailModal").modal("show");
      $("#detailModal .modal-title").text(name);
      let totalWeight = 0;
      let totalCubicWeight = 0;
      let totalPrice = 0;
      let tdElement = "";
      packages.map(({ tracking_number, weight, cubic_weight, price }) => {
        weight = weight.replace(",", ".");
        cubic_weight = cubic_weight.replace(",", ".");
        weight = parseFloat(weight);
        cubic_weight = parseFloat(cubic_weight);
        totalWeight += weight;
        totalCubicWeight += cubic_weight;
        totalPrice += price;
        tdElement += `<tr>
                        <td>${tracking_number}</td>
                        <td>${weight}</td>
                        <td>${cubic_weight}</td>
                        <td>Rp. ${formatNumber(price)}</td>
                      </tr>`;
      });
      $("#detailModal .modal-body table tbody").html(tdElement);
      totalWeight =
        totalWeight % 1 === 0 ? totalWeight : totalWeight.toFixed(2);
      totalCubicWeight =
        totalCubicWeight % 1 === 0
          ? totalCubicWeight
          : totalCubicWeight.toFixed(2);
      totalWeightElement.text(totalWeight);
      totalCubicWeightElement.text(totalCubicWeight);
      totalPriceElement.text(`Rp. ${formatNumber(totalPrice)}`);
    });
  });

  /**
   * DELETE JASTIP
   */
  table.on("click", ".btn-delete", function () {
    const url = $(this).data("uri");
    deleteForm.attr("action", url);
  });

  deleteForm.on("submit", function (e) {
    e.preventDefault();
    const DELETE_URL = $(this).attr("action");
    console.log(DELETE_URL);
    const data = { _method: "DELETE" };
    clientRequest(DELETE_URL, "post", data, (success, res) => {
      if (success) {
        table.DataTable().ajax.reload();
        deleteModal.modal("hide");
        showToast(res.data.message);
      } else {
        showToast("Gagal Untuk Menghapus Data");
      }
    });
  });
});
