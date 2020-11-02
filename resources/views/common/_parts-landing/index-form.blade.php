<section class="box_n4 row">
    <div class="box_n4_mask"></div>
    <div class="container">
        <div class="box_n4_inners">
            <h3 class="n4_title">Если вы готовы к новым и колоссальным изменениям</h3>
            <div class="n4_longtitle">Заполните эту форму и получите доступ курсу</div>

            {!! Form::open(['route' => ['common.bill.product', 'product' => $productId], 'method' => 'post', 'before' => 'csrf']) !!}
                {{ Form::hidden('tag', 'landing') }}
                {!! Form::text('name', old('name'), ['placeholder' => 'Имя', 'class' => 'n4_form_input', 'required']) !!}
                {!! Form::text('email', old('email'), ['placeholder' => 'Почта', 'class' => 'n4_form_input', 'required']) !!}
                {!! Form::text('phone', old('phone'), ['placeholder' => 'Телефон', 'class' => 'n4_form_input']) !!}
                <div class="checkbox_block">
                    {!! Form::checkbox('oferta', '1', true, ['value' => 'Я даю согласие на обработку моих персональных данных', 'required']) !!}
                    {!! Form::label('oferta', ' Я согласен на '.link_to('/privatpolicy', 'обработку персональных данных', ['target' => '_blank']), [], false ) !!}
                </div>
                {!! Form::submit('Получить методику', ['name' => 'submit', 'class' => 'n4_form_submit']) !!}

            {!! Form::close() !!}
            <div class="n4_more">{!! link_to('/more', 'У меня нет электронной почты', ['target' => '_blank']) !!}</div>
        </div>
    </div>
</section>
