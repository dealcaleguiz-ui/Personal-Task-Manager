<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Status</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background: #084e0e;
            color: white;
            padding: 30px 20px;
        }

        header h1 {
            margin: 0;
            font-size: 32px;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 12px;
            border: 2px solid #084e0e;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin-top: 0;
            color: #067214;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #444;
        }

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .buttons {
            display: flex;
            gap: 12px;
        }

        .update-button {
            background: #084e0e;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        .update-button:hover {
            background: #084e0e;
        }

        .back-button {
            background: #15549b;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 15px;
        }

        .back-button:hover {
            background-color: #607d8b;
        }
    </style>
</head>

<body>

<header>
    <h1>📝Personal Task Manager</h1>
</header>

<div class="container">

    <div class="card">

        <h2>Update Task Status</h2>

        <form action="/tasks/{{ $task->id }}/status" method="POST">

            @csrf
            @method('PATCH')

            <label for="status">
                Status
            </label>

            <select id="status" name="status">

                <option value="Pending"
                    {{ $task->status == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ $task->status == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

            <div class="buttons">

                <button type="submit" class="update-button">
                    Update Status
                </button>

                <a href="/tasks" class="back-button">
                    Back to Tasks
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>