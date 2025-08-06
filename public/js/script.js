// Automatic Progress Step Based on data-step attribute
const progress = document.querySelector(".progress");
const step = parseInt(progress.dataset.step, 10); // current step (1–6)

const circles = progress.querySelectorAll(".circle");
const bars = progress.querySelectorAll(".bar");

circles.forEach((circle, index) => {
    if (index + 1 < step) {
        circle.classList.add("done");
        circle.querySelector(".label").innerHTML = "&#10003;";
    } else if (index + 1 === step) {
        circle.classList.add("active");
    }
});

bars.forEach((bar, index) => {
    if (index < step - 1) bar.classList.add("done");
});

document.addEventListener("DOMContentLoaded", function () {
    // Fungsi: reset dan sembunyikan satu field + nested di dalamnya
    function resetAndHideElement(element) {
        if (!element) return;
        element.style.display = "none";

        const inputs = element.querySelectorAll("input");
        inputs.forEach((input) => {
            if (input.type === "radio" || input.type === "checkbox") {
                input.checked = false;
            } else {
                input.value = "";
            }
        });

        // recursive reset: jika field di dalamnya juga punya data-show-id
        const nested = element.querySelectorAll("[data-show-id]");
        nested.forEach((nestedEl) => resetAndHideElement(nestedEl));
    }

    // Fungsi: tampilkan target dari radio yang checked
    function showTarget(radio) {
        const targetId = radio.dataset.showTarget;
        const showVal = radio.dataset.showValue;
        if (radio.checked && radio.value === showVal && targetId) {
            const targetEl = document.querySelector(
                `[data-show-id="${targetId}"]`
            );
            if (targetEl) {
                targetEl.style.display = "block";
            }
        }
    }

    // Fungsi utama saat radio diganti
    function handleRadioChange(radio) {
        const targetId = radio.dataset.showTarget;
        const targetEl = document.querySelector(`[data-show-id="${targetId}"]`);

        // Reset semua target dari radio dalam group yang sama (dengan name yang sama)
        const groupRadios = document.querySelectorAll(
            `input[name="${radio.name}"][data-show-target]`
        );
        groupRadios.forEach((r) => {
            const id = r.dataset.showTarget;
            const el = document.querySelector(`[data-show-id="${id}"]`);
            if (el) resetAndHideElement(el);
        });

        // Tampilkan target baru (jika value cocok)
        showTarget(radio);
    }

    // Tambahkan event listener ke semua radio dengan data-show-target
    const allConditionalRadios = document.querySelectorAll(
        'input[type="radio"][data-show-target]'
    );
    allConditionalRadios.forEach((radio) => {
        radio.addEventListener("change", function () {
            handleRadioChange(radio);
        });
    });

    // Inisialisasi: tampilkan field sesuai yang sudah terpilih saat load
    allConditionalRadios.forEach((radio) => {
        if (radio.checked) {
            showTarget(radio);
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const radioAda = document.querySelector(
        'input[type="radio"][value="Ada"][name="ket_domisili"]'
    );
    const radioTidak = document.querySelector(
        'input[type="radio"][value="Tidak Ada"][name="ket_domisili"]'
    );
    const inputSumber = document.querySelector(
        'input[name="sumber_ket_domisili"]'
    );

    function toggleInput() {
        inputSumber.disabled = !radioAda.checked;
        if (!radioAda.checked) inputSumber.value = "";
    }

    radioAda.addEventListener("change", toggleInput);
    radioTidak.addEventListener("change", toggleInput);

    // Init state
    toggleInput();
});

document.addEventListener("DOMContentLoaded", function () {
    // Tangkap semua radio group yang akan mengontrol tampilan
    const toggles = document.querySelectorAll(
        '.jejaring-toggle input[type="radio"]'
    );

    function handleToggle() {
        toggles.forEach((radio) => {
            const status = radio.name; // e.g., "jejaring_dalam_status"
            const value = radio.value;
            const checked = radio.checked;

            // Cari id field berdasarkan nama
            const targetId = status.replace("_status", "_fields");
            const target = document.getElementById(targetId);

            if (target) {
                if (checked && value === "Ada") {
                    target.style.display = "block";
                } else if (checked && value === "Tidak Ada") {
                    target.style.display = "none";
                    // Kosongkan input dalam field
                    target
                        .querySelectorAll("input")
                        .forEach((input) => (input.value = ""));
                }
            }
        });
    }

    // Pasang event listener ke semua radio
    toggles.forEach((radio) => {
        radio.addEventListener("change", handleToggle);
    });

    // Jalankan sekali saat halaman dimuat
    handleToggle();
});

document.addEventListener("DOMContentLoaded", function () {
    const radios = document.querySelectorAll(
        ".jejaring-toggle input[type='radio']"
    );

    radios.forEach((radio) => {
        radio.addEventListener("change", function () {
            const groupName = this.name;
            const radiosInGroup = document.querySelectorAll(
                `input[name='${groupName}']`
            );

            radiosInGroup.forEach((r) => {
                const targetId = r.dataset.target;
                if (targetId) {
                    const target = document.getElementById(targetId);
                    if (target) {
                        target.style.display =
                            r.checked && r.value === "Ada" ? "flex" : "none";
                    }
                }
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let formChanged = false;

    const form = document.querySelector("form"); // bisa ganti jadi #form-lks kalau kamu pakai ID

    if (form) {
        form.querySelectorAll("input, select, textarea").forEach((element) => {
            element.addEventListener("change", function () {
                formChanged = true;
                console.log("Form diubah");
            });
        });

        form.addEventListener("submit", function () {
            formChanged = false; // reset jika disubmit
        });
    }

    // Peringatan sebelum keluar
    window.addEventListener("beforeunload", function (e) {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = '';
        }
    });

    // Untuk link keluar yang butuh konfirmasi (kalau ada)
    document.querySelectorAll('.confirm-leave').forEach(function (link) {
        link.addEventListener('click', function (e) {
            if (formChanged) {
                const confirmLeave = confirm("Data belum disimpan akan hilang. Yakin keluar?");
                if (!confirmLeave) {
                    e.preventDefault();
                }
            }
        });
    });
});