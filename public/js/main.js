// =======================
// GLOBAL PAGE LOADER
// =======================

// halaman selesai load → hide loader
window.addEventListener("load", function () {
    document.body.classList.add("loaded");
});

document.addEventListener("click", function (e) {
    const link = e.target.closest("a");
    if (!link) return;

    // ❌ JANGAN tampilkan loader untuk:
    if (
        link.hasAttribute("data-no-loader") || // download khusus
        link.hasAttribute("download") ||
        link.target === "_blank"
    ) {
        return;
    }

    // ✅ loader hanya untuk navigasi halaman
    if (link.href && !link.href.startsWith("#")) {
        document.body.classList.remove("loaded");
    }
});

// submit form → show loader
document.addEventListener("submit", function () {
    document.body.classList.remove("loaded");
});
/* ===============================
   GLOBAL DOM READY
================================ */
document.addEventListener("DOMContentLoaded", () => {
    /* ===============================
       MOBILE MENU TOGGLE
    ================================ */
    const mobileBtn = document.getElementById("mobileMenuButton");
    const mobileMenu = document.getElementById("mobileMenu");

    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    }

    /* ===============================
       FILTER BUKU (AJAX)
     
    ================================ */
    const form = document.getElementById("filterForm");
    if (!form) return; // ⛔ stop kalau bukan halaman buku

    const search = form.querySelector('input[name="q"]');
    const kelas = form.querySelector('select[name="kelas"]');
    const categorySearch = document.getElementById("categorySearch");
    const list = document.getElementById("categorySuggestion");
    const chips = document.getElementById("selectedCategories");
    const inputs = document.getElementById("categoryInputs");
    const resultBox = document.getElementById("bookResult");
    const loading = document.getElementById("loading");

    const selected = new Map();
    let timer;

    /* ===============================
       INIT DARI QUERY STRING
    ================================ */
    const params = new URLSearchParams(window.location.search);

    for (const [key, value] of params.entries()) {
        if (key.startsWith("categories")) {
            const item = document.querySelector(
                `.category-item[data-id="${value}"]`
            );
            if (item) {
                selected.set(value, item.dataset.name);
            }
        }
    }

    render();

    /* ===============================
       AJAX SUBMIT
    ================================ */
    const submitAjax = () => {
        const params = new URLSearchParams(new FormData(form));
        history.pushState({}, "", "?" + params.toString());

        loading?.classList.remove("hidden");

        fetch("?" + params.toString(), {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((res) => res.json())
            .then((data) => {
                resultBox.innerHTML = data.html;
                loading?.classList.add("hidden");
            });
    };

    const debounce = (fn) => {
        clearTimeout(timer);
        timer = setTimeout(fn, 400);
    };

    /* ===============================
       SEARCH & FILTER
    ================================ */
    search?.addEventListener("input", () => debounce(submitAjax));
    kelas?.addEventListener("change", submitAjax);

    /* ===============================
       CATEGORY SEARCH
    ================================ */
    categorySearch?.addEventListener("focus", () => {
        list.classList.remove("hidden");
    });

    categorySearch?.addEventListener("input", () => {
        const val = categorySearch.value.toLowerCase();
        document.querySelectorAll(".category-item").forEach((i) => {
            i.style.display =
                i.dataset.name.toLowerCase().includes(val) &&
                !selected.has(i.dataset.id)
                    ? "block"
                    : "none";
        });
    });

    list?.addEventListener("click", (e) => {
        const item = e.target.closest(".category-item");
        if (!item || selected.has(item.dataset.id)) return;

        selected.set(item.dataset.id, item.dataset.name);
        categorySearch.value = "";
        list.classList.add("hidden");
        render();
        submitAjax();
    });

    /* ===============================
       RENDER CHIP
    ================================ */
    function render() {
        chips.innerHTML = "";
        inputs.innerHTML = "";

        selected.forEach((name, id) => {
            const chip = document.createElement("span");
            chip.className =
                "flex items-center gap-2 px-3 py-1 rounded-full text-xs " +
                "bg-blue-100 text-[#00499c] border border-blue-200 cursor-pointer";

            chip.innerHTML = `${name} <span class="font-bold">×</span>`;

            chip.onclick = () => {
                selected.delete(id);
                render();
                submitAjax();
            };

            chips.appendChild(chip);

            const input = document.createElement("input");
            input.type = "hidden";
            input.name = "categories[]";
            input.value = id;
            inputs.appendChild(input);
        });
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".category-btn");
    const books = document.querySelectorAll(".book-card");

    if (!buttons.length || !books.length) return;

    buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            // ACTIVE STATE
            buttons.forEach((b) => b.classList.remove("active"));
            btn.classList.add("active");

            const filter = btn.dataset.filter;

            books.forEach((book) => {
                const categories = book.dataset.categories.split(",");

                if (filter === "all" || categories.includes(filter)) {
                    book.style.display = "flex";
                } else {
                    book.style.display = "none";
                }
            });
        });
    });
});
