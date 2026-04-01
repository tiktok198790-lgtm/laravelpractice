<form action="{{ route('student.update', $user->id) }}" method="POST">
    @csrf

    Name:
    <input type="text" name="name" value="{{ $user->name }}">

    Email:
    <input type="email" name="email" value="{{ $user->email }}">

    <button type="submit">Update</button>
</form>