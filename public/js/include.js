document.addEventListener("DOMContentLoaded", async () => {
  const layoutRes = await fetch("admin-sidebar.html");
  let layout = await layoutRes.text();

  const contentEl = document.querySelector("main");
  const contentHTML = contentEl ? contentEl.innerHTML : "";

  // Sisipkan isi halaman ke dalam layout
  layout = layout.replace("<!-- CONTENT -->", contentHTML);

  // Ganti seluruh body dengan layout yang sudah disisipi konten
  document.body.innerHTML = layout;
});