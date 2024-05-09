
</body>
</html><html>
    <title>HomeWork</title>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body class="bg-purple-200 m-0 p-0">
    <div class="hidden md:block absolute left-0 top-0 w-screen h-screen -z-10" id="bg"></div>
    <div class="warp">
    <div class=""></div>
    <form class="form"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label  for="inputString">مقدار را وارد کنید</label><br>
        <input class="text" id="inputString" name="inputString" required placeholder=" حداقل 8 کاراکتر"><br>
        <button class="btn" type="submit">ارسال</button>
    </form>

    <div id="responseMessage">
        <?php
        // نمایش پیام‌ها بعد از ارسال فرم
        if (isset($_GET['success'])) {
            echo '<p style="color: green;">' . htmlspecialchars($_GET['success']) . '</p>';
        } elseif (isset($_GET['error'])) {
            echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
    </div>
    </div>
 
    
  <script src="js/app.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
function saveString($inputString) {
    // Check string length
    if (mb_strlen($inputString) < 8) {
        return "رشته باید حداقل 8 کاراکتر داشته باشد";
    }

    // Checking that the string does not contain numbers and letters at the same time
    if (!preg_match('/[a-zA-Z]/', $inputString) || !preg_match('/\d/', $inputString)) {
        return "رشته باید حاوی حروف و اعداد به طور همزمان باشد";
    }

    // Generate a unique identifier to store in the file
    $uniqueId = uniqid();

    // Forming string content to write in txt file
    $content = "شناسه: $uniqueId\nرشته: $inputString\n\n";

    // Writing information in a txt file
    $filePath = 'saved_strings.txt';
    $file = fopen($filePath, 'a');
    fwrite($file, $content);
    fclose($file);

    // Return success message to home page using URL
    $redirectUrl = "index.php?success=رشته با موفقیت ذخیره شد با شناسه: $uniqueId";
    header("Location: $redirectUrl");
    exit;
}

// Get the string from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST["inputString"];
    $result = saveString($inputString);
    if ($result) {
        //  If the function returns an error message, send it to the main page
        $redirectUrl = "index.php?error=$result";
        header("Location: $redirectUrl");
        exit;
    }
}

?>
    