<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            color: #333;
        }

        .navbar {
            background: #084e0e;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
            font-size: 28px;
        }

        .navbar p {
            margin: 5px 0 0;
        }

        .home-button {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 6px;
        }

        .home-button:hover {
            background: #084e0e;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 25px;
        }

        .dashboard h2 {
            margin: 0;
            color: #084e0e;
        }
        .add-button{
            background: #15549b;
            color: white;
            padding: 11px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            white-space: nowrap;
            line-height: 1.2;
            display: inline-block;
            

        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #084e0e;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            margin-top: 0;
            color: #084e0e;
        }

        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background: #e9f5f1;
        }
        th:last-child,
        td:last-child{
            width: 350px;
            white-space: nowrap;
        }

        .pending {
            background: #eff1ca;
            color: #5e490a;
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 13px;
        }

        .completed {
            background: #b6eeee;
            color: #0a8826;
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 13px;
        }

        .status-button {
            background: #2b9c3e;
            color: white;
            border: none;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 5px;
            border: 2px solid #07610f;
            cursor: pointer;
            margin-right: 8px;
            white-space: nowrap;
        }

        .edit-button {
            background: #e7d04b;
            color: #333;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 5px;
            border: 2px solid #f7a901;
            margin-right: 8px;
            white-space: nowrap;
        }

        .delete-button {
            background: #e74858;
            color: white;
            border: none;
            padding: 8px 10px;
            border-radius: 5px;
            border: 2px solid #740404;
            cursor: pointer;
            white-space: nowrap;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777777;
        }

    </style>
</head>

<body>

    <div class="navbar">

        <div>
            <h1>Personal Task Manager</h1>
            <p>Organize your tasks and stay productive.</p>
        </div>

        <a href="/" class="home-button">
            🏠 Home
        </a>

    </div>


    <div class="container">

        <div class="dashboard">

            <div>
                <h2>My Tasks</h2>

                <p>Manage your personal tasks here.</p>
            </div>

            <a href="/tasks/create" class="add-button">
                + Add task
            </a>

        </div>


        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        <div class="card">

            <h3>Task List</h3>


            @if($tasks->count() > 0)

                <table>

                    <thead>

                        <tr>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach($tasks as $task)

                            <tr>

                                <td>
                                    {{ $task->task_name }}
                                </td>

                                <td>
                                    {{ $task->description ?? 'No description' }}
                                </td>

                                <td>

                                    @if($task->status === 'Completed')

                                        <span class="completed">
                                            Completed
                                        </span>

                                    @else

                                        <span class="pending">
                                            Pending
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $task->due_date ?? 'No deadline' }}
                                </td>

                                <td>

                                    <a href="/tasks/{{ $task->id }}/status" class="status-button">
                                        🔄 Update Status
                                    </a>

                                    <a href="/tasks/{{ $task->id }}/edit" class="edit-button">
                                        ✏️ Edit
                                    </a>

                                    <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-button">
                                            🗑️ Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>


            @else

                <div class="empty">

                    <h3>No Tasks Yet</h3>

                    <p>
                        Click "Add Task" to create your first task.
                    </p>

                </div>

            @endif

        </div>

    </div>

</body>
</html>