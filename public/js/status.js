import clientRequest from "./request.js";
import { displayErrors, clearErrors } from "./handle-error.js";
import showToast from "./toast.js";

$(function () {
  const table = $("#statusesTable");
  const createModal = $("#createModal");
  const createForm = $("#createForm");
  const editModal = $("#editModal");
  const editForm = $("#editForm");
  const deleteModal = $("#deleteModal");
  const deleteForm = $("#deleteForm");
  const dataTableSetup = {
    language: {
      emptyTable: "Tidak ada data",
    },
    processing: true,
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
      { data: "action", orderable: false, searchable: false },
    ],
  };

  const drawTable = (dataTableData) => {
    table.DataTable(dataTableData);
  };

  drawTable(dataTableSetup);

  createForm.on("submit", function (e) {
    e.preventDefault();
    const data = new FormData(this);
    clientRequest(CREATE_URL, "post", data, (success, res) => {
      clearErrors();
      if (success) {
        table.DataTable().ajax.reload();
        createModal.modal("hide");
        clearErrors();
        showToast("Berhasil Untuk Menambahkan Data");
      } else {
        if (res.status === 422) {
          displayErrors("#createModal", res.data.errors);
        } else {
          showToast("Gagal Untuk Menambahkan Data");
        }
      }
    });
  });

  table.on("click", ".btn-edit", function () {
    let url = $(this).data("uri");
    let name = $(this).closest("tr").find("td:eq(1)").text();
    let nameInput = $("#editNameInput");
    editForm.attr("action", url);
    nameInput.val(name);
  });

  editForm.on("submit", function (e) {
    e.preventDefault();
    const EDIT_URL = $(this).attr("action");
    const data = new FormData(this);
    clientRequest(EDIT_URL, "post", data, (success, res) => {
      clearErrors();
      if (success) {
        table.DataTable().ajax.reload();
        editModal.modal("hide");
        clearErrors();
        showToast("Berhasil Untuk Mengedit Data");
      } else {
        if (res.status === 422) {
          displayErrors("#editModal", res.data.errors);
        } else {
          showToast("Gagal Untuk Mengedit Data");
        }
      }
    });
  });

  table.on("click", ".btn-delete", function () {
    let url = $(this).data("uri");
    deleteForm.attr("action", url);
  });

  deleteForm.on("submit", function (e) {
    e.preventDefault();
    const DELETE_URL = $(this).attr("action");
    const data = { _method: "DELETE" };
    clientRequest(DELETE_URL, "POST", data, (status, res) => {
      if (status) {
        table.DataTable().ajax.reload();
        deleteModal.modal("hide");
        showToast("Berhasil Untuk Menghapus Data");
      } else {
        showToast("Gagal Untuk Menghapus Data");
      }
    });
  });
});
