class ProductModal {
    constructor() {
        // Modal elements
        this.modal = document.getElementById("addProductModal");
        this.openBtn = document.getElementById("openModalBtn");
        this.closeBtn = document.getElementById("closeModalBtn");

        // Image preview
        this.imageInput = document.getElementById("productImage");
        this.imagePreviewContainer = document.getElementById("imagePreviewContainer");
        this.imagePreview = document.getElementById("imagePreview");

        // Form
        this.form = document.getElementById("addProductForm");

        // Success modal
        this.successModal = document.getElementById("successModal");
        this.closeSuccessBtn = document.getElementById("closeSuccessBtn");

        this.initEvents();
    }

    initEvents() {
        // Show/Hide modals
        this.openBtn.addEventListener("click", () => this.showModal());
        this.closeBtn.addEventListener("click", () => this.hideModal());
        this.closeSuccessBtn.addEventListener("click", () => this.hideSuccessModal());

        window.addEventListener("click", (e) => {
            if (e.target === this.modal) this.hideModal();
            if (e.target === this.successModal) this.hideSuccessModal();
        });

        // Image preview
        this.imageInput.addEventListener("change", (e) => this.previewImage(e));

        // Handle form submit
        this.form.addEventListener("submit", (e) => this.handleSubmit(e));
    }

    showModal() {
        this.modal.classList.remove("hidden");
    }

    hideModal() {
        this.modal.classList.add("hidden");
        this.resetForm();
    }

    showSuccessModal() {
        this.successModal.classList.remove("hidden");
    }

    hideSuccessModal() {
        this.successModal.classList.add("hidden");
    }

    previewImage(e) {
        const file = e.target.files[0];
        if (!file) {
            this.imagePreview.src = "";
            this.imagePreviewContainer.classList.add("hidden");
            return;
        }

        const reader = new FileReader();
        reader.onload = (event) => {
            this.imagePreview.src = event.target.result;
            this.imagePreviewContainer.classList.remove("hidden");
            this.imagePreviewContainer.style.maxHeight = "200px";
            this.imagePreviewContainer.style.overflow = "auto";
        };
        reader.readAsDataURL(file);
    }

    async handleSubmit(e) {
        e.preventDefault();

        // Prepare the form data
        const formData = new FormData();
        formData.append("name", document.getElementById("productName").value);
        formData.append("price", document.getElementById("productPrice").value);
        formData.append("old_price", document.getElementById("productOldPrice").value);

        const imageFile = document.getElementById("productImage").files[0];
        if (imageFile) {
            formData.append("image", imageFile);
        }

        // Get CSRF token from meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        try {
            const response = await fetch("/products", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Accept": "application/json"  
                },
                body: formData
            });

            const result = await response.json();

            if (!response.ok) {
                console.error("❌ Error:", result);
                alert("Failed to add product: " + (result.message || "Unknown error"));
                return;
            }

            console.log("✅ Product Saved:", result);

            // Show success modal
            this.hideModal();
            this.showSuccessModal();

            // Reset form
            this.resetForm();

            // Optional: Add product to page dynamically
            this.addProductToGrid(result.product);

        } catch (error) {
            console.error("⚠️ Request failed:", error);
            alert("An error occurred while saving the product.");
        }
    }

    addProductToGrid(product) {
        const container = document.getElementById("product-container");

        const card = document.createElement("div");
        card.classList.add("bg-white", "rounded-lg", "shadow", "p-4", "text-center");

        const imgSrc = product.image ? `/storage/${product.image}` : "https://via.placeholder.com/150";

        card.innerHTML = `
            <img src="${imgSrc}" alt="${product.name}" class="w-full h-48 object-cover rounded-md mb-2">
            <h3 class="text-lg font-semibold">${product.name}</h3>
            <p class="text-gray-700">₱${product.price}</p>
            ${product.old_price ? `<p class="line-through text-gray-400">₱${product.old_price}</p>` : ""}
        `;

        container.prepend(card);
    }




    resetForm() {
        this.form.reset();
        this.imagePreview.src = "";
        this.imagePreviewContainer.classList.add("hidden");
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const modal = new ProductModal();
});
