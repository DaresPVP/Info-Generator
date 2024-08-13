<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $access = isset($_POST['access']) && $_POST['access'] == 'FA' ? 'Full Access' : 'Not Full Access';
    $domain = isset($_POST['domain']) ? htmlspecialchars($_POST['domain']) : '';
    $skins = isset($_POST['skins']) ? htmlspecialchars($_POST['skins']) : 'Not Specified';
    $days = isset($_POST['days']) ? htmlspecialchars($_POST['days']) : 'Not Specified';
    $activity = isset($_POST['activity']) ? htmlspecialchars($_POST['activity']) : 'Not Specified';
    $co = isset($_POST['co']) ? htmlspecialchars($_POST['co']) : 'Not Specified';
    $bin = isset($_POST['bin']) ? htmlspecialchars($_POST['bin']) : 'Not Specified';

    $message = "@everyone\n";
    $message .= "$access\n";
    $message .= "- Domain: ($domain)\n";
    $message .= "- Skin Count: ($skins)\n";
    $message .= "- Last Match: $days days\n";
    $message .= "- $activity\n";
    $message .= "C/o = $co\n";
    $message .= "Bin = $bin\n";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
            position: relative;
        }
        h2 {
            color: #333;
        }
        pre {
            background-color: #f4f4f4;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: left;
            white-space: pre-wrap;
            line-height: 1.0;
            margin: 0;
            font-weight: bold;
            font-size: 16px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            color: #0056b3;
        }
        .copy-btn {
            position: absolute;
            bottom: 250px; 
            right: 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .copy-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="copy-btn" onclick="copyToClipboard()">Copy</button>
        <h2>Generated Message</h2>
        <pre id="message"><?php echo $message; ?></pre>
        <a class="back-link" href="index.html">Go Back</a>
    </div>

    <script>
        function copyToClipboard() {
            var messageElement = document.getElementById('message');
            var range = document.createRange();
            range.selectNode(messageElement);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert('Message copied to clipboard!');
        }
    </script>
</body>
</html>
