/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

var path = location.pathname.split("/");
var url = location.origin + "/" + path[1];

$("ul.sidebar-menu li a").each(function () {
    if ($(this).attr("href").indexOf(url) !== -1) {
        $(this)
            .parent()
            .addClass("active")
            .parent()
            .parent("li")
            .addClass("active");
    }
});

// datatable
$(document).ready(function () {
    $("#Table")
        .DataTable({
            responsive: true,
            lengthChange: true,
            paging: true,
            ordering: true,
            autoWidth: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        })
        .buttons()
        .container()
        .appendTo("#example1_wrapper .col-md-6:eq(0)");
    $("#ex").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
    });
});

// model confirm

function submitDel(id) {
    $("#del-" + id).submit();
}

function returnlogout() {
    var link = $("#logout").attr("href");
    $(location).attr("href", link);
}

// preview image
function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}
// for show data entries
document.getElementById("show_entries").addEventListener("change", function () {
    this.form.submit();
});

// fitur show password

function toggleShowPasswordButton(inputId, buttonId) {
    var passwordInput = document.getElementById(inputId);
    var showPasswordButton = document.getElementById(buttonId);

    // Jika ada teks dalam input, tampilkan tombol
    if (passwordInput.value !== "") {
        showPasswordButton.style.display = "block";
    } else {
        showPasswordButton.style.display = "none";
    }
}

function togglePasswordVisibility(inputId, iconId) {
    var passwordInput = document.getElementById(inputId);
    var showPasswordButtonIcon = document.getElementById(iconId);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showPasswordButtonIcon.classList.remove("fa-eye");
        showPasswordButtonIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        showPasswordButtonIcon.classList.remove("fa-eye-slash");
        showPasswordButtonIcon.classList.add("fa-eye");
    }
}

function confirmDelete(username) {
    $("#confirmDeleteModal-" + username).modal("show");
}

function deleteUser(username) {
    $("#delete-form-" + username).submit();
}
$(document).ready(function () {
    let path = window.location.pathname;

    // Gunakan path saat ini untuk menetapkan submenu yang dipilih sebagai active
    $(".dropdown-menu .nav-link").each(function () {
        let link = $(this).attr("href");
        if (path === link) {
            $(this).addClass("active");

            // Menambahkan kelas 'show' ke elemen dropdown-menu untuk tetap terbuka
            $(this).closest(".dropdown-menu").addClass("show");
            $(this).closest(".has-dropdown").addClass("active");
        }
    });
});

// Fungsi untuk membuka modal PDF Viewer dengan URL file PDF
// Event handler untuk membuka modal File Viewer
$(document).on("click", ".open-file-modal", function () {
    $("#fileViewerModal").modal("show");
});

$(document).ready(function () {
    $(".table-1").DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: true,
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".btn-delete").forEach((button) => {
        button.addEventListener("click", function () {
            let userId = this.getAttribute("data-id");
            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${userId}`).submit();
                }
            });
        });
    });
});
