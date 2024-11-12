document.getElementById('cart-btn').addEventListener('click', function (event) {
    event.preventDefault();
    const cart = document.getElementById('cart');
    // เปลี่ยนการแสดง/ซ่อนตะกร้า
    cart.style.display = (cart.style.display === 'none' || cart.style.display === '') ? 'block' : 'none';
});

document.getElementById('confirm-order-button').addEventListener('click', function () {
    Swal.fire({
        title: 'ยืนยันการสั่งซื้อ?',
        text: "คุณต้องการสั่งซื้อสินค้าหรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            // ส่งฟอร์มการยืนยันการสั่งซื้อ
            document.getElementById('confirm-order-form').submit();
        }
    });
});

document.getElementById('confirm-order-button').addEventListener('click', function () {
    Swal.fire({
        title: 'ยืนยันการสั่งซื้อ?',
        text: "คุณต้องการสั่งซื้อสินค้าหรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the order form
            document.getElementById('confirm-order-form').submit();

            // Show success message using SweetAlert
            Swal.fire({
                title: 'สำเร็จ!',
                text: "การสั่งซื้อของคุณสำเร็จ",
                icon: 'success',
                confirmButtonText: 'ตกลง'
            }).then(() => {
                // Reload the page to go back to the cart page
                location.reload();
            });
        }
    });
});

