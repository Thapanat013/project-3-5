<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ก๋วยเตี๋ยวเรือลุงต๋อย</title>
    <link rel="stylesheet" href="styles.css"> <!-- ลิงก์ไปยังไฟล์ CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section>
        <h2>สั่งก๋วยเตี๋ยวของคุณ</h2>

        <!-- ฟิลด์เลือกเลขโต๊ะ -->
        <label for="table-number">เลือกเลขโต๊ะ</label>
        <input type="number" id="table-number" value="9" placeholder="กรุณากรอกเลขโต๊ะ" min="1" disabled>

        <!-- จำนวณชาม -->
        <!-- จำนวณ/ชาม -->
<label for="amount">จำนวณ/ชาม</label>
<form class="max-w-sm mx-auto">
    <input type="text" id="amount" maxlength="2" value="1" onkeypress="validate(event)" />

    <!-- เลือกประเภทเส้น -->
    <label for="noodle-type">ประเภทเส้น</label>
    <select id="noodle" class="text-sm rounded-lg w-1/3 p-2.5 dark:bg-[#f2f3f4]">
        <option selected value="-">เลือกประเภทเส้น</option>
        <option value="เส้นหมี่">เส้นหมี่</option>
        <option value="เส้นเล็ก">เส้นเล็ก</option>
        <option value="เส้นใหญ่">เส้นใหญ่</option>
        <option value="บะหมี่">บะหมี่</option>
        <option value="วุ้นเส้น">วุ้นเส้น</option>
        <option value="ไม่ใส่เส้น">ไม่ใส่เส้น</option>
    </select>

    <!-- เลือกเนื้อสัตว์ -->
    <label for="protein">เนื้อสัตว์</label>
    <select id="protein" class="text-sm rounded-lg w-1/3 p-2.5 dark:bg-[#f2f3f4]">
        <option selected value="-">เลือกเนื้อสัตว์</option>
        <option value="หมู">หมู</option>
        <option value="ไม่ใส่เนื้อสัตว์">ไม่ใส่เนื้อสัตว์</option>
        <option value="เนื้อ">เนื้อ</option>
        <option value="ลูกชิ้น">ลูกชิ้น</option>
    </select>

    <!-- เลือกน้ำซุป -->
    <label for="extra">พิเศษ-ธรรมดา</label>
    <select id="extra" class="text-sm rounded-lg w-1/3 p-2.5 dark:bg-[#f2f3f4]">
        <option selected value="-">เลือก</option>
        <option value="ธรรมดา">ธรรมดา</option>
        <option value="พิเศษ">พิเศษ</option>
    </select>

    <label for="soup">น้ำซุป</label>
    <select id="soup" class="text-sm rounded-lg w-1/3 p-2.5 dark:bg-[#f2f3f4]">
        <option selected value="-">เลือก</option>
        <option value="น้ำตก">น้ำตก</option>
        <option value="น้ำใส">น้ำใส</option>
        <option value="แห้ง">แห้ง</option>
    </select>
</form>

<script>
    function validate(event) {
        const key = event.key;
        if (!/[0-9]/.test(key)) {
            event.preventDefault();
        }
    }
