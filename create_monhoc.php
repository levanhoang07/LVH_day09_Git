<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách môn học</title>
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
        $sql_lvh = "SELECT * FROM MONHOC";

        // 3. Thực thi câu lệnh truy vấn
        $result_lvh = $connect_lvh->query($sql_lvh);
    ?>

    <h1 align="center">Danh sách môn học</h1>
    <hr/>
    <table border="1" width="80%" align="center">
        <thead>
            <tr>
                <th>STT</th>
                <th>MAMH</th>
                <th>TENMH</th>
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
                <td><?php echo $row_lvh["MAMH"]; ?></td>
                <td><?php echo $row_lvh["TENMH"]; ?></td>
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
