<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Management') }}
        </h2>
    </x-slot>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Add Product Button -->
                <div class="flex justify-end mb-4">
                    <button id="openModalBtn" class="px-4 py-2 text-white rounded-md" style="background-color: var(--primary-color);">
                        + Add Product
                    </button>
                </div>

                <!-- Product Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Product Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Old Price</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body" class="divide-y divide-gray-200 text-sm text-gray-700">
                            <!-- Dynamic rows will appear here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div id="addProductModal" class="modal-overlay hidden">
        <div class="modal-box">
            <h3 class="modal-title">Add New Product</h3>
            <form id="addProductForm">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" id="productName" required>
                </div>

                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <input type="file" id="productImage" accept="image/*" required>
                    <div id="imagePreviewContainer" class="preview-container hidden">
                        <img id="imagePreview" src="" alt="Preview">
                    </div>
                </div>

                <div class="form-group">
                    <label for="productPrice">Price</label>
                    <input type="number" step="0.01" id="productPrice" required>
                </div>

                <div class="form-group">
                    <label for="productOldPrice">Old Price</label>
                    <input type="number" step="0.01" id="productOldPrice" required>
                </div>

                <div class="modal-actions">
                    <button type="button" id="closeModalBtn" class="btn cancel-btn">Cancel</button>
                    <button type="submit" class="btn add-btn">Add Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-bold mb-2">✅ Success!</h2>
            <p>Product has been added successfully.</p>
            <button id="closeSuccessBtn" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">OK</button>
        </div>
    </div>
</x-app-layout>
