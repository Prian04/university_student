@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <h1>Add Student</h1>
    <form id="studentForm" method="POST" action="{{ route('students.store') }}">
        @csrf
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" required>
        </div>
        <div class="form-group">
            <label for="class_teacher_id">Class Teacher</label>
            <select class="form-control" id="class_teacher_id" name="class_teacher_id" required>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="class">Class</label>
            <input type="text" class="form-control" id="class" name="class" required>
        </div>
        <div class="form-group">
            <label for="admission_date">Admission Date</label>
            <input type="date" class="form-control" id="admission_date" name="admission_date" required>
        </div>
        <div class="form-group">
            <label for="yearly_fees">Yearly Fees</label>
            <input type="number" step="0.01" class="form-control" id="yearly_fees" name="yearly_fees" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection