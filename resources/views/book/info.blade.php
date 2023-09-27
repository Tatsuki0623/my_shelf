<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name}}の本棚
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            var books_data = @json($books);
        </script>
    </x-slot>
<body>
    <center>
    <h1>本統計情報</h1>
    <h2>基本情報</h2>
    <ul>
        <li>
            <p>本棚登録数（全て）</p>
            <h3>{{$books['all_register_books']}}　冊</h3>
        </li>
        <li>
            <p>本の冊数（全て）</p>
            <h3>{{$books['total_books']}}　冊</h3>
        </li>
        <li>
            <p>本棚登録数（漫画のみ）</p>
            <h3>{{$books['comics']}}　冊</h3>
        </li>
        <li>
            <p>本の冊数（漫画のみ）</p>
            <h3>{{$books['total_comics']}}　冊</h3>
        </li>
        <li>
            <p>本棚登録数（小説のみ）</p>
            <h3>{{$books['novels']}}　冊</h3>
        </li>
        <li>
            <p>本の冊数（小説のみ）</p>
            <h3>{{$books['total_novels']}}　冊</h3>
        </li>
    </ul>
    
    <div>
        <div>
            <canvas id="info-register"></canvas>
        </div>
        <div>
            <p id="comics-ratio"></p>
            <p id="novels-ratio"></p>
        </div>
    </div>
    
    <br/>
    
    <div>
        <div>
            <canvas id="info-total"></canvas>
        </div>
        <div>
            <p id="comics-total-ratio"></p>
            <p id="novels-total-ratio"></p>
        </div>
    </div>
    
    <div class="back">[<a href="javascript:history.back()">back</a>]</div>
    </center>
</body>
    </x-app-layout>
</html>