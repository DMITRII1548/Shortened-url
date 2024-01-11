@extends('layouts.main')

@section('content')
    <section class="mt-5">
        <h1 class="text-center">Сокращение ссылок</h1>
        <div class="mt-3">
            <label for="basic-url">
                <h3>Введите вашу ссылку</h3>
            </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url" placeholder="https://example.com/users"
                    aria-describedby="basic-addon3">
                <button onclick="storeUrl()" class="btn btn-success">Сократить</button>
            </div>
        </div>
        <div class="mt-3 d-none" id="load-message">
            <strong class="text-danger" id="message">Ссылка генерируется <span id="dots"></span></strong>
        </div>
        <div class="mt-3 d-none" id="res-message">
            <strong class="text-success">Ваша ссылка: <span id="res-url"></span></strong>
        </div>
    </section>
    <section class="mt-5">
        <h2>Как это работает?</h2>
        <p>Мы создаем уникальную ссылку для вашего сайта, при переходе на которую происходит редирект на вашу ранее вписаную
            ссылку. Вы можете использовать данный функционал для вашего сайта, рассылки и для собственного удобства.</p>
        <p>Создавая и используя сокращенную ссылку вы автоматически соглашаетесь с правилами <a href="{{ asset('policy.txt') }}"> пользовательского
                соглашения.</a></p>
        <strong class="text-danger">Если вы нашли ссылку нарушающее пользовательское соглашение, то пожалуйста заполните данную <a href="#" class="text-danger">заявку.</a></strong>
    </section>
    <script>
        const loadMessage = document.getElementById('load-message')
        const resMessage = document.getElementById('res-message')

        function storeUrl() {
            startLoad()
            loadMessage.classList.toggle('d-none')
            let url = document.getElementById('basic-url').value;

            axios.post('/api/urls/', {
                    'url_to': url
                })
                .then(res => {
                    loadMessage.classList.toggle('d-none')
                    resMessage.classList.toggle('d-none')
                    document.getElementById('res-url').textContent = res.data.url
                })
                .catch(e => {
                    showError()
                })
        }

        function startLoad() {
            const messageElement = document.getElementById('message');
            const dotsElement = document.getElementById('dots');
            messageElement.textContent = 'Ссылка генерируется'

            if (!messageElement.classList.toggle('text-primary')) {
                messageElement.classList.toggle('text-primary')
            }

            if (messageElement.classList.toggle('text-danger')) {
                messageElement.classList.toggle('text-danger')
            }

            if (!resMessage.classList.toggle('d-none')) {
                resMessage.classList.toggle('d-none')
            }

            const loadingInterval = setInterval(() => {
                dotsElement.textContent += '.';
                if (dotsElement.textContent.length > 3) {
                    dotsElement.textContent = '';
                }
            }, 750); // Add a dot every 0.75 seconds

            // Simulate some processing time (here, using setTimeout for demonstration)
            setTimeout(() => {
                clearInterval(loadingInterval); // Stop adding dots
                dotsElement.textContent = ''; // Clear the dots
                messageElement.classList.toggle('text-primary')
                messageElement.classList.toggle('text-danger')
                messageElement.textContent = 'Ошибка. Попробуйте еще раз.'
                // Perform your logic here after the loading completes
                // For example, you can make an API call, process data, etc.
            }, 6000); // Simulate a 3-second loading period, modify as needed
        }

        function showError() {
            clearInterval(loadingInterval); // Stop adding dots
            dotsElement.textContent = ''; // Clear the dots
            messageElement.classList.toggle('text-primary')
            messageElement.classList.toggle('text-danger')
            messageElement.textContent = 'Ошибка. Попробуйте еще раз.'
        }
    </script>
@endsection
