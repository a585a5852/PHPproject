<?php
require('dbconnect.php');
$sql = "SELECT * FROM employee ORDER BY fname ASC";
$result = mysqli_query($con , $sql);
$count = mysqli_num_rows($result);
$order = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ข้อมูลพนักงาน</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <style> body { font-family: 'Krub', sans-serif; } </style>
</head>
<body>

<?php require 'auth.php'; ?>
<?php
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(16));
}
?>


<nav class="navbar navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="#">ระบบพนักงาน</a>
    <div class=" center">
      <a class="navbar-brand" href="insertForm.php">เพิ่มข้อมูลพนักงาน</a>
    </div>
    <div class="ms-auto d-flex align-items-center gap-2">
      <span class="navbar-text">
        สวัสดี, <?= htmlspecialchars($_SESSION['username'] ?? $_SESSION['email'] ?? 'ผู้ใช้'); ?>
      </span>
        <form action="logout.php" method="post" class="d-inline">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">
            <button class="btn btn-outline-danger btn-sm"
            onclick="return confirm('ออกจากระบบ?');">Log out</button>
        </form>
    </div>
  </div>
</nav>

<div class="container mt-4 text-center">
  <h2 class="mb-4">ข้อมูลพนักงานทั้งหมด</h2>
  <hr>

  <?php if ($count > 0) { ?>
    <!-- ค้นหา: หน้าตาเดิม -->
    <form action="serachData.php" method="post">
      <label for="" class="fs-4">ค้นหาพนักงาน</label>
      <input type="text" name="empname" class="form-control" placeholder="ป้อนชื่อพนักงาน">
      <input type="submit" value="ค้นหา" class="btn btn-primary my-2">
    </form>

    <!-- ฟอร์มลบหลายรายการ: ครอบทั้งตารางฟอร์มเดียว -->
    <form action="mutipleDelete.php" method="POST" id="multiForm">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>แผนก</th>
            <th>ระดับเงินเดือน</th>
            <th>แก้ไขข้อมูล</th>
            <th>ลบข้อมูล</th>
            <th>ลบหลายรายการ</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_object($result)) { ?>
            <tr>
              <td><?php echo $order++; ?></td>
              <td><?php echo htmlspecialchars($row->fname); ?></td>
              <td><?php echo htmlspecialchars($row->lname); ?></td>
              <td><?php echo htmlspecialchars($row->department); ?></td>
              <td><?php echo htmlspecialchars($row->salary); ?></td>

              <td>
                <a href="editForm.php?idemp=<?php echo (int)$row->id; ?>"
                   class="btn btn-warning"
                   onclick="return confirm('คุณต้องการแก้ไขช้อมูลหรือไม่?')">แก้ไขข้อมูล</a>
              </td>
              <td>
                <a href="deleteQueryString.php?idemp=<?php echo (int)$row->id; ?>"
                   class="btn btn-danger"
                   onclick="return confirm('คุณต้องการลบช้อมูลหรือไม่?')">ลบข้อมูล</a>
              </td>

              <td>
                <input type="checkbox" name="idcheck[]" class="form-check-input" value="<?php echo (int)$row->id; ?>">
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </form>

    <!-- แถวปุ่ม: จัดให้อยู่ตรงกลาง และ "ลบหลายรายการ" อยู่ระหว่างอีกสองปุ่ม -->
    <div class="d-flex justify-content-center gap-3 mt-3">
      <a href="insertForm.php" class="btn btn-primary">บันทึกข้อมูลพนักงาน</a>

      <!-- ปุ่มลบหลายรายการอยู่นอกฟอร์ม แต่ผูกกับฟอร์มด้วย form="multiForm" -->
      <input type="submit" id="multiDeleteBtn" form="multiForm" 
             value="ลบข้อมูลหลายรายการ" 
             class="btn btn-danger" 
             style="display:none;" 
             onclick="return confirm('ต้องการลบรายการที่เลือกใช่ไหม?');">

      <button id="toggleBtn" class="btn btn-success">เลือกทั้งหมด</button>
    </div>
  <?php } else { ?>
    <div class="alert alert-danger">
      <b>ไม่มีข้อมูลพนักงานในฐานข้อมูล</b>
    </div>
  <?php } ?>

</div>

<script>
  let allChecked = false;

  function toggleCheck() {
    if (!allChecked) {
      checkAll();
      document.getElementById("toggleBtn").innerText = "ยกเลิกทั้งหมด";
      document.getElementById("toggleBtn").className = "btn btn-warning";
    } else {
      uncheckAll();
      document.getElementById("toggleBtn").innerText = "เลือกทั้งหมด";
      document.getElementById("toggleBtn").className = "btn btn-success";
    }
    allChecked = !allChecked;
  }

  function checkAll() {
    const form = document.getElementById('multiForm');
    form.querySelectorAll('input[name="idcheck[]"]').forEach(el => el.checked = true);
    toggleDeleteBtn();
  }

  function uncheckAll() {
    const form = document.getElementById('multiForm');
    form.querySelectorAll('input[name="idcheck[]"]').forEach(el => el.checked = false);
    toggleDeleteBtn();
  }

  function toggleDeleteBtn() {
    let checkboxes = document.querySelectorAll('input[name="idcheck[]"]');
    let deleteBtn  = document.getElementById("multiDeleteBtn");
    let anyChecked = Array.from(checkboxes).some(cb => cb.checked);
    deleteBtn.style.display = anyChecked ? "inline-block" : "none";
  }

  // ผูกคลิกให้ปุ่ม "เลือกทั้งหมด"
  document.getElementById('toggleBtn')?.addEventListener('click', toggleCheck);

  // อัปเดตสถานะปุ่มลบเมื่อมีการเปลี่ยนเช็กบ็อกซ์
  document.querySelectorAll('input[name="idcheck[]"]').forEach(cb => {
    cb.addEventListener("change", toggleDeleteBtn);
  });

  // เรียกครั้งแรกเพื่อเซ็ตสถานะปุ่มลบ
  toggleDeleteBtn();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