</script>


        <!-- เครื่องเคียง -->
        <h3>เครื่องเคียง</h3>
        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-[#f2f3f4] dark:border-gray-600 dark:text-white">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="no-veggies" type="checkbox" value="กากหมู" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                    <label for="no-veggies" class="w-full py-3 ms-2 text-sm font-medium text-[#17202a] dark:text-[#17202a]">กากหมู</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="no-garlic" type="checkbox" value="ลูกชิ้นเนื้อปิ้ง" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                    <label for="no-garlic" class="w-full py-3 ms-2 text-sm font-medium text-[#17202a] dark:text-[#17202a]">ลูกชิ้นเนื้อปิ้ง</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="no-chili" type="checkbox" value="ลูกชิ้นหมูปิ้ง" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                    <label for="no-chili" class="w-full py-3 ms-2 text-sm font-medium text-[#17202a] dark:text-[#17202a]">ลูกชิ้นหมูปิ้ง</label>
                </div>
            </li>
        </ul>

        <label for="comments">หมายเหตุเพิ่มเติม</label>
        <div class="w-full max-w-sm min-w-[200px]">
            <input type="text" id="comments" placeholder="เช่น ไม่ใส่ถั่วงอก, เพิ่มน้ำซุป" class="w-full px-3 py-2 text-sm transition duration-300 bg-transparent border rounded-md shadow-sm placeholder:text-slate-400 text-slate-700 border-slate-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 focus:shadow">
        </div><br>

        <!-- ปุ่มยืนยันคำสั่งซื้อ -->
        <button onclick="submitOrder()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ยืนยันคำสั่งซื้อ</button>

        <!-- สรุปคำสั่งซื้อ -->
        <div id="order-summary">
            <h3 id="summary-text">สรุปคำสั่งซื้อของคุณ:</h3>
            <div class="summary-item">
                <span class="summary-label">เลขโต๊ะ:</span>
                <span id="summary-table">-</span>
            </div>
            <div class="summary-item" style="display: flex; justify-content: space-between;">
                <span class="summary-amount">จำนวน/ชาม</span>
                <span id="summary-amount">-</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">เส้น:</span>
                <span id="summary-noodle">-</span>
            </div>
            <div class="summary-item">
                <span class="summary-label">น้ำซุป:</span>
                <span id="summary-soup">-</span>
            </div>
            <div class="summary-item">
                <span class="summary-label">เลือกเนื้อสัตว์:</span>
                <span id="summary-protein">-</span>
            </div>
            <div class="summary-item">
                <span class="summary-label">พิเศษ-ธรรมดา:</span>
                <span id="summary-extra">-</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">หมายเหตุเพิ่มเติม:</span>
                <span id="summary-comments">-</span>
            </div>
            <div class="exclusion-list" id="exclusion-list" style="display: none;">
                <h4>อาหารทานเล่น:</h4>
                <ul id="exclusion-items">-</ul>
            </div>
        </div>
    </section>

    <script>
        function submitOrder() {
            const tableNumber = document.getElementById('table-number').value;
            const amount = document.getElementById('amount').value;
            const noodle = document.getElementById('noodle').value;
            const protein = document.getElementById('protein').value;
            const soup = document.getElementById('soup').value;
            const extra = document.getElementById('extra').value;
            const comments = document.getElementById('comments').value;

            // ตรวจสอบเงื่อนไข
            if (noodle != '-' && protein != '-' && soup != '-' && extra != '-' && tableNumber != '' && amount != '') {
                // แสดงข้อความสำเร็จ
                Swal.fire({
                    title: "สั่งซื้อสำเร็จ",
                    text: "คำสั่งซื้อของคุณได้รับเรียบร้อยแล้ว",
                    icon: "success"
                });

                // แสดงข้อมูลสรุปคำสั่งซื้อ
                document.getElementById('summary-table').textContent = tableNumber;
                document.getElementById('summary-amount').textContent = amount;
                document.getElementById('summary-noodle').textContent = noodle;
                document.getElementById('summary-protein').textContent = protein;
                document.getElementById('summary-extra').textContent = extra;
                document.getElementById('summary-soup').textContent = soup;
                document.getElementById('summary-comments').textContent = comments;

                // เครื่องเคียง
                const exclusions = [];
                document.querySelectorAll('input[type="checkbox"]:checked').forEach((item) => {
                    exclusions.push(item.value);
                });

                if (exclusions.length > 0) {
                    document.getElementById('exclusion-items').innerHTML = exclusions.map(item => `<li>${item}</li>`).join('');
                    document.getElementById('exclusion-list').style.display = 'block';
                } else {
                    document.getElementById('exclusion-list').style.display = 'none';
                }

            } else {
                // แสดงข้อความกรอกข้อมูลไม่ครบ
                Swal.fire({
                    title: "โปรดกรอกข้อมูลให้ครบ",
                    icon: "error"
                });
            }
        }
    </script>
</body>

</html>

