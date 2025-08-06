<!DOCTYPE html>
<html>
<head>
    <title>Test Form Warning</title>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Form Test Warning</h2>
    <form method="POST" action="#">
        @csrf
        <label>Nama LKS:</label>
        <input type="text" name="nama_lks" placeholder="Nama LKS">
        <br><br>
        <button type="submit">Submit</button>
    </form>

    <a href="/" class="confirm-leave">Kembali ke Home</a>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let formChanged = false;
            const form = document.querySelector("form");

            if (form) {
                form.querySelectorAll("input, select, textarea").forEach((el) => {
                    el.addEventListener("input", function () {
                        formChanged = true;
                        console.log("Form diubah");
                    });
                });

                form.addEventListener("submit", function () {
                    formChanged = false;
                });
            }

            window.addEventListener("beforeunload", function (e) {
                if (formChanged) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });

            document.querySelectorAll('.confirm-leave').forEach(function (link) {
                link.addEventListener('click', function (e) {
                    if (formChanged) {
                        const confirmLeave = confirm("Data yang belum disimpan akan hilang. Yakin ingin keluar?");
                        if (!confirmLeave) {
                            e.preventDefault();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
