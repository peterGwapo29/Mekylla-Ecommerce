async function loadProducts() {
    try {
        const response = await fetch("/products/user");
        if (!response.ok) throw new Error(`HTTP error ${response.status}`);
        const products = await response.json();

        const container = document.getElementById("product-container");
        if (products.length === 0) {
            container.innerHTML = `<p class="text-gray-500 text-center">No products available.</p>`;
            return;
        }

        container.innerHTML = products.map(product => `
            <div class="bg-white p-4 rounded-lg shadow-sm">
                <img src="${product.image ? '/storage/' + product.image : '/images/default.png'}"
                     alt="${product.name}" class="w-full h-48 object-contain mb-2"/>
                <p class="font-medium">${product.name}</p>
                <p class="text-pink-500 font-semibold">
                    $${Number(product.price).toFixed(2)}
                    ${product.old_price ? `<span class="text-gray-400 line-through text-sm">$${Number(product.old_price).toFixed(2)}</span>` : ""}
                </p>
                <button class="mt-3 w-full bg-pink-500 text-white font-semibold py-2 rounded-full hover:bg-pink-600 transition duration-300 ease-in-out shadow-md hover:shadow-lg active:scale-95">Add to Cart</button>
            </div>
        `).join("");

    } catch (error) {
        console.error("❌ Error fetching products:", error);
    }
}
document.addEventListener("DOMContentLoaded", loadProducts);
