const productSelect = document.getElementById('product_id');
const quantityInput = document.getElementById('quantity');
const unitPriceSpan = document.getElementById('unit-price');
const previewQuantitySpan = document.getElementById('preview-quantity');
const totalPriceSpan = document.getElementById('total-price');
const stockInfo = document.getElementById('stock-info');

function updatePreview() {
    const selectedOption = productSelect.options[productSelect.selectedIndex];
    const price = selectedOption ? parseFloat(selectedOption.getAttribute('data-price')) || 0 : 0;
    const stock = selectedOption ? parseInt(selectedOption.getAttribute('data-stock')) || 0 : 0;
    const quantity = parseInt(quantityInput.value) || 0;

    unitPriceSpan.textContent = 'Rp ' + price.toLocaleString('id-ID');

    previewQuantitySpan.textContent = quantity;

    const totalPrice = price * quantity;
    totalPriceSpan.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');

    if (selectedOption && selectedOption.value) {
        stockInfo.textContent = `Stok tersedia: ${stock}`;
        stockInfo.className = quantity > stock ? 'text-red-500 text-xs mt-1' : 'text-gray-600 text-xs mt-1';
        quantityInput.setAttribute('max', stock);

        if (quantity > stock) {
            stockInfo.textContent = `Stok tidak mencukupi! Stok tersedia: ${stock}`;
        }
    } else {
        stockInfo.textContent = '';
    }
}

productSelect.addEventListener('change', function() {
    updatePreview();
    quantityInput.value = 1;
    updatePreview();
});

quantityInput.addEventListener('input', updatePreview);
quantityInput.addEventListener('change', updatePreview);
updatePreview();
