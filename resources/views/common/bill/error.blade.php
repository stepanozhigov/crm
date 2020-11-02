<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<style>
    .notfound h2 {
    font-family: 'Titillium Web', sans-serif;
    font-size: 26px;
    font-weight: 700;
    margin: auto;
    }

    .container-order {
        text-align: center;
        border-radius: 2px;
        border: 2px solid #CCC;
        max-width: 700px;
        margin: 20px auto;
        padding: 10px 25px 25px;
        background: #FFF none repeat scroll 0% 0%;
        color: #C00;
    }
</style>

<div id="notfound">
    <div class="notfound container-order">
        <h2>{{ __('messages.Произошла ошибка, или такого счета не существует!')}}</h2>

    </div>
</div>

</html>
