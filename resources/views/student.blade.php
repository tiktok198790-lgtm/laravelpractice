<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/student-save" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name">
    <br><br>

    <input type="email" name="email" placeholder="Email">
    <br><br>

    <input type="number" name="age" placeholder="Age">
    <br><br>

    <button type="submit">Save</button>

 </form>

    <div>
         
      @foreach($data as $user)
        <h3>{{$user-> name }}</h3>
        <h3>{{$user-> age }}</h3>
        <h3>{{$user-> email }}</h3>
             <form action="{{ route('student.edit', $user->id) }}" method="GET">
        @csrf
        @method('GET')

        <button type="submit">Edit</button>
    </form>
            <form action="{{ route('user.delete', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
      @endforeach

      
    </div>




</body>
</html> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registry</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #0c0f14;
            --surface:   #131720;
            --card:      #181e2a;
            --border:    #232b3a;
            --accent:    #4f8ef7;
            --accent2:   #a78bfa;
            --danger:    #f43f5e;
            --success:   #10b981;
            --text:      #e8eaf0;
            --muted:     #6b7a99;
            --glow:      rgba(79,142,247,.18);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            padding: 0 0 80px;
        }

        /* ── Header ── */
        header {
            background: linear-gradient(135deg, #0d1623 0%, #111827 100%);
            border-bottom: 1px solid var(--border);
            padding: 28px 48px;
            display: flex;
            align-items: center;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(12px);
        }

        .header-icon {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border-radius: 12px;
            display: grid; place-items: center;
            font-size: 20px;
            box-shadow: 0 0 20px var(--glow);
        }

        header h1 {
            font-family: 'Syne', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        header span {
            margin-left: auto;
            font-size: .8rem;
            color: var(--muted);
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 6px 14px;
            border-radius: 20px;
        }

        /* ── Layout ── */
        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 48px 24px 0;
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 32px;
            align-items: start;
        }

        @media (max-width: 860px) {
            .page { grid-template-columns: 1fr; }
            header { padding: 20px 24px; }
        }

        /* ── Form Card ── */
        .form-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 32px;
            position: sticky;
            top: 90px;
            animation: slideUp .5s ease both;
        }

        .form-card h2 {
            font-family: 'Syne', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-card h2::before {
            content: '';
            width: 4px; height: 18px;
            background: linear-gradient(var(--accent), var(--accent2));
            border-radius: 4px;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: .75rem;
            font-weight: 500;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 8px;
        }

        input[type=text], input[type=email], input[type=number] {
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 16px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(79,142,247,.15);
        }

        input::placeholder { color: var(--muted); }

        .btn-primary {
            width: 100%;
            margin-top: 8px;
            background: linear-gradient(135deg, var(--accent), #3b6fd4);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-family: 'Syne', sans-serif;
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: .3px;
            cursor: pointer;
            transition: opacity .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 4px 18px rgba(79,142,247,.3);
        }

        .btn-primary:hover {
            opacity: .9;
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(79,142,247,.4);
        }

        .btn-primary:active { transform: translateY(0); }

        /* ── Table Panel ── */
        .table-panel {
            animation: slideUp .5s .1s ease both;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .panel-header h2 {
            font-family: 'Syne', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-header h2::before {
            content: '';
            width: 4px; height: 18px;
            background: linear-gradient(var(--accent2), #ec4899);
            border-radius: 4px;
        }

        .count-badge {
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--muted);
            font-size: .78rem;
            padding: 5px 12px;
            border-radius: 20px;
        }

        /* ── Student Cards ── */
        .students-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .student-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            transition: border-color .2s, transform .2s, box-shadow .2s;
            animation: slideUp .4s ease both;
        }

        .student-card:hover {
            border-color: rgba(79,142,247,.4);
            transform: translateX(4px);
            box-shadow: -4px 0 0 var(--accent), 0 4px 24px rgba(0,0,0,.3);
        }

        .avatar {
            width: 46px; height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent2) 100%);
            display: grid; place-items: center;
            font-family: 'Syne', sans-serif;
            font-size: 1.1rem;
            font-weight: 800;
            flex-shrink: 0;
            color: #fff;
        }

        .student-info { flex: 1; min-width: 0; }

        .student-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: .98rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .student-meta {
            display: flex;
            gap: 16px;
            margin-top: 5px;
            flex-wrap: wrap;
        }

        .meta-item {
            font-size: .78rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .meta-item svg { opacity: .6; }

        .card-actions {
            display: flex;
            gap: 8px;
            flex-shrink: 0;
        }

        .btn-edit, .btn-delete {
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: .8rem;
            font-weight: 500;
            cursor: pointer;
            transition: all .2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-edit {
            background: rgba(79,142,247,.12);
            color: var(--accent);
            border: 1px solid rgba(79,142,247,.25);
        }

        .btn-edit:hover {
            background: rgba(79,142,247,.2);
            border-color: var(--accent);
        }

        .btn-delete {
            background: rgba(244,63,94,.1);
            color: var(--danger);
            border: 1px solid rgba(244,63,94,.2);
        }

        .btn-delete:hover {
            background: rgba(244,63,94,.18);
            border-color: var(--danger);
        }

        /* ── Empty State ── */
        .empty-state {
            background: var(--card);
            border: 1px dashed var(--border);
            border-radius: 16px;
            padding: 60px 24px;
            text-align: center;
        }

        .empty-state .icon { font-size: 2.5rem; margin-bottom: 12px; opacity: .4; }
        .empty-state p { color: var(--muted); font-size: .9rem; }

        /* ── Animations ── */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<header>
    <div class="header-icon">🎓</div>
    <h1>Student Registry</h1>
    <span>Management Portal</span>
</header>

<div class="page">

    {{-- ── Add Student Form ── --}}
    <div class="form-card">
        <h2>Add Student</h2>

        <form action="/student-save" method="POST">
            @csrf

            <div class="field">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="e.g. Sara Ahmed">
            </div>

            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="sara@example.com">
            </div>

            <div class="field">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" placeholder="e.g. 21" min="1" max="120">
            </div>

            <button type="submit" class="btn-primary">
                + Save Student
            </button>
        </form>
    </div>

    {{-- ── Student List ── --}}
    <div class="table-panel">
        <div class="panel-header">
            <h2>All Students</h2>
            <span class="count-badge">{{ count($data) }} enrolled</span>
        </div>

        @if(count($data) > 0)
        <div class="students-list">
            @foreach($data as $user)
            <div class="student-card" style="animation-delay: {{ $loop->index * 60 }}ms">

                <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>

                <div class="student-info">
                    <div class="student-name">{{ $user->name }}</div>
                    <div class="student-meta">
                        <span class="meta-item">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            {{ $user->email }}
                        </span>
                        <span class="meta-item">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                            Age {{ $user->age }}
                        </span>
                    </div>
                </div>

                <div class="card-actions">
                    <form action="{{ route('student.edit', $user->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn-edit">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            Edit
                        </button>
                    </form>

                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                            Delete
                        </button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <div class="icon">📭</div>
            <p>No students yet. Add your first one using the form.</p>
        </div>
        @endif
    </div>

</div>

</body>
</html>