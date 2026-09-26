<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .header {
            background: #084e0e;
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 40px;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 35px;
            max-width: 750px;
            border-radius: 10px;
            border: 2px solid #084e0e;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card h2 {
            color: #084e0e;
            margin-top: 0;
        }
        .card p {
            color: #084e0e;
            margin-top: 0;
        }

        .view-button {
            display: inline-block;
            background: #15549b;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
        }

        .view-button:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>🎉WELCOME🎉</h1>
    </div>

    <div class="container">

        <div class="card">

            <h2>📝Personal Task Manager</h2>
            <p>Manage your task easily and stay organized.</p>
            <a href="/tasks" class="view-button">
                👁️ View Tasks
            </a>

        </div>

    </div>

</body>
</html>
