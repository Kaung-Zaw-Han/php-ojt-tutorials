<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Laravel Task With MTM Frame</title>
</head>
<body>
    <div class="col-6 offset-3 mb-3">
        <h1 class="text-success">Todo List</h1>
        <form action="{{ route('tasks.create') }}" method="POST">
            @csrf
            <div class="text-group mb-3">
                <label for="" class="form-label">Task</label>
                <input type="text" name="task" id="" class="form-control"
                    placeholder="Enter Your Task...">
            </div>
            <div>
                <input type="submit" value="Add" name="btnAdd" class="btn btn-primary">
            </div>
        </form>
    </div>
    <div class="col-6 offset-3">
        <h1>Tasks</h1>
        @foreach ($users as $user)
            <div class="content bg-dark shadow-sm mb-3 p-3">
                <span class="fs-5 text-white">{{ $user['name'] }}</span>
                <form action="{{ route('tasks.delete', $user['id']) }}" method="POST" class="float-end">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
