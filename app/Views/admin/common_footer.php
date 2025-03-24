<footer class="app-footer">
    <!--begin::To the end-->
    <!--end::To the end-->
    <!--begin::Copyright-->
    <strong>
        Copyright &copy; 2025-2026&nbsp;
        <a href="#" class="text-decoration-none">KV Soft Labs</a>.
    </strong>
    All rights reserved.
    <!--end::Copyright-->

<script>
    document.getElementById("logoutBtn").addEventListener("click", function (event) {
        event.preventDefault(); // Prevent default link behavior

        fetch("/admin/logout", { method: "POST" })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    window.location.href = "/admin"; // Redirect to login
                } else {
                    console.error("Logout Error:", data); // Log full response
                    alert("Logout failed: " + (data.message || "Unknown error"));
                }
            })
            .catch(error => {
                console.error("Logout Request Failed:", error);
                alert("Logout request failed. Check the console for details.");
            });
    });
</script>

 </footer>