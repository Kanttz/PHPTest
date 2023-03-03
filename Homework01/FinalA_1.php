<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinalA_1</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <h1 style="text-align: center;">โปรแกรมคำนวณ BMR-TDEE</h1><br />
    <div style="text-align: center;">
        <img src="./images/bt_.png" alt="" style="width: 35%; height: auto;">
        <hr>
        <form action="FinalA_2.php" method="post">
            <table style="margin: auto;">
                <tr>
                    <td style="text-align:right;"><strong>ชื่อ-สกุล:</strong></td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td style="text-align:right;"><strong>เพศ:</strong></td>
                    <td><input type="radio" name="gender" value="ชาย" required> ชาย <input type="radio" name="gender" value="หญิง"> หญิง</td>
                </tr>
                <tr>
                    <td style="text-align:right;"><strong>น้ำหนัก (กิโลกรัม):</strong></td>
                    <td><input type="number" name="weight" required></td>
                </tr>
                <tr>
                    <td style="text-align:right;"><strong>ส่วนสูง (เซนติเมตร):</strong></td>
                    <td><input type="number" name="height" required></td>
                </tr>
                <tr>
                    <td style="text-align:right;"><strong>อายุ (ปี):</strong></td>
                    <td><input type="number" name="age" required></td>
                </tr>
                <tr>
                    <td style="text-align:right;"><strong>กิจกรรม:</strong></td>
                    <td>
                        <select style="width: 92%;" name="activity" required>
                            <option value="0">ไม่ออกกำลังกายเลย</option>
                            <option value="1-3">ออกกำลังกาย 1-3 วัน/สัปดาห์</option>
                            <option value="3-5">ออกกำลังกาย 3-5 วัน/สัปดาห์</option>
                            <option value="6-7">ออกกำลังกาย 6-7 วัน/สัปดาห์</option>
                            <option value="บ่อย">ออกกำลังกายอย่างหนัก</option>
                        </select>
                    </td>
                </tr>
            </table>
            <?php ?>

            <hr>
            <input type="submit" value="OK">
            <input type="reset" value="ยกเลิก">
        </form>
    </div>
</body>

</html>