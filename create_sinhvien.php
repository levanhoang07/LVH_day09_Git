<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <?php
        // 1. Kết nối đến cơ sở dữ liệu
        $connect_lvh = mysqli_connect('localhost', 'root', '', 'qldiem');

        // Kiểm tra kết nối
        if (!$connect_lvh) {
            die("Lỗi kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
        }

        // 2. Tạo truy vấn để đọc dữ liệu
        $sql_lvh = "SELECT * FROM SINHVIEN";

        // 3. Thực thi câu lệnh truy vấn
        $result_lvh = $connect_lvh->query($sql_lvh);
    ?>

    <h1 align="center">Danh sách sinh viên</h1>
    <hr/>
    <table border="1" width="80%" align="center">
        <thead>
            <tr>
                <th>STT</th>
                <th>MASV</th>
                <th>HOTEN</th>
                <th>NGAYSINH</th>
                <th>GIOITINH</th>
                <th>MAKHOA</th>
                <th>ANH</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // 4. Duyệt và hiển thị
                $stt = 0;
                while ($row_lvh = $result_lvh->fetch_assoc()) {
                    $stt++;
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row_lvh["MASV"]; ?></td>
                <td><?php echo $row_lvh["HOTEN"]; ?></td>
                <td><?php echo $row_lvh["NGAYSINH"]; ?></td>
                <td><?php echo $row_lvh["GIOITINH"]; ?></td>
                <td><?php echo $row_lvh["MAKHOA"]; ?></td>
                <td><?php echo $row_lvh["ANH"]; ?></td>
            </tr>
            <?php
                } // end while

                // 5. Đóng kết nối
                $connect_lvh->close();
            ?>
        </tbody>
    </table>
</body>
</html>
