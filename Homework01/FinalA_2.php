<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinalA_2</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1 style="text-align: center;">ผลการคำนวณ BMR-TDEE</h1>
    <br />
    <div style="text-align: center;">
        <img src="./images/bt_.png" alt="" style="width: 35%; height: auto;">
        <hr>
        <?php
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        $age = $_POST["age"];
        $activity = $_POST["activity"];

        $bmr = 0;
        $tdee = 0;

        if ($gender == "ชาย") {
            $bmr = 66 + (13.7 * $weight) + (5 * $height) - (6.8 * $age);
        } elseif ($gender == "หญิง") {
            $bmr = 655 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $age);
        }

        switch ($activity) {
            case "0":
                $tdee = $bmr * 1.2;
                break;
            case "1-3":
                $tdee = $bmr * 1.375;
                break;
            case "3-5":
                $tdee = $bmr * 1.55;
                break;
            case "6-7":
                $tdee = $bmr * 1.725;
                break;
            case "บ่อย":
                $tdee = $bmr * 1.9;
                break;
            default:
                $tdee = $bmr * 1.2;
        }

        function echoTable(...$args)
        {
            echo "<table style='margin: auto;'>";
            foreach ($args as $arg) {
                echo "<tr><td style='text-align:right;'><strong>$arg[0]:</strong></td><td>$arg[1]</td></tr>";
            }
            echo "</table>";
        }

        echoTable(
            ["คุณ", $name],
            ["เพศ", $gender],
            ["น้ำหนัก", $weight],
            ["ส่วนสูง", $height],
            ["อายุ", $age],
            ["การออกกำลังกาย", "$activity ครั้ง / สัปดาห์"],
            ["BMR", $bmr],
            ["TDEE", $tdee]
        );


        ?>
        <hr />
        <button onclick="window.history.back()">ย้อนกลับ</button>
        <!-- <?php
                echo "<button onclick=\"location.href='FinalA_1.php'\">ย้อนกลับ</button>";
                ?> -->

    </div>
</body>

</html>