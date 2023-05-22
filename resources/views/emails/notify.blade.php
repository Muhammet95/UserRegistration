Здравствуйте {{$model->first_name}} {{$model->last_name}}!<br>
Ваша заявка на {{$model->type }} в системе нотариуса была принята на число {{$model->date}}<br><br>

С уважением,<br>
система {{ config('app.name') }}
