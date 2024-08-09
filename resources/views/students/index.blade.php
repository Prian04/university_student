<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @if (session('delete'))
            <div class="alert alert-success">
                {{ session('delete') }}
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-success">
                {{ session('update') }}
            </div>
        @endif
        <h1>Students</h1>
        <a href="{{ route('students.create') }}">Add Student</a>
        <table id="students-table" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Class Teacher</th>
                    <th>Class</th>
                    <th>Admission Date</th>
                    <th>Yearly Fees</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->teacher->name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->admission_date->format('d-m-Y') }}</td>
                        <td>{{ $student->yearly_fees }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student) }}">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>