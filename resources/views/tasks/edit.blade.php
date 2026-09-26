<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            color: #333030;
        }

        .navbar {
            background: #084e0e;
            color: white;
            padding: 30px 20px;
        }

        .navbar h1 {
            margin: 0;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            border: 2px solid #084e0e;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #067214;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .update-button {
            background: #2b9c3e;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button {
            background: #15549b;
            color: white;
            padding: 11px 18px;
            border-radius: 5px;
            text-decoration: none;
        }

        .error {
            background: #f8d7da;
            color: #842029;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>📝Personal Task Manager</h1>
    </div>

    <div class="container">

        <div class="card">

            <h2>Edit Task</h2>

            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/tasks/{{ $task->id }}" method="POST">

                @csrf
                @method('PUT')

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name', $task->task_name) }}"
                    required
                >

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                >{{ old('description', $task->description) }}</textarea>

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date', $task->due_date) }}"
                >

                <div class="buttons">

                    <button
                        type="submit"
                        class="update-button"
                    >
                        Update Task
                    </button>

                    <a
                        href="/tasks"
                        class="back-button"
                    >
                        Back to Tasks
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>