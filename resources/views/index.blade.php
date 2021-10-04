<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
{{--    @foreach(session('alinur') as $num):--}}
{{--    {{$num}}--}}
{{--    @endforeach--}}
{{--    @if($numbersAlan):--}}
{{--    @foreach($numbersAlan as $number):--}}
{{--    <span>{{$number}}</span>--}}
{{--    @endforeach--}}
{{--    @endif--}}

</div>

<div class="container mt-5">
    <div class="row">
        <div class="results">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">История
                        догадок
                    </th>
                    <th scope="col">История достоверности</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Экстрасенс Алан</td>
                    <td id="historyAlan">{{session('alan')}}</td>
                    <td id="historyTrueAlan"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Экстрасенс Джон</td>
                    <td id="historyJohn">{{session('johnNums')}}</td>
                    <td id="historyTrueJohn"></td>
                </tr>
                </tbody>
            </table>


            <table class="table mt-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">История чисел</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Пользователь</td>

                    @if(session()->has('user')):
                        @foreach(session('user') as $userNum):
                        <td>{{$userNum}}</td>
                        @endforeach
                    @endif

                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


<div class="container bg-light">
    <div class="row">
        <a href="" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">Загодать число</a>

    </div>
</div>

<!-- Modal -->
<div class="container bg-dark">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('create')}}" method="post">
                        @csrf
                        <input type="integer" name="number">

                        <input class="mt-5 btn bg-warning" type="submit" id="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@
4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</body>
</html>

<script>
    $('#submit').on('click', function (e) {
        e.preventDefault()
        let id = $('input[name="number"]').val()

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            url: 'test',
            data: {
                id: id,
            },
            method: 'POST'
        }).done(function (d) {
            let date = JSON.parse(d)
            $('#historyAlan').append(date.alanNum)
            $('#historyJohn').append(date.johnNum)

        })
    })
</script>
