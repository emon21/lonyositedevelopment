<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Under Maintenance</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Arial', sans-serif;
            color: white;
            text-align: center;
        }
        .container {
            max-width: 600px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        .emoji {
            font-size: 6rem;
            margin-bottom: 20px;
        }
        .progress-bar {
            width: 100%;
            height: 10px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            overflow: hidden;
            margin-top: 40px;
        }
        .progress {
            width: 70%;
            height: 100%;
            background: #fff;
            animation: loading 4s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        @keyframes loading {
            0% { width: 0%; }
            100% { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="emoji">🚧</div>
        <h1>Site Under Maintenance</h1>
        <p>আমরা কিছু উন্নয়ন কাজ করছি। খুব শীঘ্রই ফিরে আসছি!</p>
        <p>We are making some improvements. We'll be back soon!</p>
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
    </div>
</body>
</html>