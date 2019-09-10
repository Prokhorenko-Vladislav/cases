@extends("layouts.public")

@section("content")
    <div class="card">
        <div class="card-header">
            Статистика по дням:awdawd
        </div>
        <div class="card-body">
            <div class="accordion" id="accordionExample">
            @forelse ($wordsByDay as $date => $words)
                    <div class="card mt-3">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDate{{ str_replace("/", "", $date) }}" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $date }}
                                </button>
                            </h2>
                        </div>
                        <div id="collapseDate{{ str_replace("/", "", $date) }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="word__block table">
                                    <thead>
                                    <tr>
                                        <th>Именительный</th>
                                        <th>Родительный</th>
                                        <th>Дательный</th>
                                        <th>Винительный</th>
                                        <th>Творительный</th>
                                        <th>Предложный</th>
                                        <th scope="col">
                                            Ip-адрес пользователя
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                @forelse($words as $word)
                                        <tr>
                                            @foreach($word["cases"] as $case)
                                                <td>{{ $case }}</td>
                                            @endforeach
                                            <td>{{ $word["word"]->user()->first()->ip }}</td>
                                        </tr>
                                @empty

                                @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            @empty

            @endforelse

                <div class="row justify-content-center mt-5">
                    <div class="col-md-6 d-flex justify-content-center">
                        {!! $paginationLinks !!}
                    </div>
                </div>
        </div>
    </div>
@endsection
