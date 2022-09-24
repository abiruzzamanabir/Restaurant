(function ($) {
    $(document).ready(function () {
        $(".delete-form").submit(function (e) {
            let conf = confirm("Are you sure?");

            if (conf) {
                return true;
            } else {
                e.preventDefault();
            }
        });
        $("#dataTable").DataTable();

        $("#slider-photo").change(function (e) {
            const photo_url = URL.createObjectURL(e.target.files[0]);
            $("#slider-photo-preview").attr("src", photo_url);
        });

        $("#portfolio-gallery").change(function (e) {
            const files = e.target.files;

            for (let i = 0; i < files.length; i++) {
                const photo_url = URL.createObjectURL(e.target.files[i]);
                $("#portfolio-gallery-preview").attr("src", photo_url);
            }
        });

        CKEDITOR.replace("portfolio-desc");
        $(".js-example-basic-multiple").select2();

        let btn_no = 1;

        $("#add-new-slider-button").click(function (e) {
            e.preventDefault();

            $(".btn-opt-area").append(`
                            <div class="btn-section border p-3 my-2">
                            <div class="d-flex justify-content-between">
                            <span>item ${btn_no}</span>
                            <span style="cursor: pointer" class="badge badge-danger remove-btn">Remove <i class="fa fa-close" aria-hidden="true"></i></span>
                            </div>
                            <div class="form-group order">
                            <input name="menu_title[]" class="form-control my-3" type="text" placeholder="Item Name">
                            <input name="menu_price[]" class="form-control my-3" type="text" placeholder="Item price">
                            <label>Photo</label>
                            <input name="images[]" required type="file" class="form-control">
                            
                        </div>
                            </div>
                    `);
            btn_no++;
        });

        $(document).on("click", ".remove-btn", function () {
            $(this).closest(".btn-section").remove();
        });

    });
})(jQuery);
