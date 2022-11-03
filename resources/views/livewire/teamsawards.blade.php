<div class="mt-4">
    <div class="card">
        <div class="card-header">
            <h1><strong>Medalleria Equipos</strong></h1>
        </div>
        <div class="card-body">
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Equipo</th>
                <th>Deporte</th>
                <th>Medalla</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->sport->sport }}</td>
                <td><img src="{{ $team->image}}" width="60" height="50" alt=""></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
