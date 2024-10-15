<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điểm Của Tôi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .input {
            display: grid;
            grid-template-columns: 120px 1fr;
            margin-bottom: 10px;
        }
        input[type="text"], select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .kq {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php 
    $result = null; 
    $classification = ""; 


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $result = find();
        $classification = findHs($result); 
    }

    function find() {
        $a = floatval($_POST["seme1"]); 
        $b = floatval($_POST["seme2"]); 
        $c = intval($_POST["year"]); 

        $result = 0;
        if ($c == 1) {
            $result = ($a + ($b * 3)) / 4; 
        } else if ($c == 2) {
            $result = ($a + ($b * 3)) / 5; 
        } else if ($c == 3) {
            $result = ($a + ($b * 4)) / 6; 
        }
        return $result; 
    }

    function findHs($result) {
        if ($result >= 8) {
            return "HỌC SINH GIỎI"; 
        } else if ($result > 5) {
            return "HỌC SINH KHÁ"; 
        } else {
            return "HỌC SINH YẾU"; 
        }
    }
?>
    <form method="POST">
        <h1>BẢNG ĐIỂM CỦA TÔI</h1>
        
        <div class="input">
            <div>Semester 1:</div>
            <input type="text" name="seme1" value="<?php if (isset($_POST['seme1'])) echo htmlspecialchars($_POST['seme1']); ?>">
        </div>
        
        <div class="input">
            <div>Semester 2:</div>
            <input type="text" name="seme2" value="<?php if (isset($_POST['seme2'])) echo htmlspecialchars($_POST['seme2']); ?>">
        </div>
        
        <div class="input">
            <div>Year:</div>
            <select name="year">
                <option value="">Select year</option>
                <option value="1" <?php if (isset($_POST['year']) && $_POST['year'] == 1) echo 'selected'; ?>>1</option>
                <option value="2" <?php if (isset($_POST['year']) && $_POST['year'] == 2) echo 'selected'; ?>>2</option>
                <option value="3" <?php if (isset($_POST['year']) && $_POST['year'] == 3) echo 'selected'; ?>>3</option>
            </select>
        </div>

        <div class="input">
            <div>Summaries:</div>
            <input type="text" name="result" value="<?php if (isset($result)) echo htmlspecialchars(number_format($result, 2)); ?>" readonly>
        </div>

        <div><input type="submit" value="Check"></div>

        <p class="kq"><?php if ($classification) echo $classification; ?></p>
    </form>
</body>
</html>
