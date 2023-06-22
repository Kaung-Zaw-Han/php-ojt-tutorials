<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Major Create Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="row mb-5">
        <nav class="navbar navbar-light bg-light">
            <div class="menu w-75 mx-auto">
                <a class="navbar-brand" href="#">Navbar</a>
                <div class="row float-end">
                    <a href="{{ route('student.index') }}"
                        class="col-md-6 text-decoration-none text-secondary ">Students</a>
                    <a href="{{ route('major.index') }}" class="col-md-6 text-decoration-none text-dark ">Majors</a>
                </div>
            </div>
        </nav>
    </div>
    <section>
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <h2>Major Create</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('major.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid  @enderror"
                            value="{{ old('name') }}" placeholder="name" name="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('major.index') }}" class="btn btn-secondary">Back</a>
                        <input type="submit" value="Create" class="btn btn-primary float-end">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
