function SaveOrder() {
    const form = document.getElementById('orderForm');
    const table = form.table.value;
    const category = form.category.value;
    const food = form.food.value;
    const description = form.description.value;
    const quantity = form.quantity.value;

    if (!table || !category || !food || !quantity) {
        alert('กรุณากรอกข้อมูลให้ครบถ้วน!');
        return;
    }

    fetch('/orders', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            table: table,
            category: category,
            food: food,
            description: description,
            quantity: quantity
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                showOrderSummary(table, category, food, description, quantity);
            } else {
                alert('There was an error saving the order.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function showOrderSummary(table, category, food, description, quantity) {
    const orderSummary = document.getElementById('orderSummary');
    orderSummary.innerHTML = `
        <h2>สรุปคำสั่งซื้อ</h2>
        <p><strong>โต๊ะ:</strong> ${table}</p>
        <p><strong>ประเภทอาหาร:</strong> ${category}</p>
        <p><strong>อาหาร:</strong> ${food}</p>
        <p><strong>จำนวน:</strong> ${quantity}</p>
        <p><strong>รายละเอียดเพิ่มเติม:</strong> ${description}</p>
    `;

    const notification = document.getElementById('notification');
    notification.style.display = 'block';
}
